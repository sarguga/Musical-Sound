<?php
session_start();
?>
    <head>
        <title>Musical Sound</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-1.12.1.js" type="text/javascript"></script>
        <script src="js/index.js"></script>
    </head>
            <body id="index">
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>                        
                        </button>
                          <a class="navbar-brand" href="#myPage"><img class="img-responsive" src="image/logo.png" alt=""/></a>
                      </div>
                      <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="#myPage">HOME</a></li>
                          <li><a href="#band">GRUPOS</a></li>
                          <li><a href="#tour">LOCALES</a></li>
                          <li><a href="#contact">CONTACT</a></li>
                          <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#login">LOGIN</a></li>
                              <li><a href="#signup">SIGN UP</a></li>
                            </ul>
                          </li>
                          <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
                        </ul>
                      </div>
                    </div>
                </nav>
                
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
                    <img src="image/tmusic.jpg" alt="Grupo" width="1200" height="700">
                    <div class="carousel-caption">
                      <h3>GRUPOS</h3>
                      <p id="textslider">Aquí encuentráis locales para vuestros conciertos.</p>
                    </div>      
                  </div>
                  <div class="item">
                    <img src="image/tlocal.jpg" alt="Local" width="1200" height="700">
                    <div class="carousel-caption">
                      <h3>LOCALES</h3>
                      <p id="textslider">Aquí encontráis grupos para tocar en vuestro local.</p>
                    </div>      
                  </div>

                  <div class="item">
                    <img src="image/tconcert.jpg" alt="Concierto" width="1200" height="700">
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
                <!-- Container (The Band Section) -->
            <div id="band" class="row bot0i container text-center">
                <h3>THE BAND</h3>
                <p><em>We love music!</em></p>
                <p>We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <br>
                <div class="row">
                  <div class="col-sm-4">
                    <p class="text-center"><strong>Name</strong></p><br>
                    <a href="#demo" data-toggle="collapse">
                      <img src="image/bandmember.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                    </a>
                    <div id="demo" class="collapse">
                      <p>Guitarist and Lead Vocalist</p>
                      <p>Loves long walks on the beach</p>
                      <p>Member since 1988</p>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <p class="text-center"><strong>Name</strong></p><br>
                    <a href="#demo2" data-toggle="collapse">
                      <img src="image/bandmember.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                    </a>
                    <div id="demo2" class="collapse">
                      <p>Drummer</p>
                      <p>Loves drummin'</p>
                      <p>Member since 1988</p>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <p class="text-center"><strong>Name</strong></p><br>
                    <a href="#demo3" data-toggle="collapse">
                      <img src="image/bandmember.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                    </a>
                    <div id="demo3" class="collapse">
                      <p>Bass player</p>
                      <p>Loves math</p>
                      <p>Member since 2005</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Container (TOUR Section) -->
              <div id="tour" class="bg-1">
                <div class="container">
                  <h3 class="text-center">TOUR DATES</h3>
                  <p class="text-center">Lorem ipsum we'll play you some music.<br> Remember to book your tickets!</p>
                  <ul class="list-group">
                    <li class="list-group-item">September <span class="label label-danger">Sold Out!</span></li>
                    <li class="list-group-item">October <span class="label label-danger">Sold Out!</span></li> 
                    <li class="list-group-item">November <span class="badge">3</span></li> 
                  </ul>

                  <div class="row text-center">
                    <div class="col-sm-4">
                      <div class="thumbnail">
                        <img src="image/paris.jpg" alt="Paris" width="400" height="300">
                        <p><strong>Paris</strong></p>
                        <p>Friday 27 November 2015</p>
                        <button class="btn" data-toggle="modal" data-target="#myModal">Buy Tickets</button>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="thumbnail">
                          <img src="image/newyork.jpg" alt="New York" width="400" height="300">
                        <p><strong>New York</strong></p>
                        <p>Saturday 28 November 2015</p>
                        <button class="btn" data-toggle="modal" data-target="#myModal">Buy Tickets</button>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="thumbnail">
                        <img src="image/sanfran.jpg" alt="San Francisco" width="400" height="300">
                        <p><strong>San Francisco</strong></p>
                        <p>Sunday 29 November 2015</p>
                        <button class="btn" data-toggle="modal" data-target="#myModal">Buy Tickets</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4><span class="glyphicon glyphicon-lock"></span> Tickets</h4>
                      </div>
                      <div class="modal-body">
                        <form role="form">
                          <div class="form-group">
                            <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span> Tickets, $23 per person</label>
                            <input type="number" class="form-control" id="psw" placeholder="How many?">
                          </div>
                          <div class="form-group">
                            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Send To</label>
                            <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                          </div>
                            <button type="submit" class="btn btn-block">Pay 
                              <span class="glyphicon glyphicon-ok"></span>
                            </button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                          <span class="glyphicon glyphicon-remove"></span> Cancel
                        </button>
                        <p>Need <a href="#">help?</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <!-- Container (Contact Section) -->
            <div id="contact" class="container">
                <h3 class="text-center">Contact</h3>
                <p class="text-center"><em>We love our fans!</em></p>

                <div class="row">
                  <div class="col-md-4">
                    <p>Fan? Drop a note.</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span>Chicago, US</p>
                    <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 1515151515</p>
                    <p><span class="glyphicon glyphicon-envelope"></span>Email: mail@mail.com</p>
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                      </div>
                      <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                      </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
                    <br>
                    <div class="row">
                      <div class="col-md-12 form-group">
                        <button class="btn pull-right" type="submit">Send</button>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <h3 class="text-center">From The Blog</h3>  
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Mike</a></li>
                  <li><a data-toggle="tab" href="#menu1">Chandler</a></li>
                  <li><a data-toggle="tab" href="#menu2">Peter</a></li>
                </ul>

                <div class="tab-content">
                  <div id="home" class="tab-pane fade in active">
                    <h2>Mike Ross, Manager</h2>
                    <p>Man, we've been on the road for some time now. Looking forward to lorem ipsum.</p>
                  </div>
                  <div id="menu1" class="tab-pane fade">
                    <h2>Chandler Bing, Guitarist</h2>
                    <p>Always a pleasure people! Hope you enjoyed it as much as I did. Could I BE.. any more pleased?</p>
                  </div>
                  <div id="menu2" class="tab-pane fade">
                    <h2>Peter Griffin, Bass player</h2>
                    <p>I mean, sometimes I enjoy the show, but other times I enjoy other things.</p>
                  </div>
                </div>
            </div>

                
                
                
        <section>
            <div id="menu">
        <div class="contDesplegable">
            <div id='topgrup' class="menubutton">TOP GRUPOS</div>
            <div class="hidDesplegable">
        	<div id='mostrar' class="TableContainer">
            <?php
             // TABLA GROUPS/ GRUPOS
            $query = "select distinct * from Grupo g, Usuario u, Genero a where g.id_grupo=u.id and g.id_genero=a.id order by a.id asc;";
            $result = mysqli_query($con,$query);
             echo "<table class='Resptable'>";
            echo "<thead><tr>
            <th>Nombre</th>
            <th>Integrantes</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Género</th>
            </tr></thead><tbody>";
            while($fila = mysqli_fetch_array($result)){
            // sacamos las variables de la fila
             extract($fila);
            // Creamos los datos en html
            echo "<tr>
            <td>$nombre</td>
            <td>$num_integrantes</td>
            <td>$email</td>
            <td>$telefono</td>
            <td>$genero</td>
            </tr>";
            }
            echo "</tbody></table>";    
            ?>
        </div>
        </div>
        </div>
            <div class="contDesplegable">
            <div id='toplocal' class="menubutton">TOP LOCALES</div>
            <div class="hidDesplegable">
             <div id='mostrar2' class="TableContainer">
        	<?php
               // TABLA PUBS/ LOCALES
             $query1 = "select distinct * from Usuario u,Pub p,Ciudad c where u.id=p.id_pub and u.ciudad=c.id order by c.ciudad asc;";
             $result1 = mysqli_query($con,$query1);
             $fila1 = mysqli_num_rows($result1);
             //Empezamos a dibujar la tabla
            echo "<table class='Resptable'>";
            echo "<thead><tr>
            <th>Nombre</th>
            <th>Aforo</th>
            <th>Dirección</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Ciudad</th>
            </tr></thead><tbody>";
            while($fila1 = mysqli_fetch_array($result1)){
            // sacamos las variables de la fila
             extract($fila1);
            // Creamos los datos en html
            echo "<tr>
            <td>$nombre</td>
            <td>$aforo</td>
            <td>$direccion</td>
            <td>$email</td>
            <td>$telefono</td>
            <td>$ciudad</td>
            </tr>";
            }
            echo "</tbody></table>";        
        ?>    
        </div>
            </div>
             </div>
             <div class="contDesplegable">
                 <div id='topconcert' class="menubutton">TOP CONCIERTOS</div>
            <div class="hidDesplegable">
             <div id='mostrar3' class="TableContainer">
        <?php
            // TABLA CONCIERTOS
             $query12 = "select c.nombre as 'C',u.nombre as 'L', g.genero, c.fecha, a.ciudad, c.id_pub from Concierto c, Usuario u, Ciudad a, Genero g 
