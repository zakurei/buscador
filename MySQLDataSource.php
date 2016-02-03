<?php

class MySQLDataSource{
    private $conexion;
    private $consultas;
    private $row;

    function conectar(){
        if(!$this -> conexion){
            $host = getenv("OPENSHIFT_MYSQL_DB_HOST");
            $usuario = getenv("OPENSHIFT_MYSQL_DB_USERNAME");
            $password = getenv("OPENSHIFT_MYSQL_DB_PASSWORD");
	    $dbname = getenv("OPENSHIFT_APP_NAME");
           $this -> conexion = mysqli_connect($host,$usuario,$password) or die (mysqli_error($this->conexion));
            if (!$this -> conexion){
                $this -> RegError();
                return 0;
            }
            mysqli_set_charset($this->conexion, "UTF8");

           $db = mysqli_select_db($this -> conexion, $dbname);
            if(!$db)
            {
                $this->RegError();

                return 0;
            }
        }
        return 1;
    }

    function desconectar(){
        mysqli_close($this -> conexion);
    }

    function ejecutar_consulta($consulta){
        $this -> consultas = mysqli_query($this -> conexion, $consulta);

        $fail = mysqli_error($this->conexion);

        if($fail){
            $this->RegError();

            return 0;
        }
        return $this->consultas;
    }

    function siguiente(){
        $this -> row = mysqli_fetch_object($this -> consultas);
        return $this -> row;
    }

    function mensajeError(){
        return "Se ha ha registrado un error en 'Log_Errores.txt'.";
    }

    private function RegError(){
        $fallo = mysqli_error($this -> conexion);
        $errores = fopen("Log_Errores.txt","a");
        fwrite($errores,"[" . date("d/m/Y H:i:s") . "] " . $fallo . "\n");
        fclose($errores);
    }
}
