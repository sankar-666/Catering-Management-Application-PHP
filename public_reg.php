<?php include 'public_header.php'?>
<?php
if (isset($_POST['submit'])) 
{
  extract($_POST);

    $qy="select * from login where username='$uname' and password='$pword'";
    $r=select($qy);
    if (sizeof($r)>0) 
    {
       alert("User is already Exist");
    }

  else{
    $ql="insert into login values(null,'$uname','$pword','catering')";
    $r=insert($ql);
    
    $qu="insert into catering_service values(null,'$r','$c_name','$place','$phone','$email','$lat','$lon','$license')";
    insert($qu);
    alert("registered successfully");
    return redirect("public_home.php");  
    } 
  
  }
  


?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD3MPnSnyWwNmpnVEFkaddVvy_GWtxSejs&sensor=false"></script>
    <script type="text/javascript">
        // window.onload = function () {
          function myFunction(){
            var mapOptions = {
                center: new google.maps.LatLng(9.9763482, 76.286272),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {
                alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
              document.getElementById('lat').value = e.latLng.lat();
                document.getElementById('lon').value = e.latLng.lng();
           

            });
        }
    </script>

<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 1000px;">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<form method="post">
	<center>
		<h1>Catering Registration</h1>
		<table class="table" style="width:700px">
			<tr>
				<th style="color: white;">Catering name</th>
				<td><input type="text"  required name="c_name" class="form-control"pattern="[A-Za-z ]+$"></td>
			</tr>
			<tr>
				<th style="color: white;">Place</th>
				<td><input type="text" required name="place" class="form-control"pattern="[A-Za-z ]+$"></td>
			</tr>
			<tr>
				<th style="color: white;">Phone</th>
				<td><input type="text"  required name="phone"class="form-control"pattern="[0-9]{10}" minlength="10" maxlength="10"></td>
			</tr>
			<tr>
				<th style="color: white;">Email</th>
				<td><input type="email"  required name="email"class="form-control"></td>
			</tr>
			<tr>
				<th style="color: white;">Latitude</th>
	      <td><input type="text" name="lat"   id="lat" class="form-control">
	      <a class="btn btn-success" onclick="myFunction();"><b>View Map</b></a>
	      </td>
			</tr>

			<tr>
				<th style="color: white;">Longitude</th>
			    <td ><br><input type="text" name="lon"   id="lon" class="form-control"></td>
			</tr>
			<tr>
				<th style="color: white;">License Number</th>
				<td><input type="text"  required name="license"class="form-control"></td>
			</tr>
			<tr>
				<th style="color: white;">Username</th>
				<td><input type="text"  required name="uname"class="form-control"pattern="[A-Za-z ]+$"></td>
			</tr>
			<tr>
				<th style="color: white;">Password</th>
				<td><input type="password"  required name="pword"class="form-control" maxlength="8"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" value="register" name="submit" class="btn btn-primary btn-lg "></td>
			</tr>
		</table>
		<table>
        <tr>

<td>
	 <div id="dvMap" style="width: 600px; height: 400px"></div>

	</td>

			</tr>
    </table>
	</center>
</form>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>
</div></div></div></section>

<?php include 'footer.php' ?>
