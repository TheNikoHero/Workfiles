<?php
session_start();
include('include/config.php');

I'VE DELETED ALL SQL RELATED STUFF FOR SECURITY REASONS


?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0" />
        <title>ComicExpress - Working construction site</title>
        <!-- MY OWN CSS -->
        <base href="http://comicExpress.dk/nikoComic/">
        <link type="text/css" rel="stylesheet" href="style/style.css">
        <!-- FAV ICON AND THEME COLOR -->
        <meta name="theme-color" content="#b71817">
        <link rel="icon" sizes="192x192" href="images/favicon-highres.jpg">
        
        <!-- GOOGLE FONTS -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,300,400' rel='stylesheet' type='text/css'> <!-- used to make notes(such as in book.php line 20) -->
        <link href='http://fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="js/core.js" type="text/javascript"></script>
    </head>
    <body>
        
        <header>
            <div class="content">
                <div id="headerContainer">
                    <h1><a href="/nikoComic/">ComicExpress</a></h1>
                    <form action="doCodes/doSearch.php" method="POST" id="searchForm">
                        <div>
                            <input type="text" name="search_input" id='searcher' placeholder="Spider-Man">
                        </div>    

                        <input type="submit" name="submit" id="submit" value='Search'>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>

            <!-- NORMAL NAVIGATION / MENU -->
            <nav id='normal_menu'>
                <div id="menuContainer">
                <ul>
                    <li  <?php if($url == ""){echo "class='active'";}?>><a href="/nikoComic/">Home</a></li>
                    <li  <?php if($url == "comics" || $url == "detail"){echo "class='active'";}?>><a href="/nikoComic/pages/comics">Comics</a></li>
                    <li <?php if($url == "reviews"){echo "class='active'";}?>><a href="/nikoComic/pages/reviews">Reviews</a></li>
                    <li  <?php if($url == "about"){echo "class='active'";}?>><a href="/nikoComic/pages/about">About us</a></li>
                    <li  <?php if($url == "contact"){echo "class='active'";}?>><a href="/nikoComic/pages/contact">Contact</a></li>
                </ul>
                    
                </div>
                <div class="clear"></div>
            </nav>

            <!-- MOBILE NAVIGATION / MENU -->
             <label id="mobile_menu_button" for="#menuContainer">MENU</label>
            <nav class='mobile_menu_navi_container'>
              
                <div id="mobileMenuContainer" class='active'>
                <ul>
                    <li <?php if($url == ""){echo "class='active'";}?>><a href="#">Home</a></li>
                    <li <?php if($url == "comics"){echo "class='active'";}?>><a href="/nikoComic/pages/comics">Comics</a></li>
                    <li <?php if($url == "reviews"){echo "class='active'";}?>><a href="/nikoComic/pages/reviews">Reviews</a></li>
                    <li <?php if($url == "about"){echo "class='active'";}?>><a href="/nikoComic/pages/about">About us</a></li>
                    <li <?php if($url == "contact"){echo "class='active'";}?>><a href="/nikoComic/pages/contact">Contact</a></li>
                    <div class="clear"></div>
                </ul>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </nav>

            <!--
                        <nav id="contentNav" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="navMain">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Comics</a></li>
                                <li><a href="#">Reviews</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>-->

        </header>
        <div id="wrapper">

            <?php
            switch ($_GET['cnt']) {
                //frontpage
                case 'home':
                    include('pages/home.php');
                    break;
                
                //about us page
                case 'about':
                    include('pages/about.php');
                    break;
                
                //login page
                case 'login':
                    include('pages/login.php');
                    break;
                
                //detail about post page
                case 'detail':
                    include('pages/detail.php');
                    break;
                
                //user book comic page
                case 'book':
                    include('pages/book.php');
                    break;
                
                //after booking user is sent to this page
                case 'status':
                    include('pages/status.php');
                    break;
                
                //the review page for users to rate the store
                case 'reviews':
                    include('pages/reviews.php');
                    break;
                
                //the comics page, where all of the comics is there
                case 'comics':
                    include('pages/comics.php');
                    break;
                
                //the search page when user searches, user is redirect to here
                case 'search':
                    include('pages/search.php');
                    break;
                
                //the contact page
                case 'contact':
                    include('pages/contact.php');
                    break;
                
                //default:frontpage
                default:
                    include('pages/home.php');
                    break;
            }
            ?>
        </div>
        <footer>
            <div class="content">
                <div class="footer_list">
                                        <h3>Menu</h3>
                    <ul class="footerMenu">
                        <li><a class="active" href="#">Home</a></li>
                        <li><a href="#">Comics</a></li>
                        <li><a href="#">Reviews</a></li>
                        <li><a href="/nikoComic/pages/about">About us</a></li>
                        <li><a href="/nikoComic/pages/contact">Contact</a></li>
                        <li><a href="/nikoComic/pages/login">Login</a></li>
                    </ul>
                </div>
                <!--MAX CHAR 375chars-->
                <?php
                while ($rowInfo = $res_info->fetch_assoc())
                {
                    echo "<div class='footer_list'>";
                        echo "<h3>".$rowInfo['title']."</h3>";
                        echo "<p>".nl2br($rowInfo['text'])."</p>";
                    echo "</div>";
                    
                }
                ?>

                <div class="footer_list">
                    <h3>Follow us</h3>
                    <ul class="footerMenu">
                        <li>
                            <?php
                            while($rowSoc = $res_soc->fetch_assoc()){
                            ?>
                            <a target="_blank" href="<?php echo $rowSoc['link']; ?>">
                                <img src="images/upload/<?php echo $rowSoc['path'];?>" alt="<?php echo $rowSoc['alt_text'];?>">
                                <?php echo $rowSoc['title'];?>
                            </a>
                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/core.js" type="text/javascript"></script>
    </body>
</html>
