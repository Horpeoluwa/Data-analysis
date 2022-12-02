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
    $Surname =textboxValue(value:"surname");
    $Firstname =textboxValue(value:"firstname");
    $Othername =textboxValue(value:"othername");
    $Marital =textboxValue(value:"marital");
    $Religion =textboxValue(value:"religion");
    $Homeaddress =textboxValue(value:"homeaddress");
    $Occupation =textboxValue(value:"occupation");
    $Phoneno =textboxValue(value:"phoneno");
    $Stateoforigin =textboxValue(value:"stateoforigin");
    $Nameofnextofkin =textboxValue(value:"nameofnextofkin");
    $Relationshiptonextofkin =textboxValue(value:"relationshiptonextofkin");
    $addressofnextofkin =textboxValue(value:"addressofnextofkin");
    $Phonenoofnextofkin =textboxValue(value:"phonenoofnextofkin");
    $Stateoforiginofnextofkin =textboxValue(value:"stateoforiginofnextofkin");
    $Age =textboxValue(value:"age");
    $Sex =textboxValue(value:"sex");
    $Treatment =textboxValue(value:"treatment");
    if($Surname && $Firstname && $Othername && $Marital && $Religion && $Homeaddress && $Occupation && $Phoneno && $Stateoforigin && $Nameofnextofkin 
                && $Relationshiptonextofkin  && $addressofnextofkin && $Phonenoofnextofkin && $Stateoforiginofnextofkin && $Age && $Sex && $Treatment){
        $sql = "INSERT INTO gsmcdata (Surname,Firstname,Othername,Marital,Religion,Homeaddress,Occupation,Phoneno,Stateoforigin
                ,Nameofnextofkin,Relationshiptonextofkin,addressofnextofkin,Phonenoofnextofkin,Stateoforiginofnextofkin,Age,Sex,Treatment )
                VALUES ('$Surname','$Firstname','$Othername','$Marital','$Religion','$Homeaddress','$Occupation','$Phoneno',
                    '$Stateoforigin','$Nameofnextofkin','$Relationshiptonextofkin','$addressofnextofkin','$Phonenoofnextofkin','$Stateoforiginofnextofkin','$Age','$Sex',
                    '$Treatment')";
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
    $sql ="SELECT * FROM gsmcdata";
    $result  = mysqli_query($GLOBALS['con'],$sql);

    if (mysqli_num_rows($result)>0){
      return $result;
    }
}




function updateData(){
    $id = textboxValue(value:"book_ID");
    $Surname = textboxValue(value:"surname");
    $Firstname = textboxValue(value:"firstname");
    $Othername = textboxValue(value:"othername");
    $Marital = textboxValue(value:"marital");
    $Religion = textboxValue(value:"religion");
    $Homeaddress = textboxValue(value:"homeaddress");
    $Occupation = textboxValue(value:"occupation");
    $Phoneno = textboxValue(value:"phoneno");
    $Stateoforigin = textboxValue(value:"stateoforigin");
    $Nameofnextofkin = textboxValue(value:"nameofnextofkin");
    $Relationshiptonextofkin = textboxValue(value:"relationshiptonextofkin");
    $addressofnextofkin = textboxValue(value:"addressofnextofkin");
    $Phonenoofnextofkin = textboxValue(value:"phonenoofnextofkin");
    $Stateoforiginofnextofkin = textboxValue(value:"stateoforiginofnextofkin");
    $Age = textboxValue(value:"age");
    $Sex = textboxValue(value:"sex");
    $Treatment = textboxValue(value:"treatment");



    if ($Surname    && $Firstname  && $Othername  && $Marital    && $Religion   && $Homeaddress    && $Occupation && $Phoneno    &&
    $Stateoforigin  && $Nameofnextofkin    && $Relationshiptonextofkin && $addressofnextofkin  && $Phonenoofnextofkin && $Stateoforiginofnextofkin   && $Age    && $Sex    && $Treatment){
        $sql = "
                UPDATE gsmcdata SET  surname ='$Surname', firstname = '$Firstname', othername = '$Othername',
                    marital = '$Marital', religion = '$Religion', homeaddress = '$Homeaddress ', occupation = '$Occupation',
                    phoneno = '$Phoneno ', stateoforigin = '$Stateoforigin', nameofnextofkin = '$Nameofnextofkin', relationshiptonextofkin = '$Relationshiptonextofkin',
                    addressofnextofkin = '$addressofnextofkin', phonenoofnextofkin = '$Phonenoofnextofkin', stateoforiginofnextofkin =  '$Stateoforiginofnextofkin',
                    age = '$Age ', sex = '$Sex ', treatment = '$Treatment' WHERE id='$id'

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


    $sql = "DELETE FROM gsmcdata WHERE id = $id";
    if (mysqli_query($GLOBALS['con'], $sql)){
        TextNode(classname:"success", msg:"Record deleted Succesfully...!");
    }else{
        TextNode(classname:"error", msg:"Unable to Delete Record.....!");
    }
}








?>