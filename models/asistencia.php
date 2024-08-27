<?php
require_once("../../config/conexion.php");

/* La clase "asistencia" en PHP se utiliza para insertar datos de asistencia de los usuarios en una
    base de datos. */
class asistencia
{
    private $PDO;

    public function __construct()
    {
        $con = new Conexion();
        $this->PDO = $con->open();
    }

    public function __destruct()
    {
        $this->PDO = null;
    }


    /**
     * La función inserta un nuevo registro en una tabla de base de datos llamada "usuario" con los
     * valores proporcionados para "nombre", "status" y "fecha".
     * 
     * @param nombre El parámetro "nombre" representa el nombre del usuario que desea insertar en
     * la base de datos.
     * @param status El parámetro "estado" es una variable que representa el estado del usuario.
     * Podría ser una cadena o un valor entero que indique el estado del usuario, como "activo",
     * "inactivo" o un valor numérico como 1 o 0.
     * @param fecha El parámetro "fecha" representa el valor de fecha que desea insertar en la base
     * de datos.
     * 
     * @return un valor booleano. Si la consulta se ejecuta correctamente, devolverá verdadero. De
     * lo contrario, devolverá falso.
     */
    public function insert($nombre, $status, $fecha)
    {
        $statement = "INSERT INTO asistencias (nombre_usuario, statusAsistencia, fecha) VALUES (:nombre_usuario, :statusAsistencia, :fecha)";

        $query = $this->PDO->prepare($statement);
        $query->bindValue(':nombre_usuario', $nombre);
        $query->bindValue(':statusAsistencia', $status);
        $query->bindValue(':fecha', $fecha);

        return ($query->execute()) ? true : false;
    }

    /**
     * La función inserta una fecha en una tabla de la base de datos llamada "fecha".
     * 
     * @param fecha El parámetro "fecha" es una variable que representa un valor de fecha. Se utiliza
     * en la declaración SQL para insertar la fecha en la columna "fecha" de una tabla.
     * 
     * @return un valor booleano. Si la ejecución de la consulta es exitosa, devolverá verdadero. De lo
     * contrario, devolverá falso.
     */
    public function insertFecha($fecha)
    {
        $statement = "INSERT INTO fecha (fecha) VALUES (:fecha)";

        $query = $this->PDO->prepare($statement);
        $query->bindValue(':fecha', $fecha);

        return ($query->execute()) ? true : false;
    }

    /**
     * La función de lectura recupera todos los registros de la tabla "asistencias" en una base de
     * datos usando PDO en PHP.
     * 
     * @return el resultado de la ejecución de la consulta. Si la consulta se ejecuta con éxito,
     * devolverá una matriz que contiene todas las filas extraídas de la tabla "asistencias". Si la
     * consulta falla, devolverá falso.
     */
    public function read()
    {
        $statement = "SELECT * FROM asistencias";
        $query = $this->PDO->prepare($statement);

        return ($query->execute()) ? $query->fetchAll() : false;
    }

    /**
     * La función lee el año a partir de una fecha determinada, prepara una consulta SQL para
     * filtrar datos por ese año, ejecuta la consulta y devuelve los resultados.
     * 
     * @param year El parámetro "año" es el valor de entrada que representa el año para el cual
     * desea filtrar los datos.
     * 
     * @return los resultados de la consulta SQL si se ejecuta con éxito; de lo contrario, devuelve
     * falso.
     */
    public function readAnio($year)
    {
        // Extrayendo el año de la fecha completa
        $year = substr($year, 0, 4);

        // Preparando la consulta SQL para filtrar por año
        $statement = "SELECT * FROM asistencias WHERE YEAR(fecha) = :year";
        $query = $this->PDO->prepare($statement);

        // Asignando el valor del año al parámetro de la consulta
        $query->bindParam(":year", $year);

        // Ejecutando la consulta y devolviendo los resultados
        return ($query->execute()) ? $query->fetchAll() : false;
    }


