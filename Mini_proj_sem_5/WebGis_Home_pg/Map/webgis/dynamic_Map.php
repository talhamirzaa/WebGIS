<?php
include_once 'db.php';
include_once 'auth_session.php';
include 'config.php';
$email=$_SESSION['email'];

$sql="SELECT username FROM users where email='$email'";
    $uname=mysqli_query($con,$sql);
    if ($row=mysqli_fetch_array($uname))
    {
      $nm=$row['username'];
    }
?>
<!DOCTYPE html>
<html>
<head>


<meta charset="UTF-8">
  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--hamd head-->
    <link rel="stylesheet" href="leaflet-measure.css?v=<?=$version?>">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css?v=<?=$version?>"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>

   <!-- leaflet measure -->
   <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js?v=<?=$version?>"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
   <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css?v=<?=$version?>" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js?v=<?=$version?>"></script>
  
  <!-- Load Leaflet code library - see updates at http://leafletjs.com/download.html -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css?v=<?=$version?>"/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js?v=<?=$version?>"></script>
  <!-- turf js cdn -->
  <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js?v=<?=$version?>"></script>
  <!-- Load jQuery and PapaParse to read data from a CSV file -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js?v=<?=$version?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/papaparse@5.3.0/papaparse.min.js?v=<?=$version?>"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css?v=<?=$version?>" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
 

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css?v=<?=$version?>"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js?v=<?=$version?>"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
   <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css?v=<?=$version?>" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js?v=<?=$version?>"></script>
  <link rel="stylesheet" href="dyna_map.css?v=<?=$version?>">

  
  <!-- Load Leaflet code library - see updates at http://leafletjs.com/download.html -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css?v=<?=$version?>"/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js?v=<?=$version?>"></script>
 

  <!-- Load jQuery and PapaParse to read data from a CSV file -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js?v=<?=$version?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/papaparse@5.3.0/papaparse.min.js?v=<?=$version?>"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css?v=<?=$version?>" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
  <title>WebGIS</title>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css?v=<?=$version?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- for nav bar -->
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/title_logo2.png" rel="icon">
  <link href="../../assets/img/title_logo2.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?v=<?=$version?>">

    <!-- leaflet geocontroler -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/aos/aos.css?v=<?=$version?>" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css?v=<?=$version?>" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css?v=<?=$version?>" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css?v=<?=$version?>" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css?v=<?=$version?>" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css?v=<?=$version?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css?v=<?=$version?>" rel="stylesheet">
  
  <script src="leaflet-measure.js?v=<?=$version?>"></script>
    <script src="leaflet.browser.print.min.js?v=<?=$version?>"></script>
  


</head>
<body>

  <!--nav bar-->
  
    <header id="header" class="d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
    
        <div class="logo">
          <h1 class="text-light"><a href="index.html"><span ><i class="fa fa-globe" style="font-size:40px;color:rgb(49, 170, 179)"></i> WEBGIS</span></a></h1>
        </div>
    
        <nav id="navbar" class="navbar">
          <ul>
            <li><a href="../../index.html">Home</a></li>
            <li><a class="nav-link scrollto" href="../../About.html">About</a></li>
            <li><a class="nav-link scrollto" href="../../service.html">Services</a></li>
            <li><a class="nav-link scrollto" href="../../Team.html">Team</a></li>
            <li><a class="nav-link scrollto" href="../../Contact.html">Contact</a></li>
            <li><a href="../../index.html">Logout</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    
      </div>
    </header><!-- End Header -->

    <p id="hey">Hey, <?php echo $nm; ?></p>
    
  <!-- to take file input -->
  <div id="sidebar">

  
    <!-- features -->
  <div class="distance">
      <!-- Insert Buffer -->
      <label id="buf" for="fname">INSERT BUFFER</label><br>
      <input type="text" id="lat" name="fname" placeholder="latitude"> <input type="text" id="long" name="fname" placeholder="longitute"><br><br>
      <input type="text" id="redi" name="me" placeholder="Enter Radius(km)"><br>
      <input type="submit" id="add_buf" value="Add Buffer" onclick="draw_polygon()"><br>
      <button type="submit" class="print-map" onclick="fullScreen()">View full screen</button> 
    </div>
  <!-- end features -->
  

  <form action="upload.php" id="frm_upld" method="post" enctype="multipart/form-data">


  <div class="btn btn-primary btn-file">
      <!-- Select file <input type="file" class="form-control" id="file" name="files" accept=".csv, .json">-->
     Select file<input type="file" id="file" name="file" />
