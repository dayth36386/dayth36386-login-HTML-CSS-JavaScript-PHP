<?php
    session_start();
    include('server.php');
    $errors = array();

    if(isset($_POST['submit_login'])){
        $username = mysqli_real_escape_string($conn, $_POST['uname']);
        $password = mysqli_real_escape_string($conn, $_POST['psw']);

        if (empty($username)){
            array_push($errors, "Username is required");
        }
        if (empty($password)){
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0){
            $password = md5($password);
            $query = "SELECT * FROM customers WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "login success";
                header('location: index.php');
            }else{
                $_SESSION['errors'] = "ID not found or password incorrect";
                header('location: login.php');
            }

        }
    }
?>
<?php if (count($errors) > 0) : ?>
    <div class="error">
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>