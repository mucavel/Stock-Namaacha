<?php
if(!$_SESSION['validado']){
    header('Location: validation.php');
    exit();
}
?>