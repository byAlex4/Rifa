<?php
$error = false;
$config = include 'config.php';

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  if (isset($_POST['apellido'])) {
    $consultaSQL = "SELECT * FROM alumnos WHERE apellido LIKE '%" . $_POST['apellido'] . "%'";
  } else {
    $consultaSQL = "SELECT * FROM alumnos";
  }

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $resultados = $sentencia->fetchAll();
} catch (PDOException $error) {
  $error = $error->getMessage();
}

$titulo = isset($_POST['apellido']) ? 'Lista de alumnos (' . $_POST['apellido'] . ')' : 'Lista de alumnos';
?>

<?php include "plantilla/header.php"; ?>

<?php
if ($error) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<!-- Aquí el código HTML de la aplicación -->

<div class="container" style="margin-top: 2%;">
  <div class="row">
    <div class="col-md">
      <form method="post" class="form-inline">
        <div>
          <input type="text" id="apellido" name="apellido" placeholder="Buscar por apellido" class="form-control">
          <button type="submit" name="submit" class="btn btn-primary">Buscar</button>
        </div>
      </form>
    </div>
    <div class="col-md" style="text-align: right;">
      <a href="crear.php" class="btn btn-primary">Crear alumno</a>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mt-3">Lista de alumnos</h2>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Email</th>
              <th>Edad</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($resultados && $sentencia->rowCount() > 0) {
              foreach ($resultados as $fila) {
                ?>
                <tr>
                  <td>
                    <?php echo ($fila["id"]); ?>
                  </td>
                  <td>
                    <?php echo ($fila["nombre"]); ?>
                  </td>
                  <td>
                    <?php echo ($fila["apellido"]); ?>
                  </td>
                  <td>
                    <?php echo ($fila["email"]); ?>
                  </td>
                  <td>
                    <?php echo ($fila["edad"]); ?>
                  </td>
                  <td>
                    <a href="<?='eliminar.php?id=' . ($fila["id"]) ?>">🗑️Borrar</a>
                    <a href="<?='editar.php?id=' . ($fila["id"]) ?>" .>✏️Editar</a>
                  </td>
                </tr>
                <?php
              }
            }
            ?>
          <tbody>
        </table>
      </div>
    </div>
  </div>
  <?php include "plantilla/footer.php"; ?>