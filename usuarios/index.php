<!--llama a la cabecera-->  
<?php 
include '../conexion/conexion.php';
include "../extend/header.php";
?>
<!--pagina principal-->  
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">ALTA DE USUAROS</span>
        <form class="form" action="ins_usuarios.php" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="input-field">
            <input type="text" name="nick" required autofocus title="DEBE DE CONTENER ENTRE 8 Y 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{8,15}" id="nick" onblur="may(this.value, this.id)" >
            <label for="nick">Nick:</label>
          </div>

          <div class="validacion"></div>

          <div class="input-field">
            <input type="password" name="pass1"  title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSUCLAS Y MINUSUCLAS ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass1" required  >
            <label for="pass1">Contraseña:</label>
          </div>

          <div class="input-field">
            <input type="password"  title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSUCLAS Y MINUSUCLAS ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass2" required  >
            <label for="pass2">Verificar contraseña:</label>
          </div>

          <select  name="nivel" required>
            <option value="" disabled selected >ELIGE UN NIVEL DE USUARIO</option>
            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
            <option value="ASESOR">ASESOR</option>
          </select>

          <div class="input-field">
            <input type="text" name="nombre"  title="Nombre del usuario"  id="nombre" onblur="may(this.value, this.id)" required pattern="[A-Z/s ]+"  >
            <label for="nombre">Nombre completo del usuario:</label>
          </div>

          <div class="input-field">
            <input type="email" name="correo"  title="Correo electronico"  id="correo"  >
            <label for="correo">Correo electronico:</label>
          </div>

          <div class="file-field input-field">
            <div class="btn">
              <span>Foto:</span>
              <input type="file" name="foto" >
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>

<button type="submit" class="btn black" id="btn_guardar">Guardar <i class="material-icons" >send</i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <nav class="brown lighten-3" >
      <div class="nav-wrapper">
        <div class="input-field">
          <input type="search"   id="buscar" autocomplete="off"  >
          <label for="buscar"><i class="material-icons" >search</i></label>
          <i class="material-icons" >close</i>
        </div>
      </div>
    </nav>
  </div>
</div>


<?php $sel = $con->query("SELECT * FROM usuario ");
$row = mysqli_num_rows($sel);
 ?>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Usuarios (<?php echo $row ?>) </span>
        <table>
          <thead>
            <th>Nick</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Nivel</th>
            <th></th>
            <th>Foto</th>
            <th>Bloqueo</th>
            <th>Eliminar</th>
          </thead>
          <?php while($f = $sel->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $f['nick'] ?></td>
              <td><?php echo $f['nombre'] ?></td>
              <td><?php echo $f['correo'] ?></td>
              <td>
                  <form  action="up_nivel.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $f['idUsuario'] ?>">
                    <select  name="nivel" required>
                      <option value="<?php echo $f['nivel'] ?>" ><?php echo $f['nivel'] ?></option>
                      <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                      <option value="ASESOR">ASESOR</option>
                    </select>
              </td>
              <td>
                <button type="submit" class="btn-floating" ><i class="material-icons">repeat</i></button>
              </form>
              </td>
              <td><img src="<?php echo $f['foto'] ?>" class="circle" style="width: 50px; height: 50px;" ></td>
              <td>
                <?php if ($f['bloqueo']==1): ?>
                  <a href="bloqueo_manual.php?us=<?php echo $f['idUsuario'] ?>&bl=<?php echo $f['bloqueo'] ?>"><i class="material-icons green-text">lock_open</i></a>
                  <?php else: ?>
                    <a href="bloqueo_manual.php?us=<?php echo $f['idUsuario'] ?>&bl=<?php echo $f['bloqueo'] ?>"><i class="material-icons red-text">lock_outline</i></a>
                <?php endif; ?>
              </td>
              <td>
                <a href="eliminar_usuario.php" class="btn-floating red" onclick="swal({ title: 'Esta seguro que desea eliminar al usuario?', text: 'Al eliminarlo no podra recuperarlo!', type: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, eliminarlo!' }).then(function () {  location.href='eliminar_usuario.php?id=<?php echo $f['idUsuario'] ?>'; })"><i class="material-icons">clear</i></a>
              </td>
            </tr>
            <?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>
</body>
</html>