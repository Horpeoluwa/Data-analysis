<?php


require_once("../crud/php/component.php");
require_once("../crud/php/operation.php");









?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCLG</title>
    <script src="https://kit.fontawesome.com/71cd5a3062.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<!-- Custom stylesheet -->
<link rel="stylesheet" href="styles.css">
</head>
<body>


<div class="col">
                       


<main>
    <div class="container text-center">
        <h1 class= "py-4 bg-dark text-light rounded"> <i class= "fas fa-hospital-user"></i>   GCLG 2022 ANNUAL RETREAT REGISTRATION PORTAL</h1>
        <div class="d-flex justify-content-center">
            <form action="" method ="post" class="w-50">
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement(icon: "<i class='fas fa-id-badge'></i>", placeholder: "ID", name: "book_ID", value:"");?>
                    </div>             
                    <div class="col">
                        <?php inputElement(icon: "<i class='fas fa-id-badge'></i>", placeholder: "Fname", name: "fname", value:"");?>
                        <div class="col">
                        <?php inputElement(icon: "<i class='fas fa-user'></i>", placeholder: "Age", name: "age", value: "");?>
                        <div class="col">
                        <div class="col">
                        <?php inputElement(icon: "<i class='fas fa-user'></i>", placeholder: "Sex", name: "sex", value: "");?>
                        <?php inputElement(icon: "<i class='fas fa-id-badge'></i>", placeholder: "Branch/Town", name: "branch", value:"");?>
                        <div class="col">
                        <?php inputElement(icon: "<i class='fas fa-id-badge'></i>", placeholder: "Date of arrival in hostel", name: "dhostel", value:"");?>
                        <div class="col">
                        <?php inputElement(icon: "<i class='fas fa-user'></i>", placeholder: "Home address", name: "homeaddress", value:"");?>
                        <div class="col">
                        <?php inputElement(icon: "<i class='fas fa-user'></i>", placeholder: "Phone Number", name: "phoneno", value:"");?>
                        <div class="col">
                        <?php inputElement(icon: "<i class='fas fa-user'></i>", placeholder: "Name of next of Kin", name: "nameofnextofkin", value:"");?>
                        <div class="col">
                        <?php inputElement(icon: "<i class='fas fa-user'></i>", placeholder: "Phone Number of next of kin", name: "phonenoofnextofkin", value:"");?>
                
                        </div>
                        
                                    
                                                <div class="d-flex justify-content-center">
                                                <?php buttonElement(btnid: "btn-create", styleclass: "btn btn-success", text: "<i class='fas fa-plus'></i>",  name: "create", attr: "data-toggle='tooltip' data-placement='bottom' title='Add record'");?>
                                                <?php buttonElement(btnid: "btn-read", styleclass: "btn btn-primary", text: "<i class='fas fa-sync'></i>",  name: "read", attr: "data-toggle='tooltip' data-placement='bottom' title='refresh'");?>
                                                <?php buttonElement(btnid: "btn-update", styleclass: "btn btn-light border", text: "<i class='fas fa-pen-alt'></i>",  name: "update", attr: "data-toggle='tooltip' data-placement='update' title='update'");?>
                                                <?php buttonElement(btnid: "btn-delete", styleclass: "btn btn-danger", text: "<i class='fas fa-trash-alt'></i>",  name: "delete", attr: "data-toggle='tooltip' data-placement='update' title='delete'");?>
                                                
                                                
                                </div>
                                
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        





        <!-- Boostrap table -->
        <div class="tinfo table-data">
            <table id ="myTable" class= "table table-striped table-dark" >
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Full name</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Branch/Town</th>
                        <th>Date of arrival at Hostel</th>
                        <th>Home Address</th>
                        <th>Phone number</th>
                        <th>Name of next of kin</th>
                        <th>Phone of Next of Kin</th>       
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php


                    if (isset($_POST['read'])){
                        $result = getData();

                        if ($result){
                            while($row = mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td data-id="<?php echo $row['id'];?>"><?php echo $row['id'];?></td>
                                <td data-id="<?php echo $row['id'];?>"><?php echo $row['fname'];?></td>
                                <td data-id="<?php echo $row['id'];?>"><?php echo $row['age'];?></td>
                                <td data-id="<?php echo $row['id'];?>"><?php echo $row['sex'];?></td>
                                <td data-id="<?php echo $row['id'];?>"><?php echo $row['branch'];?></td>
                                <td data-id="<?php echo $row['id'];?>"><?php echo $row['dhostel'];?></td>
                                <td data-id="<?php echo $row['id'];?>"><?php echo $row['homeaddress'];?></td>
                                <td data-id="<?php echo $row['id'];?>"><?php echo $row['phoneno'];?></td>
                                <td data-id="<?php echo $row['id'];?>"><?php echo $row['nameofnextofkin'];?></td>
                                <td data-id="<?php echo $row['id'];?>"><?php echo $row['phonenoofnextofkin'];?></td>
                                <td ><i class = "fas fa-edit btnedit"data-id="<?php echo $row['id'];?>"></i></td>
                            </tr>

                    <?php

                            }
                        }
                    }

                    ?>
                </tbody>
             
                
            </table>
        </div>
    </div>
</main>







<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="../crud/php/main.js"></script>
</body>
</html>