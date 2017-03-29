<?php
session_start();
?>
    <head>
        <title>Musical Sound</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="js/jquery-1.12.1.js" type="text/javascript"></script>
        <script src="js/index.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="img" class="container">
            <div id="myimg">
                <a href="index.php"><img class="logo img-responsive" src="image/logo.png" alt=""/></a>
            </div>
        </div>
        <header>
            <div id='menu_bar' class="menu_bar">
                <a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
	        </div>
            <section>
                <nav id="menu">
                    <ul>
                        <li><a href="index.php"><span class="icon-home"></span>Inicio</a></li>
                        <li><a href="#topgroup"><span class="icon-suitcase" id='topgrup'></span>Top Grupos</a></li>
                        <li><a href="#toppub"><span class="icon-rocket"></span>Top Locales</a></li>
                        <li><a href="#topconcerts"><span class="icon-globe"></span>Top Conciertos</a></li>
                   </ul>
                </nav>
            </section>
            <aside>
		        <?php
            	    require_once('conection.php');
            	        if (isset ($_SESSION['id'])){
                            $user= $_SESSION['user'];
                            echo "<h4 id='buttons'>Hi!, $user!<a class='button' href='logout.php'>Logout</a></h4>";		
                        }else{
                            echo "<div id='buttons'>
                            <div class='contDesplegable'>
                            <div class='button'>Login</div>
                            <form method='post' action='validar.php' id='login' class='hidDesplegable'>
              				    <label for='user'>Usuario</label>
					            <input id='user' type='text' placeholder='User' name='user'><br/>
					            <label for='user'>Password</label>
					            <input id='pass' type='password' placeholder='Password' name='pass'><br/>
					            <button type='submit' name='enviar'>Login</button>
                            </form>
                            </div>
                            <div class='contDesplegable registre'>
                            <div id='buttons2' class='button'>Sign Up</div>
                            <form id='registre' class='hidDesplegable'>
                                <a href='registropub.php'>Pub</a><br>
                                <a href='registrogroup.php'>Grupo</a><br>
                                <a href='registrofan.php'>Fan</a><br>
                            </form>
                            </div> 
                            </div>
                            </div>";                 
                }?>
                     <!--<form class="form" method="post" action="buscador.php">
                     <input type="text" placeholder="Buscar..." name="buscar">
                     <select name="buscar" id="buscar">
                     <option value="concierto">Concierto</option>
                     <option value="grupo">Grupo</option>
                     <option value="local">Local</option>
                     </select>
                        <input class="button" type="submit" name="Submit" value="Buscar">
                        </form>-->
            </aside>
        </header>
  <!-- SLIDER -->
        <div class="container">
          <div class="row">
              <div class="col-md-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="image/tmusic.jpg" alt="Grupo">
                            <div class="carousel-caption">
                                <h3>GRUPOS</h3>
                                <p id="textslider">Aquí encontráis locales para vuestros conciertos.</p>
                            </div>      
                    </div>
                    <div class="item">
                        <img src="image/tlocal.jpg" alt="Pub">
                            <div class="carousel-caption">
                                <h3>LOCALES</h3>
                                <p id="textslider">Aquí encontráis grupos para tocar en vuestro local.</p>
                            </div>    
                    </div>
                    <div class="item">
                        <img src="image/tconcert.jpg" alt="Fan">
                            <div class="carousel-caption">
                                <h3>FANS</h3>
                                <p id="textslider">Aquí encontráis los mejores conciertos de vuestros grupos.</p>
                            </div>    
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                </div>   
            </div>
        </div>
    <!-- END SLIDER-->
    <!-- TABLES -->
        <div class="row text-center">
            <div id="topgroup" class="col-xs-6 col-md-4">
                <p>1</p>
            </div>
            <div id="toppub" class="col-xs-6 col-md-4">
                <p>2</p>
            </div>
            <div id="topconcerts" class="col-xs-6 col-md-4">
                <p>3</p>
            </div>
        </div>
    <!-- END TABLES-->
        <footer id="pie">
            <span>Template © by musicalsound 2016</span>
            <div id="social">
            <div id="socialbar">
                <nav>
                <a href="http://www.facebook.com"><img src="image/facebook.png" alt=""/></a>
                <a href="http://www.twitter.com"><img src="image/twitter.png" alt=""/></a>
                <a href="http://www.plus.google.com"><img src="image/google.png" alt=""/></a>
                </nav> 
            <div>
            </div>
        </footer>
    </body>