    /**
     * La función lee y devuelve todos los registros de una tabla de base de datos llamada
     * "asistencias" para un mes determinado.
     * 
     * @param month El parámetro "mes" es una cadena que representa un mes específico en el formato
     * "AAAA-MM" (por ejemplo, "2022-01" para enero de 2022).
     * 
     * @return los resultados de la consulta SQL ejecutada. Si la consulta tiene éxito, devolverá una
     * serie de filas extraídas de la base de datos. Si la consulta falla, devolverá falso.
     */
    public function readMes($year, $month)
    {
        // Preparando la consulta SQL para filtrar por año y mes
        $statement = "SELECT * FROM asistencias WHERE YEAR(fecha) = :year AND MONTH(fecha) = :month";
        $query = $this->PDO->prepare($statement);

        // Asignando los valores del año y mes a los parámetros de la consulta
        $query->bindParam(":year", $year);
        $query->bindParam(":month", $month);

        // Ejecutando la consulta y devolviendo los resultados
        return ($query->execute()) ? $query->fetchAll() : false;
    }


    /**
     * La función lee datos de una tabla de base de datos llamada "asistencias" según el año, mes y día
     * proporcionados.
     * 
     * @param year El parámetro "año" se utiliza para filtrar los resultados por un año específico. Se
     * espera que sea un número entero que represente el año (por ejemplo, 2021).
     * @param month El parámetro "mes" se utiliza para filtrar los resultados por un mes específico. Se
     * espera que sea un número entero que represente el mes (por ejemplo, 1 para enero, 2 para
     * febrero, etc.).
     * @param day El parámetro "día" en la función "readDia" representa el día específico del mes para
     * el cual desea recuperar datos de la tabla "asistencias". Se utiliza para filtrar los resultados
     * según el día de la columna "fecha" (fecha) de la tabla.
     * 
     * @return los resultados de la consulta SQL ejecutada. Si la consulta tiene éxito, devolverá una
     * serie de filas de la tabla "asistencias" que coinciden con el año, mes y día especificados. Si
     * la consulta falla, devolverá falso.
     */
    public function readDia($year, $month, $day)
    {
        // Preparando la consulta SQL para filtrar por año, mes y día
        $statement = "SELECT * FROM asistencias WHERE YEAR(fecha) = :year AND MONTH(fecha) = :month AND DAY(fecha) = :day";
        $query = $this->PDO->prepare($statement);

        // Asignando los valores del año, mes y día a los parámetros de la consulta
        $query->bindParam(":year", $year);
        $query->bindParam(":month", $month);
        $query->bindParam(":day", $day);

        // Ejecutando la consulta y devolviendo los resultados
        return ($query->execute()) ? $query->fetchAll() : false;
    }

    /**
     * La función lee los datos de asistencia mensual del usuario de una base de datos según el mes y
     * el nombre de usuario proporcionados.
     * 
     * @param month El parámetro "mes" se utiliza para filtrar los resultados por un mes específico. Se
     * espera que sea un número entero que represente el número del mes (1 para enero, 2 para febrero,
     * etc.).
     * @param nombreUsuario El parámetro "nombreUsuario" representa el nombre del usuario del cual se
     * desea recuperar los datos mensuales.
     * 
     * @return los resultados de la consulta SQL ejecutada. Si la consulta tiene éxito, devolverá una
     * serie de resultados. Si la consulta falla, devolverá falso.
     */
    public function readMensualUsuario(/*$year,*/ $month, $nombreUsuario)
    {
        // Preparando la consulta SQL para filtrar por año, mes y nombre de usuario
        $statement = "SELECT * FROM asistencias WHERE MONTH(fecha) = :month AND nombre_usuario = :nombreUsuario";
        $query = $this->PDO->prepare($statement);

        // Asignando los valores del año, mes y nombre de usuario a los parámetros de la consulta
        //$query->bindParam(":year", $year);
        $query->bindParam(":month", $month);
        $query->bindParam(":nombreUsuario", $nombreUsuario);

        // Ejecutando la consulta y devolviendo los resultados
        return ($query->execute()) ? $query->fetchAll() : false;
    }





