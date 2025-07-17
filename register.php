<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $phone, $password);

    if ($stmt->execute()) {
        echo "<div style='text-align:center; color:green;'>Registration successful! <a href='login.php'>Login here</a></div>";
    } else {
        echo "<div style='text-align:center; color:red;'>Error: " . $stmt->error . "</div>";
    }
}
?>
<style>
  body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin-top: 40px;
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

</style>
<div class="nav-links">
  <a href="login.php">Login</a>
</div>
<div style="text-align:center; margin-top:50px;">
  <h2 style="color:#4CAF50;">🚀 Join the Future Interspace Travel!</h2>
  <form method="POST" style="display:inline-block; text-align:left; padding:20px; background:#f0f0f0; border-radius:10px;">
    <label>Username:</label><br><input type="text" name="username" required><br><br>
    <label>Email:</label><br><input type="email" name="email" required><br><br>
    <label>Phone:</label><br><input type="text" name="phone" required><br><br>
    <label>Password:</label><br><input type="password" name="password" required><br><br>
    <button type="submit" style="background:#4CAF50; color:white; padding:10px 20px;">Register</button>
  </form>
</div>
