<?php

if (@$run_if_included) {
    require_once("visitors_analytics.php");
// flush the buffer
    ob_end_flush();
}
?>