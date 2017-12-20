<?php
function calcpension($years)
{
    $credits = $years * 12 * 3;
    if($credits >= 550)
    {
        $result = $credits * 0.7;
        return "You can now be a pensioner with $result per month";
    }
    else
    {
        $result = ceil((550 - $credits) / 36);
        return "You don't have enough credits for a pension. You need $result years of work";
    }
}
?>