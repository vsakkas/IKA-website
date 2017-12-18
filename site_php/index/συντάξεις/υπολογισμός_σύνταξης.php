<?php
   //ob_start();
   session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>IKA - Πληροφορίες για Συνταξιούχους - Υπολογισμός Σύνταξης</title>
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
        <a class="title-link" href="../πληροφορίες_για_συνταξιούχους.php">Πληροφορίες για Συνταξιούχους</a> / Υπολογισμός Σύνταξης</div>
      <!-- content body -->
      <div id="homepage">
        <div class="container_form">
          <form method="post" action="">
            <table>
              <tr>
                <td align="right">Κατηγορία ασφαλισμένου:</td>
                <td align="left">
                  <select type="text">
                    <option value="0">Πολιτικοί Υπάλληλοι Δημοσίου, Ν.Π.Δ.Δ., Ο.Τ.Α., Εκπαιδευτικοί Ιερείς</option>
                    <option value="1">Μέλη Δ.Ε.Π. - Α.Ε.Ι. Πλήρους Απασχόλησης, Μέλη Ε.Ε.ΔΙ.Π. - Α.Ε.Ι.</option>
                    <option value="2">Μέλη Ε.Π. - Τ.Ε.Ι. - Μέλη Ε.ΔΙ.Π</option>
                    <option value="3">Γιατροί Ε.Σ.Υ. Νοσηλευτικών Ιδρυμάτων</option>
                    <option value="4">Δικαστικοί Λειτουργοί</option>
                    <option value="5">Διπλωμάτες</option>
                    <option value="6">Κ.Ε.Π.Ε.</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td align="right">Χρόνια Απασχόλησης:</td>
                <td align="left">
                  <input type="text" name="first" />
                </td>
              </tr>
              <tr>
                <td align="left">Ημερομηνία Συνταξιοδότησης:</td>
                <td align="left">
                  <br>
                  <input id="date" type="date">
                </td>
              </tr>
              <tr>
                <td align="left"></td>
                <td align="right">
                  <br>
                  <input type="submit" name="submit" value="Υπολογισμός">
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
