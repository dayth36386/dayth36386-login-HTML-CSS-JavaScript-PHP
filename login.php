<?php 
    session_start();
    include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylelogin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

        <div class="wrapper">
            <form action="login_db.php" method="post">
                <div class="header"><h1>Login</h1></div>
                 <div>
                    <?php if (isset($_SESSION['errors'])) : ?>
                        <div>
                            <h4>
                                <?php
                                    $error_style = 'color: #FFEC00; text-align: center; margin: 10px 0;';                                  
                                    echo "<p style=\"$error_style\">{$_SESSION['errors']}</p>";
                                    unset($_SESSION['errors']);
                                ?>
                            </h4>
                        </div>
                <?php endif?>
                 </div>
                

                <div class="input-box">
                    <input type="text" 
                    placeholder="Username" name="uname">
                    
                </div>

                <div class="input-box">
                    <input type="password" 
                    placeholder="Password" name="psw">

                </div>

                <div class="remember">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot password</a>
                </div>

                <button type="submit" class="btn" name="submit_login">LOGIN</button>

                <div class="create">
                    <a href="http://localhost/project322/register.php">Create a new account</a>
                </div>
                
            </form>
            
        </div> 
</body>
</html>