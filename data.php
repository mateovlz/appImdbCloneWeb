<?php

class basedata{
  private $Servidor = "mysql:host=localhost";
  private $Sesion = "root";
  private $Contraseña = "root";
  private $Instancia = "parapp";
  private $Conexion;

  public function Conectar(){
    if (isset($this->Conexion)) return true;
    try {
      //Usando PDO (PHP Data Objects) para conectarse.
			//Parámetros: "mysql:host:servidor;dbname=instancia", "usuario", "contraseña", codificación de caracteres
		  $this->Conexion = new PDO($this->Servidor.";dbname=".$this->Instancia,$this->Sesion,$this->Contraseña,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    } catch (PDOException $UnError) {
        echo $UnError->getMessage();
        return false;
    }
     return true;
  }
//" . $id. "," . $nom. "," .$apel. "," .$gen. "," .$tel . "
   public function CreaRegistro($tabla,$Campos,$Parametros,$Valores){
     $this->Conectar();
     $SQL = "INSERT INTO ". $tabla . "(". $Campos . ") values(" . $Parametros . ")";
     $Sentencia = $this->Conexion->prepare($SQL);
     if ($Sentencia->execute($Valores)){
       return $this->Conexion->lastInsertId();
     }
     else{
       echo "NO Exito";
       return false;
     }
   }

   public function ActualizaRegistro($tabla,$QueCambia,$Llave,$Valor){
     $this->Conectar();
		 //$Parametros = array(':'.$QueCambia => $valorNuevo, ':'.$llave => $valorLlave); //Parámetros que irán dentro de la consulta
		 $SQL = "UPDATE ". $tabla . " SET " . $QueCambia  . " WHERE " . $Llave . "=" . $Valor;
		 $Sentencia = $this->Conexion->prepare($SQL); //Prepara la actualización
     $Sentencia->execute();
		 //if ($Sentencia->execute($Parametros))  //Ejecuta la actualización
	  	//return true;
	   //else
			// return false;
   }

   public function BorrarRegistro($tabla, $llave, $valorLlave){
		$this->Conectar();
		$Parametros = array(':'.$llave => $valorLlave); //Parámetros que irán dentro de la consulta
		$SQL = "DELETE FROM ". $tabla . " WHERE " . $llave . "=:" . $llave;
		$Sentencia = $this->Conexion->prepare($SQL); //Prepara el borrado
		if ($Sentencia->execute($Parametros))  //Ejecuta el borrado
			return true;
		else
			return false;
	}

   public function TraeRegistros($SQL){
     $this->Conectar();
     $Sentencia = $this->Conexion->prepare($SQL);
     $Sentencia->execute();
     return $Sentencia->fetchAll();
   }

   public function TraeDato($Campo,$Tabla,$Llave, $Valor){
     $this->Conectar();
     $Parametros = array(':'. $llave => $Valor);
     $SQL = "SELECT". $Campo . "FROM" . $Tabla . "WHERE" . $Llave . "=:" .$Llave;
     $Sentencia = $this->Conexion->prepare($SQL);
     return $Sentencia->fetchColumn();
   }

}

 ?>
