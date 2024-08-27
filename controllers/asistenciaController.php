<?php
    require_once("../../models/asistencia.php");


    class asistenciaController{
        private $model;

        /**
         * La función inicializa una nueva instancia del modelo "asistencia".
         */
        function __construct(){

            $this->model = new  asistencia();

        }

        /**
         * La función inserta datos de asistencia en una base de datos y redirige al usuario a una
         * página de éxito o error según el resultado.
         * 
         * @param nombre El nombre de la persona para quien se registra la asistencia.
         * @param status El parámetro "estado" se utiliza para indicar el estado de asistencia de una
         * persona. Podría ser un valor como "presente", "ausente", "tarde", etc.
         * @param fecha El parámetro "fecha" representa la fecha de la asistencia.
         * 
         * @return una redirección de ubicación del encabezado. Si la inserción se realiza
         * correctamente, se redireccionará a la página de índice del administrador. Si hay un error,
         * lo redirigirá a la página de error del administrador.
         */
        public function insertAsistencia($nombre, $status, $fecha)
        {
            $resultado = $this->model->insert($nombre, $status, $fecha);

            if ($resultado != false) {
                 // Inserción exitosa
                return header("Location: ../../views/admin/index.php");
            } else {
                
                // Error al insertar
                return header("Location: ../../views/admin/error.php");
            }
        }

        /**
         * La función "insertFecha" inserta una fecha determinada en la base de datos utilizando el
         * método "insertFecha" del modelo.
         * 
         * @param fecha El parámetro "fecha" es una variable que representa una fecha.
         * 
         * @return el resultado de la llamada al método "insertFecha" en el objeto "modelo".
         */
        public function insertFecha($fecha)
        {
            return($this->model->insertFecha($fecha));
        } 

      /**
       * La función "readAsistencias" devuelve el resultado del método "read" del modelo, o false si el
       * resultado está vacío.
       * 
       * @return el resultado del método de "lectura" del modelo. Si el resultado es veraz, será
       * devuelto. De lo contrario, devolverá falso.
       */
        public function readAsistencias(){
            return($this->model->read()) ? $this->model->read() :  false;
        }

        /**
         * La función "readAnioAsistencia" lee datos de un año específico de un modelo y los devuelve,
         * o devuelve falso si no se encuentran datos.
         * 
         * @param year El parámetro "año" es el año del cual desea leer los datos de asistencia.
         * 
         * @return el resultado de la llamada al método `->model->readAnio()`. Si el
         * resultado es verdadero, devolverá el resultado; de lo contrario, devolverá "falso".
         */
        public function readAnioAsistencia($year){
            return($this->model->readAnio($year)) ? $this->model->readAnio($year) : false;
        }

        /**
         * La función lee datos de asistencia para un mes y año específicos de un modelo.
         * 
         * @param year El parámetro año se utiliza para especificar el año para el cual desea leer los
         * datos de asistencia. Normalmente es un valor entero que representa el año (por ejemplo,
         * 2021).
         * @param month El parámetro mes se utiliza para especificar el mes para el cual desea leer los
         * datos de asistencia. Debe ser un valor numérico que represente el mes, donde 1 representa
         * enero, 2 representa febrero, etc.
         * 
         * @return el resultado del método "readMes" del modelo. Si el resultado no es falso, devolverá
         * el resultado; de lo contrario, devolverá falso.
         */
        public function readMesAsistencia($year, $month){
            return($this->model->readMes($year, $month)) ? $this->model->readMes($year, $month) : false;
        }


        /**
         * La función lee los datos de un día específico del modelo y los devuelve, o devuelve falso si
         * no se encuentran datos.
         * 
         * @param year El parámetro año representa el año para el cual desea leer los datos. Se utiliza
         * para filtrar los datos según el año especificado.
         * @param month El parámetro mes representa el mes de la fecha para la que desea leer la
         * asistencia. Debe ser un valor numérico entre 1 y 12, donde 1 representa enero y 12
         * representa diciembre.
         * @param day El parámetro de día representa el día específico del mes para el cual desea leer
         * los datos de asistencia.
         * 
         * @return el resultado de la llamada al método `->model->readDia(, , )`.
         * Si el resultado es verdadero, devolverá el resultado; de lo contrario, devolverá "falso".
         */
        public function readDiaAsistencia($year, $month, $day){
            return($this->model->readDia($year, $month, $day)) ? $this->model->readDia($year, $month, $day) : false;
        }

        /**
         * La función "readMensual" lee datos mensuales de un usuario específico en PHP.
         * 
         * @param month El parámetro mes se utiliza para especificar el mes para el cual se leen los
         * datos. Podría ser un valor numérico que represente el mes (por ejemplo, 1 para enero, 2 para
         * febrero, etc.) o una cadena que represente el nombre del mes (por ejemplo, "enero",
         * "febrero", etc.
         * @param nombreUsuario El parámetro "nombreUsuario" es una cadena que representa el nombre de
         * usuario de un usuario.
         * 
         * @return el resultado de la llamada al método `->model->readMensualUsuario(,
         * )` si es verdadero, en caso contrario devuelve `falso`.
         */
        public function readMensual( $month, $nombreUsuario){
            return($this->model->readMensualUsuario( $month, $nombreUsuario)) ? $this->model->readMensualUsuario($month, $nombreUsuario) : false;
        }       


        /**
         * La función "readAsistenciaFecha" lee los registros de asistencia de una fecha específica.
         * 
         * @param fecha El parámetro "fecha" representa una fecha.
         * 
         * @return el resultado de la llamada al método `->model->readAsistenciasFecha()`.
         * Si el resultado es verdadero, devolverá el resultado; de lo contrario, devolverá "falso".
         */
        public function readAsistenciaFecha($fecha){
            return($this->model->readAsistenciasFecha($fecha)) ? $this->model->readAsistenciasFecha($fecha) :  false;
        }

        /**
         * La función "readFecha" devuelve el valor de "readFecha" del modelo, o falso si no está
         * disponible.
         * 
         * @return el resultado de la llamada al método `->model->readFecha()`. Si la llamada al
         * método devuelve un valor verdadero, entonces se devuelve ese valor. De lo contrario,
         * devuelve "falso".
         */
        public function readFecha(){
            return($this->model->readFecha()) ? $this->model->readFecha() :  false;
        }

        /**
         * La función "updateAsistencia" actualiza el estado de asistencia para una fecha y nombre
         * determinados.
         * 
         * @param status El parámetro de estado representa el estado actualizado de la asistencia.
         * Podría ser un valor booleano que indique si la asistencia está presente o ausente, o podría
         * ser un valor de cadena que represente el estado, como "presente" o "ausente".
         * @param fecha El parámetro "fecha" representa la fecha de actualización de asistencia.
         * @param nombre El nombre de la persona cuya asistencia se actualiza.
         * 
         * @return el resultado de la llamada al método `->model->updateAsistencias(
         * ,, )`.
         */
        public function updateAsistencia($status, $fecha, $nombre){
            return($this->model->updateAsistencias($status ,$fecha, $nombre));
        }

        /**
         * La función "deleteAsistencias" elimina los registros de asistencia y la fecha
         * correspondiente de la base de datos.
         * 
         * @param fecha El parámetro "fecha" representa la fecha para la cual se deben eliminar los
         * registros de "asistencias" y "fecha".
         * 
         * @return un valor booleano. Si tanto el método deleteAsistencias como el método deleteFecha
         * del modelo tienen éxito, devolverá verdadero. De lo contrario, devolverá falso.
         */
        public function deleteAsistencias($fecha){
            return($this->model->deleteAsistencias( $fecha) && $this->model->deleteFecha($fecha)) ? true : false;
        }

       
    }

?>