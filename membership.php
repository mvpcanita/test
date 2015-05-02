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
    <title>Memebership Page</title>

    
    
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
              
                <h1>Membership</h1>
                
                <p><h3>How to apply or renew membership?</h3>
<ol type="1.">
<li>  Download membership application form at <a href="downloads.php">downloads</a> link. </li>
<li>   Pay the amount of Php10,000 for corporate membership, Php3,000 for institutional membership or Php500 for individual membership.</li>
<li>  Payment can be made by cash, check or bank deposit.</li>
  <ol type="a.">
    <li>   Cash payment can be made to any PSITE-NCR officer. </li>
    <li>  Checks should be named to Philippine Society of IT Educators, Inc. – National Capital Region Chapter or PSITE-NCR.</li>
    <li>   Payments can be deposited to:</li>
        <ul type="disc">
          <li> Account name: <b>PSITE NCR</b></li>
          <li>  Bank and Branch: <b>Allied Bank – UE Recto</b></li>
          <li> Account type: <b>Peso Savings</b></li>
          <li> Account Number: <b>313-0081234</b></li>
        </ul>
  </ol>
<li>   <p>Present in person, send membership form and the scanned bank deposit slip to  vonn54cav@yahoo.com</p>
        <p> or <b>upload the scanned membership form and deposit slip as one file</b></p> 
        <form role="form" name="downloadsFrm" id="downloadsFrm" action="fileupload3.php" method="POST" enctype="multipart/form-data">
             
                <div class="form-group">
                  <label for="nameInput">Email</label>
                  <input type="email" class="form-control" id="nameInput" placeholder="Email" name="email" required>
                </div>
              
                <div class="form-group">
                  <label for="imageInputFile">File input</label>
                  <input type="file" id="imageInputFile" name="imageInputFile">
                  <p class="help-block">Only jpg,png and gif extensions are allowed.</p>
                </div>
                <input type="submit" class="btn btn-primary" name="button" value="UploadFile">
               
                           
              
                </form> 

</li>
<li>   As soon as payment has been verified, member is given the official receipt and the certificate of membership.</li>
<li>   Membership is valid only for the current school year (from June of the current year to March of the following year).</li>
<li>   Members gets to attend seminars and workshops at a discounted rate.</li>
</ol>
</p>
<p>
<b>INACTIVE MEMBER</b> – are those who have become member in the past but did not renew for the current school year.
</p>



<?php 
$sql = "SELECT * FROM userstbl WHERE type='Corporate' AND status='active' ORDER BY lastname ASC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                         echo "<h3>List of Corporate Members</h3><ol type='1.''>";
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                       echo "<li>".$row["firstname"]." ".$row["lastname"]."-<i>". $row["institution"]."</i></li>";
                       }
                     }
?>               
</ol>

              

<?php 
$sql = "SELECT * FROM userstbl WHERE type='Institutional' AND status='active' ORDER BY lastname ASC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                         echo "<h3>List of Institutional Members</h3><ol type='1.''>";  
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                       echo "<li>".$row["firstname"]." ".$row["lastname"]."-<i>". $row["institution"]."</i></li>";
                       }
                     }
?>             
</ol>             
               
                

<?php 
$sql = "SELECT * FROM userstbl WHERE type='Individual' AND status='active' ORDER BY lastname ASC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                        echo  "<h3>List of Individual Members</h3><ol type='1.''>";
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                       echo "<li>".$row["firstname"]." ".$row["lastname"]."-<i>". $row["institution"]."</i></li>";
                       }
                     }
?>               
</ol>                 
            

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