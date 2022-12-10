<?php include 'catering_header.php';
$eid=$_SESSION['catering_id'];
extract($_GET);
?>
<?php 
extract($_GET);
if (isset($_GET['aid']))
 {
	extract($_GET);
	$q1="update request set r_status='accepted' where request_id='$aid'";
	update($q1);
	alert("accepted sucessfully");
	return redirect("catering_view_employeerequest.php");
}
if (isset($_GET['rid']))
{
	extract($_GET);
	$q2="update request set r_status='rejected' where request_id='$rid'";
	update($q2);
	alert("rejected!");
	return redirect("catering_view_employeerequest.php");
}
 ?>

<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="">

       

<form method="post">
	<center>
		<br><br><br><br><br><br>
		<h1> EMPLOYEE REQUESTS</h1>
		<table class="table" style="width:700px;color:white;">
			<tr>
				<th>Slno</th>
				<th>Employee Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Event</th>				
				<th>Event Date</th>
				<th>Status</th>
				
			</tr>

			<?php 

 		$sq="SELECT * FROM request INNER JOIN employee USING(employee_id) INNER JOIN ordermaster USING(ordermaster_id) INNER JOIN `event` USING(event_id) where ordermaster.catering_id='$eid'";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
				<td><?php echo $row['fname'] ?>   <?php echo $row['lname'] ?></td>
	 			<td><?php echo $row['email'] ?></td>
				<td><?php echo $row['phone'] ?></td>
				<td><?php echo $row['event'] ?></td>
				
				
				<td><?php echo $row['edate'] ?></td>
				<?php 
				if ($row['r_status']=="pending")
				 {
					
				 ?>
				 <td><a href="?aid=<?php echo $row['request_id'] ?>" class="btn btn btn-success">Accept</a></td>
				 <td><a href="?rid=<?php echo $row['request_id'] ?>" class="btn btn-danger">Reject</a></td>
				 <?php  	
			 }
			 else
			 { 

			 ?>

				<td><?php echo $row['r_status'] ?></td>
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
    </section>
    <!-- End About Section -->
<br><br><br><br><br><br
<?php include 'footer.php' ?>