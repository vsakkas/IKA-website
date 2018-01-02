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
include 'search_into_db.php';
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
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    @page{
        margin: 12px;
        border: 0;
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
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
                                Ίδρυμα<br>
                                Κοινωνικών<br>
                                Ασφαλίσεων
                            </td>
                            
                            <td>
                            <b>Βεβαίωση Εργoδότη </b>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
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
                <b> <?php echo $name; ?> </b>
                </td
            </tr>
            
            <tr class="item">
                <td>
                    Επίθετο:
                </td>
            
                <td>
                <b> <?php echo $surname; ?> </b>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    ΑΜΚΑ:
                </td>
                
                <td>
                <b> <?php echo $amka; ?> </b>
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Αριθμός Ταυτότητας:
                </td>
                
                <td>
                <b> <?php echo $id_number; ?> </b>
                </td>
            </tr>
            <tr class="heading">
                    <td>
                       <center><b>Εργαζόμενοι:</b></center>
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
    <center><button onclick="myFunction()" >Εκτύπωση της Σελίδας</button></center>
    <form method="post" action="">
    <center><input type="submit" name="submit" value="Επιστροφή"></center>
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