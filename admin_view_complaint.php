<?php include 'admin_header.php' ?>
<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="">

       


<form method="post">
	<center>
		<br><br><br><br><br><br><br>
		<h1>Complaints</h1>
		<table class="table" style="width:700px;color:white;">
			<tr>
				<th>Slno</th>
				<th>Customer Name</th>
				<th>Complaint</th>
				<th>Date</th>
				<th>Replay</th>
				
				
			</tr>

			<?php 

 		$sq="select * from 	complaint inner join customer using (customer_id) ";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
	 			<td><?php echo $row['fname'] ?> <?php echo $row['lname'] ?></td>
				<td><?php echo $row['complaint'] ?></td>
				
				<td><?php echo $row['date'] ?></td>
				<?php 
				if ($row['replay']=="pending")
				 {
					
				 ?>
				<td><a class="btn btn-danger" href="admin_send_replay.php?id=<?php echo $row['complaint_id'] ?>">Send Replay</a></td>
 				 <?php  	
			 }
			 else
			 { 

			 ?>

				<td><?php echo $row['replay'] ?></td>
				<?php 
			}
				 ?>	
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


<br><br><br><br><br><br><br><br>
<?php include 'footer.php' ?>