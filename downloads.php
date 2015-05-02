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
    <title>Download Page</title>

    
    
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
                <h1>Downloads</h1>
                 <?php 
                  $sql = "SELECT * FROM downloadstbl ORDER BY `id` DESC";
                  $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)){                 
                  ?>
                  <p style="display:inline;">
                  <img src="images/images.jpg" style="width:30px;height:30px"> 
                  
                    <a href=<?php echo "'".$row['filepath']."'"?> target="_blank">
                      <h4 style="display:inline;"><?php echo $row['title'];?>
                      </h4>
                      </a>
                    
                  </p>
                  
                    
                 
                
                
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="js/bootstrap.min.js"></script>
    <script src="js/star-rating.min.js"></script>
    <script src="holder.js"></script>
    <script>
        jQuery(document).ready(function () {
            $("#input-21f").rating({
                starCaptions: function(val) {
                    if (val < 3) {
                        return val;
                    } else {
                        return 'high';
                    }
                },
                starCaptionClasses: function(val) {
                    if (val < 3) {
                        return 'label label-danger';
                    } else {
                        return 'label label-success';
                    }
                }
            });
        });
    </script>

    
  </body>
</html>