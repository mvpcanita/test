<?php session_start();?>

<!DOCTYPE html5>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'psitedb';


// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//ech
// include 'errorMsg.php';

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
} 



?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PSITE-NCR</title>

    
    
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





<script>

  $('#savePolls').on('click', function () {
    //$(this).button('complete') // button text will be "finished!"
 
    $('.nav a[href=#' + url.split('#')[1] + ']').tab('show');
  });
    
</script>


    <script>
window.onload = function(){  

    var url = document.location.toString();

  //  $('#savePolls').on('click', function () {
  //   //$(this).button('complete') // button text will be "finished!"
  //   alert "hello";
  //   e.preventDefault();
  //   // $('.nav a[href=#' + url.split('#')[1] + ']').tab('show');
  // })
    



    if (url.match('#')) {

      
      // $('.nav a[href=#' + url.split('#')[1] + ']').tab('show');
      $('a[href=#' + url.split('#')[1] + ']').tab('show');
      location.hash = '';

   }

   
   
   // alert (url.split('=')[2].toString());
    //Change hash for page-reload
    //$('.nav a[href=#' + url.split('#')[1] + ']').on('shown', function (e) {
      // window.location.hash = e.target.hash;
    //}); 
} 

    </script>
 
  </head>
  <body>
   
   <div class="container">
      <!-- Stack the columns on mobile by making one full-width and the other half-width -->
      
        <div class="row">

          <div class="col-md-12 main-container">
            
            <div class="row branding">              
              <div class="col-xs-12 col-md-12">
                <div class="col-xs-9 col-md-8">
                  <img src="psitencrlogotitle.png" width="730" height="100" />  
                </div>
                <div class="col-xs-3 col-md-4">
                  <!--<img src="http://placehold.it/420x100" width="200" height="100" class="pull-right" />-->
                  <input type="text" placeholder="Search..." name="search"  class="form-control pull-right" style="width:150px;margin-top:66px;">
                  <a href="logout.php">Logout <?php if($_SESSION['uid']!=""){echo "Welcome".$_SESSION['firstname']." ".$_SESSION['lastname'];}?></a>
                    <a href="signin.php">Login</a>
                </div>
                
              </div>

              

            
            </div> <!-- /branding -->
            
            
           <div class="row banner">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                 <!-- <li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                
                  <?php 
                    $sql = "SELECT * FROM promotionstbl";
                    $result = mysqli_query($conn,$sql);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)){
                        $count++;
                  ?>

                  <div class=<?php if($count == 1){ echo "'"."item active"."'";} else {echo "'"."item"."'";}?> >
                    <img src=<?php echo "'".$row['filepath']."'";?>  style="height:240px;width:960;" />
                    <div class="carousel-caption">
                        <!--First slide --> 
                                             <h4>
                                                <?php echo $row['title']; ?>
                                                Venue: <?php echo $row['description']; ?>
                                                Date: <?php echo $row['date']; ?>&nbsp;Time:<?php echo $row['time']; ?>
                                            </h4>
                                                                                            
                                      
                                            
                    </div>
                  </div>
                  <?php 
                    }
                      } 
                      else {


                    }

                  ?>
                  

                </div> <!-- row -->

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
              </div> 
            </div> <!-- /banner -->

            <div class="row banner" style="padding-top:20px;">
              <div class=".col-xs-12 .col-md-8">
              <?php
              $sql = "SELECT * FROM bannerstbl";
              $result = mysqli_query($conn,$sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                ?>
                
                  <a href=<?php echo "'".$row['description']."'"; ?> target="_blank"><img src=<?php echo "'".$row['filepath']."'"?> width="160" height="60" /> </a>
                
              <?php 
                  }
                    }
                  else
                  {

                  }
                
              ?>
            </div>
              </div> <!-- row banner -->
           

            <div class="row content">

              <div class="col-xs-12 col-md-12 navigation" style="margin-top:15px;">
                <ul class="nav nav-tabs" >
                  <li role="presentation" class="active"><a data-toggle="tab" href="#" >Home</a></li>
                   <li role="presentation" ><a data-toggle="tab" href="#aboutus" >About Us</a></li>
                   <li role="presentation" ><a data-toggle="tab" href="#contactus">Contact Us</a></li>
                  <li role="presentation" ><a  data-toggle="tab" href="#membership" >Membership</a></li>
                  <!-- <li role="presentation" ><a data-toggle="tab" href="seminars.php" >Seminars</a></li>
                  <li role="presentation" ><a data-toggle="tab" href="news.php" >News and Events</a></li> -->
                  <li role="presentation" ><a data-toggle="tab" href="#jobs">Jobs</a></li>
                  <li role="presentation" ><a data-toggle="tab" href="#downloads">Downloads</a></li>
                  <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href=""> <b class="caret"></b>What's Latest</a>
                      <ul class="dropdown-menu">
                        <li><a data-toggle="tab" href="#news">News</a></li>
                        <li><a data-toggle="tab" href="#seminars">Seminars and Events</a></li>
                        <li><a data-toggle="tab" href="#polls">Polls</a></li>
                        <li><a data-toggle="tab" href="#forums" >Forums</a></li>

                      </ul>
                    </li>
             <!--      <li role="presentation" ><a data-toggle="tab" href="forums.php" >Forums</a></li> -->
                <!--   <li role="presentation" data-toggle="tab"><a href="polls.php" >Polls</a></li> -->
                  <li role="presentation" ><a href="http://www.psite.ph" target="_blank">PSITE National</a></li>
                  
               </ul>                
              </div> <!-- nav -->
          
             
              <div class="col-xs-12 col-md-12 main-content main-content-height">
                 <div class="tab-content">
 <div id="forums" class="tab-pane fade in">
  <h1>Forums</h1>

 <?php 
               
                  $sql = "SELECT * FROM forumstbl ORDER BY `date` DESC";
                  $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                      
                      while($row = mysqli_fetch_assoc($result)){  
                            $id=$row['id'];
                              $sql1 = "SELECT forumid FROM poststbl WHERE forumid='$id'ORDER BY `date` DESC";
                              $result1 = mysqli_query($conn,$sql1);
                              $value = mysqli_num_rows($result1);
                              
                  ?>
                  <?php if($_SESSION['uid']!=""){?>
      <ul class="list-group">
                      <li class="list-group-item"><span class="badge"><?php echo $value;?></span>
                       <a data-toggle="tab" href="#forum<?php echo $id;?>"><h4><?php echo $row['title'];?></h4></a>Date Posted:<?php echo $row['date'];?></li>
              </ul>
                  <?php }else{?>
                  <ul class="list-group">
                      <li class="list-group-item"><span class="badge"><?php echo $value;?></span>
                       <a data-toggle="tab" href="#membership"> <h3 style="margin-top:0px"><?php echo $row['title'];?></h3></a>Date Posted:<?php echo $row['date'];?></li>
              </ul>             

             <?php }?>
                   <?php
              
               //c
                } 

                
                  }else {


                  }
            
                  ?>

