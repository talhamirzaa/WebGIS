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

        <p>Hey, <?php echo $_SESSION['email']; ?>!</p>
<div id="body">
 <form action="upload.php" method="post" enctype="multipart/form-data">
 <input type="file" name="file" />
 <button type="submit" name="btn-upload">upload</button>
 <br><br>
 <a href="view.php">click here to view file.</a>
 
 </form>
    <br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <!--<label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>-->
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 else
 {
  ?>
        <label>Try to upload any files(CSV,Json,etc...)</label>
        <?php
 }
 ?>
<br>
<br><br>
 <label for="fileshow"><b> prev uploaded files:</b></label><br>
 <?php
 $sql="SELECT file1 FROM users where email='$email'";
 $result_set=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>

        <br>
        <label for="disp_fls" id="fls2"><a id="dld" href="uploads/<?php echo $row['file1'] ?>" target= "_blank"><?php echo $row['file1'] ?></a>  <button onclick="display()">plot</button></label>
        <script>
            function display()
            {
                  //var x=document.getElementbyID("dld");
                  //document.getElementById("dld").innerHTML="hello";
                  document.getElementById("dld").download=!true;
                  alert("yes");
            }
        </script>
        <br><br>
        <?php
 }
 ?>
 
</div>

</body>
</html>