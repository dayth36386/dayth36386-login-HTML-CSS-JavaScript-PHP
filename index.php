<?php
    session_start();

    if (!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleregister.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Home Page</title>
</head>
<body>

    <div class="wrapper">
                <h1>HOME PAGE</h1>
                <div>
                    <?php if (isset($_SESSION['success'])) : ?>
                        <div>
                            <h3>
                                <?php
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                
                                ?>
                            </h3>
                    <?php endif?>
                </div>
                <?php if (isset($_SESSION['username'])) : ?><p>Welcome <?php echo $_SESSION['username']; ?></p><?php endif?>       
                
                <button type="submit" name="Logout" class="btn"><a href="index.php? logout='1'">Logout</a></button>
    
        </div> 
</body>
</html>