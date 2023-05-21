<?php 

	require "functions.php";

	check_login();
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
        <title>Uni Que - Home</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <!-- <link href="css/animate.css" rel="stylesheet" type="text/css"> -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
        <link rel="icon" href="image/icon.png">
        
    </head>
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

<!--======== Navbar =======-->
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="navbar-menu-left-side239">
                    <ul>
                        <li><a href=""><i class="fa fa-envelope-o" aria-hidden="true"></i>Contact</a></li>
                        <li><a href="#"><i class="fa fa-headphones" aria-hidden="true"></i>Support</a></li>
                        <li><a><i class="fa fa-user" aria-hidden="true"><span></i></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="navbar-serch-right-side">
                    <form class="navbar-form" role="search">
                        <div class="input-group add-on">
                            <input class="form-control form-control222" placeholder="Search" id="srch-term" type="text">
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
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tags<span class="caret"></span></a>
                        <ul class="dropdown-menu animated zoomIn">
                            <!--<li><a href="question_tag.php">Add Tags</a></li>-->
                            <li><a href="tags.php">List of Tags</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Page <span class="caret"></span></a>
                        <ul class="dropdown-menu animated zoomIn">
                            <li><a href="contact_us.php"> Contact Us</a></li>
                            <li><a href="ask_question.php"> Ask Question </a></li>
                            <li><a href="tags.php"> Tags </a></li>
                            <li><a href="edit_profile.php"> Edit Profile </a></li>
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

<section class="welcome-part-one">
    <div class="container">
        <div class="welcome-demop102 text-center">
            <h2>Welcome to UniQue, A Campus E-Forum for </h2>
            <h2>University of St. La Salle students!</h2>
            <?php  if (isset($_SESSION['username']))?>
            <h4>Welcome <strong><?php echo $_SESSION['username']; ?></strong>! What inquiries do you have today?</h4>
            <div class="button0239-item">

            </div>
            <!-- <div class="form-style8292">
                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                    <input type="text" class="form-control form-control8392" placeholder="Ask any question and you be sure find your answer ?"> <span class="input-group-addon"><a href="#">Ask Now</a></span> 
                </div>
            </div> -->
        </div>
    </div>
</section>

 <!-- ======content section/body=====-->
<section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div id="main">
                        <input id="tab1" type="radio" name="tabs" checked>
                        <label for="tab1">Question</label>
                        <section id="content1">

                        <?php 
                            $query = "select * from posts order by id desc limit 10";
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
                                                <a href="#"><img src="<?=$user_row['image']?>" alt="image"></a><a href="#"></a> 
                                                <h4 style="text-align: center;">
                                                    <?=$user_row['username']?>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="right-description893">
                                                <!-- post caption -->
                                                <div id="que-hedder2983">
                                                    <h3>
                                                        <div>
                                                            <a href="ask_question.php"><?php echo nl2br(htmlspecialchars($row['title_post']))?></a>
                                                        </div>
                                                    </h3>
                                                </div>
                                                <br>
                                                <!-- post image -->
                                                <div class="ques-details10018">
                                                    <?php if(file_exists($row['image'])):?>
                                                        <div class="">
                                                            <img src="<?=$row['image']?>" style="width:100%;height:200px;object-fit: cover;">
                                                        </div>
                                                    <?php endif;?>
                                                </div>
                                                <br>
                                                <!-- post -->
                                                <div id="que-hedder2983">
                                                    <div>
                                                        <!-- <div style="color:#888"><?=date("jS M, Y",strtotime($row['date']))?></div> -->
                                                        <?php echo nl2br(htmlspecialchars($row['post']))?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="category">
                                                    <ul>
                                                        <li><a type="" href=""><?php echo nl2br(htmlspecialchars($row['tag']))?></a></li>
                                                    </ul>
                                                </div>

                                                <!-- Modal -->
                                                <div id="ReplyModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Reply Question</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form name="frm1" method="post">
                                                            <input type="hidden" id="thisreplypostid_<?=$row["id"]?>" name="thisreplypostid" value="<?=$row["id"]?>">
                                                            <input type="hidden" id="commentid" name="Rcommentid">
                                                            <div class="form-group">
                                                            <input type="hidden" class="form-control" name="Rname" value="<?php echo $_SESSION['username']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                            <label for="comment">Write your reply:</label>
                                                            <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
                                                            </div>
                                                            <input type="button" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
                                                    </form>
                                                    </div>
                                                    </div>

                                                </div>
                                                </div>

                                                <!-- comment -->

                                                <form name="frm" method="post">
                                                    <input type="hidden" id="thiscommentpostid_<?=$row["id"]?>" name="thiscommentpostid" value="<?=$row["id"]?>">
                                                    <input type="hidden" id="commentid" name="Pcommentid" value="0">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="name" value="<?php echo $_SESSION['username']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="comment">Write your comment:</label>
                                                        <textarea class="form-control" rows="5" name="msg" required></textarea>
                                                    </div>
                                                    <input type="button" id="butsave" name="save" class="btn btn-primary" value="Send">
                                                </form>

                                                <div class="panel-body">
                                                    <h4>Recent questions</h4>
                                                    <table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
                                                <tbody id="record">

                                                <!-- end of comment -->

                                                </tbody>
                                            </table>
                                        </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>

                            <?php endwhile;?>

                        <?php endif;?>



                        </section>
                    </div>
                </div>
            </div>
        </div>
</section>



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
<script src="js/main.js"></script>

</body>
</html>