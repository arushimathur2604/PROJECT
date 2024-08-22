<?php
// online_lab_exam/login_admin.php
session_start();
include 'config.php';
//include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND role='admin'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header("Location: admin_dashboard.php");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: 'Bahnschrift Condensed', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: green;
            font-size: 80px;
        }
        hr {
            border: 0;
            height: 1px;
            background: green;
            width: 50%;
        }
        marquee {
            font-size: 20px;
        }
        fieldset {
            margin: 0 auto;
            width: 300px;
            border: 2px solid green;
            padding: 20px;
            background-color: #fff;
        }
        legend {
            font-size: 24px;
            color: green;
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: darkgreen;
        }
        a {
            color: green;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 14px;
            color: green;
        }
        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <hr>
        <marquee direction="right" behavior="alternate">" Manage the portal effectively "</marquee>
        <hr>
    </div>
    <fieldset>
        <legend>Admin Login Page</legend>
        <form method="post">
            Username:<br><input type="text" name="username" placeholder="Enter Username" required><br><br>
            Password:<br><input type="password" name="password" placeholder="Enter Password" required><br><br>
            <input type="submit" value="Login"><br><br>
            <a href="register_admin.php">Not registered? Register here</a><br><br>
        </form>
    </fieldset>
   
</body>
</html>
