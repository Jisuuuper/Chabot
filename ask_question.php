<?php 

	require "functions.php";

	check_login();

    if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['action']) && $_POST['action'] == 'post_delete')
	{
		//delete your post
		$id = $_GET['id'] ?? 0;
		$user_id = $_SESSION['info']['id'];

		$query = "select * from posts where id = '$id' && user_id = '$user_id' limit 1";
		$result = mysqli_query($con,$query);
		if(mysqli_num_rows($result) > 0){

			$row = mysqli_fetch_assoc($result);
			if(file_exists($row['image'])){
				unlink($row['image']);
			}

		}

		$query = "delete from posts where id = '$id' && user_id = '$user_id' limit 1";
		$result = mysqli_query($con,$query);

		header("Location: ask_question.php");
		die;

	}
	elseif($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['action']) && $_POST['action'] == "post_edit")
	{
		//post edit
		$id = $_GET['id'] ?? 0;
		$user_id = $_SESSION['info']['id'];

		$image_added = false;
		if(!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0 && $_FILES['image']['type'] == "image/jpeg"){
			//file was uploaded
			$folder = "uploads/";
			if(!file_exists($folder))
			{
				mkdir($folder,0777,true);
			}

			$image = $folder . $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], $image);

				$query = "select * from posts where id = '$id' && user_id = '$user_id' limit 1";
				$result = mysqli_query($con,$query);
				if(mysqli_num_rows($result) > 0){

					$row = mysqli_fetch_assoc($result);
					if(file_exists($row['image'])){
						unlink($row['image']);
					}

				}

			$image_added = true;
		}

		$post = addslashes($_POST['post']);

		if($image_added == true){
			$query = "update posts set post = '$post',image = '$image' where id = '$id' && user_id = '$user_id' limit 1";
		}else{
			$query = "update posts set post = '$post' where id = '$id' && user_id = '$user_id' limit 1";
		}

		$result = mysqli_query($con,$query);
 
		header("Location: ask_question.php");
		die;
	}
	elseif($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['action']) && $_POST['action'] == 'delete')
	{
		//delete your profile
		$id = $_SESSION['info']['id'];
		$query = "delete from users where id = '$id' limit 1";
		$result = mysqli_query($con,$query);

		if(file_exists($_SESSION['info']['image'])){
			unlink($_SESSION['info']['image']);
		}

		$query = "delete from posts where user_id = '$id'";
		$result = mysqli_query($con,$query);

		header("Location: logout.php");
		die;

	}
	elseif($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['username']))
	{
		//profile edit
		$image_added = false;
		if(!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0 && $_FILES['image']['type'] == "image/jpeg"){
			//file was uploaded
			$folder = "uploads/";
			if(!file_exists($folder))
			{
				mkdir($folder,0777,true);
			}

			$image = $folder . $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], $image);

			if(file_exists($_SESSION['info']['image'])){
				unlink($_SESSION['info']['image']);
			}

			$image_added = true;
		}

		$username = addslashes($_POST['username']);
		$email = addslashes($_POST['email']);
		$password = addslashes($_POST['password']);
		$id = $_SESSION['info']['id'];

		if($image_added == true){
			$query = "update users set username = '$username',email = '$email',password = '$password',image = '$image' where id = '$id' limit 1";
		}else{
			$query = "update users set username = '$username',email = '$email',password = '$password' where id = '$id' limit 1";
		}

		$result = mysqli_query($con,$query);

		$query = "select * from users where id = '$id' limit 1";
		$result = mysqli_query($con,$query);

		if(mysqli_num_rows($result) > 0){

			$_SESSION['info'] = mysqli_fetch_assoc($result);
		}

		header("Location: ask_question.php");
		die;
	}
	elseif($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['post']))
	{
		//adding post
		$image = "";
		if(!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0 && $_FILES['image']['type'] == "image/jpeg"){
			//file was uploaded
			$folder = "uploads/";
			if(!file_exists($folder))
			{
				mkdir($folder,0777,true);
			}

			$image = $folder . $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], $image);
 
		}

		$title_post = addslashes($_POST['title_post']);
		$post = addslashes($_POST['post']);
		$user_id = $_SESSION['info']['id'];
		$date = date('Y-m-d H:i:s');

		$query = "insert into posts (user_id,title_post,post,image,date) values ('$user_id','$title_post','$post','$image','$date')";

		$result = mysqli_query($con,$query);

        $query = "select id, tag, title_post from posts";

        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0) {
            $intents = Array(
                "intents" => Array()
            );
            while ($row = mysqli_fetch_assoc($result)) {
                $tag_exists = false;
                foreach ($intents["intents"] as $intent) {
                    if ($intent["tag"] == $row["tag"]) {
                        array_push($intent["patterns"], $row["title_post"]);
                        $tag_exists = true;
                    }
                }
                if (!$tag_exists) {
                    array_push($intents["intents"], Array("tag" => $row["tag"], "patterns" => Array($row["title_post"]), "responses" => Array()));
                }
            }
            $json = json_encode($intents);
            file_put_contents("intents.json", $json);
        }
 
		header("Location: ask_question.php");
		die;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Ask online Form">
    <meta name="description" content="The Ask is a bootstrap design help desk, support forum website template coded and designed with bootstrap Design, Bootstrap, HTML5 and CSS. Ask ideal for wiki sites, knowledge base sites, support forum sites">
    <meta name="keywords" content="HTML, CSS, JavaScript,Bootstrap,js,Forum,webstagram ,webdesign ,website ,web ,webdesigner ,webdevelopment">
    <meta name="robots" content="index, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <title>Uni Que - Ask Question</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/editor.css" rel="stylesheet" type="text/css">
    <!-- <link href="css/animate.css" rel="stylesheet" type="text/css"> -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> </head>
    <link href="css/responsive.css" rel="stylesheet" type="text/css"> </head>
    <link rel="icon" href="image/icon.png">
    
    <script>
        const editableDiv = document.getElementById('txtEditor');
        const divContentInput = document.getElementById('div_content_input');

        editableDiv.addEventListener('input'), () => {
        divContentInput.value = editableDiv.innerHTML;
        }
    </script>

