<?php
if(!$_SESSION['admin']){
    header('Location: index.php');
    exit();
}
?>