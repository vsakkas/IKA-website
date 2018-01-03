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
$usernameErr = $nameErr = $surnameErr = $passwordErr = $amkaErr = $id_numberErr = $typeErr = $submitErr = "";
$username = $name = $surname = $password = $amka = $id_number = $type = "";
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
    $usernameErr = "Απαιτείται η συμπλήρωση ονόματος χρήστη!";
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
    $submitErr = "Λάθος όνομα χρήστη ή κωδικός. Παρακαλώ, δοκιμάστε πάλι.";
  }
  else
  {
    $_SESSION['login_user'] = $username;
    $_SESSION['login_password'] = $password;
    $type = get_type($username, $password);
    if($type == 2)
      header("Location: ../βεβαίωση_εργοδότη.php");
    else
      $submitErr = "Δεν είσαι εγγεγραμένος ως εργοδότης!";
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
  <title>IKA - Πληροφορίες για Εργοδότες - Ασφάλιση Εργαζομένου</title>
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
        <a class="title-link" href="../πληροφορίες_για_εργοδότες.php">Πληροφορίες για Εργοδότες</a> / Εμφάνιση Στοιχείων Εργαζομένων</div>
      <!-- content body -->
      <div id="homepage">
        <div class="container_form">
          <form method="post" action="">
            <table>
            <tr>Για να κάνεις λάβεις την επιβεβαίωση, απλά κάνε σύνδεση εδώ στον Ατομικό Λογαριασμό Ασφάλισής σου.</tr>
            <p>Δεν έχεις Ατομικό Λογαριασμό Ασφάλισης; Μπορείς να κάνεις
            <a class="text-link" href="../εγγραφή.php">Εγγραφή</a> τώρα.</p>
            <br>
              <td align="top" style="float:left;">
                <b>Στοιχεία Εργοδότη:</b>
                <table>
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
          <td align="left">
                  <br>
                  <span class="error">* Υποχρεωτικά πεδία</span>
                </td>
              </tr>
                </table>
              </td>
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
                </table>
              </td>
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
