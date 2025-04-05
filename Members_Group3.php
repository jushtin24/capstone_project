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
    <title>Members</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header-left {
            display: flex;
            align-items: center;
        }
        .header-left img {
            height: 50px;
            margin-right: 15px;
        }
        .header-left h1 {
            font-size: 22px;
            color: #740C75;
            margin: 0;
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
        .members-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .member-card {
            background-color: white;
            width: 90%; 
            max-width: 800px; 
            margin: 20px auto; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden; 
        }
        .member-card img {
            width: 200px; 
            height: 200px; 
            border-radius: 10px;
            position: absolute; 
            top: 20px; 
            right: 20px; 
            object-fit: cover; 
            border: 2px solid #740C75; 
        }
        .member-card h2 {
            font-size: 24px; 
            color: #740C75;
            margin: 0;
            margin-top: 10px; 
        }
        .member-card p {
            font-size: 18px; 
            line-height: 1.6;
            margin: 10px 0;
            max-width: 70%; 
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
    </style>
</head>
<body>
    <header>
        <div class="header-left">
            <img src="logo1.png" alt="NextGen Logo">
            <h1>Members</h1>
        </div>
        <div class="nav-buttons">
            <a href="Admin_Group3.php">Admin Page</a>
            <a href="Project_Description.php">Project Description</a>
            <a href="Members_Group3.php">Members</a>
            <a href="#" class="logout-btn" onclick="openLogoutModal()">Logout</a>
        </div>
    </header>

    <div class="members-container">
        <div class="member-card">
            <img src="member1.jpg" alt="Vann Luis Z. Blancaflor">
            <h2>Vann Luis Z. Blancaflor</h2>
            <p><strong>Address:</strong> Pilar, Bataan</p>
            <p><strong>Other Information</strong> </p>
            <p><strong>Project Role:</strong> Front-End Programmer</p>
            <p>Responsible for programming the mobile and web applications. Ensures that users have a smooth, interactive, and visually appealing experience.</p>
        </div>

        <div class="member-card">
            <img src="member2.jpg" alt="Arme Lois S. Bugay">
            <h2>Arme Lois S. Bugay</h2>
            <p><strong>Address:</strong> Hermosa, Bataan</p>
            <p><strong>Other Information</strong> </p>
            <p><strong>Project Role:</strong> Back-End Programmer</p>
            <p>Handles the server-side logic, database integration, and application functionality. Ensures the system processes data securely and efficiently.</p>
        </div>

        <div class="member-card">
            <img src="member3.jpg" alt="Lyan Daine R. Dichoso">
            <h2>Lyan Daine R. Dichoso</h2>
            <p><strong>Address:</strong> Samal, Bataan</p>
            <p><strong>Other Information</strong> </p>
            <p><strong>Project Role:</strong> Documentation and Research Officer</p>
            <p>Prepares project documents, writes research content, and compiles necessary paperwork related to the system design and development.</p>
        </div>

        <div class="member-card">
            <img src="member4.png" alt="Justin Vince H. Garcia">
            <h2>Justin Vince H. Garcia</h2>
            <p><strong>Address:</strong> Balanga City, Bataan</p>
            <p><strong>Other Information</strong> </p>
            <p><strong>Project Role:</strong> Group Leader & UI/UX Designer</p>
            <p>Creating the overall layout and user interface of the system. Ensures that the visual design aligns accurately with the actual implementation in the code.</p>
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

        window.onclick = function(event) {
            const modal = document.getElementById("logoutModal");
            if (event.target === modal) {
                closeLogoutModal();
            }
        };
    </script>
</body>
</html>