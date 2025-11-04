Here’s a **simple PHP login and registration system** you can use as the starting point for a **Bus Ticket Reservation System**.
It uses **PHP + MySQL** and has two files:

* `register.php` (for signup)
* `login.php` (for login)
  plus a small **database setup**.

---

### 🧩 1. Database setup (MySQL)

Run this in your phpMyAdmin or MySQL console:

```sql
CREATE DATABASE bus_ticket;

USE bus_ticket;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);
```

---

### 📝 2. `config.php` – database connection

```php
<?php
$servername = "localhost";
$username = "root";
$password = ""; // your MySQL password
$dbname = "bus_ticket";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

---

### 🧾 3. `register.php`

```php
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
<h2>Register</h2>
<form method="POST" action="">
  Name: <input type="text" name="name" required><br><br>
  Email: <input type="email" name="email" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <button type="submit">Register</button>
</form>
</body>
</html>
```

---

### 🔐 4. `login.php`

```php
<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<form method="POST" action="">
  Email: <input type="email" name="email" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="register.php">Register</a></p>
</body>
</html>
```

---

### 🧭 5. `dashboard.php` (optional)

```php
<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Welcome, <?php echo $_SESSION["user_name"]; ?>!</h2>
<p>This is your Bus Ticket Reservation dashboard.</p>
<a href="logout.php">Logout</a>
</body>
</html>
```

---

### 🚪 6. `logout.php`

```php
<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>
```

---

Would you like me to add a **bus ticket booking page** next (with seat selection and reservation form) that works with this login system?
