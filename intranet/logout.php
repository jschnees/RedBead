<?
    session_start();
    session_unset();
    session_destroy();
    header("location:index.php");
    exit();
?>
<?php
    echo "<script> location.href='index.php'; </script>";
    exit;
?>