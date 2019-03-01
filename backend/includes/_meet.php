<?php
require_once '_db.php';
if(isset($_POST["accion"])){
	switch ($_POST["accion"]) {

		case 'eliminar_crew':
		eliminar_crew($_POST["crew"]);
		break;

		case 'mostrar_crew':
		mostrar_crew();
		break;

        case 'insertar_crew':
            insertar_crew($_POST["nombre"],$_POST["descripcion"],$_POST["foto"]);

		default:
		break;
	}
}
function mostrar_crew(){
	global $db;
	$consultar = $db->select("crew","*",["status_cr" => 1]);
	echo json_encode($consultar);
}

function eliminar_crew($crew){
	global $db;
	$eliminar_crew = $db->delete("crew",["id_cr" => $crew]);
	if($eliminar_crew){
		echo 0;
	}else{
		echo 1;
	}
}

function insertar_crew($nombre, $descripcion, $foto){

    global $db;
  $insertar_crew=$db ->insert("crew",["nombre_cr" => $nombre,
                                             "descripcion_cr" => $descripcion,
                                              "foto_cr" => $foto,
                                              "status_cr" => 1
                                             ]);
    if($insertar_crew){
		echo 1;
	}else{
		echo 0;
	}

}
?>
