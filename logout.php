<?php
   session_start();
   unset($_SESSION["supervisor"]);
   
   header('Location: index.php');
?>