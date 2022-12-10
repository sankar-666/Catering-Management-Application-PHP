<?php include 'admin_header.php';
extract($_GET);

if (isset($_POST['submit']))
 {
	extract($_POST);
	$q1="update complaint set replay='$replay' where complaint_id='$id'";
	update($q1);
	alert("replied successfully");
	return redirect("admin_view_complaint.php");
}
 ?>
 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <form method="post">
 <center>
 	<form method="post">
 	<h1>Send Replay</h1>
 	<table class="table" style="width:700px;color:white;">
 	<tr>
 		<th>Replay</th>
 		<td><input type="text" name="replay" required="" class="form-control" pattern="[A-Za-z ]+$"></td>
 	</tr>
 	<tr>
 		<td align="center" colspan="2"><input type="submit" name="submit" value="Send" class="btn btn-danger"></td>
 	</tr>
 </table>
</form>
 </center>
 <!-- <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
          </div> -->
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <!-- <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a> -->
        </div>

      </div>
    </div>
  </section><!-- End Hero -->
 

 <?php include 'footer.php' ?>