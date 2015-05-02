<?php session_start();?>
<!DOCTYPE html5>
<?php 
if($_SESSION['usertype']=="admin") {
// include 'dbconnect.php';
// include 'errorMsg.php';
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
//echo "Connected successfully";

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
} 


 $sql = "SELECT DISTINCT dateexpiration FROM userstbl ORDER BY dateexpiration DESC LIMIT 1";
                    $result = mysqli_query($conn,$sql);
                    
                      $row = mysqli_fetch_assoc($result);
                        $dateexpiration = $row['dateexpiration'];

                        

                  



  $sql1 = "SELECT * FROM userstbl";
                    
                    $result1 = mysqli_query($conn,$sql1);

                    if (mysqli_num_rows($result1) > 0) {

                    
                    while($row1 = mysqli_fetch_assoc($result1)) 
 
                        {    $date = $row1['date'];
                            $id1 = $row1['id'];
                            $lower = date('Y-m-d',strtotime("$dateexpiration -1 year"));
                                                       
                                
                                if ($date<$lower) { 
                                 
                               $sql2 = "UPDATE userstbl SET mstatus='expired' WHERE id='$id1'";
                               $result2 = mysqli_query($conn,$sql2);
                             
                    
                          }else {
                                
                                $sql3 = "UPDATE userstbl SET mstatus='notexpired' WHERE id='$id1'";
                               $result3 = mysqli_query($conn,$sql3);
                           
                            }
                            // if(date('Y-m-d')==date('Y-m-d',strtotime($dateexpiration))){
                            //     $newdate = date('Y-m-d',strtotime("$dateexpiration +1 year")); 
                            //   $sql3 = "UPDATE userstbl SET dateexpiration='$newdate' WHERE id='$id'";
                            //   $result3 = mysqli_query($conn,$sql3);
                            // }
                            // // else{
                            // //      $sql3 = "UPDATE userstbl SET dateexpiration='$dateexpiration' WHERE id='$id'";
                            // //   $result3 = mysqli_query($conn,$sql3);

                            // // }
                            if($row1["usertype"] == "admin"){

                               
                               $sql4 = "UPDATE userstbl SET status='active' WHERE id='$id1'";
                               $result4 = mysqli_query($conn,$sql4);
                            

                            }


                          // echo $dateexpiration
                           //  $lower = date('Y.m.d',strtotime("2015.03.31 -1 year"));
                           //  if($date>=$lower){echo "hellooooooo";};
                           // echo $date;
                         
                        }

                          
                        }

                     

?>
   <script>
window.onload = function(){  

    var url = document.location.toString();
    
    if (url.match('#')) {
      
      $('.nav a[href=#' + url.split('#')[1] + ']').tab('show');
      location.hash ='';
   }

    $('.nav a[href=#' + url.split('=')[2] + ']').tab('show');
    location.hash ='';
   // alert (url.split('=')[2].toString());
    //Change hash for page-reload
    //$('.nav a[href=#' + url.split('#')[1] + ']').on('shown', function (e) {
      // window.location.hash = e.target.hash;
    //}); 
} 

    </script>
   
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>

    
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/admin.css" rel="stylesheet"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="ckeditor/ckeditor.js"></script>
  </head>
  <body>
   
   <div class="container">
 

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PSITENCR Website Management</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="welcome">Welcome Admin</li>
           <!-- 
           <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
            -->
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search..."><?php echo $_SESSION['uid'];?>
            <a href="logout.php">logout</a>
          </form>
        </div>
      </div> <!-- /container-fluid -->
    </div> <!-- navbar -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar" role="tablist" id="sideTab">
            <li class="active"><a href="#home" role="tab" data-toggle="tab">Home</a></li>
            <li><a href="#users" role="tab" data-toggle="tab">Membership</a></li>
            <li><a href="#seminars" role="tab" data-toggle="tab">Seminars</a></li>
            <li style="text-indent:10px"><a href="#registrations" role="tab" data-toggle="tab">Registration</a></li>
            <li><a href="#news" role="tab" data-toggle="tab">News and Events</a></li>
            <li><a href="#jobs" role="tab" data-toggle="tab">Jobs</a></li>
            <li><a href="#aboutus" role="tab" data-toggle="tab">About Us</a></li>
            <li><a href="#contactus" role="tab" data-toggle="tab">Contact Us</a></li>
            <li><a href="#downloads" role="tab" data-toggle="tab">Downloads</a></li>
            <li><a href="#forums" role="tab" data-toggle="tab">Forums</a></li>
            <li style="text-indent:10px"><a href="#posts" role="tab" data-toggle="tab">Posts</a></li>
            <li><a href="#polls" role="tab" data-toggle="tab">Polls</a></li>
            <li><a href="#banners" role="tab" data-toggle="tab">Banner</a></li>
            <li><a href="#promotions" role="tab" data-toggle="tab">Promotions</a></li>
            <li><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
            <li><a href="#reports" role="tab" data-toggle="tab">Reports</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         


          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <h2 class="sub-header">Home</h2>  
               <form name="homeFrm" id="homeFrm" role="form" action="update.php" method="POST">
                <div class="form-group">
                  <label for="titleInput">Title</label>
                  <input type="text" class="form-control" id="titleInput" placeholder="Title" name="title"
                  <?php 
                    $sql = "SELECT * FROM hometbl";
                    
                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result) > 0) {

                    
                    $row = mysqli_fetch_assoc($result); 
                        

                        echo "value= '".$row["title"]." ' ";

                        }
                         ?>

                        required > 
               
                  </div> <!-- form group-->
              
                <div class="form-group">
                  <label for="descriptionText">Description</label>
                  <textarea class="form-control" id="editor1" rows="20" placeholder="Your Message goes here..." maxlength="5000" name="description" required ><?php echo $row["description"]; ?></textarea>
                 <script>
                      CKEDITOR.replace( 'editor1' );
                  </script>
               
                </div> <!-- form group -->
                <input type="submit" class="btn btn-primary" value="editHome" name="save"></button>
                <button type="cancel" class="btn">Cancel</button>
               </form>   
            </div> <!-- /tab-pane -->

<div class="tab-pane" id="posts">
          
              <h2 class="sub-header">Posts</h2> 
  <button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapseposts">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button>             
<div id="collapseposts" class="collapse in">
                 <?php 
                  $sql1 = "SELECT * FROM forumstbl";
                  $result1 = mysqli_query($conn,$sql1);

                          if (mysqli_num_rows($result1) > 0) {
    
                            while($row1 = mysqli_fetch_assoc($result1)){
                                $fid = $row1['id'];
                                echo "<p><b>".$row1['title']."</b></p><hr>";
                               
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
                        <a class="btn btn-default btn-xs" href='update.php?id=<?php echo $row2['pid']."&"."arg=posts";?>'>
                          <span class="glyphicon glyphicon-trash"></span>Edit 
                        </a>      
                        <a class="btn btn-default btn-xs" href='delete.php?id=<?php echo $row2['pid']."&"."arg=posts";?>'>
                          <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>    </p>
                  
                         
              <?php }?>

<form method="POST" name="usersFrm1" action="save.php?id=<?php echo $_SESSION['uid'];?>&fid=<?php echo $fid;?>&category=posts">
  <textarea rows="4" class="form-control" name = "posts" placeholder="Type your message here" required></textarea>
                       <button type="submit" onclick="redirect()" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span> Reply
                        </button>

                        </form>

             <?php }
              echo "<hr/>";
        
             } 
      
         }   

         ?>
