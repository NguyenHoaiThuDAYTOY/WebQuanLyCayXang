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

    function connectdb2(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quanlycayxang";
        
        // Kết nối đến MySQL
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        // Kiểm tra kết nối
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        return $conn;
    }