    /**
     * La función "readFecha" recupera todas las filas de la tabla "fecha" en una base de datos
     * usando PDO y devuelve el resultado como una matriz.
     * 
     * @return el resultado de la ejecución de la consulta. Si la consulta se ejecuta
     * correctamente, devolverá una matriz que contiene todas las filas extraídas de la tabla
     * "fecha". Si la consulta falla, devolverá falso.
     */
    public function readFecha()
    {
        $statement = "SELECT * FROM fecha";
        $query = $this->PDO->prepare($statement);

        return ($query->execute()) ? $query->fetchAll() : false;
    }

    /**
     * La función lee todos los registros de la tabla "asistencias" donde la fecha coincide con el
     * parámetro dado.
     * 
     * @param fecha El parámetro "fecha" es una fecha que se utiliza para filtrar los registros en
     * la tabla de "asistencias". La función "readAsistenciasFecha" recupera todos los registros de
     * la tabla "asistencias" que tienen un valor de fecha coincidente en la columna "fecha".
     * 
     * @return el resultado de la ejecución de la consulta. Si la consulta se ejecuta
     * correctamente, devolverá una matriz que contiene todas las filas extraídas de la base de
     * datos. Si la consulta no se ejecuta, devolverá falso.
     */
    public function readAsistenciasFecha($fecha)
    {
        $statement = "SELECT * FROM asistencias WHERE fecha = :fecha";
        $query = $this->PDO->prepare($statement);
        $query->bindParam(':fecha', $fecha);

        return ($query->execute()) ? $query->fetchAll() : false;
    }

    /**
     * La función actualiza el estado de un registro de asistencia en una base de datos según la
     * fecha y el nombre de usuario indicados.
     * 
     * @param status El parámetro status es el nuevo valor con el que desea actualizar la columna
     * statusAsistencia en la tabla asistencias. Representa el estado actualizado de la asistencia.
     * @param fecha El parámetro "fecha" representa la fecha del registro de asistencia que se
     * desea actualizar. Se utiliza para identificar el registro específico que debe actualizarse.
     * @param nombre El parámetro "nombre" representa el nombre del usuario cuya asistencia se está
     * actualizando.
     * 
     * @return un valor booleano. Si la ejecución de la consulta es exitosa, devolverá verdadero.
     * De lo contrario, devolverá falso.
     */
    public function updateAsistencias($status, $fecha, $nombre)
    {
        $statement = "UPDATE asistencias SET statusAsistencia = :status WHERE fecha = :fecha AND nombre_usuario = :nombre";

        $query = $this->PDO->prepare($statement);
        $query->bindParam(":status", $status);
        $query->bindParam(":fecha", $fecha);
        $query->bindParam(":nombre", $nombre);

        return ($query->execute()) ? true : false;
    }

    /**
     * La función elimina filas de la tabla "asistencias" donde la columna "fecha" coincide con la
     * fecha proporcionada.
     * 
     * @param fecha El parámetro "fecha" representa la fecha para la cual se desea eliminar los
     * registros de la tabla "asistencias".
     * 
     * @return un valor booleano. Si la ejecución de la consulta es exitosa, devolverá verdadero.
     * De lo contrario, devolverá falso.
     */
    public function deleteAsistencias($fecha)
    {
        $statement = "DELETE FROM asistencias WHERE fecha = :fecha";
        $query = $this->PDO->prepare($statement);

        $query->bindParam(":fecha", $fecha);

        return ($query->execute()) ? true : false;
    }

    /**
     * La función `deleteFecha` elimina un registro de la tabla `fecha` según el valor `fecha`
     * proporcionado.
     * 
     * @param fecha El parámetro "fecha" es la fecha que desea eliminar de la tabla "fecha" en la
     * base de datos.
     * 
     * @return un valor booleano. Si la ejecución de la consulta es exitosa, devolverá verdadero.
     * De lo contrario, devolverá falso.
     */
    public function deleteFecha($fecha)
    {
        $statement = "DELETE FROM fecha WHERE fecha = :fecha";
        $query = $this->PDO->prepare($statement);

        $query->bindParam(":fecha", $fecha);

        return ($query->execute()) ? true : false;
    }
}
