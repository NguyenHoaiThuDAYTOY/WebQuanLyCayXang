<?php
    //kết nối mysql
    function connectdb(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "quanlycayxang";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=quanlycayxang", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch(PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }
?>