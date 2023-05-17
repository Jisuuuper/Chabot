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
             <div class="name"><?php echo $_SESSION['admin_name'] ?></div>
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
<br/>

<div class="col-div-3">
  <div class="box">
    <div style="text-align:center;">
      <!-- <?php
      require 'config.php';

      $query = "SELECT id FROM user_form ORDER BY id";
      $query_run = mysqli_query($connection, $query);

      if (!$query_run) {
          die('Query Error: ' . mysqli_error($connection));
      }
      $row = mysqli_num_rows($query_run);
      echo '<h1>'. $row . '</h1>';
      ?> -->
      <span>Total Users</span>
    </div>
    <i class='bx bx-user-circle bx-spin bx-flip-horizontal box-icon'></i>
  </div>
</div>
<div class="col-div-3">
  <div class="box">
    <div style="text-align:center;">
      <!-- <?php
      require 'config.php';

      $query = "SELECT post_id FROM post_form ORDER BY post_id";
      $query_run = mysqli_query($connection, $query);

      if (!$query_run) {
          die('Query Error: ' . mysqli_error($connection));
      }
      $row = mysqli_num_rows($query_run);
      echo '<h1>' . $row . '</h1>';
      ?> -->
      <span>Total Post</span>
    </div>
    <i class='bx bx-mail-send bx-flip-vertical bx-fade-right box-icon'></i>
  </div>
</div>
<div class="col-div-3">
  <div class="box">
    <div style="text-align:center;">
      <!-- <?php
        require 'config.php';

        $query = "SELECT tag_id FROM question_tag ORDER BY tag_id";
        $query_run = mysqli_query($connection, $query);

        if (!$query_run) {
            die('Query Error: ' . mysqli_error($connection));
        }
        $row = mysqli_num_rows($query_run);
        echo '<h1>' . $row . '</h1>';
      ?> -->
      <span>Total Tags</span>
    </div>
    <i class='bx bx-tag bx-burst box-icon' ></i>
  </div>
</div>
<div class="clearfix"></div>
<br/><br/>  
<div class="clearfix"></div>
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