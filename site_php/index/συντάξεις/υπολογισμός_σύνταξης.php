<?php
   //ob_start();
   session_start();
   $_SESSION["previous_page"] = getUrl();

function getUrl() {
  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
}
?>
<?php
$duration = $type = "";
$result = "";
$durationErr = $typeErr = "";
$correct_input = false;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $correct_input = true;
   if (empty($_POST["type"]))
   {
     $correct_input = false;
     $typeErr = "Απαιτείται η επιλογή κατηγορίας!";
   }
   else
   {
     $type = test_input($_POST["type"]);
   }

   if (empty($_POST["duration"]))
   {
     $durationErr = "Απαιτείται η συμπλήρωση των χρόνων απασχόλησης!";
     $correct_input = false;
   }
   else
   {
     $duration = test_input($_POST["duration"]);
     if (!preg_match("/^[0-9]*$/",$duration))
     {
       $durationErr = "Μόνο αριθμοί επιτρέπονται!";
       $correct_input = false;
     }
   }
}
else
{
  $correct_input = false;
}

if($correct_input)
{
  include '../calc_pension.php';

  $result = calcpension($duration);

}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>IKA - Πληροφορίες για Συνταξιούχους - Υπολογισμός Σύνταξης</title>
  <meta charset="utf-8">
  <style>
  .error {color: #FF0000;}
  </style>
  <link rel="stylesheet" href="../../styles/layout.css" type="text/css">
</head>

<body>
  <div class="wrapper row1">
    <header id="header" class="clear">
      <div id="hgroup">
        <h1>
          <a href="../../index.php">IKA</a>
        </h1>
        <h2>Ίδρυμα Κοινωνικών Ασφαλίσεων</h2>
      </div>
      <nav>
        <ul>
          <li>
            <a href="../πληροφορίες_για_συνταξιούχους.php">Συνταξιούχοι</a>
          </li>
          <li>
            <a href="../πληροφορίες_για_εργοδότες.php">Εργοδότες</a>
          </li>
          <li>
            <a href="../page_not_found.php">Εργαζόμενοι</a>
          </li>
          <li>
            <a href="../page_not_found.php">ΑΜΕΑ</a>
          </li>
          <li>|</li>
          <?php
          if(isset($_SESSION['login_user']))
          {
            $temp = $_SESSION['login_user'];
            ///header("Location: ../index.php");
            echo "<li><a href=\"../λογαριασμός.php\">$temp</a></li><li class=\"last\"><a href=\"../logout.php\">Αποσύνδεση</a></li>";
          }
          else
          {
            echo '<li class="last"><a href="../σύνδεση.php">Σύνδεση</a></li>';
          }
          ?>
        </ul>
      </nav>
    </header>
  </div>
  <!-- content -->
  <div class="wrapper row2">
    <div id="container" class="clear">
      <div class="title">
        <a class="title-link" href="../πληροφορίες_για_συνταξιούχους.php">Πληροφορίες για Συνταξιούχους</a> / Υπολογισμός Σύνταξης</div>
      <!-- content body -->
      <div id="homepage">
        <div class="container_form">
          <form method="post" action="">
            <table>
              <tr>
              Για έναν προσεγγιστικό υπολογισμό του ποσού σύνταξης που δικαιούσαι, συμπλήρωσε τα παρακάτω στοιχεία:
              </tr>
              <br>
              <br>
              <tr>
                <td align="right">Κατηγορία ασφαλισμένου:</td>
                <td align="left">
                  <select name="type">
                    <option disabled selected value>Επιλέξτε Κατηγορία</option>
                    <option value="1"<?php if (isset($type) && $type=="1") echo "selected=\"selected\"";?>>Πολιτικοί Υπάλληλοι Δημοσίου, Ν.Π.Δ.Δ., Ο.Τ.Α., Εκπαιδευτικοί Ιερείς</option>
                    <option value="2"<?php if (isset($type) && $type=="2") echo "selected=\"selected\"";?>>Μέλη Δ.Ε.Π. - Α.Ε.Ι. Πλήρους Απασχόλησης, Μέλη Ε.Ε.ΔΙ.Π. - Α.Ε.Ι.</option>
                    <option value="3"<?php if (isset($type) && $type=="3") echo "selected=\"selected\"";?>>Μέλη Ε.Π. - Τ.Ε.Ι. - Μέλη Ε.ΔΙ.Π</option>
                    <option value="4"<?php if (isset($type) && $type=="4") echo "selected=\"selected\"";?>>Γιατροί Ε.Σ.Υ. Νοσηλευτικών Ιδρυμάτων</option>
                    <option value="5"<?php if (isset($type) && $type=="5") echo "selected=\"selected\"";?>>Δικαστικοί Λειτουργοί</option>
                    <option value="6"<?php if (isset($type) && $type=="6") echo "selected=\"selected\"";?>>Διπλωμάτες</option>
                    <option value="7"<?php if (isset($type) && $type=="7") echo "selected=\"selected\"";?>>Κ.Ε.Π.Ε.</option>
                  </select>
                  <span class="error">* <?php echo $typeErr;?></span>
                </td>
              </tr>
              <tr>
                <td align="right">Χρόνια Απασχόλησης:</td>
                <td align="left">
                  <input type="text" name="duration" value="<?php echo $duration;?>"/>
                  <span class="error">* <?php echo $durationErr;?></span>
                </td>
              </tr>
              <tr>
                <td align="left"></td>
                <td align="right">
                  <br>
                  <input type="submit" name="submit" value="Υπολογισμός">
                </td>
              </tr>
              <tr>
              <td align="right"></td>
                <td align="left">
                <span style="background-color: #FFFF00"><?php echo $result; ?></span>
                </td>
              </tr>
              <tr>
                <td align="left">
                  <span class="error">* Υποχρεωτικά πεδία</span>
                </td>
              </tr>
            </table>
          </form>
          <br>
          <br>
          <p>
            Έχεις κάποιο πρόβλημα ή απορία; Δες τις
            <a class="text-link" href="page_not_found.php">Συχνές Ερωτήσεις</a> ή
            <a class="text-link" href="page_not_found.php">Επικοινώνησε</a> μαζί μας.
          </p>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <div class="wrapper row3">
      <footer id="footer" class="clear">
        <p class="fl_right">
          <a href="../../../index.php">Αρχική</a> |
          <a href="../page_not_found.php">Πλοήγηση</a> |
          <a href="../page_not_found.php">Όροι Χρήσης</a>
        </p>
      </footer>
    </div>
</body>

</html>
