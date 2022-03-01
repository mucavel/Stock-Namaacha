<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['validado']);
header("Location: index.php");
exit();
?>