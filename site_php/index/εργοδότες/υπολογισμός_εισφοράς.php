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
$payment = $ergosimo = $tax = $type = "";
$result = "";
$paymentErr = $typeErr = "";
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

   if (empty($_POST["payment"]))
   {
     $paymentErr = "Απαιτείται η συμπλήρωση του ποσού!";
     $correct_input = false;
   }
   else
   {
     $payment = test_input($_POST["payment"]);
     if (!preg_match("/^[0-9]*$/",$payment))
     {
       $paymentErr = "Μόνο αριθμοί επιτρέπονται!";
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
  include '../calc_tax.php';

  $result = calctax($ergosimo,$tax,$payment);
  $result = "Η ονομαστική αξία του εργόσημου είναι: $ergosimo ευρώ και το ποσό της εισφοράς είναι $tax ευρώ.";

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
  <title>IKA - Πληροφορίες για Εργοδότες - Υπολογισμός Εισφοράς</title>
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
        <a class="title-link" href="../πληροφορίες_για_εργοδότες.php">Πληροφορίες για Εργοδότες</a> / Υπολογισμός Εισφοράς</div>
      <!-- content body -->
      <div id="homepage">
        <div class="container_form">
          <form method="post" action="">
            <table>
              <tr>Για έναν προσεγγιστικό υπολογισμό του ποσού εισφοράς, συμπλήρωσε παρακάτω τα στοιχεία του εργαζομένου: </tr>
              <br>
              <br>
              <tr>
                <td align="right">Κατηγορία ασφαλισμένου:</td>
                <td align="left">
                  <div class="clearBoth"></div>
                  <input type="radio" name="type" <?php if (isset($type) && $type=="1") echo "checked";?> value="1">Οικιακό Προσωπικό
                  <input type="radio" name="type" <?php if (isset($type) && $type=="2") echo "checked";?> value="2">Οικοδομοτεχνικά Έργα
                  <div class="clearBoth"></div>
                  <td align="right"></td>
                  <td>
                  <span class="error">* <?php echo $typeErr;?></span>
                  </td>
                </td>
              </tr>
              <tr>
                <td align="right">Καθαρό ποσό αμοιβής εργαζομένου:</td>
                <td align="left">
                  <input type="text" name="payment" value="<?php echo $payment;?>"/>
                  <span class="error">* <?php echo $paymentErr;?></span>
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
            <a class="text-link" href="../page_not_found.php">Συχνές Ερωτήσεις</a> ή
            <a class="text-link" href="../page_not_found.php">Επικοινώνησε</a> μαζί μας.
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
