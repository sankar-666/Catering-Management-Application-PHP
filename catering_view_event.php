<?php include 'catering_header.php';
 $eid=$_SESSION['catering_id'];
extract($_GET);
?>

<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="">

       

<form method="post">
	<center>
		<br><br><br><br><b>
		<h1> EVENTS</h1>
		<table class="table" style="width:700px;color:white;">
			<tr>
				<th>Slno</th>
				<th>Event</th>
				<th>Details</th>
				<th>Event Date</th>
				<th>Place</th>
				<th>Location</th>
				<th>Date</th>
				
			</tr>

			<?php 

 		$sq="select * from 	event where catering_id='$eid'";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
	 			<td><?php echo $row['event'] ?></td>
				<td><?php echo $row['details'] ?></td>
				<td><?php echo $row['edate'] ?></td>
				<td><?php echo $row['place'] ?></td>
				<td><a href="http://www.google.com/maps?q=<?php echo $row['latitude']  ?>&<?php echo $row['longitude'] ?>" class="btn btn-info">Click Me</a></td>
				<td><?php echo $row['date'] ?></td>
				<td><a href="catering_view_orders.php?event_id=<?php echo $row['event_id'] ?>eid=<?php echo $row['catering_id'] ?>" class="btn btn-danger">View Orders</a></td>
				<td><a href="catering_view_packagebooking.php?event_id=<?php echo $row['event_id'] ?>&eid=<?php echo $row['catering_id'] ?>" class="btn btn-success">View Package Booking</a></td>
 					
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