<?php

    function Database_Connect()
        {
            $Host="localhost";
            $Username="root";
            $Password=  "";
            $dbName="gclg_database";
            $Error_Message="";

            @$Connector=new mysqli($Host,$Username,$Password,$dbName);

            if(mysqli_connect_errno())
            {
            $Error_Message="<br/><br/><div class='alert alert-danger'><i class='icon-remove-circle'></i>Sorry System '".$dbName."' Database Connection Failed to Initiate on this: ".$Host." Server, Username: ".$Username.".Please try again Later</div>";
            die($Error_Message);
            exit();
            }
            else
            {
            return $Connector;
            }

        }

    function MySql_Excel_Exporter()
        {
        $Excel_File = "Export_Excel_".date("Y-m-d").".xls";
        $Separator="\t";

        /* Header info settings */
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=".$Excel_File."");
        header("Pragma: no-cache");
        header("Expires: 0");

        $MySqli=Database_Connect();

        $Sql="SELECT id,fname,age,sex,branch,dhostel,homeaddress,phoneno,nameofnextofkin,phonenoofnextofkin FROM gclgdata";
        $Query=$MySqli->prepare($Sql);
        $Query->execute();
        $Query->bind_result($id,$fname,$age,$sex,$branch,$dhostel,$homeaddress,$phoneno,$nameofnextofkin,$phonenoofnextofkin);


        /* THE FOLLOWING LINES DOESNT WORK FOR ME AND I CANT GET THE file_name() 
        TO WORK PLAYED WITH ITS ALTERNATIVE IN MYSQLI THAT GIVES AN ARRAY OF INFORMATION 
        FOR THE FIRLD BUT STILL COULDNT GET IT TO WORK AND SO THE COLUMN NAMES OF MY TABLE 
        WONT SHOW UP SO I NEED HELP HERE
        */

        /* Start of printing column names as names of MySQL fields /
        for ($i = 0; $i<$MySqli->field_count; $i++) 
        {
          echo $Query->field_name()."\t";

        }
        print("\n");
        /* End of printing column names */



        while($Fetch=$Query->fetch())
            {           
              $Schema_Insert = "";
              /* HERE I ACCEPT IF THERE IS A BETTER WAY OF JUST GETTING THE VALUES IN A FORM OF DYNAMIC WAY
              OF REFFERING COLUMS AS IN THE ORIGINAL CODE JUST USED LOOP TO GET COLUMNS,
              BUT AS I FDIDNT KNOW HOW TO DO THAT AND SO I USED WHAT I KNOW THE bind_result()
              AND JUST ASSIGN THEM TO $Schema_Insert FOR EXCEL FORMATING
              */
              $Schema_Insert =$id."".$Separator."".$fname."".$Separator."".$age."".$Separator."".$sex."".$Separator."".$branch."".$Separator."".$dhostel."".$Separator."".$homeaddress."".$Separator."".$phoneno."".$Separator."".$nameofnextofkin."".$Separator."".$phonenoofnextofkin."".$Separator."";
              $Schema_Insert = str_replace($Separator."$", "", $Schema_Insert);
              $Schema_Insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $Schema_Insert);
              $Schema_Insert .= "\t";
              print(trim($Schema_Insert));
              print "\n";

            }
        $Query->close();
        }

        MySql_Excel_Exporter();
?>