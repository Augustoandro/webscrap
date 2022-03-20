<?php
    $_con=mysqli_connect("localhost","admin_augustus","DemonHalfas@1729");
    mysqli_select_db($_con,"admin_webd");
    $_sql2="select * from websid";
    $rs2=mysqli_query($_con,$_sql2);
    while($resul2=mysqli_fetch_assoc($rs2)){
        $src=$resul2['simg'];
        if (@getimagesize($src)) {
           echo "Image exists";                 
         }
         else{
           $_sql3="update websid set simg=NULL where simg='".$src."'";
           if (mysqli_query($_con,$_sql3)) {
             echo "Image deleted";
            }
            else
            {
                echo "Error: ".mysqli_error($_con);
            }
         }
        }
?>