</div>           
</div> <!-- tab pane -->
            <div class="tab-pane" id="aboutus">
          
              <h2 class="sub-header">About Us</h2>  
               <form name="aboutusFrm" id="aboutusFrm" role="form" action="update.php" method="POST">

                <div class="form-group">
                  <label for="titleInput">Title</label>
                  <input type="text" class="form-control" id="titleInput" placeholder="Title" name="title" 

                  <?php 
                    $sql = "SELECT * FROM aboutustbl";
                    
                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result) > 0) {

                    
                    $row = mysqli_fetch_assoc($result);
                        

                        echo "value= '".$row["title"]." ' "; }?>

                        required > 

                </div> 

              <div class="form-group">
               <label for="descriptionText">Description</label>
                <textarea class="form-control" id="editor2" rows="20" placeholder="Your Message goes here..." maxlength="5000" name="description" required ><?php echo $row["description"]; ?></textarea>
                  <script>
                      CKEDITOR.replace( 'editor2' );
                  </script>
                </div>  
                        

                
                 
             

                <input type="submit" class="btn btn-primary" value="editAboutUs" name="save"></button>
                <button type="cancel" class="btn">Cancel</button>
               </form>   
            </div> <!-- /tab-pane -->

            <div class="tab-pane" id="contactus">
              <h2 class="sub-header">Contact Us</h2>  
               <form name="contactusFrm" id="contactusFrm" role="form" action="update.php" method="POST">

                <div class="form-group">
                  <label for="titleInput">Title</label>
                  <input type="text" class="form-control" id="titleInput" placeholder="Title" name="title" 

                  <?php 
                    $sql = "SELECT * FROM contactustbl";
                    
                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result) > 0) {

                    
                    $row = mysqli_fetch_assoc($result);
                        

                        echo "value= '".$row["title"]." ' ";} ?>

                        required >
                </div>

              <div class="form-group">
               <label for="descriptionText">Description</label>
                <textarea class="form-control" id="editor3" rows="20" placeholder="Your Message goes here..." maxlength="5000" name="description" required ><?php echo $row["description"];?></textarea>
                  <script>
                      CKEDITOR.replace( 'editor3' );
                  </script>
                </div>  
                       
              

                <input type="submit" class="btn btn-primary" value="editContactUs" name="save"></button>
                <button type="cancel" class="btn">Cancel</button>
               </form>   
            </div> <!-- /tab-pane -->
                  
            <div class="tab-pane" id="users">
<h2 class="sub-header">Membership</h2>            
 <button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapsemembership">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button> 
  <div id="collapsemembership" class="collapse in">
              <?php
                  $id = $_GET['id'];
                  $category = $_GET['category'];
                    if($id != "" && $category == "users")
                      {
                        $sql = "SELECT * FROM userstbl WHERE id=$id";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                          $row = mysqli_fetch_assoc($result);
                            
                            
                            $id1 = $row['id'];
                            $uname = $row['username'];

                            $pword = $row['password'];

                            $firstname = $row['firstname'];

                            $lastname = $row['lastname'];

                            $email = $row['email'];

                           $institution = $row['institution'];

                           $date = $row['date'];

                           $dateexpiration = $row['dateexpiration'];

                           $status = $row['status'];

                            $type = $row['type'];
                            
                          }


                    
                    ?> 
              <form role="form" name="userFrm" id="userFrm" method="POST" action="update.php?id=<?php echo $id;?>">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" name="id" value="<?php echo $id;?>" disabled>
                </div>
               <div class="form-group">
                  <label for="unameInput">Username</label>
                  <input type="text" class="form-control" id="userInput" placeholder="Username" name="uname" value="<?php echo $uname;?>" required>
                </div> 
              <div class="form-group">
                  <label for="fnameInput">Password</label>
                  <input type="password" class="form-control" id="pwordInput" placeholder="Password" name="pword" value="<?php echo $pword;?>" required>
                </div>

                <div class="form-group">
                  <label for="fnameInput">Firstname</label>
                  <input type="text" class="form-control" id="fnameInput" placeholder="Firstname" name="firstname" value="<?php echo $firstname;?>" required>
                </div>

                <div class="form-group">
                  <label for="lnameInput">Lastname</label>
                  <input type="text" class="form-control" id="lnameInput" placeholder="Lastname" name="lastname" value="<?php echo $lastname;?>" required>
                </div>

                <div class="form-group">
                  <label for="emailInput">Email</label>
                  <input type="email" class="form-control" id="emailInput" placeholder="Email" name="email" value="<?php echo $email;?>" required>
                </div>

                <div class="form-group">
                  <label for="schoolInput">Institution</label>
                  <input type="text" class="form-control" id="schoolInput" placeholder="Institution" name="institution" value="<?php echo $institution;?>" required>
                </div>

                  <div class="form-group">
                  <label for="dateInput">Date</label>
                  <input type="date" class="form-control" id="dateApproved" name="date" value="<?php echo $date;?>" required>
                </div>

                <div class="form-group">
                  <label for="dateInput">Date Expiration</label>
                  <input type="date" class="form-control" id="dateExpiration" name="dateexpiration" value="<?php echo $dateexpiration;?>" disabled>
                </div>

                  <div class="form-group">
                  <label for="statusInput">Status</label>
                  <select class="form-control" id="statusInput" name="status">
                    <?php if($status == "active") {?>
                    <option value="active" selected>Active</option>
                    <option value="inactive">InActive</option>
                    <?php }else {?>
                       <option value="active">Active</option>
                    <option value="inactive" selected>InActive</option>
                    <?php } ?>

                  </select>
                  </div>

                

                   <div class="form-group">
                  <label for="typeInput">Type</label>
                  <select class="form-control" id="typeInput" name="type">
                    <option value="Individual">Individual</option>
                    <option value="Institutional">Institutional</option>
                    <option value="Corporate">Corporate</option>
                  </select>
                  </div>
               
              <input type="submit" class="btn btn-primary"  name="save" value="editUsers">
                <a href="admin.php#users" class="btn btn-primary" type="cancel" class="btn">Cancel</a>

              <?php 
            }else 
            {
              ?>
                  <form role="form" name="userFrm" id="userFrm" action="save.php" method="POST">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" name="id" id="idInput" disabled>
                </div>
               <div class="form-group">
                  <label for="unameInput">Username</label>
                  <input type="text" class="form-control" name="uname" id="userInput" placeholder="Username" required>
                </div>
              <div class="form-group">
                  <label for="fnameInput">Password</label>
                  <input type="password" class="form-control" name="pword" id="pwordInput" placeholder="Password" required>
                </div>

                <div class="form-group">
                  <label for="fnameInput">Firstname</label>
                  <input type="text" class="form-control" name="firstname" id="fnameInput" placeholder="Firstname" required>
                </div>

                <div class="form-group">
                  <label for="lnameInput">Lastname</label>
                  <input type="text" class="form-control" name="lastname" id="lnameInput" placeholder="Lastname" required>
                </div>

                <div class="form-group">
                  <label for="emailInput">Email</label>
                  <input type="email" class="form-control" name="email" id="emailInput" placeholder="Email" required>
                </div>

                <div class="form-group">
                  <label for="schoolInput">Institution</label>
                  <input type="text" class="form-control" name="institution" id="schoolInput" placeholder="Institution" required>
                </div>

                  <div class="form-group">
                  <label for="dateInput">Date</label>
                  <input type="date" class="form-control" name="date" id="dateApproved" required>
                </div>

                 <div class="form-group">
                  <label for="statusInput">Status</label>
                  <select class="form-control" id="statusInput" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">InActive</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="typeInput">Type</label>
                  <select class="form-control" id="typeInput" name="type">
                    <option value="Individual">Individual</option>
                    <option value="Institutional">Institutional</option>
                    <option value="Corporate">Corporate</option>
                  </select>
                  </div>
                <input type="submit" class="btn btn-primary" name="save" value="saveUsers">
                
              <?php
              }
              ?>
              </form>
