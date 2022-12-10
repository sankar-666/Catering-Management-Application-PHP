<?php include 'public_header.php' ?>

<!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
        	<br><br><br><br>
          <h2> Catering Services</h2>
          <p>Our Catering Services</p>
        </div>

        <div class="row">
	<?php 

 		$sq="select * from 	catering_service inner join rating using(catering_id)ORDER BY rated desc ";
 		$res=select($sq);
 		$i=1;

 		foreach ($res as $row) 
 		{
 			
 	
 		 ?>
			
          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span><?php echo $i++; ?></span>
              <h4><?php echo $row['catering_name'] ?></h4>
              <h5>rated:<?php echo $row['rated'] ?></h5>
              <p ><a class="btn btn-success" href="public_view_food.php?id=<?php echo $row['catering_id'] ?>"> Food Details</a></p>
              <p><a class="btn btn-danger" href="public_view_package.php?id=<?php echo $row['catering_id'] ?>">Package Details</a></p>
            </div>
          </div>
        <?php 

 	}
 		 ?>
        </div>

      </div>
    </section><!-- End Why Us Section -->


<?php include 'footer.php' ?>