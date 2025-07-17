<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed);
        $stmt->fetch();
        if (password_verify($password, $hashed)) {
            $_SESSION['user_id'] = $id;
            header("Location: home.php");
            exit();
        } else {
            echo "<div style='text-align:center; color:red;'>Wrong password.</div>";
        }
    } else {
        echo "<div style='text-align:center; color:red;'>No user found.</div>";
    }
}
?>
<style>
  body {
    font-family: Arial, sans-serif;
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
  button {
    background-color: #03A9F4;
    border: none;
    cursor: pointer;
  }
  button:hover {
    background-color: #0288D1;
  }
</style>
<div class="nav-links">
  <a href="register.php">Register</a>
</div>
<div style="text-align:center; margin-top:50px;">
  <h2 style="color:#2196F3;">🌌 Welcome Back, Space Traveller</h2>
  <form method="POST" style="display:inline-block; text-align:left; padding:20px; background:#f0f0f0; border-radius:10px;">
    <label>Email:</label><br><input type="email" name="email" required><br><br>
    <label>Password:</label><br><input type="password" name="password" required><br><br>
    <button type="submit" style="background:#2196F3; color:white; padding:10px 20px;">Login</button>
  </form>
</div>
