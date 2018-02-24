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
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>IKA - Αρχική</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styles/layout.css" type="text/css">
</head>

<body>
  <div class="wrapper row1">
    <header id="header" class="clear">
      <div id="hgroup">
        <h1>
          <a href="index.php">IKA</a>
        </h1>
        <h2>Ίδρυμα Κοινωνικών Ασφαλίσεων</h2>
      </div>
      <nav>
        <ul>
          <li>
            <a href="index/πληροφορίες_για_συνταξιούχους.php">Συνταξιούχοι</a>
          </li>
          <li>
            <a href="index/πληροφορίες_για_εργοδότες.php">Εργοδότες</a>
          </li>
          <li>
            <a href="index/page_not_found.php">Εργαζόμενοι</a>
          </li>
          <li>
            <a href="index/page_not_found.php">ΑΜΕΑ</a>
          </li>
          <li>|</li>
          <?php
          if(isset($_SESSION['login_user']))
          {
            $temp = $_SESSION['login_user'];
            ///header("Location: ../index.php");
            echo "<li><a href=\"index/λογαριασμός.php\">$temp</a></li><li class=\"last\"><a href=\"php/logout.php\">Αποσύνδεση</a></li>";
          }
          else
          {
            echo '<li class="last"><a href="index/σύνδεση.php">Σύνδεση</a></li>';
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
        <!-- One Quarter -->
        <section id="latest" class="clear">
          <article class="two_quarter">
            <div class="container_image">
              <img src="images/main_01.png" width="520" height="315" alt="">
              <div class="top-right">
                <a href="index/πληροφορίες_για_συνταξιούχους.php">Πληροφορίες για Συνταξιούχους</a>
              </div>
            </div>
          </article>
          <article class="two_quarter lastbox">
            <div class="container_image">
              <img src="images/main_02.png" width="520" height="315" alt="">
              <div class="top-right">
                <a href="index/πληροφορίες_για_εργοδότες.php">Πληροφορίες για Εργοδότες</a>
              </div>
            </div>
          </article>
          <article class="two_quarter">
            <div class="container_image">
              <img src="images/main_03.png" width="520" height="315" alt="">
              <div class="top-right">
                <a href="index/page_not_found.php">Πληροφορίες για Εργαζομένους</a>
              </div>
            </div>
          </article>
          <article class="two_quarter lastbox">
            <div class="container_image">
              <img src="images/main_04.png" width="520" height="315" alt="">
              <div class="top-right">
                <a href="index/page_not_found.php">Πληροφορίες για ΑΜΕΑ</a>
              </div>
            </div>
          </article>
        </section>
        <p>
          Έχεις κάποιο πρόβλημα ή απορία; Δες τις
          <a class="text-link" href="index/page_not_found.php">Συχνές Ερωτήσεις</a> ή
          <a class="text-link" href="index/page_not_found.php">Επικοινώνησε</a> μαζί μας.
        </p>
      </div>
      <!-- / content body -->
    </div>
  </div>
  <!-- Footer -->
  <div class="wrapper row3">
    <footer id="footer" class="clear">
      <p class="fl_right">
        <a href="index.php">Αρχική</a> |
        <a href="index/page_not_found.php">Πλοήγηση</a> |
        <a href="index/page_not_found.php">Όροι Χρήσης</a>
      </p>
    </footer>
  </div>
</body>

</html>
