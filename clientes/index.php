<?php include "../extend/header.php"; ?>

<!--Panel-->
<div class="row">
  <div class="col s12">
  <div class="card">
        <div class="card-content">
             <center><span class="card-title">CLIENTES</span></center>
             <span class="card-title">ALTA DE CLIENTES</span>
         <form class="form" action="ins_clientes.php" method="post" enctype="multipart/form-data" autocomplete="off">
         <div class="input-field">
          <input type="text" name="nombre" required autofocus title="DEBE DE CONTENER ENTRE 1 Y 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{1,15}" id="nombre" onblur="may(this.value, this.id)">
          <label for="nombre">Nombre:</label>
        </div>
        <div class="confirmar"></div>

          <div class="input-field">
            <input type="text" name="apellido"  title="Apellido"  id="apellido" onblur="may(this.value, this.id)" required pattern="[A-Z/s ]+"  >
            <label for="nombre">Apellido:</label>
          </div>
        <div class="confirmar"></div>

          <div class="input-field">
            <input type="email" name="correo"  title="Correo electronico"  id="correo"  >
            <label for="correo">Correo electronico:</label>
          </div>

          <div class="input-field">
              <input type="date" name="fecha" id="fecha" required>
              <label for="fecha"></label>
          </div>
          <div class="input-field">
            <input type="text" name="telefono" required autofocus title="DEBE DE CONTENER SOLO NÚMEROS" pattern="[0-9]+" id="telefono" onblur="may(this.value, this.id)">
            <label for="telefono">Numero:</label>
          </div>
          <select  name="Estado" required>
            <option value="" disabled selected >ELIGE UN ESTADO DEL CLIENTE</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
          </select>
        <button type="submit" class="btn light-blue" id="btn_guardar">Guardar Información<i class="material-icons"></i></button>
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

<?php $sel = $con->query("SELECT * FROM clientes ");
$row = mysqli_num_rows($sel);
 ?>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Clientes (<?php echo $row ?>) </span>
        <table>
          <thead>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Fecha Ingreso</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th></th>
            <th>Bloqueo</th>
            <th>Eliminar</th>
          </thead>
          <?php while($f = $sel->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $f['Nombre'] ?></td>
              <td><?php echo $f['Apellido'] ?></td>
              <td><?php echo $f['correo'] ?></td>
              <td><?php echo $f['fechaIngreso'] ?></td>
              <td><?php echo $f['Telefono'] ?></td>
              <td>
                  <form  action="up_estado.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $f['idClientes'] ?>">
                    <select  name="Estado" required>
                      <option value="<?php echo $f['Estado'] ?>" ><?php echo $f['Estado'] ?></option>
                      <option value="Activo">Activo</option>
                      <option value="Inactivo">Inactivo</option>
                    </select>
              </td>
              <td>
                <button type="submit" class="btn-floating" ><i class="material-icons">repeat</i></button>
              </form>
              <!-- add bloqueo -->
              <td>
                <?php if ($f['Bloqueo']==1): ?>
                  <a href="bloqueo_manual.php?cli=<?php echo $f['idClientes'] ?>&bl=<?php echo $f['Bloqueo'] ?>"><i class="material-icons green-text">lock_open</i></a>
                  <?php else: ?>
                    <a href="bloqueo_manual.php?cli=<?php echo $f['idClientes'] ?>&bl=<?php echo $f['Bloqueo'] ?>"><i class="material-icons red-text">lock_outline</i></a>
                <?php endif; ?>
              </td>
              <!-- add eliminar cliente -->
              <td>
                <a href="#" class="btn-floating red" onclick="Swal.fire({
                  title: '¿Está seguro que desea eliminar al cliente?',
                  text: '¡Al eliminarlo no podrá recuperarlo!',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Sí, eliminarlo!',
                  cancelButtonText: 'Cancelar'
                }).then(function(result) {
                  if (result.isConfirmed) {  // Solo redirige si se confirma
                    location.href = 'eliminar_cliente.php?id=<?php echo $f['idClientes'] ?>';
                  } else {
                    // Si se cancela, no hace nada (solo cierra el modal)
                    return false;
                  }
                })">
                  <i class="material-icons">clear</i>
                </a>
              </td>
            </tr>
            <?php } ?> 
        </table>
      </div>
    </div>
  </div>
</div>

<?php include "../extend/scripts.php"; ?>

<div class="fixed-action-btn vertical click-to-toggle">
    <a class="btn-floating red">
        <i class="material-icons">mode_edit</i>
    </a>
    <ul>
        <li><a href="" class="btn-floating yellow"><i class="material-icons">add</i></a></li>
        <li><a href="" class="btn-floating orange"><i class="material-icons">replay</i></a></li>
        <li><a href="" class="btn-floating purple"><i class="material-icons">repeat</i></a></li>
        <li><a href="" class="btn-floating pink"><i class="material-icons">send</i></a></li>
    </ul>
</div>

<script>
  $('.fixed-action-btn').openFAB();
</script>
<script>
  $('.button-collpase').sideNav();
</script>

</body>
</html>