</div>
              <div class="table-responsive ">
                <table class="table table-striped table-hover table-condensed">
                  <thead>
                    <tr>
                      <th>ID #</th>
                      <th>Username</th>
                 
                      <th>FirstName</th>
                      <th>Lastname</th>
                      <th>Email</th>
                      <th>Institution</th>
                      <th>Status</th>
                      <th>Type</th>
                      <th>Date</th>
                      <th>Expiration</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php 
                    $sql = "SELECT * FROM userstbl ORDER BY mstatus,lastname ASC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                          if($row["mstatus"]=="notexpired"){
                            $style = "success";
                          }else {
                            $style = "danger";
                          }

                         echo "<tr class=".$style."><td> " . $row["id"]. "</td>"; 
                         echo "<td> " . $row["username"]. "</td>";
                        
                        echo "<td> " . $row["firstname"]. "</td>";
                        echo "<td> " . $row["lastname"]. "</td>";
                         echo "<td> " . $row["email"]. "</td>";
                         echo "<td> " . $row["institution"]. "</td>";
                         echo "<td> " . $row["mstatus"]. "</td>";
                         echo "<td> " . $row["type"]. "</td>";
                         echo "<td> " . $row["date"]. "</td>"; 
                         echo "<td> " . $row["dateexpiration"]. "</td>";
                         if($row['filepath'] != ""){
                          echo "<td><a target ='_blank' href='".$row["filepath"]."''><img src='" . $row["filepath"]. "' width='20' height='20'></a></td>";
                          } else {

                            echo "<td></td>";
                          }
                          ?>
                      <td>
                        <form method="POST" name="usersFrm1">
                       <a href='admin.php?id=<?php echo $row['id'];?>&category=users' onclick="redirect()" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>

                        <a class="btn btn-default btn-xs" href='delete.php?id=<?php echo $row['id']."&"."arg=users";?>'>
                          <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>
                        </form>
                      </td>
                    </tr>  
                <?php      
                 }
                } else {
                //phpAlert("Data Not Found");
                  }

                    ?>
                  </tbody>
                </table>
              </div>
            </div> <!-- /tab-pane -->

            <div class="tab-pane" id="registrations">
              <h2 class="sub-header">Participants</h2>

  <button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapseregistration">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button>             
<div id="collapseregistration" class="collapse in">
              <div class="table-responsive ">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      
                 
                      <th>FirstName</th>
                      <th>Lastname</th>
                      <th>Email</th>
                      <th>Event</th>
                      <th>Action</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                   

                    $sql1 = "SELECT * FROM registrationstbl ORDER BY id DESC LIMIT 1";
                    $result1 = mysqli_query($conn,$sql1);
                      if(mysqli_num_rows($result1)>0){
                          $row1 = mysqli_fetch_assoc($result1);
                          $last_id = $row1['id'];
                      }else{}

                     $sql = "SELECT seminarstbl.id AS sid,seminarstbl.description AS description, seminarstbl.title AS title,
                          userstbl.id AS uid, userstbl.firstname AS firstname,userstbl.lastname AS lastname,
                          userstbl.status AS status,userstbl.email AS email,registrationstbl.eventstatus AS eventstatus,
                          userstbl.type AS type,userstbl.date AS mdate, userstbl.dateexpiration AS dateexpiration, registrationstbl.id AS rid
                          FROM seminarstbl 
                          INNER JOIN registrationstbl 
                          ON seminarstbl.id=registrationstbl.seminarid 
                          INNER JOIN userstbl ON userstbl.id = registrationstbl.userid
                          
                          ORDER BY rid,title,lastname ASC"; 

                    //$sql = "SELECT * FROM userstbl ORDER BY lastname ASC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                         
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                         if($row['rid']==$last_id){
                            $style = "warning";
                          }else {
                            $style = "info";
                          }
                       
                        echo "<tr class=".$style."><td> " . $row["firstname"]. "</td>";
                        echo "<td> " . $row["lastname"]. "</td>";
                         echo "<td> " . $row["email"]. "</td>";
                         echo "<td> " . $row['title']."</td>";
                      
                         
                      
                          ?>
                      <td>
                        
                      
                        <a class="btn btn-default btn-xs" href='delete.php?id=<?php echo $row['rid'];?>&arg=registrations'>
                          <span class="glyphicon glyphicon-trash"></span> Remove
                        </a>
                        </form>
                      </td>
                    </tr> 

               
                <?php      
                 }
                } else {
                //phpAlert("Data Not Found");
                  }

                    ?>
                  </tbody>
                </table>  
              </div>

</div>
            <form role="form" name="userFrm" id="userFrm" method="POST" action="save.php">
              <?php 
                $sql = "SELECT * FROM seminarstbl ORDER BY `date` DESC LIMIT 2";
                     $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) { ?>
      
                     <div class="form-group " style="position:fixed; top:50px;">
                   <!--    <h3 class="sub-header">Seminars and Events</h3>
                  <label for="statusInput">Select Seminar</label> -->
                  <select class="form-control" id="seminarInput" name="seminar">
                    <option value="a" disabled selected>select a seminar or event...</option>
                    <?php
                         while($row = mysqli_fetch_assoc($result)) { ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
                  <?php } ?>
                  </select>
                  </div>
                  <?php } ?>
<button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapsemembersList">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button>             
<div id="collapsemembersList" class="collapse in">
              
            <h2 class="sub-header">Members List</h2>
               <div class="table-responsive ">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      
                 
                      <th>FirstName</th>
                      <th>Lastname</th>
                      <th>Email</th>
                   <!--   <th>Event Status</th> -->
                      <th>Status</th>
                      <th>Type</th>
                      <th>Date</th>
                      <th>Expiration</th>
                    
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                   $sql = "SELECT * FROM userstbl ORDER BY mstatus,lastname DESC";


                    //$sql = "SELECT * FROM userstbl ORDER BY lastname ASC";
                    $result = mysqli_query($conn,$sql);

                        if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                          $count = 1;
                         while($row = mysqli_fetch_assoc($result)) {
                          $id = $row['id'];
                          if($row["mstatus"]=="notexpired"){
                            $style = "success";
                          }else {
                            $style = "danger";
                          }
                         
                        echo "<input type='hidden' name=uid".$count." ". "value='".$row['id']."'>";
                        echo "<tr class=".$style."><td> " . $row["firstname"]. "</td>";
                        echo "<td> " . $row["lastname"]. "</td>";
                         echo "<td> " . $row["email"]. "</td>";
                        // echo "<td> " . $row['eventstatus']."</td>";
                         echo "<td> " . $row["mstatus"]. "</td>";
                         echo "<td> " . $row["type"]. "</td>";
                         echo "<td> " . $row["date"]. "</td>"; 
                         echo "<td> " . $row["dateexpiration"]. "</td>";
                            
                          
                          ?>
                      <td>
                        
                       <input type="submit" value="Register" name="save<?php echo $count;?>" class="btn btn-default btn-xs">
                        </form>
                          <?php $count++; ?>
                        

                       
                        
                      </td>
                    </tr>  
                <?php      
                 }?>
                 <input type="hidden" name="count" value="<?php echo $count;?>">
                  
                 <?php
                } else {
                //phpAlert("Data Not Found");
                  }

                    ?>
                  
                  </tbody>
                </table>
              </div>
