<?php
    require_once("../../config/conexion.php");
    /**
     * Clase que gestiona la autenticación de administrador.
     */
    class admin{
        private $PDO;

        public function __construct(){
            $con = new Conexion();
            $this->PDO = $con->open();
        }

        public function __destruct(){
            $this->PDO = NULL;
        }

        /**
         * Encripta la contraseña utilizando el algoritmo por defecto de PHP.
         *
         * @param string $password Contraseña a ser encriptada.
         * @return string Contraseña encriptada.
         */
        public function passwordEncrypt($password){
            $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
            return $passwordEncrypted;
        }

        /**
         * Verifica si una contraseña desencriptada coincide con la contraseña encriptada.
         *
         * @param string $passwordEncrypted Contraseña encriptada.
         * @param string $passwordCandidate Contraseña a verificar.
         * @return bool True si la contraseña coincide, false en caso contrario.
         */
        public function passwordDecrypted($passwordEncrypted, $passwordCandidate){
            return (password_verify($passwordCandidate,$passwordEncrypted))?true : false;
        }

        /**
         * Autentica a un administrador en el sistema.
         *
         * @param string $usuario Nombre de usuario del administrador.
         * @param string $pass Contraseña del administrador.
         * @return bool True si la autenticación es exitosa, false en caso contrario.
         */
        public function authenticateAdmin($usuario, $pass){
            //Declaramos el statement y preparamos la consulta
            $statement = "SELECT * FROM admin WHERE usuario = :usuario";
            $consulta = $this->PDO->prepare($statement);
            $consulta->bindParam(':usuario', $usuario);
            $consulta->execute();
            if ($fila = $consulta->fetch()) {
                if($this->passwordDecrypted($fila['password'],$pass)!=false){
                    $_SESSION['rol'] = 'admin';
                $_SESSION['nombre'] = $fila['profesor'];
                return true;
                }
            } else {
                return false;
            }
        }

        /**
         * La función `insert` registra un nuevo administrador insertando su nombre, nombre de
         * usuario y contraseña hash en una tabla de base de datos.
         * 
         * @param nombre El nombre del administrador que se está registrando.
         * @param usuario El parámetro "usuario" representa el nombre de usuario del administrador que
         * se está registrando.
         * @param password El parámetro de contraseña es la contraseña de texto sin formato que el
         * administrador desea establecer para su cuenta.
         * 
         * @return bool valor booleano. Si la ejecución de la consulta es exitosa, devolverá verdadero
         * indicando un registro exitoso. Si hay un error en el proceso de registro, devolverá falso.
         */
        public function insert($nombre, $usuario, $password) {
            // Hashear la contraseña antes de almacenarla
            $hashedPassword = $this->passwordEncrypt($password);
        
            // Preparar la consulta de inserción
            $statement = "INSERT INTO admin (profesor, usuario, password) VALUES (:nombre, :usuario, :password)";
            $consulta = $this->PDO->prepare($statement);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':usuario', $usuario);
            $consulta->bindParam(':password', $hashedPassword);
            // Ejecutar la consulta
            return ($consulta->execute())? $this->PDO->lastInsertId() : false;
        }

        /**
         * La función lee todos los registros de la tabla "admin" en una base de datos usando PDO y
         * devuelve el resultado como una matriz.
         * 
         * @return el resultado de la ejecución de la consulta. Si la consulta se ejecuta
         * correctamente, devolverá una matriz que contiene todas las filas extraídas de la tabla
         * "admin". Si la consulta no se ejecuta, devolverá falso.
         */
        public function read(){
            $statement = "SELECT * FROM admin";

            $query = $this->PDO->prepare($statement);

            return($query->execute()) ? $query->fetchAll() : false;
        }
    }

?>