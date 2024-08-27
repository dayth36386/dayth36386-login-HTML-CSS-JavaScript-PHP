<?php include('server.php');?>
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styleregister.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

        <div class="wrapper">
            <form action="register_db.php" method="post">
                <h1>Register</h1>
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
                    placeholder="Username" name="uname" >                    
                </div>
                <div class="input-box">
                    <input type="email" 
                    placeholder="Email" name="email" >                   
                </div>
                <div class="input-box">
                    <input type="tal" 
                    placeholder="Phone number" name="tel" >                   
                </div>
                <div class="input-box">
                    <input type="date" 
                    placeholder="Date of birth" name="birthday" >                   
                </div>
                <div class="input-box">
                    <input type="password" 
                    placeholder="Password" name="psw" >                   
                </div>
                <div class="input-box">
                    <input type="password" 
                    placeholder="Password Repeat" name="psw-repeat" >                   
                </div>   
                <div class="Terms-Privacy">
                    <label><input type="checkbox">By creating an account you agree to our <a href="#">Terms & Privacy</a></label>
                </div>
                <button type="submit" name="submit_register" class="btn">CREATE ACCOUNT</button>
                <div class="log-in">
                    <p>Already have an account? <a href="http://localhost/project322/login.php">Log In</a></p>
                </div> 
            </form>
            
        </div> 
</body>
</html>