</div>              
              <h2 class="sub-header">Online Registration</h2>
               <div class="table-responsive ">
                <table class="table table-striped table-hover">
                  <thead>
                    <form role="form" name="userFrm1" id="userFrm" method="POST" action="save2.php">
                    <tr>
                      
                 
                      <th>FirstName</th>
                      <th>Lastname</th>
                      <th>Email</th>
                   <!--   <th>Event Status</th> -->
                      <th>Status</th>
                      <th>Type</th>
                      <th>Date</th>
                      <th>Expiration</th>
                      <th>Seminar</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                  

                          $sql2 = "SELECT seminarstbl.id AS sid,seminarstbl.description AS description, seminarstbl.title AS title,
                          userstbl.id AS uid, userstbl.firstname AS firstname,userstbl.lastname AS lastname,
                          userstbl.mstatus AS mstatus,userstbl.email AS email,onlineregistrationstbl.eventstatus AS eventstatus,
                          userstbl.type AS type,userstbl.date AS mdate, userstbl.dateexpiration AS dateexpiration,
                          onlineregistrationstbl.filepath as filepath, onlineregistrationstbl.id AS rid,userstbl.date AS `date`
                          FROM seminarstbl 
                          INNER JOIN onlineregistrationstbl 
                          ON seminarstbl.id=onlineregistrationstbl.seminarid
                          INNER JOIN userstbl 
                          ON userstbl.id = onlineregistrationstbl.userid";
                          $result = mysqli_query($conn,$sql2);
                      if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                          $count = 1;
                         while($row = mysqli_fetch_assoc($result)) {
                          $id = $row['uid'];
                      
                          if($row["mstatus"]=="notexpired"){
                            $style = "success";
                          }else {
                            $style = "danger";
                          }
                         echo "<input type='hidden' name=sids".$count." "."value=".$row['sid'].">";
                        echo "<input type='hidden' name=uids".$count." ". "value='".$row['uid']."'>";
                        echo "<tr class=".$style."><td> " . $row["firstname"]. "</td>";
                        echo "<td> " . $row["lastname"]. "</td>";
                         echo "<td> " . $row["email"]. "</td>";
                        // echo "<td> " . $row['eventstatus']."</td>";
                         echo "<td> " . $row["mstatus"]. "</td>";
                         echo "<td> " . $row["type"]. "</td>";
                         echo "<td> " . $row["date"]. "</td>"; 
                         echo "<td> " . $row["dateexpiration"]. "</td>";
                         echo "<td> " . $row["title"]. "</td>";
                            if($row['filepath'] != ""){
                          echo "<td><a target ='_blank' href='".$row["filepath"]."''><img src='" . $row["filepath"]. "' width='20' height='20'></a></td>";
                          } else {

                            echo "<td></td>";
                          }
                          
                          ?>
                      <td>
                        
                       <input type="submit" value="onlineRegister" name="saves<?php echo $count;?>" class="btn btn-default btn-xs">
                          
                          <?php $count++; ?>
                         

                       
                        
                      </td>
                    </tr>  
                <?php      
                 }?>
                 <input type="hidden" name="counts" value="<?php echo $count;?>">
                </form>
                 <?php
                } else {
                //phpAlert("Data Not Found");
                  }

                    ?>
                  
                  </tbody>
                </table>
              </div>



            </div> <!-- /tab-pane -->
          
             <div class="tab-pane" id="seminars">
              <h2 class="sub-header">Seminars</h2>

  <button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapseseminars">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button>             
<div id="collapseseminars" class="collapse in">              

               <?php
                  $id = $_GET['id'];
                  $category = $_GET['category'];
                    if($id != "" && $category == "seminars")
                      {
                        $sql = "SELECT * FROM seminarstbl WHERE id=$id";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                          $row = mysqli_fetch_assoc($result);
                            
                            
                            $id1 = $row['id'];
                            $title = $row['title'];

                            $description = $row['description'];

                            $date = $row['date'];

                            $time = $row['time'];

                            $venue = $row['venue'];
                           

                            
                            
                          }


                    
                    ?>
                    <form role="form" name="seminarsFrm" id="seminarsFrm" action="update.php?id=<?php echo $id;?>" method="POST" >
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" name="id" value='<?php echo $id1;?>' disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" id="nameInput" name="title" value="<?php echo $title;?>" placeholder="Title" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">Description</label>
                  <textarea class="form-control" rows="3"  id="editor6" name="description" placeholder="venue" required><?php echo $description;?></textarea>
                  <script>
                      CKEDITOR.replace( 'editor6' );
                  </script>
                </div>
                <div class="form-group"> 
                  <label for="descriptionText">Date</label>
                  <input type="date" class="form-control" id="dateInput" placeholder="Date" name="date" value='<?php echo $date;?>' required>
                </div>
                <div class="form-group"> 
                  <label for="descriptionText">Time</label>
                  <input type="time" class="form-control" id="dateInput" placeholder="time" name="time" value='<?php echo $time;?>' required>
               </div>
                 <div class="form-group">
                  <label for="nameInput">Venue</label>
                  <input type="text" class="form-control" id="nameInput" name="venue" value="<?php echo $venue;?>" placeholder="Venue" required>
                </div>

                <input type="submit" class="btn btn-primary"  name="save" value="editSeminars">
                <a href="admin.php#seminars" class="btn btn-primary" type="cancel" class="btn">Cancel</a>
                  <?php
                    }
                    else
                    {
                  ?>
         
              <form role="form" name="seminarsFrm" id="seminarsFrm" action="save.php" method="POST">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" id="nameInput" placeholder="Name" name="title" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">Description</label>
                  <textarea class="form-control" rows="3" id="editor6" placeholder="Venue" name="description" required></textarea>
                  <script>
                      CKEDITOR.replace( 'editor6' );
                  </script>
                </div>
              <div class="form-group"> 
                  <label for="descriptionText">Date</label>
                  <input type="date" class="form-control" id="dateInput" placeholder="Date" name="date" required>
              </div>
               <div class="form-group"> 
                  <label for="descriptionText">Time</label>
                  <input type="time" class="form-control" id="dateInput" placeholder="time" name="time" required>
              </div>
               <div class="form-group">
                  <label for="nameInput">Venue</label>
                  <input type="text" class="form-control" id="nameInput" name="venue" placeholder="Venue" required>
                </div>                
                <input type="submit" class="btn btn-primary" value="saveSeminars">
                <?php } ?>
              </form>              
