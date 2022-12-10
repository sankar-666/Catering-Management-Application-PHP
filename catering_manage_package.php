<?php include 'catering_header.php' ;
$eid=$_SESSION['catering_id'];
extract($_GET);
?>
<?php 
if (isset($_POST['submit']))
 {	
 	extract($_POST);
	$q5="insert into package values(null,'$food',$eid,'$package_name','$package_details','$total_no_person','$total_amount','pending')";
	insert($q5);
	alert("successfull");
	return redirect("catering_manage_package.php");
}

if (isset($_GET['did']))
{
	extract($_GET);
	$q1="delete from package where package_id='$did'";
	delete($q1);
	alert("deleted successfully");
	return redirect("catering_manage_package.php");
}
if (isset($_GET['uid']))
 {
	extract($_GET);
	$q4="select * from package where package_id='$uid'";
	$r=select($q4);
	}


if (isset($_POST['update']))
 {
	extract($_POST);
	$q3="update package set package_name='$package_name',package_details='$package_details',total_no_person='$total_no_person',total_amount='$total_amount' where package_id='$uid'";
	update($q3);
	 alert("updated successfully");
	 return redirect("catering_manage_package.php");
}
 ?>
 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
<form method="post">
	<center>
		<br><br><br>
<form method="post">
	<center>

				<?php 
if (isset($_GET['uid'])) {
	

 ?>

		<h1>UPDATE PACKAGE</h1>
		<table class="table" style="width:700px;color:white;">
			<th>Food</th>
			<td><select name="food" class="form-control" required="">   
 				<?php 
 				$q1="select * from food";
 				$res1=select($q1);
 				foreach ($res1 as $row)
 				 {
 				?>

 				<option value="<?php echo $row['food_id'] ?>"><?php echo $row['food'] ?></option>
 				<?php  
 				}
 				 ?>
 				
 			</select></td>
 		</tr>
 	
			<tr>
				<th>Package_Name</th>
				<td><input type="text" value="<?php echo $r[0]['package_name'] ?>" required name="package_name" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Package_Details</th>
				<td><input type="text" value="<?php echo $r[0]['package_details'] ?>" required name="package_details" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Total no Person</th>
				<td><input type="text" value="<?php echo $r[0]['total_no_person'] ?>" required name="total_no_person" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Total Amount</th>
				<td><input type="text" value="<?php echo $r[0]['total_amount'] ?>" required name="total_amount" class="form-control" required=""></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" class="btn btn-primary btn-sm"  value="update" name="update"></td>
			</tr>
		</table>
<?php 

}

else
{
 ?>
 <h1>ADD PACKAGE</h1>
	<table class="table" style="width:700px;color:white;">
			<th>Food</th>
			<td><select name="food" class="form-control" required="">   
 				<?php 
 				$q1="select * from food";
 				$res1=select($q1);
 				foreach ($res1 as $row)
 				 {
 				?>

 				<option value="<?php echo $row['food_id'] ?>"><?php echo $row['food'] ?></option>
 				<?php  
 				}
 				 ?>
 				
 			</select></td>
 		</tr> 
 		
			<tr>
				<th>Package_Name</th>
				<td><input type="text" required name="package_name" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Package_Details</th>
				<td><input type="text"  required name="package_details" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Total no Person</th>
				<td><input type="number" required name="total_no_person" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Total Amount</th>
				<td><input type="text" required name="total_amount" class="form-control" required=""></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" class="btn btn-primary btn-sm"  value="submit" name="submit"></td>
			</tr>
		</table>
<?php 

}

 ?>
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


<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="">

       
		<h1>PACKAGE</h1>
		<table class="table" style="width:700PX;color:white;">
			<tr>
				<th>Slno</th>
				<th>Food</th>
				
				<th>Package Name</th>
				<th>Pacakage Detail</th>
				<th>Total No Person</th>
				<th>Total Amount</th>
				
			</tr>
			<?php 

 		$sq="SELECT * FROM package INNER JOIN catering_service USING(catering_id) INNER JOIN food USING(food_id) where catering_service.catering_id='$eid'";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
				
	 			<td><?php echo $row['food'] ?></td>
	 			
				<td><?php echo $row['package_name'] ?></td>
				<td><?php echo $row['package_details'] ?></td>
				<td><?php echo $row['total_no_person'] ?></td>
				<td><?php echo $row['total_amount'] ?></td>
				<td><a href="?uid=<?php echo $row['package_id'] ?> " class="btn btn-success btn-sm" >Update</a></td>
				<td><a href="?did=<?php echo $row['package_id'] ?> " class="btn btn-danger btn-sm" >Delete</a></td>
			</tr>

			
			<?php 

 		}


 		 ?>
		</table>
	</center>
</form>
</div>
        </div>

      </div>
    </section><!-- End About Section -->
<br><br><br><br>
<?php include 'footer.php' ?>