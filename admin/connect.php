<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "web1";

    $conn = new mysqLi($server, $user, $pass, $database);

    if($conn){
        mysqLi_query($conn, " SETNAME 'utf8'");
        // echo " da ket noi thanh cong";
    }else{
        echo " ket noi khong thanh cong";
    }
?>