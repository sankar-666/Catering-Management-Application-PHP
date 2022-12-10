<?php include 'catering_header.php';
$eid=$_SESSION['catering_id'];
extract($_GET); ?>
<?php 
extract($_GET);
if (isset($_GET['aid']))
 {
	extract($_GET);
	$q1="update event set estatus='accepted' where event_id='$aid'";
	update($q1);
	alert("accepted sucessfully");
	return redirect("catering_view_orders.php");
}
if (isset($_GET['rid']))
{
	extract($_GET);
	$q2="update event set estatus='rejected' where event_id='$rid'";
	update($q2);
	alert("rejected!");
	return redirect("catering_view_orders.php");
}
 ?>
<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="">

        

<form method="post">
	<center>
		<br><br><br><br><br>
		<h1> ORDER DETAILS</h1>
		<table class="table" style="width: 700px;color: white;">
			<tr>
				<th>Slno</th>
				<th>Event</th>
				<th>Event Date</th>
				<th>Place</th>
				<th>No of Person</th>
				<th>Location</th>
				<th>Date</th>
				<th>Food</th>
				<th>Status</th>
				
			</tr>

			<?php 

 		$sq="select * from 	ordermaster inner join orderdetail using(ordermaster_id) inner join food using(food_id)inner join event using(event_id) where ordermaster.catering_id='$eid' ";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
	 			<td><?php echo $row['event'] ?></td>
				<td><?php echo $row['edate'] ?></td>
				<td><?php echo $row['place'] ?></td>
				<td><?php echo $row['no_of_person'] ?></td>
				<td><a href="http://www.google.com/maps?q=<?php echo $row['latitude']  ?>&<?php echo $row['longitude'] ?>" class="btn btn-info">Click Me</a></td>
				<td><?php echo $row['date'] ?></td>
				<td><?php echo $row['food'] ?></td>
				<?php 
				if ($row['estatus']=="pending")
				 {
					
				 ?>
				 <td><a href="?aid=<?php echo $row['event_id'] ?>"class="btn btn-success">Accept</a></td>
				 <td><a href="?rid=<?php echo $row['event_id'] ?>" class="btn btn-danger">Reject</a></td>
				 <?php  	
			 }
			 else
			 { 

			 ?>

				<td><?php echo $row['estatus'] ?></td>
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
<br><br><br><br><br><br
<?php include 'footer.php' ?>