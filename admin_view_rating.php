<?php include 'admin_header.php';
extract($_GET);


 ?>
<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="">

        

<form method="post">
	<center>
		<br><br><br><br><br><br><br>
		<h1>Rating</h1>
		<table class="table" style="width:700px;color:white;">
			<tr>
				<th>Slno</th>
				<th>Catering Name</th>
				<th>Customer Name</th>
				<th>Rating</th>
				<th>Date</th>
			</tr>

			<?php 

 		$sq="select * from rating inner join customer using(customer_id)inner join catering_service using(catering_id)  where catering_id='$eid' order by rated desc";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
	 			<td><?php echo $row['catering_name'] ?></td>
				<td><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></td>
				<td><?php echo $row['rated'] ?></td>
				<td><?php echo $row['date'] ?></td>
				
 					
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


<br><br><br><br><br><br>
<?php include 'footer.php' ?>