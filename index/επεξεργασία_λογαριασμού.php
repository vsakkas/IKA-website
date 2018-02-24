<?php
   //ob_start();
   session_start();
?>
<?php
// define variables and set to empty values
$correct_input = false;
$nameErr = $surnameErr = $emailErr = $passwordErr = $verify_passwordErr = $amkaErr = $id_numberErr = $typeErr = $submitErr = "";
$name = $surname = $email = $password = $verify_password = $amka = $id_number = $type = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $correct_input = true;
  if (empty($_POST["name"]))
  {
    $nameErr = "Απαιτείται η συμπλήρωση ονόματος!";
    $correct_input = false;
  }
  else
  {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[A-Za-zα-ωΑ-Ω ίϊΐόάέύϋΰήώΆΈΉΊΌΎΏ-]+$/u",$name))
    {
      $nameErr = "Μόνο γράμματα και το κενό διάστημα επιτρέπονται!";
      $correct_input = false;
    }
  }

  if (empty($_POST["surname"]))
  {
    $surnameErr = "Απαιτείται η συμπλήρωση του επιθέτου!";
    $correct_input = false;
  }
  else
  {
    $surname = test_input($_POST["surname"]);
    if (!preg_match("/^[A-Za-zα-ωΑ-Ω ίϊΐόάέύϋΰήώΆΈΉΊΌΎΏ-]+$/u",$surname))
    {
      $surnameErr = "Μόνο γράμματα και το κενό διάστημα επιτρέπονται!";
      $correct_input = false;
    }
  }

  if (empty($_POST["email"]))
  {
    $emailErr = "Απαιτείται η συμπλήρωση του E-Mail!";
    $correct_input = false;
  }
  else
  {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $correct_input = false;
      $emailErr = "Μη έγκυρη μορφή E-Mail!";
    }
  }

  if (empty($_POST["password"]))
  {
    $passwordErr = "Απαιτείται η συμπλήρωση του κωδικού!";
    $correct_input = false;
  }
  else
  {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["verify_password"]))
  {
    $verify_passwordErr = "Απαιτείται επιβεβαίωση κωδικού!";
    $correct_input = false;
  }
  else
  {
    $verify_password = test_input($_POST["verify_password"]);
    if($verify_password !== $password)
    {
      $verify_passwordErr = "Οι κωδικοί δεν ταιριάζουν!";
      $correct_input = false;
    }
  }

  if (empty($_POST["amka"]))
  {
    $amkaErr = "Απαιτείται η συμπλήρωση ΑΜΚΑ!";
    $correct_input = false;
  }
  else
  {
    $amka = test_input($_POST["amka"]);
    if (!preg_match("/^[0-9]*$/",$amka))
    {
      $amkaErr = "Μόνο αριθμοί επιτρέπονται!";
      $correct_input = false;
    }
  }

  if (empty($_POST["id_number"]))
  {
    $id_numberErr = "Απαιτείται η συμπλήρωση του Αριθμού Ταυτότητας!";
    $correct_input = false;
  }
  else
  {
    $id_number = test_input($_POST["id_number"]);
    if (!preg_match("/^[A-Za-zα-ωΑ-Ω0-9]*$/",$id_number))
    {
      $id_numberErr = "Μόνο γράμματα και αριθμοί επιτρέπονται!";
      $correct_input = false;
    }
  }

}
else
{
  include '../php/search_into_db.php';
  $email = $_SESSION['login_user'];
  $password = $_SESSION['login_password'];
  all_info($email,$password,$name,$surname,$amka,$id_number,$type);
  $_SESSION['type_user'] = $type;
  $verify_password = $password;
  $correct_input = false;
}

