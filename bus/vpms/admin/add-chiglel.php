<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $dirname=$_POST['dirname'];
    $dirmore=$_POST['dirmore'];
    $busnum=$_POST['busnum'];
    $dirownername=$_POST['dirownername'];
    $dircomp=$_POST['dircomp'];
    $catname=$_POST['catename'];
    
     
    $query=mysqli_query($con, "insert into  tbldirection(DirName,DirMore,BusNum,DirOwnerName,DirComp) value('$dirname','$dirmore','$busnum','$dirownername','$dircomp')");
    if ($query) {
    echo "<script>alert('Автобусны чиглэл амжилттай бүртгэгдлээ');</script>";
echo "<script>window.location.href='manage-chiglel.php'</script>";
  }
  else
    {
     
       echo "<script>alert('Ямар нэг зүйл буруу байна. Та дахин оролдоно уу...');</script>";
    }

  
}
  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    
    <title>Нийтийн тээвэр</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
   <?php include_once('includes/sidebar.php');?>
    <!-- Right Panel -->

   <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Хянах самбар</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Хянах самбар</a></li>
                                    <li><a href="add-chiglel.php">Чиглэл</a></li>
                                    <li class="active">Чиглэл нэмэх</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            
                           
                        </div> <!-- .card -->

                    </div><!--/.col-->

              

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Чиглэл болон Автобус нэмэх </strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        
                                        <div class="col-12 col-md-9">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Чиглэлийн нэр</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="dirname" name="dirname" class="form-control" placeholder="Өгөгдлөө оруулна уу..." required="true"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Дэлгэрэнгүй</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="dirmore" name="dirmore" class="form-control" placeholder="Чиглэлийн утгаа оруулна уу..." required="true"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Сонгох</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="catename" id="catename" class="form-control">
                                                <option value="0">Төрөл сонгох</option>
                                                <?php $query=mysqli_query($con,"select * from tblcategory, tbldirection");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
                                                 <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Автобусны дугаар</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="busnum" name="busnum" class="form-control" placeholder="Автобусны дугаар" required="true"></div>
                                    </div>
                                 
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Жолоочийн нэр</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="dirownername" name="dirownername" class="form-control" placeholder="Жолоочийн дугаар" required="true"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Компанийн нэр</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="dircomp" name="dircomp" class="form-control" placeholder="Компанийн нэр" required="true"></div>
                                    </div>
                                    
                                   
                                 
                                    
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Нэмэх</button></p>
                                </form>
                            </div>
                            
                        </div>
                        
                    </div>
                   
                    

                    <div class="col-lg-6">
                        
                  
                </div>

           

            </div>


        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

   <?php include_once('includes/footer.php');?>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
<?php }  ?>