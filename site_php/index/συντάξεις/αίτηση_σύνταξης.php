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
// define variables and set to empty values

$correct_input = true;
$usernameErr = $passwordErr = $submitErr = "";
$username = $password = "";
if(isset($_SESSION['login_user']))
{
  $_POST["username"] = $_SESSION['login_user'];
  $_POST["password"] = $_SESSION['login_password'];
  $username = test_input($_POST["username"]);
  $password = test_input($_POST["password"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["username"]))
  {
    $usernameErr = "Απαιτείται η συμπλήρωση του ονόματος χρήστη!";
    $correct_input = false;
  }
  else
  {
    $username = test_input($_POST["username"]);
  }

  if (empty($_POST["password"]))
  {
    $passwordErr = "Απαιτείται η συμπλήρωση κωδικού!";
    $correct_input = false;
  }
  else
  {
    $password = test_input($_POST["password"]);
  }

}
else
{
  $correct_input = false;
}

if($correct_input)
{
  include '../search_into_db.php';
  include '../insert_to_db.php';

  $result = signin($username,$password);

  if($result === false)
  {
    $submitErr = "Λάθος όνομα χρήστη ή κωδικός. Παρακαλώ, δοκιμάστε παλι.";
  }
  else
  {
    $_SESSION['login_user'] = $username;
    $_SESSION['login_password'] = $password;
    $result = add_pension($username,$password);
    if($result)
      header("Location: pension_success.php");
    else
    $submitErr = "Εμφανίστηκε κάποιο πρόβλημα κατά την επεξεργασία της αιτήσης σας. Επικοινωνήστε μαζί μας εάν ξανασυμβεί.";
    //header( "refresh:5;url=" );
  }
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
  <title>IKA - Πληροφορίες για Συνταξιούχους - Αίτηση Συνταξιοδότησης</title>
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
            echo "<li><a href=\"../επεξεργασία_λογαριασμού.php\">$temp</a></li><li class=\"last\"><a href=\"../logout.php\">Αποσύνδεση</a></li>";
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
        <a class="title-link" href="../πληροφορίες_για_συνταξιούχους.php">Πληροφορίες για Συνταξιούχους</a> / Αίτηση Συνταξιοδότησης</div>
      <!-- content body -->
      <!-- content body -->
      <div id="homepage">
        <div class="container_form">
          <form method="post" action="">
            <table>
            <tr>Για να κάνεις αίτηση σύνταξης, απλά κάνε σύνδεση εδώ στον Ατομικό Λογαριασμό Ασφάλισής σου.</tr>
            <p>Δεν έχεις Ατομικό Λογαριασμό Ασφάλισης; Μπορείς να κάνεις
            <a class="text-link" href="../εγγραφή.php">Εγγραφή</a> τώρα.</p>
            <br>
            <tr>
            <td align="right">Όνομα Χρήστη:</td>
            <td align="left">
              <input type="text" name="username" value="<?php echo $username;?>"/>
            </td>
            <td>
              <span class="error">* <?php echo $usernameErr;?></span>
            </td>
          </tr>
          <tr>
            <td align="right">Κωδικός:</td>
            <td align="left">
              <input type="password" name="password" value="<?php echo $password;?>"/>
            </td>
            <td>
              <span class="error">* <?php echo $passwordErr;?></span>
            </td>
          </tr>
              <tr>
                <td align="left"></td>
                <td align="right">
                  <br>
                  <input type="submit" name="submit" value="Υποβολή">
                </td>
                <td>
                  <span class="error"> <?php echo $submitErr;?></span>
                </td>
              </tr>
              <tr>
                <td align="left">
                  <span class="error">* Υποχρεωτικά πεδία</span>
                </td>
              </tr>
            </table>

          </form>
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