</div>

        <?php if($_SESSION['uid']!="") {
                $sql1 = "SELECT * FROM forumstbl";
                  $result1 = mysqli_query($conn,$sql1);

                          if (mysqli_num_rows($result1) > 0) {
                          // $ctr=$count-1;
                            while($row1 = mysqli_fetch_assoc($result1)){

                                $fid = $row1['id'];
                                       
                                echo "<div id='forum$fid' class='tab-pane fade in'><p><b>".$row1['title']."</b></p><hr>";
                               
                    $sql2 = "SELECT f.id AS fid, f.title AS title,
                          u.id AS uid, u.firstname AS firstname,u.lastname AS lastname,
                          u.status AS status,u.email AS email,p.post AS posts,p.id AS pid,
                          p.date AS `date`
                          FROM forumstbl f
                          INNER JOIN poststbl p 
                          ON f.id= p.forumid 
                          INNER JOIN userstbl u 
                          ON u.id = p.userid
                          WHERE f.id =$fid 
                          ORDER BY `date` DESC";

                          $result2 = mysqli_query($conn,$sql2);

                          if (mysqli_num_rows($result2) > 0) {
             
                       while($row2 = mysqli_fetch_assoc($result2)){
                           
                  echo "<p>".$row2['firstname']." ".$row2['lastname']."&nbsp;&nbsp;wrote: </p><p>";
                  echo  $row2['posts']."</p><p>".$row2['date']?>
                  <!-- use modal-->
                       <!--  <a class="btn btn-default btn-xs" href='update.php?id=<?php //echo $row2['pid']."&"."arg=posts";?>'>
                          <span class="glyphicon glyphicon-trash"></span>Edit 
                        </a>      
                        <a class="btn btn-default btn-xs" href='delete.php?id=<?php //echo $row2['pid']."&"."arg=posts";?>'>
                          <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>  -->   </p>
                  


                <?php
                    }
                    }    //$ctr--;
                ?>
                <form method="POST" name="usersFrm1" action="save1.php?id=<?php echo $_SESSION['uid'];?>&fid=<?php echo $fid;?>&category=userposts">
  <textarea rows="4" class="form-control" name = "posts" placeholder="Type your message here... Observe proper netiquette when using forums" required></textarea>
                       <button type="submit" onclick="redirect()" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span> Reply
                        </button>

                        </form>
                        <a data-toggle="tab" href='#forums' >Back to Forums</a>
                  </div>
                <?php  
                  }
              }

              }?>


 <div id="seminars" class="tab-pane fade in">
