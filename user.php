<?php

include 'conn.php';
$row=$_POST['r1'];



for($i=1;$i<=$row;$i++){
   
    $dc=$_POST["DeptCode"];
    $name=$_POST["Name$i"];
    $contact=$_POST["Contact$i"];

if(!empty($dc) && !empty($name) && !empty($contact)){
    $sql="INSERT INTO `bulkrecordmaster`( `DeptCode`, `Name`, `Contact`) VALUES ('$dc','$name','$contact')";
    $query=mysqli_query($conn,$sql) or die("Query Unsuccessful");
}
    
}

  if($query)
  {
     echo "Records added successfully";
  }else{
      echo "There is some problem while adding the records";
  }

