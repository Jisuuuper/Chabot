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
  <div class="text">User</div>

  <!-- <?php
    // Database connection settings
    @include 'config.php';

    // Create a connection
    $connection = mysqli_connect($hostname, $username, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Delete user function
    function deleteUser($connection, $userId) {
      $deleteQuery = "DELETE FROM user_form WHERE id = '$userId'";
      if ($connection->query($deleteQuery) === TRUE) {
          echo "User deleted successfully.";
      } else {
          echo "Error deleting user: " . $connection->error;
      }
    }
    // Check if a user ID is provided for deletion
    if (isset($_GET['userId'])) {
      $userId = $_GET['userId'];
      deleteUser($connection, $userId);
    }

    // Query to retrieve all users
    $query = "SELECT * FROM user_form";
    $result = $connection->query($query);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
              </tr>";
        echo "<hr>";

        // Loop through each row and display user information
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td class='delete-btn'><button onclick=\"deleteUser('$row[id]')\">Delete</button></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No users found.";
    }

    // Close the connection
    $connection->close();
    ?> -->

</section>
  


  <script>
    // JavaScript function to delete a user
    function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                // Send an AJAX request to delete the user
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                        // Reload the page to reflect the updated user list
                        location.reload();
                    }
                };
                xhttp.open("GET", "delete_user.php?userId=" + userId, true);
                xhttp.send();
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