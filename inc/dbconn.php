<?php
  try
  {
    $pdo = new PDO('mysql:host=localhost;dbname=dental', 'root','root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
  }
  catch (PDOException $e)
  {
    $o = "unable to connect to database. " . $e;
    return false;
  }
?>