<body>
<!--======== Chatbot =======-->

<div class="container">
    <div class="chatbox">
        <div class="chatbox__support">
            <div class="chatbox__header">
                <div class="chatbox__image--header">
                    <img src="image/chatbot.png" alt="image">
                </div>
                <div class="chatbox__content--header">
                    <h4 class="chatbox__heading--header">Chat support</h4>
                    <p class="chatbox__description--header"></p>
                </div>
            </div>
            <div class="chatbox__messages">
                <div></div>
            </div>
            <div class="chatbox__footer">
                <input type="text" placeholder="Write a message...">
                <button class="chatbox__send--footer send__button">Send</button>
            </div>
        </div>
        <div class="chatbox__button">
            <button><img src="image/chatbot.png" /></button>
        </div>
    </div>
</div>

<!-- chatbot end -->
    
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="navbar-menu-left-side239">
                        <ul>
                            <li><a href="contact_us.php"><i class="fa fa-envelope-o" aria-hidden="true"></i>Contact</a></li>
                            <li><a href="#"><i class="fa fa-headphones" aria-hidden="true"></i>Support</a></li>
                            <li><a><i class="fa fa-user" aria-hidden="true"><span></i></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="navbar-serch-right-side">
                        <form class="navbar-form" role="search">
                            <div class="input-group add-on">
                                <input class="form-control form-control222" placeholder="Search" name="srch-term" id="srch-term" type="text">
                                <div class="input-group-btn">
                                    <button class="btn btn-default btn-default2913" type="button"><i class="glyphicon glyphicon-search"></i></button>
                                    <a href="logout.php" class="btn btn-warning">logout</a>
                                </div>
                            </div>
                        </form>
                    </div>
               
                </div>
            </div>
        </div>
    </div>
    <div class="top-menu-bottom932">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="copy_index.php"><img src="image/logo2.png" alt="Logo"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav"> </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="copy_index.php">Home</a></li>
                        <li><a href="ask_question.php">Ask Question</a></li>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tags <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="question_tag.php">Add Tags</a></li>
                                <li><a href="tags.php">List of Tags</a></li>
                            </ul>
                        </li>
                       

                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Page <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                               
                                <li><a href="contact_us.php"> Contact Us</a></li>
                                <li><a href="ask_question.php"> Ask Question </a></li>
                                <li><a href="post-deatils.php"> Post-Details </a></li>
                                <li><a href="user.php">All User</a></li>
                                <li><a href="user_question.php"> User Details </a></li>
                                <li><a href="tags.php"> Tags </a></li>
                                <li><a href="#"> 404 </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> 
                            <a></span></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <section class="header-descriptin329">
        <div class="container">
            <h3>Ask Question</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="index.php">Home</a></li>
                <li class="active">Ask Question</li>
            </ol>
        </div>
    </section>


    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                <?php if(!empty($_GET['action']) && $_GET['action'] == 'post_delete' && !empty($_GET['id'])):?>
				
				<?php 
					$id = (int)$_GET['id'];
					$query = "select * from posts where id = '$id' limit 1";
					$result = mysqli_query($con,$query);
				?>
            <div class="">
				<?php if(mysqli_num_rows($result) > 0):?>
					<?php $row = mysqli_fetch_assoc($result);?>

                        <?php
                            $user_id = $row['user_id'];
                            $query = "select username,image from users where id = '$user_id' limit 1";
                            $result2 = mysqli_query($con,$query);
                            $user_row = mysqli_fetch_assoc($result2);
                        ?>
					
                        <div class="question-type2033">
                            <div class="row">
                                <h3>Are you sure you want to delete this post?!</h3>
                                <hr>
                                <div class="col-md-1">
                                    <!-- profile picture -->
                                    <div class="left-user12923 left-user12923-repeat">
                                        <img src="<?=$user_row['image']?>">
                                        <!-- <?=$user_row['username']?> -->
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="right-description893">
                                        <form method="post" enctype="multipart/form-data" style="margin: auto;padding:10px;">
                                        
                                            <div id="que-hedder2983">
                                                <h3>
                                                    <div><?=$row['title_post']?></div><br>
                                                </h3>
                                            </div>

                                            <div class="ques-details10018">
                                                <img src="<?=$row['image']?>" style="width:100%;height:200px;object-fit: cover;"><br>
                                            </div>
                                            <br>
                                            <div id="que-hedder2983">
                                                <div><?=$row['post']?></div><br>
                                            </div>
                                            <hr>
                                            <div class="category">
                                                <ul>
                                                    <!-- <input hidden name="post_id"><a href="post-deatils.php <?php echo $post_id; ?>">Click here to view the question</a></i></input> -->
                                                    <li><a type="" href=""><?php echo $row['tag']; ?></a></li>
                                                </ul>
                                            </div>
                                            <br><br>
                                            <input type="hidden" name="action" value="post_delete">

                                            <button style="padding: 10px 20px; background-color: #f44336; color: white; border: none; border-radius: 4px; cursor: pointer;">Delete</button>
                                            <a href="ask_question.php">
                                                <button type="button" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
                                            </a>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

				<?php endif;?>
            </div>

			<?php 

            elseif(!empty($_GET['action']) && $_GET['action'] == 'post_edit' && !empty($_GET['id'])):?>

				<?php 
					$id = (int)$_GET['id'];
					$query = "select * from posts where id = '$id' limit 1";
					$result = mysqli_query($con,$query);
				?>
                <!-- Edit Post -->
                <div class="ask-question-input-part032">
                    <?php if(mysqli_num_rows($result) > 0):?>
                        <?php $row = mysqli_fetch_assoc($result);?>
                        <h5>Edit a post</h5>
                        <form method="post" enctype="multipart/form-data" style="margin: auto;padding:10px;">

                            <div class="ques-details10018">
                                <span class="form-description433">Post Image* </span>
                                <br>
                                <img src="<?=$row['image']?>" style="width:100%;height:200px;object-fit: cover;"><br>
                            </div>

                            <div class="question-title39">
                                <span class="form-description433">Question-Title* </span>
                                <textarea name="title_post" rows="8"><?=$row['title_post']?></textarea><br>
                            </div>

                            <div class="button-group-addfile3239">
                                <span class="form-description433">Image* </span>
                                <input type="file" name="image"><br>
                            </div>
                            <div class="details2-239" >
                                <span class="form-description433">Post* </span>
                                <textarea name="post" rows="8"><?=$row['post']?></textarea><br>
                                <input type="hidden" name="action" value="post_edit">
                            </div>
                            <br>
                            <button>Save</button>
                            <a href="ask_question.php">
                                <button type="button">Cancel</button>
                            </a>
                        </form>
                    <?php endif;?>
                </div>
            <!-- edit profile -->
            <div class="ask-question-input-part032">
                
                <?php elseif(!empty($_GET['action']) && $_GET['action'] == 'edit'):?>

                    <h2 style="text-align: center;">Edit profile</h2>

                    <form method="post" enctype="multipart/form-data" style="margin: auto; padding: 10px; max-width: 400px;">
                    
                        <div style="text-align: center; margin-bottom: 20px;">
                            <label for="image" style="display: block; font-weight: bold;">Profile Image:</label>
                            <div style="width: 100px; height: 100px; margin: auto; border-radius: 50%; overflow: hidden; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);">
                                <img src="<?php echo $_SESSION['info']['image'] ?>" alt="User Image" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                        <br>
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" style="margin-bottom: 10px;"><br>

                        <label for="username">Username:</label>
                        <input value="<?php echo $_SESSION['info']['username'] ?>" type="text" name="username" id="username" placeholder="Username" required style="margin-bottom: 10px; width: 100%; padding: 5px;"><br>

                        <label for="email">Email:</label>
                        <input value="<?php echo $_SESSION['info']['email'] ?>" type="email" name="email" id="email" placeholder="Email" required style="margin-bottom: 10px; width: 100%; padding: 5px;"><br>

                        <label for="password">Password:</label>
                        <input value="<?php echo $_SESSION['info']['password'] ?>" type="password" name="password" id="password" placeholder="Password" required style="margin-bottom: 10px; width: 100%; padding: 5px;"><br>

                        <div style="text-align: center;">
                            <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Save</button>
                            <a href="ask_question.php" style="text-decoration: none;">
                                <button type="button" style="padding: 10px 20px; background-color: #f44336; color: white; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
                            </a>
                        </div>
                    </form>


            </div>

			<?php elseif(!empty($_GET['action']) && $_GET['action'] == 'delete'):?>

				<h2 style="text-align: center;">Are you sure you want to delete your profile?</h2>

                <div style="margin: auto; max-width: 600px; text-align: center;">
                    <form method="post" style="margin: auto; padding: 10px;">
                        <img src="<?php echo $_SESSION['info']['image'] ?>" style="width: 100px; height: 100px; object-fit: cover; margin: auto; display: block; border-radius: 50%; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);">

                        <div style="margin: 10px 0;">
                            <h3><?php echo $_SESSION['info']['username'] ?></h3>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <p><?php echo $_SESSION['info']['email'] ?></p>
                        </div>

                        <input type="hidden" name="action" value="delete">

                        <button style="padding: 10px 20px; background-color: #f44336; color: white; border: none; border-radius: 4px; cursor: pointer;">Delete</button>

                        <a href="ask_question.php" style="text-decoration: none; margin-left: 10px;">
                            <button type="button" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
                        </a>
                    </form>
                </div>


			<?php else:?>

				<h2 style="text-align: center;">User Profile</h2>
                    <br>
                    <div style="margin: auto; max-width: 600px; text-align: center;">
                        <div style="margin-bottom: 20px;">
                            <img src="<?php echo $_SESSION['info']['image'] ?>" alt="User Image" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <h3><?php echo $_SESSION['info']['username'] ?></h3>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <p><?php echo $_SESSION['info']['email'] ?></p>
                        </div>

                        <a href="ask_question.php?action=edit" style="text-decoration: none; margin-right: 10px;">
                            <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Edit Profile</button>
                        </a>

                        <a href="ask_question.php?action=delete" style="text-decoration: none;">
                            <button style="padding: 10px 20px; background-color: #f44336; color: white; border: none; border-radius: 4px; cursor: pointer;">Delete Profile</button>
                        </a>
                    </div>
                    <br>

				<hr>
				
				    <div class="ask-question-input-part032">
                            <h4>Ask Question</h4>
                        <hr>
                        <form method="post" enctype="multipart/form-data">
                                        <div class="question-title39">
                                            <span class="form-description433">Question-Title* </span>
                                            <input required name="title_post" placeholder="Write Your Question Title">
                                        </div>
                                        <div class="button-group-addfile3239">
                                            <span class="form-description23993">Attactment*</span>
                                            <input type="file" name="image" class="question-ttile3226">    
                                        </div>

                                        <div class="categori49">
                                            <span class="form-description43305">Tags* </span>
                                                <label>
                                                    <input list="browsers" name="tag" class="list-category53"/>
                                                </label>
                                                <datalist id="browsers">
                                                    <option value="CSS">
                                                    <option value="HTML">
                                                    <option value="PYTHON">
                                                    <option value="C#">
                                                    <option value="JAVA">
                                                    <option value="C++">
                                                </datalist>
                                            </input>
                                        </div>

                                        <div class="details2-239" >
                                            <div class="col-md-12 nopadding" >
                                                <textarea id="w3review" name="post" rows="9" cols="107" ></textarea> 
                                            </div>
                                        </div>
                            <div class="publish-button2389">
                                <button type="submit" name="publish-button" value="upload" class="publis1291">Publish your Question</button>
                            </div>
                        </form>
                    </div>
				<hr>
