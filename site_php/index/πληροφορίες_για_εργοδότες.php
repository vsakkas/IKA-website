<?php
   //ob_start();
   session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>IKA - Πληροφορίες για Εργοδότες</title>
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
      <div class="title">Πληροφορίες για Εργοδότες</div>
      <!-- content body -->
      <div id="homepage">
        <!-- One Quarter -->
        <section id="latest" class="clear">
          <article class="two_quarter">
            <div class="container_image">
              <img src="../images/520x215_εγγραφή_ως_εργοδότης.png" width="520" height="215" alt="">
              <div class="top-right">
                <a href="page_not_found.php">Εγγραφή ως Εργοδότης</a>
              </div>
            </div>
          </article>
          <article class="two_quarter lastbox">
            <div class="container_image">
              <img src="../images/520x215_ασφάλιση_εργαζομένου.png" width="520" height="215" alt="">
              <div class="top-right">
                <a href="εργοδότες/ασφάλιση_εργαζομένου.php">Ασφάλιση Εργαζομένου</a>
              </div>
            </div>
          </article>
          <article class="two_quarter">
            <div class="container_image">
              <img src="../images/520x215_ανανέωση_στοιχείων_εργαζομένου.png" width="520" height="215" alt="">
              <div class="top-right">
                <a href="page_not_found.php">Ανανέωση Στοιχείων Εργαζομένου</a>
              </div>
            </div>
          </article>
          <article class="two_quarter lastbox">
            <div class="container_image">
              <img src="../images/520x215_υπολογισμός.png" width="520" height="215" alt="">
              <div class="top-right">
                <a href="εργοδότες/υπολογισμός_εισφοράς.php">Υπολογισμός Εισφοράς</a>
              </div>
            </div>
          </article>
        </section>
        <p>
          Έχεις κάποιο πρόβλημα ή απορία; Δες τις
          <a class="text-link" href="page_not_found.php">Συχνές Ερωτήσεις</a> ή
          <a class="text-link" href="page_not_found.php">Επικοινώνησε</a> μαζί μας.
        </p>
        <br>
        <br>
        <br>
      </div>
      <!-- / content body -->
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
