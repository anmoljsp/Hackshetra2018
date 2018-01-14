<?php
  session_start();
  unset($_SESSION['Username']);
  include("redirect_to_index.php");
?>