<posts>
<!-- ======content section/body=====-->
<section class="main-content920">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div id="main">
                <?php 
						$id = $_SESSION['info']['id'];
						$query = "select * from posts where user_id = '$id' order by id desc limit 10";

						$result = mysqli_query($con,$query);
					?>

					<?php if(mysqli_num_rows($result) > 0):?>

						<?php while ($row = mysqli_fetch_assoc($result)):?>

                            <?php
                                $user_id = $row['user_id'];
                                $query = "select username,image from users where id = '$user_id' limit 1";
                                $result2 = mysqli_query($con,$query);
                                $user_row = mysqli_fetch_assoc($result2);
                            ?>

                            <div class="question-type2033">
                                <div class="row">
                                    <div class="col-md-1">
                                        <!-- profile picture -->
                                        <div class="left-user12923 left-user12923-repeat">
                                            <img src="<?=$user_row['image']?>">
                                            <br>
                                            <!-- <?=$user_row['username']?> -->
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-9">
                                        <div class="right-description893">
                                            <!-- post caption -->
                                                <div id="que-hedder2983">
                                                    <h3>
                                                    <div>
                                                        <?php echo nl2br(htmlspecialchars($row['title_post']))?>
                                                    </div>
                                                    </h3>
                                                </div>
                                            <!-- post image -->
                                            <div class="ques-details10018">
                                                <?php if(file_exists($row['image'])):?>
                                                    <div style="">
                                                        <img src="<?=$row['image']?>" style="width:100%;height:200px;object-fit: cover;">
                                                    </div>
                                                <?php endif;?>
                                            </div>
                                            <br>
                                            <div id="que-hedder2983">
                                                <div>
                                                    <!-- <div style="color:#888"><?=date("jS M, Y",strtotime($row['date']))?></div> -->
                                                    <?php echo nl2br(htmlspecialchars($row['post']))?>
                                                    <br><br>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="category">
                                                <ul>
                                                    <li><a type="" href=""><?php echo nl2br(htmlspecialchars($row['tag']))?></a></li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <a href="ask_question.php?action=post_edit&id=<?= $row['id']?>">
                                                <button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Edit</button>
                                            </a>

                                            <a href="ask_question.php?action=post_delete&id=<?= $row['id']?>">
                                                <button style="padding: 10px 20px; background-color: #f44336; color: white; border: none; border-radius: 4px; cursor: pointer;">Delete</button>
                                            </a>

                                        </div>
                                    </div>

                                </div>
                            </div>
						<?php endwhile;?>
					<?php endif;?>
				</posts>
                </div>
            </div>
        </div>
    </div>
