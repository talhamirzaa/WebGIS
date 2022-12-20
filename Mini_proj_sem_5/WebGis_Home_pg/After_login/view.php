<?php
include_once 'db.php';
include_once 'auth_session.php';
$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Uploading With PHP and MySql</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<p>Hey, <?php echo $email; ?>!</p>
<div id="body">


    <?php
 $sql="SELECT file1,file2,file3,file4,file5 FROM users where email='$email'";
 $result_set=mysqli_query($con,$sql);
 
 while($row=mysqli_fetch_array($result_set))
 {
    /*if (!empty($row['file1']))
    {
        ?>
        <br><br>
        <label for="disp_fls" id="fls2"><a href="uploads/<?php echo $row['file1'] ?>" target="_blank"><?php echo $row['file1'] ?></a>  <button onclick="display()">plot</button></label>
    <?php
    }
    else
    {
  
    }*/
    $i=1;
    $r='file';
    while(!empty($row[$r.$i]))
    {
        
        ?>
        <br><br>
        <label for="disp_fls" id="fls2"><a href="uploads/<?php echo $row[$r.$i] ?>" target="_blank"><?php echo $row[$r.$i] ?></a>  <button onclick="display()">plot</button></label>
    <?php

        $i++;
        if($i==6)
        break;
    }

 }
 ?>
    
    
</div>
</body>
</html>
