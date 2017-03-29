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
                            echo "<h4 id='buttons'>Bienvenid@, <a id='link' href='group.php'>$user!</a><a class='button' href='logout.php'><img src='image/logout.png'/>Logout</a></h4>";		
                        }else{
                            echo "<div id='buttons'>
                                <div class='contDesplegable'>
                                    <div class='button'><img src='image/login.png'/>Login</div>
                                    <form method='post' action='validar.php' class='hidDesplegable'>
              				<label for='user'>Usuario</label>
					<input id='user' type='text' placeholder='User' name='user'><br/>
					<label for='user'>Password</label>
					<input id='pass' type='password' placeholder='Password' name='pass'><br/>
					<input type='submit' name='enviar' value='Login'>
                                   </form>
                                </div>
                         <div class='contDesplegable registre'>
                        <div class='button'><img src='image/plus.png'/>Sign Up</div>
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
            <a class="menubutton" href="index.php"><img src='image/home.png'/>Inicio</a>
            <a class="menubutton" href="modificargroup.php"><img src='image/setting.png'/>Modificar Perfil</a>
            <a class="menubutton" href="adminconciertos.php"><img src='image/calendar.png'/>Admin. Conciertos</a>
        </div>
        </section>
        <div class="beforeTable">
        <?php  
	if(!isset($_SESSION['id'])){
	header ('Location: index.php');
	}
	else{
             require_once("conection.php");
             $id=$_SESSION['id'];
             $user= $_SESSION['user'];
         
             $consulta="select*from Usuario u, Grupo g, Genero a, Ciudad c where u.id=g.id_grupo and u.ciudad=c.id and g.id_genero=a.id and u.id=$id";
             $resultado=mysqli_query($con,$consulta);
             $numfilas=mysqli_num_rows($resultado);
             if($numfilas==0){
                 echo"Éste usuario no contiene datos.";
             }else{
              echo "<h2> - PERFIL -</h2></br>";
                echo"<table id='taula'>";
                while($fila=mysqli_fetch_array($resultado)){
                 extract($fila);
                 echo"<tr><th>Nombre:</th><td>$nombre</td></tr>
                     <tr><th>Integrantes:</th><td>$num_integrantes</td></tr>
                     <tr><th>Email:</th><td>$email</td></tr>
                     <tr><th>Teléfono:</th><td>$telefono</td></tr>
                     <tr><th>Ciudad:</th><td>$ciudad</td></tr>
                     <tr><th>Género:</th><td>$genero</td></tr>";  
                }
                echo "</table><iframe width='560' height='315' src='https://www.youtube.com/embed/1w7OgIMMRc4?list=PLCD0445C57F2B7F41' frameborder='0' allowfullscreen></iframe>";
             }           
	}
	
 ?>
        </div>
        <footer id="pie">
            <span>Template © by musicalsound 2016</span>
        </footer>
    </body>
</html>