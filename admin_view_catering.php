<?php include 'admin_header.php' ?>
  <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="">

        
    
          <form method="post">
	<center>
		<br><br><br><br><br><br>
		<h1> Catering Services</h1>
		<table class="table" style="width:700px;color: white;">
			<tr>
				<th>Slno</th>
				<th>Catering Name</th>
				<th>Place</th>
				<th>Phone</th>
				<th>Email</th>
				<th>License No</th>
				<th>Location</th>
				
				
			</tr>

			<?php 

 		$sq="select * from 	catering_service ";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
	 			<td><?php echo $row['catering_name'] ?></td>
				<td><?php echo $row['place'] ?></td>
				<td><?php echo $row['phone'] ?></td>
				<td><?php echo $row['email'] ?></td>
				<td><?php echo $row['license_number'] ?></td>
				<td><a class="btn btn-info" href="http://www.google.com/maps?q=<?php echo $row['latitude']  ?>&<?php echo $row['longitude']  ?>">Click Me</a></td>
				
				<td><a href="admin_view_rating.php?eid=<?php echo $row['catering_id'] ?>" class="btn btn-success">view rating</a></td>

				

 					
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