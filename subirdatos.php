<?php 
//recibo los datos del archivo

$miarchivo = $_FILES['archivo']['name'];
$mitipoarchivo = $_FILES['archivo']['type'];
$mitamanioarchivo = $_FILES['archivo']['size'];

//le digo a donde quiero que vaya
// la raiz del servidor es $_SERVER['DOCUMENT_ROOT']

$destino = 'uploads/';

move_uploaded_file($_FILES['archivo']['tmp_name'], $destino . $miarchivo);

echo "archivo subido ";

?>