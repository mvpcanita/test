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
    <title>Polls Page</title>

    
    
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
              
                <h1>Polls</h1>
              <?php
              $sql1 = "SELECT * FROM pollstbl WHERE status='active'";
              $result1 = mysqli_query($conn,$sql1);
              if(mysqli_num_rows($result1)>0){
               
              while($row = mysqli_fetch_assoc($result1)){
              $id = $row['id'];
              $title = $row['title'];
              $status = $row['status']; 
            ?>
               <h3><?php echo $title;?></h3>
               <form role="form" name="pollsFrm" id="pollsFrm" method="POST" action="update.php?id=<?php echo $id;?>">
            <?php
              // $sql = "SELECT pollstbl.id AS id,pollstbl.title AS title, pollstbl.status AS status,
              //           optionstbl.option AS option1,optionstbl.value AS value,
              //           optionstbl.optionid AS optionid 
              //           FROM pollstbl 
              //           INNER JOIN optionstbl 
              //           ON pollstbl.id=optionstbl.id 
              //           WHERE pollstbl.id=$id";


              $sql = "SELECT * FROM optionstbl WHERE id=$id";

                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                       
                          while($row = mysqli_fetch_assoc($result)){
                           
                            $id = $row['id'];
                            $option = $row['option'];
                            $value = $row['value'];
                            $optionid = $row['optionid'];
                            ?>
                            
                       
                <div>
                  
                        <div class="radio">
                          <label><input type="radio" name="optradio<?php echo $count;?>" value='<?php echo $optionid;?>' ><?php echo $option;?></label>
                          <input type="hidden" name ="option<?php echo $count?>" value="<?php echo $optionid;?>">
                        </div>

                </div>

                        <?php   
                                }
                           }

                 ?>
                         <input type="submit" class="btn btn-primary"  name="save" value="Vote">
                <a href="pollsresults.php?id=<?php echo $id;?>" class="btn btn-primary" type="cancel" class="btn">Results</a>                                                   
                   <?php     }

                      }

                      ?>
               
              </form>
              </div>
                

           
             
                
            

              </div>  <!-- /main-content -->           
             
            </div> <!-- /content -->

          

          </div> <!-- /main-container -->

        </div>


    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    
  </body>
</html>
<?php include 'close.php';?>