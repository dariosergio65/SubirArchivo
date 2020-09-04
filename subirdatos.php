<?php 
//recibo los datos del archivo

session_start();

$miarchivo = $_FILES['archivo']['name'];
$mitipoarchivo = $_FILES['archivo']['type'];
$mitamanio = $_FILES['archivo']['size'];

//le digo a donde quiero que vaya
// la raiz del servidor es $_SERVER['DOCUMENT_ROOT']
$destino = 'uploads/' . $miarchivo;

//echo "nombre: " . $miarchivo . " tipo: " . $mitipoarchivo . " tamaño: ";
//$mitamanio = (int) $mitamanio;
//echo $mitamanio;

//exit(' XXXX');

if (($mitamanio >= 1100000) || ($mitamanio == 0)){
    $_SESSION['mensaje'] = "El archivo no debe exceder 1MB de tamaño y debe ser PDF";
    $_SESSION['tipo_mensaje'] = "danger";
    header("location: index.php");
}
if ($mitipoarchivo <> "application/pdf"){
    $_SESSION['mensaje'] = "El archivo debe ser PDF y no debe exceder 1MB";
    $_SESSION['tipo_mensaje'] = "danger";
    header("location: index.php");
}else{

move_uploaded_file($_FILES['archivo']['tmp_name'], $destino);

try {
    $base= new PDO('mysql:host=localhost:3307; dbname=servicios','root','');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");

    $sql= "UPDATE pdf SET RutaPdf = (:ruta) WHERE nombre LIKE 'Sandra' ";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":ruta"=>$destino));
    echo "Registro insertado";
    $resultado->closeCursor();
} catch (Exception $e) {
    
    echo "Tipo de error : " . $e->getMessage() . "<br>";
    echo "Linea del error: " . $e->getLine();
    exit("Programa finalizado");
}finally{
    $base=null;
}

$_SESSION['mensaje'] = "Archivo subido a la base de datos";
$_SESSION['tipo_mensaje'] = "success";
header("location: index.php");
}
?>