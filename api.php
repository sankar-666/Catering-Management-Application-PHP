<?php 
//include 'connection.php';

$con=mysqli_connect('localhost','root','','catering_management',3306);
$result=array();
if(isset($_GET['action']))
{
	extract($_GET);
    if($action=="login")
    {   $q="select * from login where username='$uname' and password='$password'";
         $res=mysqli_query($con,$q);
        
                                            
         if(mysqli_num_rows($res)>0)
         {
        	$ar=array();

        	while($row=mysqli_fetch_array($res))
            {
        		 array_push($ar,$row);
        	}
           
        	$result['status']="success";
        	$result['data']=$ar;
         }
         else
        {
        	$result['status']="failed";

        }

        echo json_encode($result);
        die();
    }

    elseif($action=="customerreg")
    {   
        $q="select * from login where username='$username'";
        $res=mysqli_query($con,$q);
        if(mysqli_num_rows($res)> 0)
        {
            $result['status']="duplicate";
        }
        else
        {
            $t1="insert into login values(null,'$username','$password','customer')";
            mysqli_query($con,$t1);
            $lid=mysqli_insert_id($GLOBALS['con']);
    
            $t="INSERT INTO `customer` VALUES(NULL,'$lid','$fname','$lname','$place','$pincode','$phone','$email')";
            mysqli_query($con,$t);
            
    
            $result['status']="success";
        }
      
         echo json_encode($result);
        die();
      
      
    }

    elseif($action=="employeereg")
    {   
        $q="select * from login where username='$username'";
        $res=mysqli_query($con,$q);
        if(mysqli_num_rows($res)> 0)
        {
            $result['status']="duplicate";
        }
        else
        {
            $t1="insert into login(username,password,usertype)values('$username','$password','employee')";
            mysqli_query($con,$t1);
            $lid=mysqli_insert_id($GLOBALS['con']);
    
            $t="INSERT INTO `employee` VALUES(NULL,'$lid','$fname','$lname','$place','$phone','$email','$adhar')";
            mysqli_query($con,$t);
            
    
            $result['status']="success";
        }
      
         echo json_encode($result);
        die();
      
      
    }

    

    elseif($action=="viewreg")
    {
        $t="SELECT * FROM `women` WHERE `log_id`='$logid'";
        $res=mysqli_query($con,$t);

       
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $result['status']="success";
            $result['data']=$ar;

           
        }else
        {
            $result['status']="failed";
        }
         $result['action']="viewreg";
        echo json_encode($result);
        die();
    }

    elseif($action=="viewnews")
    {
        $t="SELECT * FROM `news`";
        $res=mysqli_query($con,$t);

       
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $result['status']="success";
            $result['data']=$ar;

           
        }else
        {
            $result['status']="failed";
        }
         $result['action']="viewnews";
        echo json_encode($result);
        die();
    }
    


    elseif($action=="emergencyno")
    {   
        
        $t="INSERT INTO `contacts` VALUES(NULL,(select women_id from women where log_id='$logid'),'$phoneno','$pname')";
        mysqli_query($con,$t);
        

        $result['status']="success";
        
      
         echo json_encode($result);
        die();
      
      
    }

    elseif($action=="viewhospital")
    {
        $t="SELECT `hospitals`.*,(3959 * ACOS ( COS ( RADIANS('$lati') ) * COS( RADIANS( latitude) ) * COS( RADIANS( longitude ) - RADIANS('$longi') ) + SIN ( RADIANS('$lati') ) * SIN( RADIANS( latitude ) ))) AS user_distance FROM `hospitals`HAVING user_distance  < 31.068 ORDER BY user_distance ASC";
        $res=mysqli_query($con,$t);

       
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $result['status']="success";
            $result['data']=$ar;

           
        }else
        {
            $result['status']="failed";
        }
         $result['action']="viewhospital";
        echo json_encode($result);
        die();
    }

    elseif($action=="customerviewcatering")
    {
        $t="SELECT * FROM `catering_service`";
        $res=mysqli_query($con,$t);

       
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $result['status']="success";
            $result['data']=$ar;

           
        }else
        {
            $result['status']="failed";
        }
         $result['action']="customerviewcatering";
        echo json_encode($result);
        die();
    }


    elseif($action=="viewapprovedevents")
    {
        $t="SELECT * FROM `event` INNER JOIN customer USING (customer_id) INNER JOIN `ordermaster` USING (event_id) where estatus='accepted'";
        $res=mysqli_query($con,$t);

       
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $result['status']="success";
            $result['data']=$ar;

           
        }else
        {
            $result['status']="failed";
        }
         $result['action']="viewapprovedevents";
        echo json_encode($result);
        die();
    }

    elseif($action=="viewapprovedeventss")
    {
        $t="SELECT * FROM `event` inner join customer using (customer_id) where estatus='accepted' and edate like '%$search%'";
        $res=mysqli_query($con,$t);

       
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $result['status']="success";
            $result['data']=$ar;

           
        }else
        {
            $result['status']="failed";
        }
         $result['action']="viewapprovedevents";
        echo json_encode($result);
        die();
    }

    elseif($action=="customerbookevt")
    {   
        
        $t="INSERT INTO `event` VALUES (null,(select customer_id from customer where login_id='$uid'),'$cid','$event','$details','$date','$place','$lati','$longi',curdate(),'pending')";
        mysqli_query($con,$t);
        

        $result['status']="success";
        
      
         echo json_encode($result);
        die();
    }
    elseif($action=="custbookedevnts")
    {
        $t="SELECT * FROM `event` where customer_id=(select customer_id from customer where login_id='$lid')";
        $res=mysqli_query($con,$t);

       
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $result['status']="success";
            $result['data']=$ar;

           
        }else
        {
            $result['status']="failed";
        }
         $result['action']="custbookedevnts";
        echo json_encode($result);
        die();
    }

    elseif($action=="customerviewfood")
    {
        $t="SELECT * FROM `food` ";
        $res=mysqli_query($con,$t);

       
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $result['status']="success";
            $result['data']=$ar;

           
        }else
        {
            $result['status']="failed";
        }
         $result['action']="customerviewfood";
        echo json_encode($result);
        die();
    }



    // add to cart section

    elseif($action=="addtocart")
    {   

        
        // check omaster

        $total=$rate*$qty;
        $t="select * from ordermaster where status='pending' and event_id='$eid' ";
        $res=mysqli_query($con,$t);
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $oid=$ar[0]['ordermaster_id'];

           
        }else
        {
            $t1="insert into ordermaster values(null,'$eid','$cid','$total',curdate(),'pending') ";
            mysqli_query($con,$t1);
            $oid=mysqli_insert_id($GLOBALS['con']);
        }

        // check ochild


        $t="select * from orderdetail where food_id='$fid' and ordermaster_id='$oid'";
        $val=mysqli_query($con,$t);
        
        if(mysqli_num_rows($val)>0){
            $ar=array();

            while($row=mysqli_fetch_array($val)){
                 array_push($ar,$row);
            }
           
            $dtlsid=$ar[0]['orderdetail_id'];
            $t="update orderdetail set no_of_person=no_of_person+'$qty' where orderdetail_id='$dtlsid'";
            mysqli_query($con,$t);

           
        }else
        {
            $t1="insert into orderdetail values(null,'$oid','$fid','$qty') ";
            mysqli_query($con,$t1);
            $oid=mysqli_insert_id($GLOBALS['con']);
        }

        // update total 
        
        $t="update ordermaster set total=total+'$total' where ordermaster_id='$oid'";
        mysqli_query($con,$t);

        
            $result['status']="success"; 
        
        
  
        
         echo json_encode($result);
        die();
    }

    // add to cart section end



    elseif($action=="customerviewpackages")
    {
        $t="SELECT * FROM `package` ";
        $res=mysqli_query($con,$t);

       
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $result['status']="success";
            $result['data']=$ar;

           
        }else
        {
            $result['status']="failed";
        }
         $result['action']="customerviewpackages";
        echo json_encode($result);
        die();
    }

    elseif($action=="custbookpkg")
    {   
        
        $t="INSERT INTO `package_booked` VALUES (null,'$pid','$eid',curdate(),'pending')";
        mysqli_query($con,$t);
        

        $result['status']="success";
        $result['action']="custbookpkg";
        
         echo json_encode($result);
        die();
    }


    elseif($action=="cartview")
    {
        $t="SELECT * FROM `ordermaster` inner join orderdetail using (ordermaster_id) inner join food using (food_id) inner join `event` using (event_id) where status='pending' and customer_id=(select customer_id from customer where login_id='$lid') ";
        $res=mysqli_query($con,$t);

       
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $result['status']="success";
            $result['data']=$ar;

           
        }else
        {
            $result['status']="failed";
        }
         $result['action']="cartview";
        echo json_encode($result);
        die();
    }


    elseif($action=="cartbooking")
    {   
        
        $t="update ordermaster set status='booked' where ordermaster_id='$oid'";
        mysqli_query($con,$t);

         
         $t="insert into payment values(null,(select customer_id from customer where login_id='$lid'),'$amount',curdate())";
        mysqli_query($con,$t);



        

        $result['status']="success";
        
        
         echo json_encode($result);
        die();
    }


    elseif($action=="complaint")
    {   
        
       

         
        $t="insert into complaint values(null,(select customer_id from customer where login_id='$lid'),'$complaint','pending',curdate())";
        mysqli_query($con,$t);



        

        $result['status']="success";
        $result['action']="complaint";
        
        
         echo json_encode($result);
        die();
    }

    
    elseif($action=="complaintview")
    {
        $t="SELECT * FROM complaint where customer_id=(select customer_id from customer where login_id='$lid') ";
        $res=mysqli_query($con,$t);

       
        if(mysqli_num_rows($res)>0){
            $ar=array();

            while($row=mysqli_fetch_array($res)){
                 array_push($ar,$row);
            }
            $result['status']="success";
            $result['data']=$ar;

           
        }else
        {
            $result['status']="failed";
        }
         $result['action']="complaintview";
        echo json_encode($result);
        die();
    }



}