</div>
              <div class="table-responsive ">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID #</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Venue</th>
                      <th>Action</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * FROM seminarstbl ORDER BY id DESC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                         echo "<tr><td> " . $row["id"]. "</td>"; 
                         echo "<td> " . $row["title"]. "</td>";
                        echo "<td>" . $row["description"]. "</td>";
                        echo "<td> " . $row["date"]. "</td>";
                        echo "<td> " . $row["time"]. "</td>";
                        echo "<td> " . $row["venue"]. "</td>";
                          
                          ?>
                      <td>
                        <form method="POST" name="seminarsFrm1">
                       <a href='admin.php?id=<?php echo $row['id'];?>&category=seminars' onclick="redirect()" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>

                        <a class="btn btn-default btn-xs" href='delete.php?id=<?php echo $row['id']."&"."arg=seminars";?>'>
                          <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>
                        </form>
                      </td>
                    </tr>  
                <?php      
                 }
                } else {
                //phpAlert("Data Not Found");
                  }

                    ?>
                    
                  
                  </tbody>
                </table>
              </div>
            </div> <!-- /tab-pane -->
         
            <div class="tab-pane" id="news">
              
              <h2 class="sub-header">News and Events</h2>
 <button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapsenews">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button>             
<div id="collapsenews" class="collapse in">
                 <?php
                  $id = $_GET['id'];
                  $category = $_GET['category'];
                    if($id != "" && $category == "news")
                      {
                        $sql = "SELECT * FROM newstbl WHERE id=$id";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                          $row = mysqli_fetch_assoc($result);
                            

                            $id1 = $row['id'];  
                            
                            $title = $row['title'];

                            $description = $row['description'];

                            
                            
                          }


                    
                    ?>
                    <form role="form" name="newsFrm" id="newsFrm" action="update.php?id=<?php echo $id;?>" method="POST">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" name="id" value='<?php echo $id1;?>' disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" id="nameInput" name="title" value="<?php echo $title;?>"placeholder="Title" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">Description</label>
                  <textarea class="form-control" rows="3" id="editor5" name="description" placeholder="Description" required><?php echo $description;?></textarea>
                    <script>
                      CKEDITOR.replace( 'editor5' );
                  </script>
                </div>
              
                <input type="submit" class="btn btn-primary"  name="save" value="editNews">
                <a href="admin.php#news" class="btn btn-primary" type="cancel" class="btn">Cancel</a>
                  <?php
                    }
                    else
                    {
                  ?>
                  
              <form role="form" name="newsFrm" id="newsFrm" action="save.php" method="POST">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" id="nameInput" name="title" placeholder="Name" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">Description</label>
                  <textarea class="form-control" rows="3" id="editor5" name="description" placeholder="Description" required></textarea>
                    <script>
                      CKEDITOR.replace( 'editor5' );
                  </script>
                </div>
              
                <input type="submit" class="btn btn-primary"  name="save" value="saveNews">

                <?php } ?>
                
              </form>              
</div>
              <div class="table-responsive ">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID #</th>
                      <th>News Title</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * FROM newstbl ORDER BY date DESC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                         echo "<tr><td> " . $row["id"]. "</td>"; 
                         echo "<td> " . $row["title"]. "</td>";
                        echo "<td>" . $row["date"]. "</td>";
                        
                          ?>
                      <td>
                        <form method="POST" name="newsFrm1">
                        <a href='admin.php?id=<?php echo $row['id'];?>&category=news' onclick="redirect()" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>

                        <a class="btn btn-default btn-xs" href='delete.php?id=<?php echo $row['id']."&"."arg=news";?>'>
                          <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>
                        </form>
                      </td>

                       <?php      
                 }
                } else {
                //phpAlert("Data Not Found");
                  }

                    ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div> <!-- /tab-pane -->

            <div class="tab-pane" id="jobs">
              <h2 class="sub-header">Jobs</h2>
 <button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapsejobs">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button>             
<div id="collapsejobs" class="collapse in">
              <?php
                  $id = $_GET['id'];
                  $category = $_GET['category'];
                    if($id != "" && $category == "jobs")
                      {
                        $sql = "SELECT * FROM jobstbl WHERE id=$id";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                          $row = mysqli_fetch_assoc($result);
                            
                            $id1 = $row['id'];  
                            
                            $title = $row['title'];

                            $description = $row['description'];

                            
                            
                          }


                    
                    ?>

                    <form role="form" name="jobsFrm" id="jobsFrm" action="update.php?id=<?php echo $id;?>" method="POST">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" name="id" value='<?php echo $id1;?>' disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" id="nameInput" name="title" value="<?php echo $title;?>"placeholder="Name" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">Description</label>
                  <textarea class="form-control" rows="3" id="editor4" name="description" placeholder="Description" required><?php echo $description;?></textarea>
                    <script>
                      CKEDITOR.replace( 'editor4' );
                  </script>
                </div>
              
                <input type="submit" class="btn btn-primary"  name="save" value="editJobs">
                <a href="admin.php#jobs" class="btn btn-primary" type="cancel" class="btn">Cancel</a>
                  <?php
                    }
                    else
                    {
                  ?>
              
              <form role="form" name="jobsFrm" id="jobsFrm" action="save.php" method="POST">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">Description</label>
                  <textarea class="form-control" id="editor4" name="description" rows="20" placeholder="Description" required></textarea>
                       <script>
                      CKEDITOR.replace( 'editor4' );
                  </script>
                </div>  
              
                
                <input type="submit" class="btn btn-primary" name="save" value="saveJobs">
                <?php } ?>

              </form>
</div>
             
              <div class="table-responsive ">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID #</th>
                      <th>Job Title</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * FROM jobstbl ORDER BY date DESC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                         echo "<tr><td> " . $row["id"]. "</td>"; 
                         echo "<td> " . $row["title"]. "</td>";
                        echo "<td>" . $row["date"]. "</td>";
                        
                          ?>
                      <td>
                        <form method="POST" name="jobsFrm1">
                    
                        <a href='admin.php?id=<?php echo $row['id'];?>&category=jobs' onclick="redirect()" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>

                         <a class="btn btn-default btn-xs" href='delete.php?id=<?php echo $row['id']."&"."arg=jobs";?>'>
                          <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>
                      </form>
                      </td>

                       <?php      
                 }
                } else {
                //phpAlert("Data Not Found");
                  }

                    ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div> <!-- /tab-pane -->

            <div class="tab-pane" id="downloads">
              <h2 class="sub-header">Downloads</h2>
 <button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapsedownloads">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button>             
<div id="collapsedownloads" class="collapse in">
              <?php
                  $id = $_GET['id'];
                  $category = $_GET['category'];
                    if($id != "" && $category == "downloads")
                      {
                        $sql = "SELECT * FROM downloadstbl WHERE id=$id";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                          $row = mysqli_fetch_assoc($result);
                            
                            $id1 = $row['id'];  
                            
                            $title = $row['title'];

                            $description = $row['description'];

                            $filepath = $row['filepath'];

                            
                            
                          }


                    
                    ?>
                    <form role="form" name="downloadsFrm" id="downloadsFrm" action="fileupdate.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" name="id" value='<?php echo $id1;?>' disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" id="nameInput" name="title" value="<?php echo $title;?>" placeholder="Title" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">Description</label>
                  <textarea class="form-control" rows="3"  name="description"  placeholder="Description" required><?php echo $description;?></textarea>
                </div>
                <div class="form-group">
                  <label for="imageInputFile">File input</label>
                  <input type="file" id="imageInputFile" name="imageInputFile">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <input type="submit" class="btn btn-primary"  name="save" value="editFile">
                <a href="admin.php#downloads" class="btn btn-primary" type="cancel" class="btn">Cancel</a>
                  <?php
                    }
                    else
                    {
                  ?>
         
              <form role="form" name="downloadsFrm" id="downloadsFrm" action="fileupload.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" id="nameInput" placeholder="Name" name="title" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">Description</label>
                  <textarea class="form-control" rows="3" placeholder="Description" name="description" required></textarea>
                </div>
                <div class="form-group">
                  <label for="imageInputFile">File input</label>
                  <input type="file" id="imageInputFile" name="imageInputFile">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <input type="submit" class="btn btn-primary" name="button" value="UploadFile">
               
                           
                <?php } ?>
                </form> 
