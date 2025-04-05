<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: Login.php?error=not_logged_in");
    exit;
}
?>
<script>
    window.onload = function () {
        if (performance.navigation.type === 2) {
            location.reload();
        }
    };
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Description</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar img {
            height: 50px;
        }
        .navbar h1 {
            font-size: 22px;
            color: #740C75;
            margin-left: 15px;
            flex-grow: 1;
        }
        .nav-buttons {
            display: flex;
            gap: 15px;
        }
        .nav-buttons a {
            text-decoration: none;
            font-size: 18px;
            padding: 10px 15px;
            border-radius: 5px;
            border: 2px solid #740C75;
            transition: background 0.3s;
            cursor: pointer;
        }
        .nav-buttons a:not(.logout-btn) {
            color: #740C75;
        }
        .nav-buttons a.logout-btn {
            color: red;
            border-color: red;
        }
        .nav-buttons a:hover {
            background-color: #ddd;
        }
        .content-container {
            width: 90%;
            max-width: 1100px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
        }
        .section-title {
            font-size: 22px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .section-title img {
            width: 25px;
        }
        .description-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }
        .description-text {
            width: 60%;
            font-size: 18px;
            line-height: 1.6;
        }
        .image-top-right {
            width: 35%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .bottom-images {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .bottom-images img {
            width: 50%;
            max-width: 350px;
            max-height: 400px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .modal-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }
        .modal-buttons button {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        .confirm-btn {
            background-color: red;
            color: white;
        }
        .cancel-btn {
            background-color: gray;
            color: white;
        }
        .section-title img {
            width: 40px;
            height: 40px;
        }
    </style>
    <script>
        function openLogoutModal() {
            document.getElementById("logoutModal").style.display = "block";
        }

        function closeLogoutModal() {
            document.getElementById("logoutModal").style.display = "none";
        }

        function confirmLogout() {
            window.location.href = "Logout.php";
        }
    </script>
</head>
<body>
    <div class="navbar">
        <img src="logo1.png" alt="NextGen Logo">
        <h1>NextGen: Smart Parenthood Planner with SMS Notification</h1>
        <div class="nav-buttons">
            <a href="Admin_Group3.php">Admin Page</a>
            <a href="Project_Description.php">Project Description</a>
            <a href="Members_Group3.php">Members</a>
            <a href="#" class="logout-btn" onclick="openLogoutModal()">Logout</a>
        </div>
    </div>

    <div class="content-container">
    <div class="section-title">
    <img src="project.png" alt="Project Icon">
    <span>Project Description</span>
</div>

        <div class="description-content">
            <div class="description-text">
                <p>
                    NextGen: Smart Parenthood Planner with SMS Notification addresses the lack of accessible and personalized reproductive health tools in the digital space. The application provides essential information and services to individuals who either want to conceive or avoid pregnancy. The system offers tailored content, expert referrals, and automated SMS reminders for pill intake, appointments, and other family planning activities.
                </p>
                <p>
                    The proposed users are individuals of reproductive age, healthcare professionals, and government health partners. General features include forums, scheduling systems, doctor searches, and a mobile/web-based platform that bridges communication gaps in reproductive healthcare.
                </p>
            </div>
            <img src="top.png" alt="Illustration" class="image-top-right">
        </div>

        <div class="bottom-images">
            <img src="bottom.png" alt="Illustration">
            <img src="bottom-right.png" alt="Illustration">
        </div>
    </div>

    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to logout?</p>
            <div class="modal-buttons">
                <button class="confirm-btn" onclick="confirmLogout()">Logout</button>
                <button class="cancel-btn" onclick="closeLogoutModal()">Cancel</button>
            </div>
        </div>
    </div>
</body>
</html>