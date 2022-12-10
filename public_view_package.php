<?php include 'public_header.php';
 $eid=$_SESSION['catering_id'];
extract($_GET);
?>


<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="">

        
<form method="post">
	<br><br><br><br><br><br>
	<center>
		
		<h1>PACKAGES</h1>
		<table class="table" style="width:700px;color:white;">
			<tr>
				<th>Slno</th>
				<th>Package Name</th>
				<th>Pacakage Detail</th>
				<th>Total No Person</th>
				<th>Total Amount</th>
				
			</tr>
			<?php 

 		$sq="SELECT * FROM package where catering_id='$id'";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
				
	 			
				<td><?php echo $row['package_name'] ?></td>
				<td><?php echo $row['package_details'] ?></td>
				<td><?php echo $row['total_no_person'] ?></td>
				<td><?php echo $row['total_amount'] ?></td>
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
<br><br><br><br><br><br><br><br><br><br><br>

<?php include 'footer.php' ?>