</div>

              <div class="table-responsive ">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID #</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * FROM downloadstbl ORDER BY id DESC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                         echo "<tr><td> " . $row["id"]. "</td>"; 
                         echo "<td> " . $row["title"]. "</td>";
                        echo "<td>" . $row["description"]. "</td>";
                          echo "<td><a target ='_blank' href='".$row["filepath"]."''><img src='" . $row["filepath"]. "' width='20' height='20'></a></td>";
                          ?>
                      <td>
                        <form method="POST" name="downloadsFrm1">
                        <a href='admin.php?id=<?php echo $row['id'];?>&category=downloads' onclick="redirect()" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>

                        <a class="btn btn-default btn-xs" href='delete.php?id=<?php echo $row['id']."&"."arg=downloads";?>'>
                          <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>
                        </form>
                      </td>
                    </tr>  
                <?php      
                 }
                } else {
                //phpAlert("Data Not Found");
                  }

                    ?>
                    
                  
                  </tbody>
                </table>
              </div>
            </div> <!-- /tab-pane -->

             <div class="tab-pane" id="forums">
              <h2 class="sub-header">Forums</h2>
 <button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapseforums">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button>             
<div id="collapseforums" class="collapse in">
              <?php
                  $id = $_GET['id'];
                  $category = $_GET['category'];
                    if($id != "" && $category == "forums")
                      {
                        $sql = "SELECT * FROM forumstbl WHERE id=$id";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                          $row = mysqli_fetch_assoc($result);
                            
                            $id = $row['id'];  
                            
                            $title = $row['title'];


                            
                            
                          }


                    
                    ?>

                    <form role="form" name="forumsFrm" id="forumsFrm" action="update.php?id=<?php echo $row['id'];?>" method="POST">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" name="id" value="<?php echo $id;?>" disabled>
                </div>

               <div class="form-group">
                  <label for="descriptionText">Title</label>
                  <textarea class="form-control" rows="20" id="editor7" name="title" placeholder="Description" required><?php echo $title;?></textarea>
                    <script>
                      CKEDITOR.replace( 'editor7' );
                  </script>
                </div>
              
                <input type="submit" class="btn btn-primary"  name="save" value="editForums">
                <a href="admin.php#forums" class="btn btn-primary" type="cancel" class="btn">Cancel</a>
              </form>
                  <?php
                    }
                    else
                    {
                  ?>
              
              <form role="form" name="forumsFrm" id="forumsFrm" action="save.php" method="POST">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" disabled>
                </div>

             
                <div class="form-group">
                  <label for="descriptionText">Title</label>
                  <textarea class="form-control" id="editor7" name="title" rows="20" placeholder="Description" required></textarea>
                       <script>
                      CKEDITOR.replace( 'editor7' );
                  </script>
                </div>  
              
                
                <input type="submit" class="btn btn-primary" name="save" value="saveForums">
                <?php } ?>

              </form>
</div>
             
              <div class="table-responsive ">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID #</th>
                      <th>Title</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * FROM forumstbl ORDER BY date DESC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                         echo "<tr><td> " . $row["id"]. "</td>"; 
                         echo "<td> " . $row["title"]. "</td>";
                        echo "<td>" . $row["date"]. "</td>";
                        
                          ?>
                      <td>
                        <form method="POST" name="forumsFrm1">
                    
                        <a href='admin.php?id=<?php echo $row['id'];?>&category=forums' onclick="redirect()" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>

                         <a class="btn btn-default btn-xs" href='delete.php?id=<?php echo $row['id']."&"."arg=forums";?>'>
                          <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>
                      </form>
                      </td>

                       <?php      
                 }
                } else {
                //phpAlert("Data Not Found");
                  }

                    ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div> <!-- /tab-pane -->

            <div class="tab-pane" id="polls">
              <h2 class="sub-header">Polls</h2>
 <button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapsepolls">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button>             
<div id="collapsepolls" class="collapse in">              
                
              <?php
                 $id=$_GET['id'];
                  $category = $_GET['category'];
                    if($id != "" && $category == "polls")
                      {
                        $sql1 = "SELECT * FROM pollstbl WHERE id=$id";
                          $result1 = mysqli_query($conn,$sql1);
                      

                          $row = mysqli_fetch_assoc($result1);
                             $id1 = $row['id'];
                            $title = $row['title'];
                            $status =  $row['status'];
                            ?>
              <form role="form" name="pollsFrm" id="pollsFrm" method="POST" action="update.php?id=<?php echo $id;?>">
                <div class="form-group">
                <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" name="id" value="<?php echo $id;?>" disabled>
                </div>
               <div class="form-group">
                  <label for="unameInput">Title</label>
                  <input type="text" class="form-control" id="userInput" placeholder="Title" name="title" value="<?php echo $title;?>" required>
                </div> 
                    <div class="form-group">
                  <label for="statusInput">Status</label>
                  <select class="form-control" id="statusInput" name="status">
                    <?php 
                      if($status == "active") {?>
                    <option value="active" selected>Active</option>
                    <option value="inactive">InActive</option>
                    <?php } else {?>
                      <option value="active">Active</option>
                    <option value="inactive" selected>InActive</option>
                    <?php }?>

                  </select>

                  </div>

                            <?php
                        // SELECT pollstbl.id AS id,pollstbl.title AS title, pollstbl.status AS status,
                        // optionstbl.option AS option1,optionstbl.value AS value,
                        // optionstbl.optionid AS optionid 
                        // FROM pollstbl 
                        // INNER JOIN optionstbl 
                        // ON pollstbl.id=optionstbl.id 
                        // WHERE pollstbl.id=$id;
                            $sql ="SELECT * FROM optionstbl WHERE id=$id";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                          $count = 0;
                          while($row = mysqli_fetch_assoc($result)){
                            $count++;
                           $option = $row['option'];
                           $optionid = $row['optionid'];

                            $value = $row['value'];
                            ?> 

                            <div class="form-group">
                  <label for="fnameInput">Option <?php echo $count;?></label>
                  <input type="text" class="form-control" id="fnameInput" placeholder="Option<?php echo $count;?>" name="option<?php echo $count;?>" value="<?php echo $option;?>">
                </div>

                 <div class="form-group">
                  
                  <input type="hidden" class="form-control" id="hiddenInput" placeholder="Option<?php echo $count;?>" name="optionid<?php echo $count;?>" value="<?php echo $optionid;?>">
                </div>    

                
                          <?php  
                          }

                        }

                        ?>

                <input type="submit" class="btn btn-primary"  name="save" value="editPolls">
                <a href="admin.php#polls" class="btn btn-primary" type="cancel" class="btn">Cancel</a>

                  <?php  
                }
                  else 

                  {
                    
                    ?> 

        <form role="form" name="pollsFrm" id="pollsFrm" method="POST" action="save.php">
                <div class="form-group">
                    <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" name="id" value="<?php echo $id;?>" disabled>
                </div>
               <div class="form-group">
                  <label for="unameInput">Title</label>
                  <input type="text" class="form-control" id="userInput" placeholder="Title" name="title" value="<?php echo $title;?>" required>
                </div> 
                <?php 
                $count = 1;
                while($count < 6){?>
            <div class="form-group">
                  <label for="optionInput">Option <?php echo $count;?></label>
                  <input type="text" class="form-control" id="fnameInput" placeholder="Option<?php echo $count;?>" name="option<?php echo $count;?>" value="<?php echo $option;?>">
                

                </div>
            <div class="form-group">
                  
                  <input type="hidden" class="form-control" id="hiddenInput" placeholder="Option<?php echo $count;?>" value="<?php echo $option;?>">
                </div>    

                 <!-- <div class="form-group">
                  <label for="selectInput">Value for Option<?php //echo $count;?></label>
                    <select class="form-control" id="selectInput" name="value<?php //echo $count;?>">
                      <option value="5" selected>5</option>
                      <option value="4">4</option>
                      <option value="3">3</option>
                      <option value="2">2</option>
                      <option value="1">1</option>
                    </select>
                  </div> -->

                  <?php 
                  $count++;
                } ?>
            
               <div class="form-group">
                  <label for="statusInput">Status</label>
                  <select class="form-control" id="statusInput" name="status">
               
                    <option value="active" >Active</option>
                    <option value="inactive" selected>InActive</option>

                  
                  </select>
                  </div>
              <input type="submit" class="btn btn-primary"  name="save" value="savePolls">
               
                <?php  } ?>
              
             
              </form>
