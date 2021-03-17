<?php 

function createDB(){
    $serverName = "localhost:3307";
    $username = "root";
    $password = "";
    $dbName = "bookstore";

    //create connection
    $con = mysqli_connect($serverName, $username, $password, $dbName);

    //check connection
    if(!$con){
        die("Connection Failed: ". mysqli_connect_error());
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbName";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($serverName, $username, $password, $dbName);

        $sql = "CREATE TABLE IF NOT EXISTS books(
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                book_name VARCHAR(35) NOT NULL,
                book_publisher VARCHAR(35) NOT NULL,
                book_price FLOAT)";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Error in creating table";
        }

    }else{
        echo "Error while creating database". mysqli_error($con);
    }
}


?>