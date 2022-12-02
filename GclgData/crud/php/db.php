<?php

function createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gclg_database";
    //create connection

    $con= mysqli_connect($servername,$username,$password);
    //Check connection
    if(!$con){
        die("connection Failed:".mysqli_connect());
}

//create database
$sql ="CREATE DATABASE IF NOT EXISTS $dbname";
if(mysqli_query($con,$sql)){
    $con= mysqli_connect($servername,$username,$password,$dbname);
    $sql ="
        CREATE TABLE IF NOT EXISTS gclgdata(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fname VARCHAR(50) NOT NULL,
            age INT(5) NOT NULL,
            sex VARCHAR(20) NOT NULL,
            branch VARCHAR(100) NOT NULL,
            dhostel VARCHAR(100) NOT NULL,
            homeaddress VARCHAR(200) NOT NULL,
            phoneno VARCHAR(100) NOT NULL,
            nameofnextofkin VARCHAR(200) NOT NULL,
            phonenoofnextofkin VARCHAR(100) NOT NULL
        );
    ";
    if(mysqli_query($con,$sql)){
         return $con;
    }else{
        echo "cannot create Table...!";
    }
}else{
    echo "Error while creating database".mysqli_error($con);
}

   


}



?>