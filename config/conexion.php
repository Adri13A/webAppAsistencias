<?php

    class Conexion
    {
        private $server = "localhost";
        private $db = "webapp";
        private $user = "root";
        private $password = "";
        
        protected $conexion;

        public function open()
        {
            try {
                $this->conexion = new PDO("mysql:host=$this->server;dbname=$this->db", "$this->user", "$this->password");
                return $this->conexion;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        public function close()
        {
            $this->conexion = NULL;
            return $this->conexion;
        }
    }
?>