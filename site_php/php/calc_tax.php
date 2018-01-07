<?php
function calctax(&$ergosimo,&$tax,$payment)
{
    $ergosimo = round($payment * 1.333);
    $tax = round($ergosimo * 0.25);
}
?>