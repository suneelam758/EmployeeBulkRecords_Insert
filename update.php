<?php

$conn=mysqli_connect("localhost","root","","employeebulkrecordssep2022") or die ("Coonection Failed");
$dc=$_POST["dept"];

$row="select count(*) as row from `bulkrecordmaster` where DeptCode='$dc'";
$j=mysqli_query($conn,$row);
$result = mysqli_fetch_all($j);
$count= $result[0][0];


for($i=1;$i<=$count;$i++){
    $name=$_POST["Name$i"];
    $contact=$_POST["Contact$i"];

if(!empty($dc) && !empty($name) && !empty($contact)){

    $update="UPDATE `bulkrecordmaster` SET `Contact`='$contact' WHERE Name='$name' && DeptCode='$dc'";

    $query=mysqli_query($conn,$update) or die("Query Unsuccessful");
}
   
}
if($query)
{
   echo "Record updated successfully";
}else{
    echo "There is some problem while updating the record";
}



mysqli_query($conn,$update);
?>