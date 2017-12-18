<?php
   //ob_start();
   session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>IKA - Εγγραφή</title>
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
          <li class="last">
            <a href="σύνδεση.php">Σύνδεση</a>
          </li>
        </ul>
      </nav>
    </header>
  </div>
  <!-- content -->
  <div class="wrapper row2">
    <div id="container" class="clear">
      <div class="title">Εγγραφή</div>
      <!-- content body -->
      <div id="homepage">
        <div class="container_form">
          <form method="post" action="">
            <table>
              <tr>
                <td align="right">Όνομα:</td>
                <td align="left">
                  <input type="text" name="first" />
                </td>
              </tr>
              <tr>
                <td align="right">Επώνυμο:</td>
                <td align="left">
                  <input type="text" name="first" />
                </td>
              </tr>
              <tr>
                <td align="right">E-Mail:</td>
                <td align="left">
                  <input type="text" name="first" />
                </td>
              </tr>
              <tr>
                <td align="right">Κωδικός:</td>
                <td align="left">
                  <input type="text" name="last" />
                </td>
              </tr>
              <tr>
                <td align="right">Επιβεβαίωση Κωδικού:</td>
                <td align="left">
                  <input type="text" name="first" />
                </td>
              </tr>
              <tr>
                <td align="right">ΑΜΚΑ:</td>
                <td align="left">
                  <input type="text" name="first" />
                </td>
              </tr>
              <tr>
                <td align="right">Αριθμός Ταυτότητας:</td>
                <td align="left">
                  <input type="text" name="first" />
                </td>
              </tr>
              <tr>
                  <td align="right">Κατηγορία:</td>
                <td align="left">
                  <select type="text">
                    <option value="0">Συνταξιούχος</option>
                    <option value="1">Εργοδότης</option>
                    <option value="2">Εργαζόμενος</option>
                    <option value="3">ΑΜΕΑ</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td align="left"></td>
                <td align="right">
                  <br>
                  <input type="submit" name="submit" value="Εγγραφή">
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
