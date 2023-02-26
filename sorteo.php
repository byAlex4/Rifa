<?php
$error = false;
$config = include 'config.php';

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    if (isset($_POST['id'])) {
        $consultaSQL = "SELECT * FROM boletos WHERE id LIKE '%" . $_POST['id'] . "%'";
    } else {
        $consultaSQL = "SELECT * FROM boletos";
    }
    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute();

    $resultados = $sentencia->fetchAll();
} catch (PDOException $error) {
    $error = $error->getMessage();
}

$titulo = isset($_POST['id']) ? 'Lista de boletos (' . $_POST['id'] . ')' : 'Lista de alumnos';
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

<div style="display: flex; padding-left: 5%; padding-right: 5%;">
    <div class="col" style="40%">
        <div>
            <h1>Sorteo de una Motoneta Italika </h1>
            <img src="https://i.postimg.cc/nVmth4Cm/big-portada-ws150-sport-2022.jpg" alt="Italika WS150">
            <h2>Modelo WS-150</h2>
            <h3>Año 2022</h3>
        </div>
    </div>
    <div class="col" style="padding-left: 5%;">
        <div>
            <h2>Eliga el numero de su boleto</h2>
            <?php
            if ($resultados && $sentencia->rowCount() > 0) {
                foreach ($resultados as $fila) {
                    ?>
                    <a type="button" class="btn btn-outline-dark" style="width: 15%;" href="<?='editar.php?id=' . ($fila["id"]) ?>"><?php echo ($fila["id"]); ?></a>
                    <?php
                }
            }
            ?>
        </div>
        <table class="table table-light">
            <thead>

            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<?php include "plantilla/footer.php" ?>