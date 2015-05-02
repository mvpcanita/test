<!DOCTYPE html5>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seminar Page</title>

    
    
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
              
                <h1>Seminar</h1>
               <?php 
                  $sql = "SELECT * FROM seminarstbl ORDER BY `date` DESC LIMIT 2";
                  $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)){                 
                  ?>
                
                  <h2><?php echo $row['title'];?></h2>
                    
                  <h3><?php echo $row['description'];?></h3>
                  <h3><?php echo $row['time'];?></h3>
                  <h3>Date Posted:<?php echo $row['date'];?></h3>
                
                
                <?php 
                }
                  }else {


                  }
                  include 'close.php';
                  ?>
                <p>
                <p>Present in person, send membership form and the scanned bank deposit slip to  vonn54cav@yahoo.com</p>
        <p> or <b>upload the scanned deposit slip</b></p> 
        <form role="form" name="downloadsFrm" id="downloadsFrm" action="fileupload3.php" method="POST" enctype="multipart/form-data">
             
               
              
                <div class="form-group">
                  <label for="imageInputFile">File input</label>
                  <input type="file" id="imageInputFile" name="imageInputFile">
                  <p class="help-block">Only jpg,png and gif extensions are allowed.</p>
                </div>
                <input type="submit" class="btn btn-primary" name="button" value="UploadFile">
               
                           
              
                </form> 
              </p>
                
             
                
            

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