<?php
session_start();

if ($_SESSION['authlevel'] > 1) {
    header("location: index.php");
    exit;
}
?>