<h1>Seminar and Events</h1>
<h3>Do you want to register to an event or seminar?</h3>
<ol type="1.">

<li>   To register to a seminar or event, pay the registration fee based on your membership type</li>
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
<li>Present in person the scanned 
                    bank deposit slip , send it to  vonn54cav@yahoo.com
                    <?php if($_SESSION['uid']!=""){?>
                    or upload the slip. Use your email.
                    <?php }?>
                  </li>
</ol>
               <?php 
                  $sql = "SELECT * FROM seminarstbl ORDER BY `date` DESC LIMIT 2";
                  $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)){  
                      $sid = $row['id'];               
                  ?>
                <div class="table-responsive ">
                <table class="table table-striped table-hover">
                 
                  <tbody>
                    <tr>
                  <td><h3><?php echo $row['title'];?></h3></td> </tr>
                    <tr>
                  <td><h4>Description:</h4><?php echo $row['description'];?>
                    <b>Time:</b><?php echo $row['time'];?>
                  <b>Date:</b><?php echo $row['date'];?>
                    <b>Venue:</b><?php echo $row['venue'];?>
                  </h4> </td> </tr> 
<?php if($_SESSION['uid']!=""){?>
                  <tr>
                    <td>

    
        
             
               
              
                <div class="form-group">
                  <?php 
                  $id=$_SESSION['uid'];
                   
                     $sql1 = "SELECT * FROM onlineregistrationstbl WHERE userid=$id";
                      $result1 = mysqli_query($conn,$sql1);
                        $numrow1 = mysqli_num_rows($result1);
                      while($row = mysqli_fetch_assoc($result1)){
                          $osid = $row['seminarid'];
                          
                      if($numrow1 != 0 && ($sid == $osid)){
                  ?>
                  <form role="form" name="downloadsFrm" id="downloadsFrm" action="fileupload4.php?uid=<?php echo $_SESSION['uid'];?>&sid=<?php echo $sid;?>" method="POST" enctype="multipart/form-data">
                  <label for="imageInputFile"></label>
                  <input type="file" id="imageInputFile"  style="display:inline" name="imageInputFile"> 
                  <input type="submit" class="btn btn-primary pull-right"  name="button" value="UploadSlip">
                  <p class="help-block">Only jpg,png and gif extensions are allowed.</p>

                  <?php }  else {?>
                 
                  <a href="save.php?uid=<?php echo $_SESSION['uid'];?>&sid=<?php echo $sid;?>&category=Reserve" class="btn btn-primary pull-right" >Reserve</a>
                  <?php }
                  } ?>
                </div>
              
               
                           
              
                </form> 

                    </td>    
                  </tr>
        <?php }?>   
                </tbody> </table>
                </div>
                
                <?php 
                }
                  }else {


                  } ?>
<p>
              </p>

                 </div>
                  <div id="membership" class="tab-pane fade in">        

                 <h1>Membership</h1>
                
                <p><h3>How to apply or renew membership (Active Member)?</h3>
