<?php
   //ob_start();
   session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Page Not Found</title>
  <meta charset="utf-8">
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
            echo "<li><a href=\"page_not_found.php\">$temp</a></li><li class=\"last\"><a href=\"logout.php\">Αποσύνδεση</a></li>";
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
      <!-- content body -->
      <div id="homepage">
        <h1>Σφαλμα 404 - Δεν βρεθηκε η σελιδα!</h1>
        <p>Στα πλαίσια αυτής της άσκησης, δεν ζητήθηκε η κατασκευή αυτής της σελίδας. Διαβάζεις αυτό το μήνυμα επειδή πάτησες
          κάποιον σύνδεσμο που υπάρχει για να φαίνεται η μορφή του ιστοχώρου εάν είχαν υλοποιηθεί όλες οι υπηρεσίες που θα
          μπορούσε να παρέχει.</p>
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
        <a href="../index.php">Αρχική</a> |
        <a href="page_not_found.php">Πλοήγηση</a> |
        <a href="page_not_found.php">Όροι Χρήσης</a>
      </p>
    </footer>
  </div>
</body>

</html>
