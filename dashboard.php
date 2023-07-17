<?php
session_start();
$name = $_SESSION['user_name'];
$id = $_SESSION['id'];
$array = array();
include 'connection.php';
if(empty($id))
{
    header("Location: index.php"); 
}

if(isset($_REQUEST['sbt-btn']))
{
$date = $_POST['dates']; 
$booktitle = implode(", ", $_POST['booktitle']);
$booksold = implode(", ", $_POST['booksold']);
$bookprice = implode(", ", $_POST['bookprice']);
$directsales = implode(", ", $_POST['directsales']);
$indirectsales = implode(", ", $_POST['indirectsales']);

$date_exist = mysqli_query($conn,"select * from user_work_report where date='$date' and user_id='$id'");
$count = mysqli_num_rows($date_exist);
if($count>0)
{ ?>
<script>
alert("You have already submitted <?php echo date('jS F, Y',strtotime($date)); ?> Book Details");
</script>
<?php }
else {
$insert_work_report = mysqli_query($conn, "insert into user_work_report set user_id='$id', date='$date', booktitle='$booktitle', booksold='$booksold', bookprice='$bookprice', directsales='$directsales', indirectsales='$indirectsales'");
if($insert_work_report>0)
{ ?>
<script>
    alert("Book Details Saved successfully.");
</script>
<?php } else
{?>
<script>
    alert("Book Details not saved.");
</script>
<?php } 
}
}
?>

<?php include('include/header.php'); ?>

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
                                                <input class="form-control" type="date" name="dates" required>
                                            </div>
                                             <label class="col-lg-4 col-form-label" for="val-date">BOOK NAME<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <br>
                                               <input class="form-control" name="booktitle[]" id="booktitle"  value="<?php if(isset($booktitle)){echo $booktitle; }?>">
                                              
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
    
  <button class="tablinks" onclick="openCity(event, 'Details')" id="OpenCal"> <i class="fas fa-table"></i> View Details</button>
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
<?php include('include/dashboard-footer.php'); ?>