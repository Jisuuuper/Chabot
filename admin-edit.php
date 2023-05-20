<?php 

	require "functions.php";

	check_login();
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Uni Que - Admin</title>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="css/sidenavbar.css">
   <!-- Boxicons CDN Link -->
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/user_dashboard.css">
   <link rel="icon" href="image/icon.png">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
        table td {
          background-color: black;
        }
        table tr {
          background-color: black;
        }
        body {
            overflow: scroll;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

<div class="sidebar">
    <div class="logo-details">
    <i class='bx bx-bot bx-tada icon'></i>
        <div class="logo_name">Uni Que</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="admin-dashboard.php">
          <i class='bx bxs-dashboard bx-tada' ></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="admin-edit.php">
       <i class='bx bx-align-left bx-spin bx-flip-horizontal'></i>
         <span class="links_name">Edit Chatbot</span>
       </a>
       <span class="tooltip">Edit Chatbot</span>
      </li>
      <li>
       <a href="admin-users.php">
       <i class='bx bx-user-circle bx-spin bx-flip-horizontal'></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">User</span>
     </li>
     <li>
       <a href="admin-posts.php">
       <i class='bx bx-mail-send bx-flip-vertical bx-fade-right'></i>
         <span class="links_name">Post</span>
       </a>
       <span class="tooltip">Post</span>
     </li>
     <li>
       <a href="admin-tags.php">
       <i class='bx bx-tag bx-burst' ></i>
         <span class="links_name">Tag</span>
       </a>
       <span class="tooltip">Tag</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="image/images.png" alt="profileImg">
           <div class="name_job">
             <div class="name"><?php echo $_SESSION['username'] ?></div>
             <div class="job">Admin</div>
           </div>
         </div>
         <a href="logout.php" id="log_out"><i class='bx bx-log-out bx-fade-left' ></i></a>
     </li>
    </ul>
  </div>
  <section class="home-section">
      <div class="text">Dashboard</div>
      <div id="main">
<div class="clearfix"></div>
<div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Missing Responses:</h2>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM chatbot";
                    $empty = "";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){ ?>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Questions</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php while($row = mysqli_fetch_array($result)){
                                    if($row['responses'] == $empty){ ?>
                                      <tr>
                                          <td><?php echo $row['id'] ?></td>
                                          <td><?php echo $row['patterns'] ?></td>
                                          <td>
                                              <a href="update.php?id=<?php echo $row['id']?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                                          </td>
                                      </tr><?php
                                    }
                                } ?>
                              </tbody>                            
                            </table><?php
                            // Free result set
                            mysqli_free_result($result);
                        } else{?>
                            <div class="alert alert-danger"><em>No records were found.</em></div>
                        <?php }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
                <div>
                    <label> Code: </label> <br>
                    <?php
                    $con = mysqli_connect("localhost","root","","beginner_db");

                    $sql = "SELECT * from chatbot";
                    $result = $con->query($sql);

                    if($result = mysqli_query($con, $sql)){
                        $rowcount = mysqli_num_rows( $result );
                    }
                    #rowcount counts how many rows
                        $x = 0;
                        echo "{";
                        echo "<br>";
                        echo "&nbsp&nbsp intents: [";
                        echo "<br>";
                        if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                                if ($x != 0){
                                    echo ", <br>";
                                }
                                echo "&nbsp&nbsp { <br> &nbsp&nbsp&nbsp&nbsp&nbsp\"tag\": \"HTML$x\",<br> &nbsp&nbsp&nbsp&nbsp\"patterns\": [\"". $row["patterns"]. "\"],<br> &nbsp&nbsp&nbsp&nbsp\"responses\": [\"". $row["responses"]. "\"] <br> &nbsp    &nbsp&nbsp}";
                                    //. $row["description"] . "\"]<br>&nbsp&nbsp}";
                                    //echo " " . $row2["comment"];
                                $x = $x + 1;
                            }
                            echo "<br> &nbsp&nbsp] <br> }";
                        } else {
                            echo "0 results";
                        }

                        $con->close();
                        //$x = 1;
                        //while($x <= $rowcount) {
                            //echo "{ <br>";
                            //echo "\"tag\": \"ques$x\", <br>";
                            //echo "\"patterns\": "
                            //$x++; 
                        //}
                    ?>
                </div>
            </div>          
        </div>
    </div>
</div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");
  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });
  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });
  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>