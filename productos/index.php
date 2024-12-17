<?php include "../extend/header.php"; ?>

<!--Panel-->
<div class="row">
  <div class="col s12">
  <div class="card">
      <div class="card-content">
         <center><span class="card-title">PRODUCTOS</span></center>
         <p>ALTA DE PRODUCTOS</p>
         <form class="form" action="ins_productos.php" method="post" enctype="multipart/form-data" autocomplete="off">
         <div class="input-field">
          <input type="text" name="producto" required autofocus title="DEBE DE CONTENER ENTRE 1 Y 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{1,15}" id="producto" onblur="may(this.value, this.id)">
          <label for="producto">Producto:</label>
        </div>
        <div class="verificar"></div>

          <select  name="Estado" required>
            <option value="" disabled selected >ELIGE UN ESTADO DEL PRODUCTO</option>
            <option value="BUENO">NUEVO</option>
            <option value="REGULAR">USADO</option>
          </select>

          <div class="input-field">
            <input type="text" name="stock" required autofocus title="DEBE DE CONTENER SOLO NÚMEROS" pattern="[0-9]+" id="stock" onblur="may(this.value, this.id)">
            <label for="stock">Stock:</label>
          </div>

          <div class="input-field">
            <input type="text" name="precio" required autofocus title="DEBE DE CONTENER SOLO NÚMEROS Y PUNTO DECIMAL" pattern="^\d+(\.\d{1,2})?$" id="precio" onblur="may(this.value, this.id)">
            <label for="precio">Precio:</label>
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

<?php $sel = $con->query("SELECT * FROM productos ");
$row = mysqli_num_rows($sel);
 ?>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Productos (<?php echo $row ?>) </span>
        <table>
          <thead>
            <th>Nombre</th>
            <th>Estado</th>
            <th></th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Bloqueo</th>
            <th>Eliminar</th>
          </thead>
          <?php while($f = $sel->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $f['Nombre'] ?></td>
              <td>
                  <form  action="up_estado.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $f['idProductos'] ?>">
                    <select  name="Estado" required>
                      <option value="<?php echo $f['Estado'] ?>" ><?php echo $f['Estado'] ?></option>
                      <option value="NUEVO">NUEVO</option>
                      <option value="USADO">USADO</option>
                    </select>
              </td>
              <td>
                <button type="submit" class="btn-floating" ><i class="material-icons">repeat</i></button>
              </form>
              </td>
              <td><?php echo $f['Stock'] ?></td>
              <td><?php echo $f['precio'] ?></td>
              <!-- add bloqueo -->
              <td>
                <?php if ($f['Bloqueo']==1): ?>
                  <a href="bloqueo_manual.php?prod=<?php echo $f['idProductos'] ?>&bl=<?php echo $f['Bloqueo'] ?>"><i class="material-icons green-text">lock_open</i></a>
                  <?php else: ?>
                    <a href="bloqueo_manual.php?prod=<?php echo $f['idProductos'] ?>&bl=<?php echo $f['Bloqueo'] ?>"><i class="material-icons red-text">lock_outline</i></a>
                <?php endif; ?>
              </td>
              <!-- add eliminar producto -->
              <td>
                <a href="#" class="btn-floating red" onclick="Swal.fire({
                  title: '¿Está seguro que desea eliminar al producto?',
                  text: '¡Al eliminarlo no podrá recuperarlo!',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Sí, eliminarlo!',
                  cancelButtonText: 'Cancelar'
                }).then(function(result) {
                  if (result.isConfirmed) {  // Solo redirige si se confirma
                    location.href = 'eliminar_producto.php?id=<?php echo $f['idProductos'] ?>';
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
<!--Botones-->
<div class="fixed-action-btn vertical click-to-toggle " >
  <a  class="btn-floating red">
    <i class="material-icons" >mode_edit</i>
  </a>
  <ul>
    <li><a href="inicio.html" class="btn-floating yellow"><i class="material-icons">add</i></a></li>
    <li><a href="carrito.html" class="btn-floating orange"><i class="material-icons">replay</i></a></li>
    <li><a href="compartido.html" class="btn-floating purple"><i class="material-icons">repeat</i></a></li>
    <li><a href="index.html" class="btn-floating pink"><i class="material-icons">send</i></a></li>
  </ul>
</div>


<script>
  $('.fixed-action-btn').openFAB();
</script>
<script>
  $('.button-collpase').sideNav();
</script>
<!-- Scripts -->
    <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./js/materialize.min.js"></script>

</body>
</html>