</div>

              <div class="table-responsive ">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID #</th>
                      <th>Title</th>
                 
                      <th>Status</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                     <?php 
                    $sql = "SELECT * FROM pollstbl ORDER BY id DESC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                         echo "<tr><td> " . $row["id"]. "</td>"; 
                         echo "<td> " . $row["title"]. "</td>";
                        
                        echo "<td> " . $row["status"]. "</td>";
                      

                         ?>
                      <td>
                        <form method="POST" name="pollsFrm1">
                       <a href='admin.php?id=<?php echo $row['id'];?>&category=polls' onclick="redirect()" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>

                        <a class="btn btn-default btn-xs" href='delete.php?id=<?php echo $row['id']."&"."arg=polls";?>'>
                          <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>
                        </form>
                      </td>
                    </tr>  
                <?php      
                 }
                } 
                ?>
                  </tbody>
                </table>
              </div>
            </div> <!-- /tab-pane -->


            <div class="tab-pane" id="banners">
              <h2 class="sub-header">Banner</h2>
 <button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapsebanner">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button>             
<div id="collapsebanner" class="collapse in">
              <?php
                  $id = $_GET['id'];
                  $category = $_GET['category'];
                    if($id != "" && $category == "banners")
                      {
                        $sql = "SELECT * FROM bannerstbl WHERE id=$id";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                          $row = mysqli_fetch_assoc($result);
                            
                            $id1 = $row['id'];

                            $title = $row['title'];

                            $description = $row['description'];

                            $filepath = $row['filepath'];

                            
                            
                          }


                    
                    ?>
                    <form role="form" name="bannersFrm" id="downloadsFrm" action="fileupdate1.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" name="id" value='<?php echo $id1;?>' disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" id="nameInput" name="title" value="<?php echo $title;?>" placeholder="Title" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">URL</label>
                  <textarea class="form-control" rows="3"  name="description"  placeholder="Description" required><?php echo $description;?></textarea>
                </div>
                <div class="form-group">
                  <label for="imageInputFile">File input</label>
                  <input type="file" id="imageInputFile" name="imageInputFile">
                  <p class="help-block">160 x 100 image for best resolution</p>
                </div>
                <input type="submit" class="btn btn-primary"  name="save" value="editFile">
                <a href="admin.php#promotions" class="btn btn-primary" type="cancel" class="btn">Cancel</a>
                  <?php
                    }
                    else
                    {
                  ?>
         
              <form role="form" name="bannersFrm" id="bannersFrm" action="fileupload1.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" id="nameInput" placeholder="Name" name="title" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">URL</label>
                  <textarea class="form-control" rows="3" placeholder="Description" name="description" required></textarea>
                </div>
                <div class="form-group">
                  <label for="imageInputFile">File input</label>
                  <input type="file" id="imageInputFile" name="imageInputFile">
                  <p class="help-block">160 x 100 for best resolution.</p>
                </div>
                <input type="submit" class="btn btn-primary" value="UploadBanner">
              
                <?php } ?>
              </form>              
</div>
              <div class="table-responsive ">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID #</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * FROM bannerstbl ORDER BY id DESC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                         echo "<tr><td> " . $row["id"]. "</td>"; 
                         echo "<td> " . $row["title"]. "</td>";
                        echo "<td>" . $row["description"]. "</td>";
                          echo "<td><a target ='_blank' href='".$row["filepath"]."''><img src='" . $row["filepath"]. "' width='20' height='20'></a></td>";
                          ?>
                      <td>
                        <form method="POST" name="bannersFrm1">
                        <a href='admin.php?id=<?php echo $row['id'];?>&category=banners' onclick="redirect()" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>

                        <a class="btn btn-default btn-xs" href='delete.php?id=<?php echo $row['id']."&"."arg=banners";?>'>
                          <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>
                        </form>
                      </td>
                    </tr>  
                <?php      
                 }
                } else {
                //phpAlert("Data Not Found");
                  }

                    ?>
                    
                  
                  </tbody>
                </table>
              </div>
            </div> <!-- /tab-pane -->

            <div class="tab-pane" id="promotions">
              <h2 class="sub-header">Promotion</h2>
 <button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapsepromotions">
    <span class="glyphicon glyphicon-sort" aria-hidden="true"></span>
  </button>             
<div id="collapsepromotions" class="collapse in">
               <?php
                  $id = $_GET['id'];
                  $category = $_GET['category'];
                    if($id != "" && $category == "promotions")
                      {
                        $sql = "SELECT * FROM promotionstbl WHERE id=$id";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                          $row = mysqli_fetch_assoc($result);
                            
                            
                            $id1 = $row['id'];
                            $title = $row['title'];

                            $description = $row['description'];

                            $date = $row['date'];

                            $time = $row['time'];

                            $filepath = $row['filepath'];

                            
                            
                          }


                    
                    ?>
                    <form role="form" name="promotionsFrm" id="promotionsFrm" action="fileupdate2.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" name="id" value='<?php echo $id1;?>' disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" id="nameInput" name="title" value="<?php echo $title;?>" placeholder="Title" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">Venue</label>
                  <textarea class="form-control" rows="3"  name="description" placeholder="venue" required><?php echo $description;?></textarea>
                </div>
                <div class="form-group"> 
                  <label for="descriptionText">Date</label>
                  <input type="date" class="form-control" id="dateInput" placeholder="Date" name="date" value='<?php echo $date;?>' required>
                </div>
                <div class="form-group"> 
                  <label for="descriptionText">Time</label>
                  <input type="time" class="form-control" id="dateInput" placeholder="time" name="time" value='<?php echo $time;?>' required>
               </div>
                <div class="form-group">
                  <label for="imageInputFile">File input</label>
                  <input type="file" id="imageInputFile" name="imageInputFile">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <input type="submit" class="btn btn-primary"  name="save" value="editPromotions">
                <a href="admin.php#promotions" class="btn btn-primary" type="cancel" class="btn">Cancel</a>
                  <?php
                    }
                    else
                    {
                  ?>
         
              <form role="form" name="promotionsFrm" id="promotionsFrm" action="fileupload2.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="idInput">ID #</label>
                  <input type="text" class="form-control" id="idInput" disabled>
                </div>

                <div class="form-group">
                  <label for="nameInput">Title</label>
                  <input type="text" class="form-control" id="nameInput" placeholder="Name" name="title" required>
                </div>
                <div class="form-group">
                  <label for="descriptionText">Venue</label>
                  <textarea class="form-control" rows="3" placeholder="Venue" name="description" required></textarea>
                </div>
              <div class="form-group"> 
                  <label for="descriptionText">Date</label>
                  <input type="date" class="form-control" id="dateInput" placeholder="Date" name="date" required>
              </div>
               <div class="form-group"> 
                  <label for="descriptionText">Time</label>
                  <input type="time" class="form-control" id="dateInput" placeholder="time" name="time" required>
              </div>
                <div class="form-group">
                  <label for="imageInputFile">File input</label>
                  <input type="file" id="imageInputFile" name="imageInputFile">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <input type="submit" class="btn btn-primary" value="UploadPromotion">
                <?php } ?>
              </form>              
