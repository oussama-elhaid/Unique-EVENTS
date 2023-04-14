<?php
session_start();
error_reporting(0);
include('../login-auth/config.php');
if(strlen($_SESSION['alogin'])=="")
    {
    header("Location: admin.php");
    }
    else{
if(isset($_POST['update']))
{
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adresse=$_POST['adresse'];
$numtel=$_POST['numtel'];
$email=$_POST['email'];
$ville=$_POST['ville'];
$cid=intval($_GET['clientid']);
$sql="update  client set nomc='$nom',prenomc='$prenom',adressec='$adresse',numtelc='$numtel',emailc='$email',villec='$ville' where id='$cid'";
$results=mysqli_query($conn,$sql);

$msg="Les données ont été mises à jour avec succès";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mettre à jour un client</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?>
          <!-----End Top bar>
            <!- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Mettre à jour un client</h2>
                                </div>

                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Accueil</a></li>
            							<li><a href="#">Client</a></li>
            							<li class="active">Mettre à jour un client</li>
            						</ul>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">





                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Mettre à jour un client</h5>
                                                </div>
                                            </div>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Bien fait! </strong><?php echo htmlentities($msg); ?>
 </div><?php }
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Erreur! </strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>

                                                <form method="post">
<?php
$cid=intval($_GET['clientid']);
$sql = "SELECT * from client where id=$cid";
$results=mysqli_query($conn,$sql);
$cnt=1;
if($results->num_rows > 0)
{
while($rows=$results->fetch_assoc())
{   ?>


                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Nom</label>
                                                		<div class="">
                                                			<input type="text" name="nom" value="<?php echo $rows['nomc'];?>" required="required" class="form-control" id="success">
                                                            
                                                		</div>
                                                	</div>
                                                       <div class="form-group has-success">
                                                        <label for="success" class="control-label">Prenom</label>
                                                        <div class="">
                                                        <input type="text" name="prenom" value="<?php echo $rows['prenomc'];?>" required="required" class="form-control" id="success">
                                                    
                                                        </div>
                                                    </div>
                                                     <div class="form-group has-success">
                                                        <label for="success" class="control-label">adresse</label>
                                                        <div class="">
                                                        <input type="text" name="adresse" value="<?php echo $rows['adressec'];?>" required="required" class="form-control" id="success">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">numero de telephone</label>
                                                        <div class="">
                                                        <input type="text" name="numtel" value="<?php echo $rows['numtelc'];?>" required="required" class="form-control" id="success">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Email</label>
                                                        <div class="">
                                                        <input type="text" name="email" value="<?php echo $rows['emailc'];?>" required="required" class="form-control" id="success">
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Ville </label>
                                                        <div class="">
                                                        <input type="text" name="ville" value="<?php echo $rows['villec'];?>" required="required" class="form-control" id="success">
                                                        </div>
                                                    </div>



                                                    <?php }} ?>
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="update" class="btn btn-success btn-labeled">Mettre à jour<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>

                                                    </div>



                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
                                </div>
                                <!-- /.row -->




                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->


                    <!-- /.right-sidebar -->

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>



        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>
