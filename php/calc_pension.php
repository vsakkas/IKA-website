<?php
function calcpension($years)
{
    $credits = $years * 12 * 3;
    if($credits >= 550)
    {
        $result = $credits * 0.7;
        return "Το προσεγγιστικό ποσό σύνταξης είναι <b>$result</b> ανά μήνα.";
    }
    else
    {
        $result = ceil((550 - $credits) / 36);
        return "Δεν διαθέτεις αρκετά χρόνια εργασίας. Απαιτούνται ακόμη <b>$result</b> χρόνια εργασίας.";
    }
}
?>