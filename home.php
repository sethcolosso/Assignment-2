<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<style>
  body {
    background: linear-gradient(to right, #1e3c72, #2a5298);
    font-family: Arial, sans-serif;
    color: white;
    text-align: center;
    margin-top: 40px;
  }
  .box {
    background: rgba(255, 255, 255, 0.1);
    padding: 25px;
    border-radius: 10px;
    display: inline-block;
    color: white;
  }
  .nav-links {
    margin-bottom: 20px;
  }
  .nav-links a {
    color: white;
    background-color: #4CAF50;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
    margin: 0 10px;
  }
  .nav-links a:hover {
    background-color: #388E3C;
  }
  input, button {
    padding: 8px;
    margin: 5px 0;
    width: 100%;
  }
  button {
    background-color: #03A9F4;
    color: white;
    border: none;
    cursor: pointer;
  }
  button:hover {
    background-color: #0288D1;
  }
</style>
<div class="nav-links">
  <a href="login.php">Login</a>
  <a href="Register.php">Register</a>
</div>
<div style="text-align:center; margin-top:50px;">
  <h1 style="color:#9C27B0;"> Welcome to the Future Interspace Travel Portal</h1>
  <p style="font-size:18px;">You are now connected to the future. Thank you for boarding with us!</p>
   <p style="font-size:18px;">Journey to the stars and frontier of Space</p>
    <p style="font-size:18px;">Journey to the interstellar and frontier of Space</p>
  <a href="logout.php" style="color:#fff; background:#f44336; padding:10px 20px; text-decoration:none; border-radius:5px;">Logout</a>
</div>

