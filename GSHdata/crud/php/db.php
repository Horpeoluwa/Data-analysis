<?php

function createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gsmcdatabase";


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

    $sql = "
            CREATE TABLE IF NOT EXISTS gsmcdata(
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                surname VARCHAR(200) NOT NULL,
                firstname VARCHAR(200) NOT NULL,
                othername VARCHAR(200) NOT NULL,
                marital VARCHAR(200) NOT NULL,
                religion VARCHAR(100) NOT NULL,
                homeaddress VARCHAR(400) NOT NULL,
                occupation VARCHAR(200) NOT NULL,
                phoneno VARCHAR(100) NOT NULL,
                stateoforigin VARCHAR(200) NOT NULL,
                nameofnextofkin VARCHAR(300) NOT NULL,
                relationshiptonextofkin VARCHAR(200) NOT NULL,
                addressofnextofkin VARCHAR(200) NOT NULL,
                phonenoofnextofkin VARCHAR(150) NOT NULL,
                stateoforiginofnextofkin VARCHAR(200) NOT NULL,
                age INT(4) NOT NULL,
                sex VARCHAR(100) NOT NULL,
                treatment VARCHAR(7000) NOT NULL
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