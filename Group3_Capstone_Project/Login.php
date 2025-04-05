<?php
session_start();

$valid_username = 'Vann';
$valid_password = 'group3';

$message = "";

if (isset($_GET['error']) && $_GET['error'] == 'not_logged_in') {
    $message = "You are not properly logged in. Please log in.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['loggedin'] = true;
        header('Location: Admin_Group3.php');
        exit;
    } else {
        $message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: white;
        }

        .error-message {
            font-size: 28px; 
            font-weight: bold;
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container {
            display: flex;
            width: 80%;
            max-width: 1000px;
            height: 80vh;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .left-section {
            flex: 1;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .logo {
            width: 500px;
        }

        .right-section {
            flex: 1;
            background-color: #740C75;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .login-box {
            width: 100%;
            max-width: 300px;
        }

        .login-title {
            font-size: 22px;
            margin-bottom: 15px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
        }

        .login-button {
            width: 80%;
            padding: 10px;
            background-color: white;
            color: #740C75;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        .footer-links {
            margin-top: 15px;
            font-size: 12px;
            text-align: center;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>
<body>

    <?php if (!empty($message)): ?>
        <p class="error-message"><?php echo $message; ?></p>
    <?php endif; ?>

    <div class="login-container">
        <div class="left-section">
            <img src="logo2.png" alt="NextGen Logo" class="logo">
        </div>
        <div class="right-section">
            <div class="login-box">
                <h2 class="login-title">Login as Admin User</h2>
                <form method="POST" action="">
                    <div class="input-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="login-button">SIGN IN</button>
                </form>
                <div class="footer-links">
                    <a href="#">Terms of use</a> | <a href="#">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>