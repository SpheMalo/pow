<?php
  session_start();
  unset($_SESSION['emp']);
  header("Location: ../");
?>