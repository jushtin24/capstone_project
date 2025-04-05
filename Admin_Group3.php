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
    <title>Admin Page</title>
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
        .admin-container {
            width: 90%;
            max-width: 1300px; 
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
            position: relative; 
        }
        .admin-description {
            font-size: 18px;
            line-height: 1.8;
            max-width: 60%;
        }
        .admin-images {
            position: absolute;
            top: 20px; 
            right: 20px; 
            display: flex;
            gap: 20px; 
        }
        .admin-images img {
            width: 250px; 
            height: 500px; 
            border-radius: 10px;
        }
        .admin-images img:nth-child(2) {
            position: relative;
            right: -20px; 
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
        .admin-title {
            display: flex;
            align-items: center;
        }
        .admin-title img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
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

    <div class="admin-container">
        <h2 class="admin-title">
            <img src="adminpic.ico" alt="Admin Icon">
            Admin Page
        </h2>
        
        <p class="admin-description">
            Each of the four committed members of our group has been given particular roles to perform in order to guarantee the project's success. Vann Luis Blancaflor is in charge of coding as the Front-End Programmer. Back-end developer Arme Lois Bugay is in charge of database integration and making sure the system runs efficiently in the background. The researcher and documentor, Lyan Daine Dichoso, is gathering all the necessary documentation. The UI/UX designer, Justin Vince Garcia, creates the overall visual aesthetics, user experience flow, and app layout.
        </p>
        <div class="admin-images">
            <img src="image1.png" alt="Image 1">
            <img src="image2.png" alt="Image 2">
        </div>
        <p class="admin-description">
            The system is a smart mobile and web application designed to help individuals to make informed decisions about their smart parenthood through accessible family planning education and health guidance tool management. It offers personal content, online consultation, appointment scheduling, and expert referrals. With SMS notifications, users receive timely alerts about upcoming reminders. The system aims to empower users to help individuals and couples to provide a reliable, user-friendly platform that can support them through health, education, and communication with health professionals.
        </p>
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