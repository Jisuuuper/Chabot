<?php

require "functions.php";

check_login()

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
    <title>Uni Que - Category</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/editor.css" rel="stylesheet" type="text/css">
    <!-- <link href="css/animate.css" rel="stylesheet" type="text/css"> -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <link href="css/for_tags.css" rel="stylesheet" type="text/css"> 
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
    
    <!--======== Navbar =======-->
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
    <!-- ==========header mega navbar=======-->
    <div class="top-menu-bottom932">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="index.php"><img src="image/logo2.png" alt="Logo"></a>
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
                                <li><a href="category.php"> Tags </a></li>
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
    <!--    breadcumb of category -->
    <section class="header-descriptin329">
        <div class="container">
            <h3>All Question</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="index.php">Home</a></li>
                <li class="active">Tags Type</li>
            </ol>
        </div>
    </section>
    <!--    body content-->
            <section class="main-content920">
                <div class="container">
                    <div class="row">
                    <?php 
                        $query = "select * from posts order by id desc limit 10";
                        $result = mysqli_query($con,$query);
                    ?>
                    <?php if(mysqli_num_rows($result) > 0):?>
                        <?php while ($row = mysqli_fetch_assoc($result)):?>
                                    <div class="col-md-4">
                                        <div class="ag-format-container">
                                            <div class="ag-courses_box">
                                                <div class="ag-courses_item">
                                                <a href="#" class="ag-courses-item_link">
                                                    <div class="ag-courses-item_bg">
                                                    </div>
                                                    <div class="ag-courses-item_title">
                                                    <?php echo nl2br(htmlspecialchars($row['tag']))?>
                                                    </div>
                                                    <div class="ag-courses-item_date-box">
                                                       
                                                    <span class="ag-courses-item_date">
                                                       
                                                    </span>
                                                    </div>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php endwhile;?>
                    <?php endif;?>               
                </div>
            </section>
    <!--    footer -->
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
        $(document).ready(function () {
            $("#txtEditor").Editor();
        });
    </script>
</body>

</html>