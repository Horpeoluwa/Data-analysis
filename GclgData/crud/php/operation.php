<?php
require_once("db.php");
require_once("component.php");

$con = createdb();


//create button click
if (isset($_POST['create'])){
   createData();
}



if (isset($_POST['update'])){
   updateData();
}



if (isset($_POST['delete'])){
    deleteRecord();
 }
 


function createData(){
    $Fname =textboxValue(value:"fname");
    $Age =textboxValue(value:"age");
    $Sex =textboxValue(value:"sex");
    $Branch =textboxValue(value:"branch");
    $Dhostel =textboxValue(value:"dhostel");
    $Homeaddress =textboxValue(value:"homeaddress");
    $Phoneno =textboxValue(value:"phoneno");
    $Nameofnextofkin =textboxValue(value:"nameofnextofkin");
    $Phonenoofnextofkin =textboxValue(value:"phonenoofnextofkin");
    if($Fname && $Age && $Sex && $Branch && $Dhostel && $Homeaddress && $Phoneno && $Nameofnextofkin && $Phonenoofnextofkin){
        $sql = "INSERT INTO gclgdata (Fname,Age,Sex,Branch,Dhostel,Homeaddress,Phoneno,Nameofnextofkin,Phonenoofnextofkin)
                VALUES ('$Fname','$Age','$Sex','$Branch ','$Dhostel','$Homeaddress','$Phoneno','$Nameofnextofkin','$Phonenoofnextofkin')";
        if(mysqli_query($GLOBALS['con'],$sql)){
            TextNode(classname:"success", msg:"Recorded Succefully Inserted....!");
        }else{
            echo "error";
        }
    }else{
        TextNode(classname:"error", msg:"Provide Data in the textbox");
    }
}

//messages

function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}


//get Data from mysql Database
function getData(){
    $sql ="SELECT * FROM gclgdata";
    $result  = mysqli_query($GLOBALS['con'],$sql);

    if (mysqli_num_rows($result)>0){
      return $result;
    }
}




function updateData(){
    $id = textboxValue(value:"book_ID");
    $Fname =textboxValue(value:"fname");
    $Age =textboxValue(value:"age");
    $Sex =textboxValue(value:"sex");
    $Branch =textboxValue(value:"branch");
    $Dhostel =textboxValue(value:"dhostel");
    $Homeaddress =textboxValue(value:"homeaddress");
    $Phoneno =textboxValue(value:"phoneno");
    $Nameofnextofkin =textboxValue(value:"nameofnextofkin");
    $Phonenoofnextofkin =textboxValue(value:"phonenoofnextofkin");



    if($Fname && $Age && $Sex && $Branch && $Dhostel && $Homeaddress && $Phoneno && $Nameofnextofkin && $Phonenoofnextofkin){
        $sql = "
                UPDATE gclgdata SET  fname ='$Fname', age = '$Age ', sex = '$Sex ', branch = '$Branch', dhostel = '$Dhostel',homeaddress = '$Homeaddress ',
                    phoneno = '$Phoneno ', nameofnextofkin = '$Nameofnextofkin',phonenoofnextofkin = '$Phonenoofnextofkin' WHERE id='$id'

        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode(classname:"success", msg:"Data Succefully Updated....!");
        }else{
            TextNode(classname:"error", msg:"Unable to update Data...!");
        }
    }else{
        TextNode(classname:"eror", msg:"Select Data Using Edit Icon....!");
    }

}




function deleteRecord(){
    $id = (int)textboxValue(value:"book_ID");


    $sql = "DELETE FROM gclgdata WHERE id = $id";
    if (mysqli_query($GLOBALS['con'], $sql)){
        TextNode(classname:"success", msg:"Record deleted Succesfully...!");
    }else{
        TextNode(classname:"error", msg:"Unable to Delete Record.....!");
    }
}








?>