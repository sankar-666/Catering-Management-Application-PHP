<?php include 'catering_header.php';
$eid=$_SESSION['catering_id'];
extract($_GET);
?>

<?php 
if (isset($_POST['submit']))
 {	
 	extract($_POST);
	$q5="insert into food values(null,'$eid','$food','$rate','$no_of_quantity','$type')";
	insert($q5);
	alert("successfull");
	return redirect("catering_manage_food.php");
}

if (isset($_GET['did']))
{
	extract($_GET);
	$q1="delete from food where food_id='$did'";
	delete($q1);
	alert("deleted successfully");
	return redirect("catering_manage_food.php");
}
if (isset($_GET['uid']))
 {
	extract($_GET);
	$q4="select * from food where food_id='$uid'";
	$r=select($q4);
	}


if (isset($_POST['update']))
 {
	extract($_POST);
	$q3="update food set  food='$food',rate='$rate',no_of_quantity='$no_of_quantity',type='$type' where food_id='$uid'";
	update($q3);
	alert("updated successfully");
	return redirect("catering_manage_food.php");
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

				<?php 
if (isset($_GET['uid'])) {
	

 ?>

		<h1>UPDATE FOOD</h1>
		<table class="table" style="width:700px;color: white;">
			
			<tr>
				<th>Food</th>
				<td><input type="text" value="<?php echo $r[0]['food'] ?>" required name="food" class="form-control"></td>
			</tr>
			<tr>
				<th>Rate</th>
				<td><input type="text" value="<?php echo $r[0]['rate'] ?>" required name="rate" class="form-control"></td>
			</tr>
			<tr>
				<th>No_of_Quantity</th>
				<td><input type="text" value="<?php echo $r[0]['no_of_quantity'] ?>" required name="no_of_quantity" class="form-control"></td>
			</tr>
			<tr>
				<th>Type</th>
				<td><input type="text" value="<?php echo $r[0]['type'] ?>" required name="type" class="form-control"></td>
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
 <br><br>
 <h1>ADD FOOD</h1>
		<table class="table" style="width:700px;color:white;">
		
			<tr>
				<th>Food</th>
				<td><input type="text" required name="food" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Rate</th>
				<td><input type="text"  required name="rate" class="form-control" required="" ></td>
			</tr>
			<tr>
				<th>No_of_Quantity</th>
				<td><input type="number" required name="no_of_quantity" class="form-control" required=""></td>
			</tr>
			<tr>
				<th>Type</th>
				<td><input type="text" required name="type" class="form-control" required=""></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" class="btn btn-primary btn-sm"  value="Submit" name="submit"></td>
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

       
		<h1>FOOD</h1>
		<table class="table" style="width:700px;color:white;">
			<tr>
				<th>Slno</th>
				
				<th>Food</th>
				<th>Rate</th>
				<th>No_of_Quantity</th>
				<th>Type</th>
			</tr>
			<?php 

 		$sq="select * from 	food inner join catering_service using(catering_id) where catering_id='$eid'";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
				
	 			<td><?php echo $row['food'] ?></td>
				<td><?php echo $row['rate'] ?></td>
				<td><?php echo $row['no_of_quantity'] ?></td>
				<td><?php echo $row['type'] ?></td>
				<td><a href="?uid=<?php echo $row['food_id'] ?> " class="btn btn-success btn-sm" >Update</a></td>
				<td><a href="?did=<?php echo $row['food_id'] ?> " class="btn btn-danger btn-sm" >Delete</a></td>
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