</div>
              <div class="table-responsive ">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>ID #</th>
                      <th>Title</th>
                      <th>Venue</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Image</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * FROM promotionstbl ORDER BY id DESC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                         echo "<tr><td> " . $row["id"]. "</td>"; 
                         echo "<td> " . $row["title"]. "</td>";
                        echo "<td>" . $row["description"]. "</td>";
                        echo "<td> " . $row["date"]. "</td>";
                        echo "<td> " . $row["time"]. "</td>";
                          echo "<td><a target ='_blank' href='".$row["filepath"]."''><img src='" . $row["filepath"]. "' width='20' height='20'></a></td>";
                          ?>
                      <td>
                        <form method="POST" name="promotionsFrm1">
                       <a href='admin.php?id=<?php echo $row['id'];?>&category=promotions' onclick="redirect()" class="btn btn-default btn-xs">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>

                        <a class="btn btn-default btn-xs" href='delete.php?id=<?php echo $row['id']."&"."arg=promotions";?>'>
                          <span class="glyphicon glyphicon-trash"></span> Delete
                        </a>
                        </form>
                      </td>
                    </tr>  
                <?php      
                 }
                } else {
                //phpAlert("Data Not Found");
                  }

                    ?>
                    
                  
                  </tbody>
                </table>
              </div>
            </div> <!-- /tab-pane -->
<div class="tab-pane" id="reports">
        <h2 class="sub-header">Reports</h2>  
          <h3>List of Active Members</h3>
            <?php 
$sql = "SELECT * FROM userstbl WHERE type='Corporate' AND mstatus='notexpired' ORDER BY lastname ASC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {
                         echo "<h4>List of Corporate Members</h4><ol type='1.''>";
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
                         echo "<h4>List of Institutional Members</h4><ol type='1.''>";  
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
                        echo  "<h4>List of Individual Members</h4><ol type='1.''>";
                   // output data of each row
                         while($row = mysqli_fetch_assoc($result)) {
                       echo "<li>".$row["firstname"]." ".$row["lastname"]."-<i>". $row["institution"]."</i></li>";
                       }
                     }
?>               
</ol> 
<hr>

<h3>List of Seminars and Events</h3>
<?php 
                  $sql = "SELECT * FROM seminarstbl ORDER BY id";
                  $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result) > 0) {?>
                    <ol type="1">
                    <?php
                      while($row = mysqli_fetch_assoc($result)){                 
                  ?>
              
                  <li><p><h4><?php echo $row['title'];?></h4>
                    
                  <b>Description:</b><?php echo $row['description'];?>
                    <b>Time:</b><?php echo $row['time'];?>
                  <b>Date:</b><?php echo $row['date'];?>
                    <b>Venue:</b><?php echo $row['venue'];?>
                  </h4></p>
                </li>
                <?php } ?>
                  </ol>
                <?php } ?>
<hr>
<h3>List of Attendees and Participants of Recent Seminars or Events</h3>
     <?php
                $sql1 = "SELECT * FROM seminarstbl";
                $result1 = mysqli_query($conn,$sql1);
                while($row1 = mysqli_fetch_assoc($result1)){
                      $id = $row1['id'];       
                      $title = $row1['title'];
        echo "<ul type='disc'><li><h4>".$title."</h4></li>";
                     $sql = "SELECT seminarstbl.id AS sid,seminarstbl.description AS description, seminarstbl.title AS title,
                          userstbl.id AS uid, userstbl.firstname AS firstname,userstbl.lastname AS lastname,
                          userstbl.mstatus AS mstatus,userstbl.email AS email,registrationstbl.eventstatus AS eventstatus,
                          userstbl.type AS type,userstbl.date AS mdate, userstbl.dateexpiration AS dateexpiration,
                           registrationstbl.id AS rid
                          FROM seminarstbl 
                          INNER JOIN registrationstbl 
                          ON seminarstbl.id=registrationstbl.seminarid
                          INNER JOIN userstbl 
                          ON userstbl.id = registrationstbl.userid
                          WHERE seminarstbl.id='$id'
                          ORDER BY lastname ASC"; 

                    //$sql = "SELECT * FROM userstbl ORDER BY lastname ASC";
                    $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result) > 0) {?>
                        
               <ol type='1'>
                   <?php
                         while($row = mysqli_fetch_assoc($result)) {
                         // echo "<li><h4> " . $row['title']."</h4></li>";
                       
                        echo "<li>" . $row["firstname"]." ". $row["lastname"]." ". $row["email"]. "</li>";
                         
                      
                         }?>
                         </ol>
                      <?php } 
                       ?>

                     </ul> 
                        <?php } ?>
                                          
<hr>
<h3>Summary of Reservations</h3>


<hr>

                       

</div> <!-- -->            
            <div class="tab-pane" id="settings">
              <h2 class="sub-header">Settings</h2>  


               <form name="settingFrm" id="settingFrm" role="form" action="saveSetting.php" method="POST">
               
                  <?php 
                    $sql = "SELECT DISTINCT dateexpiration FROM userstbl";
                    $result = mysqli_query($conn,$sql);
                    
                      $row = mysqli_fetch_assoc($result);
                        $dateexpiration = $row['dateexpiration'];
                      
                  ?>
                             
                   <div class="form-group">
                  <label for="dateInput">Date of Expiration</label>
                  <input type="date" class="form-control" id="dateInput" name="date" value=<?php echo $dateexpiration;?> required>
                </div>
                        

                  
              

              
                <input type="submit" class="btn btn-primary" value="saveSetting" name="save"></button>
               
               </form>   
            </div> <!-- /tab-pane -->

          </div> <!-- /tab-content -->

        </div> <!-- /main -->
      </div> <!-- /container-fluid -->
    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="holder.js"></script>
    <script>
 
    </script>
  </body>
</html>
<?php //include 'close.php'; 
mysqli_close($conn);
}else {
$file="index.php";
echo '<script type="text/javascript">window.location.assign("'.$file.'");</script>';
}
?>