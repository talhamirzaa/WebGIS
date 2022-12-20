<?php
include_once 'db.php';
include_once 'auth_session.php';
$email=$_SESSION['email'];
?>



<?php
if(isset($_POST['btn-upload']))
{    
  
 //$file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file = $_FILES['file']['name'];

    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];

 if($file_size==0)
 {
 ?>
  <script>
            alert('No file Selected');
          window.location.href='dynamic_map.php?fail';
          
        </script>
  <?php
       
  }
 
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $final_file = strtolower($file);
 // make file name in lower case
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
      
      
/*here to add note pad code*/ 

      $sql="SELECT file1,file2,file3,file4,file5 FROM users where email='$email'";
      $result_set=mysqli_query($con,$sql);

      if ($row=mysqli_fetch_array($result_set))
{
      if (is_null($row['file1']) || is_null($row['file2']) || is_null($row['file3']) || is_null($row['file4']) || is_null($row['file5'])) 
      {
      $sql=" update users set
        file5 = ( case when ( file4 is not NULL and file5 is NULL ) then '$final_file' else file5 end )
      , file4 = ( case when ( file3 is not NULL and file4 is NULL ) then '$final_file' else file4 end )
      , file3 = ( case when ( file2 is not NULL and file3 is NULL ) then '$final_file' else file3 end )
      , file2 = ( case when ( file1 is not NULL and file2 is NULL ) then '$final_file' else file2 end )
      , file1 = ( case when ( file1 is NULL ) then '$final_file' else file1 end ) 
      where email='$email'";

      
      if (mysqli_query($con, $sql)) 
  {
    ?>
  <script>
            alert('successfully uploaded');
        window.location.href='dynamic_map.php?success';
        </script>
  <?php
      
  } 
    else 
    { 
      ?>
  <script>
      alert('There is file');
        window.location.href='dynamic_map.php?fail';
        </script>
  <?php
    
    }
   
 }
 else
    {
      ?>
  <script>
        alert('File upload limit reached!');
        window.location.href='dynamic_map.php?fail';
        </script>
  <?php
    }

}

}

 
}
?>
