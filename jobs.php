<!DOCTYPE html5>
<?php 
include 'dbConnect.php';
include 'errorMsg.php';    
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs Page</title>

    
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/star-rating.min.css" rel="stylesheet"/>
    <link href="css/index.css" rel="stylesheet"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
  </head>
  <body>
   
   <div class="container">
      <!-- Stack the columns on mobile by making one full-width and the other half-width -->
      





                
              <div class="col-xs-6 col-md-9 main-content main-content-width">
              
                <h1>Jobs</h1>
                <?php 
                  $sql = "SELECT * FROM jobstbl ORDER BY `date` DESC LIMIT 5";
                  $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)){                 
                  ?>
                
                  <h2><?php echo $row['title'];?></h2>
                    <p>Description:</p>
                  <p><?php echo $row['description'];?></p>
                  <p>Date Posted:<?php echo $row['date'];?></p>
                
                
                <?php 
                }
                  }else {


                  }
                  include 'close.php';
                  ?>
                
            

              </div>  <!-- /main-content -->           
             
            </div> <!-- /content -->

          

          </div> <!-- /main-container -->

        </div>


    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    
  </body>
</html>