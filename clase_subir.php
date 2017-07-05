<?php
class clase_subir {
  function get_extension($fichero) {
    $dot = strrpos($fichero, '.') + 1;
    return strtolower(substr($fichero, $dot));
  }
  
  public function subir_archivo($campo_file, $ruta_destino, $extensiones_permitidas, &$msg) {
	$nombre_archivo = $_FILES[$campo_file]['name'];
	$tipo_archivo   = $this -> get_extension($nombre_archivo);
    $peso_archivo   = $_FILES[$campo_file]['size'];
    $extensiones = explode(',', $extensiones_permitidas);
    $rand = rand(100,100000000000);
    $archivo_final = date('Y-m-d_H-i-s').'-'.$rand.'.'.$tipo_archivo;
    $ruta_final = $ruta_destino.$archivo_final;
    
    if (!in_array($tipo_archivo, $extensiones)) {
      $msg='<div>La extensión del archivo no es correcta.</div>
            <div>Se admiten los ficheros: '.$extensiones_permitidas.'.</div>';
    }
    else if ($peso_archivo > 8000000) {
      $msg='<div>El peso del archivo no es correcto.</div>';     
    }
    else if (move_uploaded_file($_FILES[$campo_file]['tmp_name'], $ruta_final)) {
      chmod($ruta_final, 0777);
      $msg='<div>El archivo se ha subido correctamente.</div>';
	  return $archivo_final;
    }
    else {
      $msg='<div>Ocurrió algún error al subir el archivo.</div>';
    }
    
	return false;
  }
}
?>