where c.id_pub=u.id and g.id=c.id_genero and a.id=u.id and c.estado=1;";
             $result12 = mysqli_query($con,$query12);
             $fila12 = mysqli_num_rows($result12);
             // Empezamos a dibujar la tabla
            echo "<table class='Resptable'>";
            echo "<thead><tr>
            <th>Nombre</th>
            <th>Género</th>
            <th>Fecha</th>
            <th>Grupo</th>
            <th>Local</th>
            <th>Ciudad</th>
            </tr></thead><tbody>";
            while($fila12 = mysqli_fetch_array($result12)){
            // sacamos las variables de la fila
             extract($fila12);
            // Creamos los datos en html
            echo "<tr><td>$C</td>
            <td>$genero</td>
            <td>$fecha</td>";
            $query12G="select u.nombre as 'G' from Concierto c, Usuario u where u.id=c.id_grupo and c.id_grupo=13";
            $result12G=mysqli_query($con, $query12G);
            $fila12G=mysqli_fetch_array($result12G);
            if($fila12G){
            	extract($fila12G);
            	echo "<td>$G</td>";
            }
            echo "<td>$L</td>
            <td>$ciudad</td>
            </tr>";
            }
            echo "</tbody></table>";        
        ?>    
        </div>
             </div>
             </div>
        </div>
        </section>
      
        <footer class="text-center">
            <div id="social">
                <a href="http://www.facebook.com"><img src="image/facebook.png" alt=""/></a>
                <a href="http://www.twitter.com"><img src="image/twitter.png" alt=""/></a>
                <a href="http://www.plus.google.com"><img src="image/google.png" alt=""/></a>
            </div> 
            <p>Template by MusicalSound © 2016</p>
            <a class="up-arrow" href="#index" data-toggle="tooltip" title="TO TOP"></a>
        </footer>
    </body>