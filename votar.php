<?php
session_start();
?>
<html>
    <head>
        <title>Musical Sound</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link href="css/register.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="social">
            <div id="socialbar">
                <nav>
                <a href="http://www.facebook.com"><img src="image/facebook.png" alt=""/></a>
                <a href="http://www.twitter.com"><img src="image/twitter.png" alt=""/></a>
                <a href="http://www.plus.google.com"><img src="image/google.png" alt=""/></a>
                </nav>  
                <?php
            	require_once('conection.php');
            	   if (isset ($_SESSION['id'])){
                            $user= $_SESSION['user'];
                            echo "<h4 id='buttons'>Bienvenid@, $user!<a class='button' href='logout.php'>Logout</a></h4>";		
                        }else{
                            echo "<div id='buttons'>
                                <div class='contDesplegable'>
                                    <div class='button'>Login</div>
                                    <form method='post' action='validar.php' class='hidDesplegable'>
              				<label for='user'>Usuario</label>
					<input id='user' type='text' placeholder='User' name='user'><br/>
					<label for='user'>Password</label>
					<input id='pass' type='password' placeholder='Password' name='pass'><br/>
					<input type='submit' name='enviar' value='Login'>
                                   </form>
                                </div>
                         <div class='contDesplegable registre'>
                        <div class='button'>Sign Up</div>
                        <form class='hidDesplegable'>
                            <a href='registropub.php'>Pub</a><br>
                            <a href='registrogroup.php'>Grupo</a><br>
                            <a href='registrofan.php'>Fan</a><br>
                        </form>
                    </div> 
                  </div>
            </div>";                 
                }?>
            </div>         
        </div>
         <header>
            <div id="img">
                <div id="myimg">
                    <a href="index.php"><img class="logo" src="image/logo.png" alt=""/></a>
                </div>
            </div>
        </header>
        <section>
        <nav id="menu">
            <a class="menubutton" href="index.php">Inicio</a>
            <a class="menubutton" href="fan.php">Perfil</a>
            <a class="menubutton" href="modificarfan.php">Modificar Perfil</a>
        </nav>
        </section>
        <div class="beforeTable">
	<?php
             // TABLA VOTACIÓN GROUPS/GRUPOS
            $query = "select distinct * from Grupo g, Usuario u, Genero a where g.id_grupo=u.id and g.id_genero=a.id order by a.id asc;";
            $result = mysqli_query($con,$query);
             echo "<br/><h2> - VOTACIÓN DE GRUPOS-</h2>";
             echo "<table id='taula'>";
            echo "<thead><tr>
            <th>Nombre</th>
            <th>Integrantes</th>
            <th>Género</th>
            <th>Votos</th>
            <th>Acción</th>
            </tr></thead><tbody>";
            while($fila = mysqli_fetch_array($result)){
            // sacamos las variables de la fila
             extract($fila);
            // Creamos los datos en html
            echo "<tr>
            <td>$nombre</td>
            <td>$num_integrantes</td>
            <td>$genero</td>
            <td></td>
            <td><a class='menubutton2' href='votar.php?id=$id'>Votar</a></td>
            </tr>";
            }
            echo "</tbody></table></br>";  
          ?> 
          <?php
            $voto=0;
            
               // TABLA PUBS/ LOCALES
             $query1 = "select distinct * from Usuario u,Pub p,Ciudad c where u.id=p.id_pub and u.ciudad=c.id order by c.ciudad asc;";
             $result1 = mysqli_query($con,$query1);
             //Empezamos a dibujar la tabla
            echo "<br/><h2> - VOTACIÓN DE LOCALES-</h2>";
            echo "<table id='taula'>";
            echo "<thead><tr>
            <th>Nombre</th>
            <th>Aforo</th>
            <th>Dirección</th>
            <th>Ciudad</th>
            <th>Votos</th>
            <th>Acción</th>
            </tr></thead><tbody>";
            while($fila1 = mysqli_fetch_array($result1)){
            // sacamos las variables de la fila
             extract($fila1);
            // Creamos los datos en html
            echo "<tr>
            <td>$nombre</td>
            <td>$aforo</td>
            <td>$direccion</td>
            <td>$ciudad</td>
            <td></td>
            <?php
                if($voto==0){
                ?>
                    <td><input type='submit' name='x' value='votar' class='menubutton2' href='votar.php?id=$id'></td>
                        
                <?php
                    
                    }
                ?><?php
                if($voto==1){
                ?>
                    <td><a class='menubutton2' href='votar.php?id=$id'>Quitar Voto</a></td>
                <?php
                    
                    }
                ?>
            </tr>";
            }
            echo "</tbody></table>";        
        ?> 
	
</div>
<footer id="pie">
            <span>Template © by musicalsound 2016</span>
        </footer>
    </body>
</html>