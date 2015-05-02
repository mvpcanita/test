<!DOCTYPE html5>
<?php 
include 'dbconnect.php';
include 'errorMsg.php';

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Polls Results Page</title>

    
    
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
              
                <h1>Poll Results</h1>
                <?php 
                  $id = $_GET['id'];
                  $sql3 = "SELECT * FROM pollstbl WHERE id=$id";
                  $result = mysqli_query($conn,$sql3);
                          $row = mysqli_fetch_assoc($result);
                            $title = $row['title'];
                            ?>
                          <h3><?php echo $title;?></h3>
                            <?php
                  $sql = "SELECT SUM(value) AS total FROM optionstbl WHERE id=$id";
                      $result = mysqli_query($conn,$sql);

                          $row = mysqli_fetch_assoc($result);
                           
                            $total = $row['total'];

                  $sql1 = "SELECT * FROM optionstbl WHERE id=$id";
                  $result = mysqli_query($conn,$sql1);
                     if(mysqli_num_rows($result)>0){
                       $count = 0;
                       $color = array("#f0f","#ff0","#ccc","#00f","0ff","#0ff");
                          while($row = mysqli_fetch_assoc($result)){
                           
                            $id = $row['id'];
                            $option = $row['option'];
                            $value = $row['value'];
                            $optionid = $row['optionid'];  

                            $percent = round($value / $total,2) * 100;

                ?>
           <div>
                   
                   <div style="background-color:<?php echo $color[$count];?>;width:<?php echo $percent."%"?>;height:10px;border-radius:5px;">
                        </div>
                    <p>
                
                   <ul class="list-group">
                      <li class="list-group-item"><span class="badge"><?php echo $value;?></span><b> <?php echo $option;?></b>:<?php echo $percent;?>%</li>
                     

                  </ul>
               
                  </p>
                       
                </div>

                <?php 
                    $count++;
                    }
                   }
                  ?>
                  <p><ul class="list-group">
                      <li class="list-group-item"><span class="badge"><?php echo $total;?></span><b>Total Votes:</b> </li>
                     

                  </ul></p>
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
   

    
  </body>
</html>
<?php include 'close.php'; ?>