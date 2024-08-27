<?php
    require_once("../../models/admin.php");

    /**
     * Clase controladora para gestionar las operaciones relacionadas con los usuarios.
     */
    class adminController
    {
        private $model;

        function __construct()
        {
            $this->model = new admin();
        }

        /**
         * Autentica a un usuario comparando las credenciales proporcionadas con los registros de administradores en la base de datos.
         * Redirige al administrador a la página correspondiente según su tipo de autenticación.
         *
         * @param string $usuario Nombre de administrador.
         * @param string $pass Contraseña del administrador.
         *
         * @return void Redirige al administrador a la página de toma de asistencia.
         */
        public function authenticateUser($usuario, $pass)
        {
            $admin = $this->model->authenticateAdmin($usuario, $pass);
            if ($admin != false) {
                return header("Location: ../admin/index.php");
            }else {
                return header("Location: ../../index.php");
            }
        }

        /**
         * La función RegisterUser registra a un usuario insertando su nombre, nombre de usuario y
         * contraseña en una base de datos y luego lo redirige a diferentes páginas según el éxito o el
         * fracaso del registro.
         * 
         * @param nombre El nombre del usuario que se está registrando.
         * @param usuario El parámetro "usuario" representa el nombre de usuario del usuario que se
         * registra.
         * @param pass El parámetro "contraseña" es la contraseña que el usuario desea establecer para
         * su cuenta.
         * 
         * @return una ubicación de encabezado. Si el registro se realiza correctamente, se
         * redireccionará a "../views/admin/index.php". Si el registro falla, se redireccionará a
         * "../../index.php".
         */
        public function registerUser($nombre, $usuario, $pass)
        {
            return ($this->model->insert($nombre, $usuario, $pass))? true : false;
        }

    }
?>