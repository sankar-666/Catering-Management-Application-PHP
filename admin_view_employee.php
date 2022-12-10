<?php include 'admin_header.php'?>
<?php 
extract($_GET);
if (isset($_GET['aid']))
 {
	extract($_GET);
	$q1="update login set usertype='employee' where login_id='$aid'";
	update($q1);
	alert("accepted sucessfully");
	return redirect("admin_view_employee.php");
}
if (isset($_GET['rid']))
{
	extract($_GET);
	$q2="update login set usertype='rejected' where login_id='$rid'";
	update($q2);
	alert("rejected!");
	return redirect("admin_view_employee.php");
}
 ?>





 <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="">



<form method="post">
	<center>
		<br><br><br><br><br><br><br><br>
		<h1>Catering Employees</h1>
		<table class="table" style="width:700px;color:white;">
			<tr>
				<th>Slno</th>
				<th>Employee Name</th>
				<th>Place</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Aadhar No</th>
				
			</tr>

			<?php 

 		$sq="select * from 	employee inner join login using(login_id)";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
	 			<td><?php echo $row['fname'] ?>  <?php echo $row['lname'] ?></td>
				<td><?php echo $row['place'] ?></td>
				<td><?php echo $row['phone'] ?></td>
				<td><?php echo $row['email'] ?></td>
				<td><?php echo $row['aadhar_no'] ?></td>
				<?php 
				if ($row['usertype']=="pending")
				 {
					
				 ?>
				 <td><a href="?aid=<?php echo $row['login_id'] ?>" class="btn btn btn-success">Accept</a></td>
				 <td><a href="?rid=<?php echo $row['login_id'] ?>" class="btn btn-danger">Reject</a></td>
				 <?php  	
			 }
			 else
			 { 

			 ?>

				<td><?php echo $row['usertype'] ?></td>
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


<br><br><br><br><br><br>
<?php include 'footer.php' ?>