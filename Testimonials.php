<!DOCTYPE html>
<?php
    if(isset($_COOKIE['PHPSESSION']))
    {
        $username = $_COOKIE['PHPSESSION'];
    }
    
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                    if(isset($username))
                    {
                        echo"<h4><a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>$username<i class='fa et-down fa-angle-down'></i></a>
                            <ul class='dropdown-menu' role='menu'>
                                <li>
                                    <a href='c_profile.php'>Profile</a>
                                </li>
                                <li>
                                    <a href='#'>Forms</a>
                                </li>
                                <li>
                                    <a href='#'>Requests</a>
                                </li>
                            </ul></h4>";
                    } else {
                        echo "<a class='navbar-brand' href='#'>Think, Feel, Act<br></a>";
                    }
                ?>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="#">Home</a>
                        </li>
                        <li class="dropdown" id="mentalexplore">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mental Explore <i class="fa et-down fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#">Questionnaire</a>
                                </li>
                                <li>
                                    <a href="#">Explore History</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Testimonials</a>
                        </li>
                        <li>
                            <a href="#">Contacts</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                        <?php
                            if(isset($username))
                            {
                                echo "<a href='php/logout.php'>Log Out</a>";
                                
                            } else {
                                echo '<a href="Login.php">Login<br></a>';
                            }
                        ?>
                    </li>
                    </ul>
                </div>
            </div>
        </div></body></html>