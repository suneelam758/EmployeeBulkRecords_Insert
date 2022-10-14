<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
   body{
    background-color: lavender;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    text-align:center;
    margin: 20px;
   }

   .a{
    background-color: lavender;
   }
   .a:hover{
    box-shadow: 80px 40px 20px 10px grey;
    transition: 0.5s;
    
   }
</style>

<body>
    <table border="4px groove " align="center" class="a table">
        <tr>
            <td>
                <form method="POST">
                    <label id="fonts"><u>Enter No. of Rows to Add</u></label>&nbsp;
                    <input type="number" value="" name="r1"><br><br>
                    <input type="submit" value="Add Rows" class="btn btn-primary" name="addrows">
                </form>

            </td>
            <td>
                <form method="POST">
                    <label id="fonts"><u>Enter Department Code</u></label>&nbsp;
                    <input type="number" value="" name="DeptCode"><br><br>
                    <input type="submit" value="Search Data" class="btn btn-primary" name="dept">
                </form>
            </td>
            
        </tr>
    </table>
</body> 

<br><br>
<?php

include 'conn.php';
    
if(isset($_POST['addrows'])){
$rows=$_POST['r1'];

if($rows!=0 && $rows>0){
    ?>  
    

    <h2><u>Add Records</u></h2><br><br>
    <table>
    <tr>
    <th id='heading'>Name</th>
    <th id='heading'>Contact</th>
    </tr>
    <form method='POST' action='user.php'>
    <h3>Enter Department Code</h3>&nbsp;&nbsp;
    <input type='text' value='' name='DeptCode'><br><br>
    <?php
    $row=$_POST['r1'];
    echo "<input type='hidden' name='r1' value="; echo $row;" >";
    for($i=1;$i<=$row;$i++){
        ?>
            
   
        <tr>
            <td><input type='text' name='Name<?php echo $i?>' value=''>
            <td><input type='tel' name='Contact<?php echo $i?>' value=''>
        </tr>
        
        <?php } ?>
    
    
        <tr> 
        <td align='center'>
        <input type='submit' value='Save' class='btn btn-success'>
        </td>
        </tr>
   
        </form>
        </table>
       
<?php } 
    else{
        echo "<script>alert('incorrect number of rows.')</script>";
    }?>

  <?php  }
if(isset($_POST['dept'])){

$DeptCode=$_POST['DeptCode'];

$query="SELECT * FROM `bulkrecordmaster` WHERE DeptCode='$DeptCode'";

$result=mysqli_query($conn,$query);
if($query){
    echo "<h1><tt>Records not found</tt></h1>";
}
?>


<h2>Update Records</h2>
<form method='POST' action='update.php'>
<table>
    <tr>
    <h3>Enter Department Code</h3>&nbsp;&nbsp;
        <input type='number' name='dept' readonly value="<?php echo $DeptCode; echo"" ?>">
    </tr>
    <tr>
        <th id='heading'>Name</th>
        <th id='heading'>Contact</th>
    </tr>
    <tr>
        <?php
   
$i=1;
while($row=mysqli_fetch_assoc($result)){
    ?>

 
    <input type='hidden' name='dept' readonly value= "<?php echo $row["DeptCode"]; ?>">
        <td><input type='text' readonly name="Name<?php echo $i?>" value= "<?php echo $row["Name"]; ?> "></td>
        <td><input type='number' name="Contact<?php echo $i?>" value = "<?php echo $row['Contact'] ; ?>"></td>
    </tr>
    <?php
$i++;
}?>
   <tr<td><br><input type='submit' name='update' value='Update' class='btn btn-primary'></td></tr>
</table>
</form>
</body>
</html>

<?php }
?>


  