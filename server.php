<?php
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "user";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$conn) {
        // แจ้งเตือนข้อผิดพลาด
        echo "<script>console.error('Connection failed: " . mysqli_connect_error() . "');</script>";
      } 

?>