<?php
// Include the database connection file
require_once("../connection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($conn,"SELECT * FROM tbl_user WHERE id = '$id'");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_array($result);
$name = $resultData['firstname'];
$lastname = $resultData['lastname'];
$dept = $resultData['department'];
$email = $resultData['emailid'];
$password = $resultData['password'];
$status = $resultData['status'];
$setid = $resultData['id'];


if(isset($_REQUEST['sbt-btn']))
{
   
	$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department = $_POST['department'];
    $emailid = $_POST['emailid'];
    $pwd = md5($_POST['pwd']);

    $insert_employee = mysqli_query($conn," update tbl_user set firstname='$firstname', lastname='$lastname', department='$department', emailid='$emailid', password='$pwd'");

    if($insert_employee > 0)
    {
        ?>
<script type="text/javascript">
    alert("Employee added successfully.")
</script>
<?php
header("location: view-employee.php");
exit();
}
}
?>

<?php include('include/header.php'); ?>
  <div id="wrapper">

    <?php include('include/side-bar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">
<div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">

        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-info-circle"></i>
            Submit Book Details</div>
            <form method="post" class="form-valide">
                
                
                <div class="form-group row card-body">
                    <label class="col-lg-4 col-form-label" for="val-date">Select Date <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="hidden"  name="id" required>
                                            </div>
                                             <label class="col-lg-4 col-form-label" for="val-date">BOOK NAME<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <br>
                                               <input class="form-control" name="firstname" id="firstname"  value="<?php if(isset($name)){echo $name; }?>">
                                              
                                            </div>
                                            
                                             <label class="col-lg-4 col-form-label" for="val-date">NO. OF BOOK SOLD<span class="text-danger">*</span>
                                            </label>
                                           
                                            <div class="col-lg-8">
                                                <br>
                                               <input class="form-control" name="booksold[]" id="booksold" value="<?php if(isset($booksold)){ echo $booksold; }?>">
                                            </div>
											
											 <label class="col-lg-4 col-form-label" for="val-date">BOOK PRICE<span class="text-danger">*</span>
                                            </label>
                                           
                                            <div class="col-lg-8">
                                                <br>
                                               <input class="form-control" name="bookprice[]" id="bookprice" value="<?php if(isset($bookprice)){ echo $bookprice; }?>">
                                            </div>
											
											 <label class="col-lg-4 col-form-label" for="val-date">DIRECT SALES<span class="text-danger">*</span>
                                            </label>
                                           
                                            <div class="col-lg-8">
                                                <br>
                                               <input class="form-control" name="directsales[]" id="directsales" value="<?php if(isset($directsales)){ echo $directsales; }?>">
                                            </div>
											
											 <label class="col-lg-4 col-form-label" for="val-date">INDIRECT SALES<span class="text-danger">*</span>
                                            </label>
                                           
                                            <div class="col-lg-8">
                                                <br>
                                               <input class="form-control" name="indirectsales[]" id="indirectsales" value="<?php if(isset($indirectsales)){ echo $indirectsales; }?>">
                                            </div>
                                            <br>
                                            
                                        </div>
                                        <div class="col-lg-8 ml-auto">
                                                <input type="submit" name="sbt-btn" class="btn btn-primary" onclick="return doSubmit();">
                                            </div>
                                            <br>
                  </form>
        </div>
        
     <div class="card mb-3">
          <div class="card-header">
              <div class="tab ">
    
  
</div>
            
</div>    

<div id="Details" class="tabcontent">
  <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                            <tr>
                                                <th>SI. NO.</th>
                                                <th>Date</th>
                                                <th>BOOK NAME</th>
                                                <th>NO. OF BOOK SOLD</th>
                                                <th>BOOK PRICE</th>
                                                <th>DIRECT SALES</th>
                                                <th>INDIRECT SALES</th>
                                                </tr>
                                        </thead>
                                        <tbody>
										<?php
										$i=1;
										$select_query = mysqli_query( $conn, "select * from user_work_report where user_id='$id'");
										while($row = mysqli_fetch_array($select_query))
										{
											$date = $row['date'];
											$booktitle = $row['booktitle'];
											$booksold = $row['booksold'];
											$bookprice = $row['bookprice'];
											$directsales = $row['directsales'];
											$indirectsales = $row['indirectsales'];
											
										?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $date;?></td>
                                                <td><?php echo $booktitle;?></td>
                                                <td><?php echo $booksold; ?></td>
                                                <td><?php echo $bookprice; ?></td>
                                                <td><?php echo $directsales; ?></td>
                                                <td><?php echo $indirectsales; ?></td>
                                                </tr>
										<?php $i++; } ?>
                                           
                                           
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    
      
      </div>
      <!-- /.container-fluid -->


    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<?php include('include/footer.php'); ?>