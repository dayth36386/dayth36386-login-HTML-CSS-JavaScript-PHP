<?php
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['submit_register'])){
        $username = mysqli_real_escape_string($conn, $_POST['uname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['tel']);
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $password1 = mysqli_real_escape_string($conn, $_POST['psw']);
        $password2 = mysqli_real_escape_string($conn, $_POST['psw-repeat']);

        if (empty($username)){
            array_push($errors, "Username is required");
        }
        if (empty($email)){
            array_push($errors, "Email is required");
        }
        if (empty($phone)) {
            array_push($errors, "Phone number is required");
        }
        if (!preg_match('/^[0-9]{10}$/', $phone)) {
            array_push($errors, "Invalid phone number format");
        }
        if (empty($birthday)){
            array_push($errors, "Birthday is required");
        }
        if (empty($password1)){
            array_push($errors, "Password is required");
        }
        if (empty($password2)){
            array_push($errors, "Password Repeat is required");
        }
        if ($password1 != $password2) {
            array_push($errors, "Passwords do not match");
        }
        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password1)) {
            array_push($errors, "Password must contain at least one special character");
        }
        if (!preg_match('`[0-9]`', $password1)) {
            array_push($errors, "Password must contain numbers.");
        }
        if (!preg_match('`[a-z]`', $password1) || !preg_match('`[A-Z]`', $password1)) {
            array_push($errors, "Password must contain uppercase and lowercase letters.");
        }
        if (strlen($password1) < 8 || strlen($password1) > 16) {
            array_push($errors, "Password1 must be between 8 and 16 characters");
        }

        $user_check_query = "SELECT * FROM customers WHERE username = '$username' OR email = '$email' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result){
            if ($result['username'] === $username){
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email){
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0){
            $password = md5($password1);
            $sql = "INSERT INTO customers (id, username, email, phone_number, birthdate, password) VALUES (NULL, '$username', '$email', '$phone', '$birthday', '$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "First login";
            header('location: index.php');
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