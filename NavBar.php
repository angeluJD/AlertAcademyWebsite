<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Menu | Side Navigation Bar</title>
    <!-- CSS -->
    <link rel="stylesheet" href="AlertAcademySideMenuCSS.css" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
<?php
// You can put your PHP code here if you need to include dynamic content or logic
?>
<nav>
    <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Alert Academy</span>
    </div>
    <div class="sidebar">
        <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="logo-name">Alert Academy</span>
        </div>

        <div class="sidebar-content">
            <ul class="lists">
                <li class="list">
                    <a href="#" class="nav-link">
                        <i class="bx bx-home-alt icon"></i>
                        <span class="link">Home</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#" class="nav-link">
                        <i class="bx bx-bar-chart-alt-2 icon"></i>
                        <span class="link">Profile</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#" class="nav-link">
                        <i class="bx bx-bell icon"></i>
                        <span class="link">+Course</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#" class="nav-link">
                        <i class="bx bx-message-rounded icon"></i>
                        <span class="link">+Assignment</span>
                    </a>
                </li>
            </ul>

            <div class="bottom-content">
                <ul class="lists">
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="bx bx-cog icon"></i>
                            <span class="link">Settings</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="bx bx-log-out icon"></i>
                            <span class="link">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<section class="overlay"></section>

<script src="AlertAcademySideMenuJS.js"></script>
</body>
</html>
