<!DOCTYPE html5>
<?php 
include 'dbconnect.php';

include 'errorMsg.php';

$sql = "SELECT * FROM hometbl";

$result = mysqli_query($conn,$sql);

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>

    
    
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
   
   <div class="container" style="margin-top:0px;" id="container">
      <!-- Stack the columns on mobile by making one full-width and the other half-width -->
      



              <div class="col-xs-6 col-md-9 main-content main-content-width">
                       
                   
                <?php
                if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "<h1> " . $row["title"]. "</h1>"; 
                echo "<p>" . $row["description"]. "</p>";
                 }
                } else {
                phpAlert("Data Not Found");
                  }
                  include 'close.php';
                ?>
                
               

              </div>  <!-- /main-content -->           
             
            </div> <!-- /content -->

          

          </div> <!-- /main-container -->

        </div>


    </div> <!-- /container -->

   
<script type="text/javascript">
parent.AdjustIframeHeight(document.getElementById("container").scrollHeight);
</script>
    
  </body>
</html>