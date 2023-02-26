<?php
$config = include 'config.php';

$resultado = [
  'error' => false,
  'mensaje' => ''
];

if (!isset($_GET['id'])) {
  $resultado['error'] = true;
  $resultado['mensaje'] = 'El numero no existe';
}

if (isset($_POST['submit'])) {
  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $boleto = [
      "id" => $_GET['id'],
      "nombre" => $_POST['nombre'],
      "apellido" => $_POST['apellido'],
      "email" => $_POST['email'],
      "celular" => $_POST['celular']
    ];

    $consultaSQL = "UPDATE boletos SET
        nombre = :nombre,
        apellido = :apellido,
        email = :email,
        celular = :celular,
        updated_at = NOW()
        WHERE id = :id";

    $consulta = $conexion->prepare($consultaSQL);
    $consulta->execute($boleto);

  } catch (PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  $id = $_GET['id'];
  $consultaSQL = "SELECT * FROM boletos WHERE id =" . $id;

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $boleto = $sentencia->fetch(PDO::FETCH_ASSOC);

  if (!$boleto) {
    $resultado['error'] = true;
    $resultado['mensaje'] = 'No se ha encontrado el boleto';
  }

} catch (PDOException $error) {
  $resultado['error'] = true;
  $resultado['mensaje'] = $error->getMessage();
}
?>

<?php require "plantilla/header.php"; ?>

<?php
if ($resultado['error']) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $resultado['mensaje'] ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php
if (isset($_POST['submit']) && !$resultado['error']) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success" role="alert">
          El boleto ahora es suyo
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php
if (isset($boleto) && $boleto) {
  ?>
  <div class="row">
    <div class="col" style="width: 40%; padding-left:5%">
      <h2 class="mt-4">Comprar boleto N° <?=($boleto['id'])?>
      </h2>
      <hr>
      <form method="post">
        <div class="form-group">
          <label for="nombre">Ingresa tu nombre:</label>
          <input type="text" name="nombre" id="nombre" value="<?=($boleto['nombre']) ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido">Ingresa tus apellidos:</label>
          <input type="text" name="apellido" id="apellido" value="<?=($boleto['apellido']) ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Ingresa tu correo electronico:</label>
          <input type="email" name="email" id="email" value="<?=($boleto['email']) ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="celular">Ingresa tu numero de telefono:</label>
          <input type="text" name="celular" id="celular" value="<?=($boleto['celular']) ?>" class="form-control">
        </div>
        <hr>
        <div class="form-group" style="padding-bottom: 4%;">
          <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
          <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
        </div>
      </form>
    </div>
    <div class="col" style="40%">
      <div>
        <h1>Sorteo de una Motoneta Italika </h1>
        <img src="https://i.postimg.cc/nVmth4Cm/big-portada-ws150-sport-2022.jpg" alt="Italika WS150">
      </div>
    </div>
  </div>
  <?php
}
?>

<?php require "plantilla/footer.php"; ?>