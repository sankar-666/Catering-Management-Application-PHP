<?php include 'catering_header.php';
extract($_GET);
$eid=$_SESSION['catering_id'];
 ?>

<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" style="">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <!-- <div class="about-img">
              <img src="assets/img/about.jpg" alt="">
            </div> -->
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">

<form method="post">
	<center>
		<br><br><br>
		<h1> RATING</h1>
		<table class="table" style="width:700px;color:white;">
			<tr>
				<th>Slno</th>
				<th>Username</th>
				<th>Rating</th>
				<th>Date</th>
			</tr>

			<?php 

 		$sq="select * from 	rating inner join customer using(customer_id) where catering_id='$eid' order by rated desc";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			<tr>
				<td><?php echo $i++; ?></td>
	 			
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
<br><br><br><br>
<?php include 'footer.php' ?>