if($correct_input)
{
  include '../php/insert_to_db.php';

  $old_email = $_SESSION['login_user'];
  $type = $_SESSION['type_user'];
  $result = update($email,$password,$name,$surname,$amka,$type,$id_number,$old_email);

  if($result === true)
  {
    $_SESSION['login_user'] = $email;
    $_SESSION['login_password'] = $password;
    $_SESSION['type_user'] = NULL;
    $_SESSION['message_user'] = "Η αλλαγή των στοιχείων σου έγινε με επιτυχία. Θα ανακατευθυνθείς σύντομα.";
    header("Location: generic_success.php");
  }
  else
  {
    $submitErr = "Sign up error";
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
  <title>IKA - Επεξεργασία Στοιχείων Λογαριασμού</title>
  <meta charset="utf-8">
  <style>
  .error {color: #FF0000;}
  </style>
  <link rel="stylesheet" href="../styles/layout.css" type="text/css">
</head>

<body>
  <div class="wrapper row1">
    <header id="header" class="clear">
      <div id="hgroup">
        <h1>
          <a href="../index.php">IKA</a>
        </h1>
        <h2>Ίδρυμα Κοινωνικών Ασφαλίσεων</h2>
      </div>
      <nav>
        <ul>
          <li>
            <a href="πληροφορίες_για_συνταξιούχους.php">Συνταξιούχοι</a>
          </li>
          <li>
            <a href="πληροφορίες_για_εργοδότες.php">Εργοδότες</a>
          </li>
          <li>
            <a href="page_not_found.php">Εργαζόμενοι</a>
          </li>
          <li>
            <a href="page_not_found.php">ΑΜΕΑ</a>
          </li>
          <li>|</li>
          <?php
          if(isset($_SESSION['login_user']))
          {
            $temp = $_SESSION['login_user'];
            ///header("Location: ../index.php");
            echo "<li><a href=\"λογαριασμός.php\">$temp</a></li><li class=\"last\"><a href=\"../php/logout.php\">Αποσύνδεση</a></li>";
          }
          else
          {
            echo '<li class="last"><a href="σύνδεση.php">Σύνδεση</a></li>';
          }
          ?>
        </ul>
      </nav>
    </header>
  </div>
  <!-- content -->
  <div class="wrapper row2">
    <div id="container" class="clear">
      <div class="title">Επεξεργασία Στοιχείων Λογαριασμού</div>
      <!-- content body -->
      <div id="homepage">
        <div class="container_form">
          <form method="post" action="">
            <table>
              <tr>
                <td align="right">Όνομα:</td>
                <td align="left">
                  <input type="text" name="name" value="<?php echo $name;?>"/>
                  <span class="error">* <?php echo $nameErr;?></span>
                </td>
              </tr>
              <tr>
                <td align="right">Επώνυμο:</td>
                <td align="left">
                  <input type="text" name="surname" value="<?php echo $surname;?>"/>
                  <span class="error">* <?php echo $surnameErr;?></span>
                </td>
              </tr>
              <tr>
                <td align="right">E-Mail:</td>
                <td align="left">
                  <input type="text" name="email" value="<?php echo $email;?>"/>
                  <span class="error">* <?php echo $emailErr;?></span>
                </td>
              </tr>
              <tr>
                <td align="right">Κωδικός:</td>
                <td align="left">
                  <input type="text" name="password" value="<?php echo $password;?>"/>
                  <span class="error">* <?php echo $passwordErr;?></span>
                </td>
              </tr>
              <tr>
                <td align="right">Επιβεβαίωση Κωδικού:</td>
                <td align="left">
                  <input type="text" name="verify_password" value="<?php echo $verify_password;?>"/>
                  <span class="error">* <?php echo $verify_passwordErr;?></span>
                </td>
              </tr>
              <tr>
                <td align="right">ΑΜΚΑ:</td>
                <td align="left">
                  <input type="text" name="amka" value="<?php echo $amka;?>"/>
                  <span class="error">* <?php echo $amkaErr;?></span>
                </td>
              </tr>
              <tr>
                <td align="right">Αριθμός Ταυτότητας:</td>
                <td align="left">
                  <input type="text" name="id_number" value="<?php echo $id_number;?>"/>
                  <span class="error">* <?php echo $id_numberErr;?></span>
                </td>
              </tr>
              <tr>
                <td align="left"></td>
                <td align="right">
                  <br>
                  <input type="submit" name="submit" value="Ανανέωση Στοιχείων">
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
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <div class="wrapper row3">
    <footer id="footer" class="clear">
      <p class="fl_right">
        <a href="../index.php">Αρχική</a> |
        <a href="page_not_found.php">Πλοήγηση</a> |
        <a href="page_not_found.php">Όροι Χρήσης</a>
      </p>
    </footer>
  </div>
</body>

</html>