<ol type="1.">
<li>  Download membership application form at <a data-toggle="tab" href="#downloads">downloads</a> link. </li>
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
$sql = "SELECT * FROM userstbl WHERE type='Corporate' AND mstatus='notexpired' ORDER BY lastname ASC";
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
$sql = "SELECT * FROM userstbl WHERE type='Institutional' AND mstatus='notexpired' ORDER BY lastname ASC";
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
$sql = "SELECT * FROM userstbl WHERE type='Individual' AND mstatus='notexpired' ORDER BY lastname ASC";
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




                </div>
                  <div id="polls" class="tab-pane fade in">
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
               <form role="form" name="pollsFrm" id="pollsFrm" method="POST" action="index.php#pollsResults">
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
                          <label><input type="radio" name="optradio" value='<?php echo $optionid;?>' ><?php echo $option;?></label>
                          <input type="hidden" name ="option" value="<?php echo $optionid;?>">
                        </div>

                </div>

                        <?php   
                                }
                           }

                 ?>
                         <button type="submit" class="btn btn-primary"  id="savePolls" name="savePolls" value="Vote"> Vote</button>
                <a data-toggle="tab" href="#pollsResults" class="btn btn-primary" type="cancel" class="btn">Results</a>                                                   
                   <?php     }

                      }

                      ?>
               
              </form>
            <?php
            $button = $_POST['savePolls'];
            if($button == 'Vote'){
               $optionid = $_POST['optradio'];
                $sql = "UPDATE `optionstbl` SET `value`=`value`+1 WHERE `id`='$id' AND `optionid`='$optionid'"; 
                $result=mysqli_query($conn, $sql);

                  $nav="resultspolls";
                 }  
                    
                ?> 

              

                </div>


 <div id="pollsResults" class="tab-pane fade in">           
              <h1>Poll Results</h1>
                <?php 
                    $id1 = $_POST['optradio'];
            
                  // $id = $_GET['id'];
                
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
                     

                  </ul>
                </p>
                  <a data-toggle="tab" href="#polls">Back to  Polls</a>
                    </div>

                  <div id="news" class="tab-pane fade in">
                <h1>News and Events</h1>
                
          <?php 
                  $sql = "SELECT * FROM newstbl ORDER BY `date` DESC LIMIT 5";
                  $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)){                 
                  ?>
                
                  <h2><?php echo $row['title'];?></h2>
                    
                  <p><?php echo $row['description'];?></p>
                  <p>Date Posted:<?php echo $row['date'];?></p>
                
                
                <?php 
                }
                  }else {


                  }
                 
                  ?>

              </div>
                  <div id="downloads" class="tab-pane fade in">
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
                 
                  ?>
                

              </div>
                  <div id="jobs" class="tab-pane fade in">

                <h1>Jobs @ PSITE</h1>
            <div class="table-responsive ">
                <table class="table table-striped table-hover">
                <?php 
                  $sql = "SELECT * FROM jobstbl ORDER BY `date` DESC LIMIT 5";
                  $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)){                 
                  ?>
                  <tr><td colspan="2">
                  <h2><?php echo $row['title'];?></h2></td>
                    <td >Description: <?php echo $row['description'];?></td>
                  <td>Date Posted:<?php echo $row['date'];?></td></tr>
                
                
                <?php 
                }
                  }else {


                  }
                
                  ?>
                </table>
            </div>

              </div>
                  <div id="contactus" class="tab-pane fade in">
              
               
                <?php
                $sql = "SELECT * FROM contactUstbl";

                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "<h1> " . $row["title"]. "</h1>"; 
                echo "<p>" . $row["description"]. "</p>";
                 }
                } else {
               
                  }
                 
                ?>
                </div> <!-- contact -->
                

               

                
                  <div id="aboutus" class="tab-pane fade in">

                <?php
              
 
                $sql = "SELECT * FROM aboutUstbl";

                $result = mysqli_query($conn,$sql);

                ?>
                
                            
                  
                <?php
                if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "<h1> " . $row["title"]. "</h1>"; 
                echo "<p>" . $row["description"]. "</p>";
                 }
                } else {
               
                  }
                 
                ?>
                
         

              </div>  <!-- about us -->

                      
                  <div id="home" class="tab-pane fade in active">     
                   
                <?php
                $sql = "SELECT * FROM hometbl";

                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "<h1> " . $row["title"]. "</h1>"; 
                echo "<p>" . $row["description"]. "</p>";
                 }
                } else {
                
                  }
                 
                ?>
                
             </div>  <!-- home -->

              </div>  <!-- tab content -->               
             
              <!--    <iframe src="home.php" id="form-iframe" class="frame-style" name="myFrame" style="margin:0; width:100%; height:500px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()">
                 </iframe>
                
                <script type="text/javascript">
                  function AdjustIframeHeightOnLoad() 
                  { 
                    document.getElementById("form-iframe").style.height = document.getElementById("form-iframe").contentWindow.document.body.scrollHeight + "px"; 
                }
                  function AdjustIframeHeight(i) 
                  { 
                  
                    document.getElementById("form-iframe").style.height = parseInt(i) + "px"; 
                }
</script>
 -->

                </div>  <!-- main -->           
             
            </div> <!-- row -->
<div class="modal-footer footer" >
        <ul>
          <li><a href="http://www.psite.ph" target="_blank">PSITE National</a></li>

    
          <li><a data-toggle="tab" href="#forums" >Forums</a></li>
         
              <li><a data-toggle="tab" href="#polls" >Polls</a></li>
          
         <li><a data-toggle="tab" href="#seminars" >Seminars</a></li>
          <li><a data-toggle="tab" href="#news" >News and Events</a></li>
          
           <li><a data-toggle="tab" href="#downloads" >Downloads</a></li>
           <li><a data-toggle="tab" href="#jobs" >Jobs</a></li>
          <li><a data-toggle="tab" href="#membership" >Membership</a></li>
            <li><a data-toggle="tab" href="#contactus" >Contact Us</a></li>
         <li><a data-toggle="tab" href="#aboutus" >About Us</a></li> 
          <li><a data-toggle="tab" href="#home" >Home </a></li>   
        </ul>
        <p class="right footerp">&copy; Copyright <?php echo date("Y");?> Rose Coronejo </p>
    </div><!-- endDiv footer -->

          </div> <!-- /main-container -->

        </div> <!-- row container -->


          

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <!--    // <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="js/bootstrap.min.js"></script>
    <script src="js/star-rating.min.js"></script>
    <script src="holder.js"></script>
   

    
  </body>
</html>
<?php mysqli_close($conn);


?>