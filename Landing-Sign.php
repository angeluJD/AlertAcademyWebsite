<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AlertAcademy-Login</title>
        <link rel="stylesheet" href="AlertAcademy.css">
    </head>
    <body>
        <header>
            <h2 class="title">AlertAcademy</h2>
            <nav class="addLinks">
                <a href="#">Contact Us</a>
                <a href="#">FAQ</a>
                <a href="#">Donate</a>
                <button class="btnForLogin">Login</button>
            </nav>
        </header>
        
        <div class="wrapper">
            <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
            
            <div class="box login">
                <h2>Login</h2>
                <form action="http://localhost:8888/AlertAcademyWebsite-main/Landing-Sign.php" method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <input type="text" name="usr" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="pass" required>
                        <label>Password</label>
                    </div>
                    <div class="remem-forgot">
                        <label><input type="checkbox">
                        Remember Me</label>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn">Login</button>
                    <div class="login-register">
                        <p>Don't have an account? <a href="#" class="register">Register</a></p>
                    </div>
                </form>
            </div>

            <div class="box register">
                <h2>Registration</h2>
                <form action="#">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <input type="text" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" required>
                        <label>First</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" required>
                        <label>Last</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" required>
                        <label>Password</label>
                    </div>
                    <div class="remem-forgot">
                        <label><input type="checkbox">I agree to the terms & conditions</label>
                        
                    </div>
                    <button type="submit" class="btn">Register</button>
                    <div class="login-register">
                        <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                    </div>
                </form>
            </div>
        </div>


        <script src= "AlertAcademy.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