</div> 
      <div>
 <button class="btn btn-primary" type="submit" id="upld" name="btn-upload">Upload</button>
  </div>
  
</form>


<div id="show_files"> 
 <label id="sh_fls" for="a">Your Files:</label>
    <?php
 $sql="SELECT file1,file2,file3,file4,file5 FROM users where email='$email'";
 $result_set=mysqli_query($con,$sql);
 
 $fl_id= array();
 while($row=mysqli_fetch_array($result_set))
 {

    $i=1;
    $r='file';
    while(!empty($row[$r.$i]))
    {
        $fl_id=$row[$r.$i];
        ?>
        

  <form id="frm" method="post" enctype="multipart/form-data" onsubmit='display("<?php echo $fl_id ?>");return false'>
        <label for="disp_fls" id="fls2" class="dotted"><a id="<?php echo $fl_id ?>" href="uploads/<?php echo $row[$r.$i] ?>" target="_blank">
        <?php echo $row[$r.$i] ?></a>  <button id="<?php echo $fl_id ?>" >plot</button> </label>
        <button id="<?php echo $i ?>" onclick='del("<?php echo $i ?>")' ><img  src='icon-delete.png' alt='Remove Item' /></button>
        </form>
        
             
    <?php

        $i++;
        if($i==6)
        break;
    }

 }
 ?>
 
 <script>
  var fl_id=6;
  function del(fl_id)
  {
    alert(fl_id);
    
  }
  //alert(fl_id);
  if(fl_id>5)
  {
        function display(id)
      {
        //alert("Click on Upload button to Plot the file");
        var re = /.json/.exec(id);
        if (re==".json") 
         {

                  h=id;
                //alert(h);
                let res=h;
                str1="uploads/"
                let str3 = str1.concat(res);
              
               // alert(str3);
                var options = {
                maxZoom: 20,
                tolerance: 3,
                debug: 0,
                style: {
                  fillColor: "#3388ff",
                  fillOpacity: "0.2",
                  color:"#EE4B2B",
                
                },
              };


      jQuery.get(str3, function(abc) {
      const obj = JSON.parse(abc);  
      console.log(obj);
      var vtLayer = L.geoJson.vt(obj, options).addTo(map);
              });
                          }     
        else
        {
        //alert(id);
        
        //alert(h);
        h=id;
        //alert(h);
       let res=h;
        str1="uploads/"
        let str3 = str1.concat(res);
        //alert(str3);
        //let result = str3.slice(6);
    
        $.get(str3, function(csvString) {

// Use PapaParse to convert string to array of objects
var data = Papa.parse(csvString, {header: true, dynamicTyping: true}).data;

// For each row in data, create a marker and add it to the map
// For each row, columns `Latitude`, `Longitude`, and `Title` are required
for (var i in data) {
  var row = data[i];

  var marker = L.marker([row.Latitude, row.Longitude], {
    opacity: 1
  }).bindPopup(row.Title);
  
  marker.addTo(map);
}

});
}

      }
    }
      </script>
 </div>

</div>

  <div id="map"></div>
  
 
</body>

<script src="leaflet-measure.js?v=<?=$version?>"></script>
    <script src="leaflet.browser.print.min.js?v=<?=$version?>"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?=$version?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js?v=<?=$version?>"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js?v=<?=$version?>"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    
    <script src="https://unpkg.com/geojson-vt@3.2.0/geojson-vt.js?v=<?=$version?>"></script>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?=$version?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js?v=<?=$version?>"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js?v=<?=$version?>"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

    <!-- leaflet js link -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js?v=<?=$version?>"></script>

 <!-- leaflet geojson vt  -->
<script src="https://unpkg.com/geojson-vt@3.2.0/geojson-vt.js?v=<?=$version?>"></script>
<script src="leaflet-geojson-vt.js?v=<?=$version?>"></script> 

<!-- leaflet geocoder -->
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="leaflet-measure.js?v=<?=$version?>"></script>
<script src="leaflet.browser.print.min.js?v=<?=$version?>"></script>  

<script src="map.js?v=<?=$version?>"></script>
   


</html>

<!-- leaflet js link 
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js?v=<?=$version?>"></script>

 leaflet geojson vt 
<script src="https://unpkg.com/geojson-vt@3.2.0/geojson-vt.js?v=<?=$version?>"></script>
<script src="leaflet-geojson-vt.js?v=<?=$version?>"></script> -->



