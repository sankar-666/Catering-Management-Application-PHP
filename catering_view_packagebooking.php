<?php include 'catering_header.php';
$eid=$_SESSION['catering_id'];
extract($_GET); ?>
<?php 
extract($_GET);
if (isset($_GET['aid']))
 {
	extract($_GET);
	$q1="update package_booked set p_status='accepted' where pbooked_id='$aid'";
	update($q1);
	alert("accepted sucessfully");
	return redirect("catering_view_packagebooking.php");
}
if (isset($_GET['rid']))
{
	extract($_GET);
	$q2="update package_booked set p_status='rejected' where pbooked_id='$rid'";
	update($q2);
	alert("rejected!");
	return redirect("catering_view_packagebooking.php");
}
 ?>

<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="">

        
<form method="post">
	<center>
		<br><br><br><br><br><br><br>
		<h1> PACKAGE BOOKINGS</h1>
		<table class="table" style="width:700px;color:white;">
			<tr>
				<th>Slno</th>
				<th>Package</th>
				<th>Event</th>
				<th>Event Date</th>
				<th>Place</th>
				<th>Total Amount</th>
				
				<th>Date</th>
				<th>Status</th>
				
			</tr>

			<?php 

 		$sq="SELECT * FROM 	package_booked INNER JOIN PACKAGE USING(package_id) INNER JOIN EVENT USING(event_id) where package.catering_id='$eid'";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $row['package_name'] ?></td>
	 			<td><?php echo $row['event'] ?></td>
				<td><?php echo $row['edate'] ?></td>
				<td><?php echo $row['place'] ?></td>
				<td><?php echo $row['total_amount'] ?></td>
				
				<td><?php echo $row['date'] ?></td>
				<?php 
				if ($row['p_status']=="pending")
				 {
					
				 ?>
				 <td><a href="?aid=<?php echo $row['event_id'] ?>" class="btn btn-success">Accept</a></td>
				 <td><a href="?rid=<?php echo $row['event_id'] ?>" class="btn btn-danger">Reject</a></td>
				 <?php  	
			 }
			 else
			 { 

			 ?>

				<td><?php echo $row['p_status'] ?></td>
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