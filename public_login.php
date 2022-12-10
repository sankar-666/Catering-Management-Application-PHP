<?php include 'public_header.php'?>
<?php
if (isset($_POST['submit'])) 
{
	extract($_POST);
	$q1="select * from login where username='$uname' and password='$pword'";
	$res=select($q1);
	if (sizeof($res)>0) 
	{

		$_SESSION['lid']=$res[0]['login_id'];
		$lid=$_SESSION['lid'];
		if ($res[0]['usertype']=="admin") 
		{
			alert("login successfully");
			return redirect("admin_home.php");
		}
		if($res[0]['usertype']=="catering")
		{
			$q1="select * from catering_service where login_id='$lid'";
			$res1=select($q1);
			if (sizeof($res1)>0)
			 {
			 	$_SESSION['catering_id']=$res1[0]['catering_id'];
			 	$eid=$_SESSION['catering_id'];
			 	alert("login successfully");
				return redirect("catering_home.php");
			}
			
		}
		
    
	}
	else
	{
		alert("invalid username or password");
	}
}




?>



<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <form method="post">
	<center>
		<h1>LOGIN</h1>
		<table class="table" style="width:700px">
			<tr>
				<th style="color: white;">Username</th>
				<td><input type="text" placeholder="enter username" class="form-control" required=""  name="uname"></td>
			</tr>
			<tr>
				<th style="color: white;">Password</th>
				<td><input type="password" placeholder="enter password" class="form-control" required="" name="pword"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" value="login" class="btn btn-danger btn-lg" name="submit"></td>
			</tr>
		</table>
	</center>
</form>

          <!-- <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
          </div> -->
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <!-- <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a> -->
        </div>

      </div>
    </div>
  </section><!-- End Hero -->



<?php include 'footer.php'?>





								










