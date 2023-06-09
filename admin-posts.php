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
   <link rel="stylesheet" href="css/loginstyle.css">
   <link rel="stylesheet" href="css/admin.css">
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
       <a href="admin-edit.php">
       <i class='bx bx-align-left bx-spin bx-flip-horizontal'></i>
         <span class="links_name">Edit Chatbot</span>
       </a>
       <span class="tooltip">Edit Chatbot</span>
      </li>
      <!--<li>
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
     </li>-->
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
      <div class="text">Post</div>
    <?php
        // Database connection settings
        require "functions.php";

        // Create a connection
        $con = mysqli_connect($hostname, $username, $password, $database);

        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        // Delete user function
        function deleteUser($con, $user_id) {
          $deleteQuery = "DELETE FROM posts WHERE id = '$user_id'";
          if ($con->query($deleteQuery) === TRUE) {
              echo "User deleted successfully.";
          } else {
              echo "Error deleting user: " . $con->error;
          }
        }
        // Check if a user ID is provided for deletion
        if (isset($_GET['userId'])) {
          $user_id = $_GET['userId'];
          deleteUser($con, $user_id);
        }

        // Query to retrieve all users
        $query = "SELECT * FROM posts";
        $result = $connection->query($query);
        
        // Check if any rows are returned
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                    <th>id</th>
                    <th>user id</th>
                    <th>Title post</th>
                    <th>post</th>
                    <th>image</th>
                    <th>tag</th>
                    <th>date</th>
                  </tr>";
            echo "<hr>";

            // Loop through each row and display user information
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["user_id "] . "</td>";
                echo "<td>" . $row["title_post"] . "</td>";
                echo "<td>" . $row["post"] . "</td>";
                echo "<td>" . $row["image"] . "</td>";
                echo "<td>" . $row["tag"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
          
            }

            echo "</table>";
        } else {
            echo "No users found.";
        }

        // Close the connection
        $connection->close();
        ?>

  </section>



<script>

 // JavaScript function to delete a user
 function deleteUser(postId) {
  if (confirm("Are you sure you want to delete this post?")) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_post.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Handle the response from the server
        console.log(xhr.responseText);
        // Reload or update the page as needed
        window.location.reload();
      }
    };
    xhr.send("post_id=" + encodeURIComponent(postId));
  }
}


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