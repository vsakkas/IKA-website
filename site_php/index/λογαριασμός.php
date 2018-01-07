<?php
   //ob_start();
   session_start();
?>
<?php
// define variables and set to empty values
$correct_input = false;
$nameErr = $surnameErr = $emailErr = $passwordErr = $verify_passwordErr = $amkaErr = $id_numberErr = $typeErr = $submitErr = "";
$name = $surname = $email = $password = $verify_password = $amka = $id_number = $type = "";
include '../php/search_into_db.php';
$email = $_SESSION['login_user'];
$password = $_SESSION['login_password'];
all_info($email,$password,$name,$surname,$amka,$id_number,$type);
if($type == "1")
  $type = "Συνταξιούχος";
else if($type == "2")
  $type = "Εργοδότης";
else if($type == "3")
  $type = "Εργαζόμενος";
else if($type == "4")
  $type = "ΑΜΕΑ";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  header("Location: επεξεργασία_λογαριασμού.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>IKA - Λογαριασμός</title>
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
      <div class="title">Λογαριασμός</div>
      <!-- content body -->
      <div id="homepage">
        <div class="container_form">
          <form method="post" action="">
            <table>
              <tr>
                <td align="right">Όνομα:</td>
                <td align="left">
                  <input type="text" name="name" value="<?php echo $name;?>" readonly />
                </td>
              </tr>
              <tr>
                <td align="right">Επώνυμο:</td>
                <td align="left">
                  <input type="text" name="surname" value="<?php echo $surname;?>" readonly />
                </td>
              </tr>
              <tr>
                <td align="right">E-Mail:</td>
                <td align="left">
                  <input type="text" name="email" value="<?php echo $email;?>" readonly />
                </td>
              </tr>
              <tr>
                <td align="right">ΑΜΚΑ:</td>
                <td align="left">
                  <input type="text" name="amka" value="<?php echo $amka;?>" readonly />
                </td>
              </tr>
              <tr>
                <td align="right">Αριθμός Ταυτότητας:</td>
                <td align="left">
                  <input type="text" name="id_number" value="<?php echo $id_number;?>" readonly />
                </td>
              </tr>
              <tr>
                <td align="right">Ιδιότητα:</td>
                <td align="left">
                  <input type="text" name="type" value="<?php echo $type;?>" readonly />
                </td>
              </tr>
              <tr>
                <td align="left"></td>
                <td align="right">
                  <br>
                  <form action="επεξεργασία_λογαριασμού.php"><input type="submit" value="Επεξεργασία"></form>
                </td>
                <td>
                  <span class="error"> <?php echo $submitErr;?></span>
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
