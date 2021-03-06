<?php
   //ob_start();
   session_start();
?>
  <?php
// define variables and set to empty values
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $temp = $_SESSION["previous_page"];
    header( "Location: $temp" );
}
$correct_input = false;
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

$employees_details = all_employees($amka);
?>
    <!doctype html>
    <html>
    <head>
      <meta charset="utf-8">
      <title>Βεβαίωση ΙΚΑ</title>
      <link rel="stylesheet" href="../styles/invoice.css" type="text/css">
    </head>
    <body>
      <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
          <tr class="top">
            <td colspan="2">
              <table>
                <tr>
                  <td class="title">
                    IKA
                  </td>
                  <td>
                    <?php
                      echo "Ημερομηνία : "  . date("Y-m-d h:i");
                      ?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr class="information">
            <td colspan="2">
              <table>
                <tr>
                  <td>
                    Ίδρυμα
                    <br> Κοινωνικών
                    <br> Ασφαλίσεων
                  </td>
                  <td>
                    <b>Βεβαίωση Εργoδότη </b>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr class="dark-heading">
            <td>
              Στοιχεία Εργοδότη:
            </td>
            <td>
            </td>
          </tr>
          <tr class="item">
            <td>
              Όνομα:
            </td>
            <td>
              <b>
                <?php echo $name; ?> </b>
            </td </tr>
            <tr class="item">
              <td>
                Επίθετο:
              </td>
              <td>
                <b>
                  <?php echo $surname; ?> </b>
              </td>
            </tr>
            <tr class="item">
              <td>
                ΑΜΚΑ:
              </td>
              <td>
                <b>
                  <?php echo $amka; ?> </b>
              </td>
            </tr>
            <tr class="item last">
              <td>
                Αριθμός Ταυτότητας:
              </td>
              <td>
                <b>
                  <?php echo $id_number; ?> </b>
              </td>
            </tr>
            <tr class="dark-heading">
              <td>
                <b>Εργαζόμενοι:</b>
              </td>
              <td>
              </td>
            </tr>
            <tr class="heading">
            </tr>
            <?php
            foreach($employees_details as $employee) {
                echo
                '<tr class="heading">
                    <td>
                        Στοιχεία Εργαζομένου:
                    </td>
                    <td>
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        Όνομα:
                    </td>
                    <td>
                    <b> '; echo $employee["name"]; echo '</b>
                    </td
                </tr>
                <tr class="item">
                    <td>
                        Επίθετο:
                    </td>

                    <td>
                    <b> ';echo $employee["surname"]; echo '</b>
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        ΑΜΚΑ:
                    </td>
                    <td>
                    <b> ';echo $employee["amka"]; echo'</b>
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        Αριθμός Ταυτότητας:
                    </td>
                    <td>
                    <b>'; echo $employee["id_number"]; echo'</b>
                    </td>
                </tr>
                <tr class="item last">
                <td>
                    Κατηγορία εργαζομένου:
                </td>
                <td>
                <b>'; if($employee["category"] == 1)
                        echo "Οικιακό Προσωπικό";
                      else
                        echo "Οικοδομοτεχνικά Έργα";
                echo"</b>
                </td>
                </tr>";
            }
            ?>
        </table>
      </div>
      <div id="hidden_div" align="center" style="display:inline;">
        <br>
        <center>
          <button class="button" onclick="myFunction()">Εκτύπωση της Σελίδας</button>
        </center>
        <br>
        <form method="post" action="">
          <center>
            <input type="submit" name="submit" value="Επιστροφή">
          </center>
        </form>
      </div>
    </body>
    </html>
    <script>
      function myFunction() {
        document.getElementById("hidden_div").style.display = 'none';
        window.print();
        document.getElementById("hidden_div").style.display = 'inline';
      }
    </script>
