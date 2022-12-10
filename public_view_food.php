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
		
		<h1>FOOD</h1>
		<table class="table" style="width:700px;color:white;">
			<tr>
				<th>Slno</th>
				
				<th>Food</th>
				<th>Rate</th>
				
				<th>Type</th>
			</tr>
			<?php 

 		$sq="select * from 	food inner join catering_service using(catering_id) where catering_id='$id'";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
				
	 			<td><?php echo $row['food'] ?></td>
				<td><?php echo $row['rate'] ?></td>
				
				<td><?php echo $row['type'] ?></td>
				
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