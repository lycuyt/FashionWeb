<?php 
    include "connect.php";
    if(isset($_POST['btn'])){
        $id = "";
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $level = 2;

        
        $sql = "INSERT INTO thanhvien (id,username, password, level)
        VALUE ('$id','$user', '$pass', 'level')
        ";
        mysqli_query($conn, $sql);
        header('location: login.php');
    }
?>

<form action="signup.php" method="post">
    <label> username</label>
    <input type="text" name="username">

    <label>password</label>
    <input type="text" name = "password">
    <button type="submit" name = "btn">Sign up</button>
</form>