</section>

			<?php endif;?>
                </div>
        <!--end of col-md-9 -->
        <!--strart col-md-3 (side bar)-->
                <aside class="col-md-3 sidebar97239">
                </aside>
            </div>
        </div>
    </section>



    
<!--footer -->
   <div class="footer-search">
   </div>
    
                            <section class="footer-part">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="info-part-one320">
                                                <h4>Lead Programmer</h4>
                                                <img class="footer_port_1" src="image/jai.jpeg" alt="Avatar" style="width: 100px;">
                                                <p style="margin-left: 40px;">Jireh So</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="info-part-one320">
                                                <h4 style="margin-left: 4px;">Programmer</h4>
                                                <img class="footer_port_2" src="image/jezz.jpeg" alt="Avatar" style="width: 100px;">
                                                <p style="margin-left:20px;">Jezzon Kyle</p>
                                                <p style="margin-left:23px;">Telebanco</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="info-part-one320">
                                                <h4>Front End Developer</h4>
                                                <img class="footer_port_3" src="image/bert.jpeg" alt="Avatar" style="width: 100px;">
                                                <p style="margin-left:40px;">Albert Chris</p>
                                                <p style="margin-left:46px;">Pescador</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="info-part-one320">
                                                <h4>Front End Developer</h4>
                                                <img class="footer_port_4" src="image/teb.jpeg" alt="Avatar" style="width: 100px;">
                                                <p style="margin-left: 40px;">Steve Florenz</p>
                                                <p style="margin-left: 52px;">Mendoza</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- _________________FOOTER PART END_________________ -->

                            <section class="footer-social">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Copyright 2017 UniQue | <strong>Sudo  Coder</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-right2389"> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a> </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <script src="js/jquery-3.1.1.min.js"></script>
                            <script src="js/bootstrap.min.js"></script>
                            <script src="js/npm.js"></script>
                            <script src="js/app.js"></script>
   	<script>
			$(document).ready(function() {
				$("#txtEditor").Editor();
			});
		</script>
  
</body>

</html>