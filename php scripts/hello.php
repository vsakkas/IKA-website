<html>
<head><title> PHP says hello</title></head>
<body>
    <b>
        <?php
        print "Hello, World!";
        ?>
    </b>
</body>
<?php
    $i = 1;
    print '<select name = "people">';
    while ($i <= 10)
    {
        print "<option>$i</option>\n";
        $i++;
    }
    print '</select>';
?> 
</html>