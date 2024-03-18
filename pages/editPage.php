<?php
if ($_SESSION['admin'] != 1) {
    header("location: index.php");
    exit;
}
?>