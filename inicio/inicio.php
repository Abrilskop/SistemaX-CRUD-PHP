<?php include "../extend/header.php";
include "../conexion/conexion.php"; ?>

<!--Panel-->
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">INICIO</span>
      </div>
    </div>
  </div>
</div>


<?php include '../extend/scripts.php'; ?>
<div class="fixed-action-btn vertical click-to-toggle">
  <a class="btn-floating red">
    <i class="material-icons" >mode_edit</i>
  </a>
  <ul>
    <li><a href="" class="btn-floating yellow"><i class="material-icons">add</i></a></li>
    <li><a href="" class="btn-floating orange"><i class="material-icons">replay</i></a></li>
    <li><a href="" class="btn-floating purple"><i class="material-icons">repeat</i></a></li>
    <li><a href="" class="btn-floating pink"><i class="material-icons">send</i></a></li>
  </ul>
</div>
<script src="../js/validacion.js"></script>
<script>
  $('.fixed-action-btn').openFAB();
</script>
<script>
  $('.button-collpase').sideNav();
</script>
</body>
</html>