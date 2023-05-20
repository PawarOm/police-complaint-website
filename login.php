<?php
include 'conn.php';
session_start();
$message = "";
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = mysqli_query($con, "select * from admin where user_name='" . $username . "'AND user_password='" . $password . "' limit 1");
  $row  = mysqli_fetch_array($result);
  if (is_array($row)) {
    $_SESSION["username"] = $row['user_name'];
    $_SESSION["password"] = $row['user_password'];
  } else {
    $message = "Invalid Username or Password!";
    echo $message;
  }
}
if (isset($_SESSION["username"])) {
  header("Location:admin.php");
}
?>