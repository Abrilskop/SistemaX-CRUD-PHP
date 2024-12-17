<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	  <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="card-content #01579b light-blue darken-4">
    	<main>
    		<div class="row">
    			<div class="input-field col s12 center">
    				
            <a href="https://www.instagram.com/a_blnk_s/"><img src="img/logo.fw.png" width="300" class="circle"></a>
    			</div>
    		</div>
    		<div class="container">
    			<div class="row">
    			  <div class="col s12">
    			  	<div class="card z-depth-5">
    			  		<div class="card-content #90caf9 blue lighten-3">
                            <h1><span class="card-title"><center><a href="" class="white-text">LOGIN DE ACCESO CARRITO DE COMPRAS</a></h1>
    			  			<span class="card-title"><center><a href="" class="Black-text">Inicio de Sesion</a></center></span>
    							<form id="login-form">
    								<div class="input-field">
    									<i class="material-icons prefix">perm_identity</i>
    									<input type="text" name="usuario" id="usuario" required pattern="[A-Za-z]{8,15}" autofocus>
    									<label for="usuario">Usuario</label>
    								</div>
    								<div class="input-field">
    									<i class="material-icons prefix">vpn_key</i>
    									<input type="password" name="contra" id="contra" required pattern="[A-Za-z0-9]{8,15}">
    									<label for="contra">Contrasena</label>
    								</div>
                    <div>
                      <button class="btn waves-effect waves-light red right darken-3" type="button" id="forgot-password">¿PROBLEMAS INICIANDO SESION?</button>
                    </div>
    								<div>
                          <button class="btn waves-effect waves-light blue darken-3" type="submit">ACCEDER</button>
                    </div>
    							</form>
    					</div>
    			   	</div>
    	 		</div>	
    	   	</div>
    	</main>
      	<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
		   	<script type="text/javascript" src="./js/materialize.min.js"></script>
        <!--<script type="text/javascript" src="./js/acceso.js"></script>-->
        <script type="text/javascript" src="./js/login.js"></script>
    </body>
  </html>