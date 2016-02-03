<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1>Base de datos Automóviles</h1>
<b>Introduce el modelo de tu coche:</b><br/>

<form method="post" action="#">
    <input type="text" id="texto" name="texto">
    <br/>
    <button type="submit" name="buscar">Buscar</button>
</form>

<div>
<?php
include_once("MySQLDataSource.php");
include_once("auto.php");

if (isset($_POST['buscar']) && ($_POST['texto']) != "") {
    $modelo = $_POST['texto'];

    $funciones = new MySQLDataSource();

    $conn = $funciones->conectar();
    if (!$conn) {
	echo"error de conexión";
        $funciones->mensajeError();
    }

    $sql = "SELECT * FROM automoviles WHERE modelo like '%" . $modelo . "%'";
    $consulta = $funciones->ejecutar_consulta($sql);
    if (!$consulta) {
        echo "<br/>" . "Error de consulta";
    }

    echo "<b>"."Coincidencias encontradas: "."</b>" . mysqli_num_rows($consulta);
    $row = $funciones->siguiente();

    $total = null;
    $id = 1;

    while ($row) {
        $total[$id] = new auto();
        $total[$id]->setId($row->Id);
        $total[$id]->setMarca($row->Marca);
        $total[$id]->setModelo($row->Modelo);
        $total[$id]->setConsumo($row->Consumo);
        $total[$id]->setEmisiones($row->Emisiones);

        echo "<br/>"."ID: " . $total[$id]->getId() . " - Marca: " . $total[$id]->getMarca() . "- Modelo " . $total[$id]->getModelo() . "- Consumo " . $total[$id]->getConsumo() . "- Emisiones " . $total[$id]->getEmisiones() . "<br>";

        $row = $funciones->siguiente();

        $id++;
    }

    $funciones->desconectar();
}
?>
</div>
</body>
</html>
