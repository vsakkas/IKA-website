<?php
   //ob_start();
   session_start();
?>
<?php
$temp = $_SESSION["previous_page"];
header( "refresh:5;url=$temp" );
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>IKA - Πληροφορίες για Εργοδότες - Ασφάλιση Εργαζομένου</title>
  <meta charset="utf-8">
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
            echo "<li><a href=\"../page_not_found.php\">$temp</a></li><li class=\"last\"><a href=\"../logout.php\">Αποσύνδεση</a></li>";
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
        <a class="title-link" href="../πληροφορίες_για_εργοδότες.php">Πληροφορίες για Εργοδότες</a> / Ασφάλιση Εργαζομένου</div>
      <!-- content body -->
      <div id="homepage">
        <div class="container_form">
          <br>
          <br>
          <span style="background-color: #FFFF00">Το αίτημα σου ολοκληρώθηκε με επιτυχία. Θα ανακατευθυνθείς σύντομα.</span>
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

<!--- radio button: (τυπος εγγραφης) οικιακο προσωπικο/οικοδομοτεχνικα εργα ->

