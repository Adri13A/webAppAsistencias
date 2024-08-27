<?php
require_once("../../config/conexion.php");
/**
 * Clase que gestiona la autenticación de administrador.
 */
class usuario
{
    private $PDO;

    public function __construct()
    {
        $con = new Conexion();
        $this->PDO = $con->open();
    }

    public function __destruct()
    {
        $this->PDO = NULL;
    }

    /**
     * La función lee todos los registros de la tabla "usuario" en una base de datos y devuelve el
     * resultado como una matriz.
     * 
     * @return el resultado de la ejecución de la consulta. Si la consulta se ejecuta con éxito,
     * devolverá una matriz que contiene todas las filas extraídas de la tabla "usuario". Si la
     * consulta no se ejecuta, devolverá falso.
     */
    public function read()
    {
        $statement = "SELECT * FROM usuario";
        $query = $this->PDO->prepare($statement);

        return ($query->execute()) ? $query->fetchAll() : false;
    }

    /**
     * La función lee una sola fila de la tabla "usuario" en la base de datos según el ID
     * proporcionado.
     * 
     * @param id El parámetro "id" es el identificador único del usuario que desea recuperar de la
     * tabla de "usuario".
     * 
     * @return el resultado de la ejecución de la consulta. Si la consulta tiene éxito, devolverá
     * la fila recuperada de la tabla "usuario" con el ID especificado. Si la consulta falla,
     * devolverá falso.
     */
    public function readOne($id)
    {
        $statement = $this->PDO->prepare("SELECT * FROM usuario WHERE id_usuario = :id");

        $statement->bindParam(":id", $id);

        return ($statement->execute()) ? $statement->fetch() : false;
    }


    /**
     * La función inserta un nuevo registro en una tabla de base de datos con diversa información del
     * usuario.
     * 
     * @param fecha_ingreso_taller La fecha de entrada al taller.
     * @param nombre El parámetro "nombre" es el nombre del usuario.
     * @param apellidoM El parámetro "apellidoM" representa el segundo nombre o inicial del segundo
     * nombre de la persona que se inserta en la base de datos.
     * @param apellidoP El parámetro "apellidoP" representa el apellido o apellido de la persona que se
     * inserta en la base de datos.
     * @param fechaNacimiento El parámetro "fechaNacimiento" representa la fecha de nacimiento del
     * usuario.
     * @param fotografia El parámetro "fotografia" se utiliza para almacenar la fotografía del usuario.
     * Puede ser una ruta de archivo o una cadena codificada en base64 que represente la imagen.
     * @param grado El parámetro "grado" se refiere al grado académico o nivel de educación del
     * usuario. Podría ser un valor como "Licenciatura", "Maestría", "Doctorado", "Diploma de escuela
     * secundaria", etc.
     * @param profesion El parámetro "profesión" se refiere a la profesión u ocupación del usuario. Es
     * un valor de cadena que representa la profesión del usuario.
     * @param domicilioProfesion El parámetro “domicilioProfesión” se refiere a la dirección o
     * ubicación de la profesión o lugar de trabajo del usuario. Se utiliza para almacenar la dirección
     * profesional del usuario en la base de datos.
     * @param rfc El parámetro "rfc" significa "Registro Federal de Contribuyentes", que es un número
     * de identificación fiscal único asignado a personas físicas o jurídicas en México. Se utiliza con
     * fines fiscales e identificación en diversas transacciones.
     * @param celular El parámetro "celular" se utiliza para almacenar el número de celular del
     * usuario.
     * @param correo El parámetro "correo" representa la dirección de correo electrónico del usuario.
     * @param telefonoCasa El parámetro "telefonoCasa" es el número de teléfono particular del usuario.
     * @param telefonoTrabajo El parámetro "telefonoTrabajo" es el número de teléfono de trabajo del
     * usuario.
     * @param domicilio El parámetro "domicilio" se refiere a la dirección o residencia del usuario. Es
     * una cadena que representa la dirección particular del usuario.
     * @param tipoSangre El parámetro "tipoSangre" hace referencia al tipo de sangre del usuario. Se
     * utiliza para almacenar la información del tipo de sangre en la base de datos.
     * @param padecimientos El parámetro padecimientos se refiere a cualquier condición médica o
     * enfermedad que pueda tener el usuario. Se utiliza para almacenar información sobre las
     * condiciones de salud del usuario en la base de datos.
     * @param alergias El parámetro "alergias" se utiliza para almacenar las alergias que pueda tener
     * el usuario. Es una cadena que puede contener múltiples alergias separadas por comas o cualquier
     * otro delimitador.
     * @param seguro El parámetro "seguro" se refiere a la información del seguro del usuario. Podría
     * incluir detalles como la compañía de seguros, número de póliza, detalles de cobertura, etc.
     * @param contactoEmergenciaNombre El parámetro "contactoEmergenciaNombre" es el nombre del
     * contacto de emergencia del usuario.
     * @param contactoEmergenciaTel El parámetro "contactoEmergenciaTel" es el número de teléfono del
     * contacto de emergencia del usuario.
     * @param conyugue El parámetro "conyugue" se refiere al cónyuge o pareja de la persona que se
     * inserta en la base de datos.
     * @param conyugueCumple El parámetro "conyugueCumple" representa el cumpleaños del cónyuge o
     * pareja del usuario.
     * @param fechagrado1 El parámetro "fechagrado1" es una fecha que representa la primera fecha de
     * graduación.
     * @param fechagrado2 El parámetro "fechagrado2" es una variable que representa la fecha de la
     * segunda graduación. Se utiliza como parámetro en la función insert para insertar el valor de la
     * segunda fecha de graduación en la columna "fechagrado2" de la tabla "usuario" de la base de
     * datos.
     * @param fechagrado3 El parámetro "fechagrado3" es una variable que representa la fecha de la
     * tercera graduación. Se utiliza como parámetro en la función insertar para insertar el valor de
     * la tercera fecha de graduación en la columna "fechagrado3" de la tabla "usuario" de la base de
     * datos.
     * @param estado El parámetro "estado" representa el estado o status del usuario. Podría ser una
     * cadena o un valor entero que indique si el usuario está activo, inactivo o cualquier otro estado
     * definido en el sistema.
     * 
     * @return un valor booleano. Devuelve verdadero si la ejecución de la consulta es exitosa y falso
     * si falla.
     */
    public function insert(
        $fecha_ingreso_taller,
        $nombre,
        $apellidoM,
        $apellidoP,
        $fechaNacimiento,
        $fotografia,
        $grado,
        $profesion,
        $domicilioProfesion,
        $rfc,
        $celular,
        $correo,
        $telefonoCasa,
        $telefonoTrabajo,
        $domicilio,
        $tipoSangre,
        $padecimientos,
        $alergias,
        $seguro,
        $contactoEmergenciaNombre,
        $contactoEmergenciaTel,
        $conyugue,
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
        $conyugueCumple,
        $fechagrado1,
        $fechagrado2,
        $fechagrado3,
        $estado
    ) {
        $statement = "INSERT INTO usuario (
            fecha_ingreso_taller,
            nombre,
            apellidoM,
            apellidoP,
            fecha_nacimiento,
            fotografia,
            grado,
            profesion,
            domicilio_profesion,
            rfc,
            celular,
            correo,
            telefonoCasa,
            telefonoTrabajo,
            domicilio,
            tipoSangre,
            padecimientos,
            alergia,
            seguro,
            contacto_emergenciaNombre,
            contacto_emergenciaTelefono,
            conyugue,
            conyugueCumpleaños,
            fechagrado1,
            fechagrado2,
            fechagrado3,
            estado
        ) VALUES (
            :fecha_ingreso_taller,
            :nombre,
            :apellidoM,
            :apellidoP,
            :fecha_nacimiento,
            :fotografia,
            :grado,
            :profesion,
            :domicilioProfesion,
            :rfc,
            :celular,
            :correo,
            :telefonoCasa,
            :telefonoTrabajo,
            :domicilio,
            :tipoSangre,
            :padecimientos,
            :alergias,
            :seguro,
            :contactoEmergenciaNombre,
            :contactoEmergenciaTel,
            :conyugue,
            :conyugueCumple,
            :fechagrado1,
            :fechagrado2,
            :fechagrado3,
            :estado
        )";

        $query = $this->PDO->prepare($statement);

        $query->bindParam(":fecha_ingreso_taller", $fecha_ingreso_taller);
        $query->bindParam(":nombre", $nombre);
        $query->bindParam(":apellidoM", $apellidoM);
        $query->bindParam(":apellidoP", $apellidoP);
        $query->bindParam(":fecha_nacimiento", $fechaNacimiento);
        $query->bindParam(":fotografia", $fotografia);
        $query->bindParam(":grado", $grado);
        $query->bindParam(":profesion", $profesion);
        $query->bindParam(":domicilioProfesion", $domicilioProfesion);
        $query->bindParam(":rfc", $rfc);
        $query->bindParam(":celular", $celular);
        $query->bindParam(":correo", $correo);
        $query->bindParam(":telefonoCasa", $telefonoCasa);
        $query->bindParam(":telefonoTrabajo", $telefonoTrabajo);
        $query->bindParam(":domicilio", $domicilio);
        $query->bindParam(":tipoSangre", $tipoSangre);
        $query->bindParam(":padecimientos", $padecimientos);
        $query->bindParam(":alergias", $alergias);
        $query->bindParam(":seguro", $seguro);
        $query->bindParam(":contactoEmergenciaNombre", $contactoEmergenciaNombre);
        $query->bindParam(":contactoEmergenciaTel", $contactoEmergenciaTel);
        $query->bindParam(":conyugue", $conyugue);
        $query->bindParam(":conyugueCumple", $conyugueCumple);
        $query->bindParam(":fechagrado1", $fechagrado1);
        $query->bindParam(":fechagrado2", $fechagrado2);
        $query->bindParam(":fechagrado3", $fechagrado3);
        $query->bindParam(":estado", $estado);

        return ($query->execute())?true : false ;
    }



    /**
     * La función lee y devuelve todas las filas de la tabla "usuario" donde la columna "estado"
     * coincide con el valor proporcionado.
     * 
     * @param estado El parámetro "estado" es una variable que representa el estado de un usuario.
     * Se utiliza en la consulta SQL para filtrar los resultados y recuperar todos los usuarios con
     * un estado específico.
     * 
     * @return el resultado de la ejecución de la consulta. Si la consulta tiene éxito, devolverá
     * una matriz de todas las filas que coinciden con el estado dado. Si la consulta falla,
     * devolverá falso.
     */
    public function readEstado($estado)
    {
        $statement = "SELECT * FROM usuario WHERE estado = :estado";

        $query = $this->PDO->prepare($statement);
        $query->bindParam(":estado", $estado);

        return ($query->execute()) ? $query->fetchAll() : false;
    }



    /**
     * La función elimina un registro de la tabla de "usuario" en la base de datos según el ID
     * proporcionado.
     * 
     * @param id El parámetro "id" es el identificador único del usuario que se desea eliminar de la
     * tabla de "usuario".
     * 
     * @return un valor booleano. Si la ejecución de la declaración de eliminación es exitosa,
     * devolverá verdadero. De lo contrario, devolverá falso.
     */
    public function delete($id)
    {

        $statement = "DELETE FROM usuario WHERE id_usuario= :id ";

        $query = $this->PDO->prepare($statement);

        $query->bindParam(":id", $id);

        return ($query->execute()) ? true : false;
    }


    /**
     * La función actualiza la información de un usuario en una base de datos.
     * 
     * @param fecha_ingreso_taller La fecha de entrada al taller.
     * @param nombre El parámetro "nombre" es el nombre del usuario.
     * @param apellidoM El parámetro "apellidoM" representa el segundo nombre o inicial del segundo
     * nombre del usuario.
     * @param apellidoP El parámetro "apellidoP" representa el apellido o apellido del usuario.
     * @param fechaNacimiento El parámetro "fechaNacimiento" representa la fecha de nacimiento del
     * usuario.
     * @param fotografia El parámetro "fotografia" se utiliza para almacenar la fotografía del usuario.
     * @param grado El parámetro "grado" se refiere al grado académico o nivel de educación del
     * usuario. Podría ser un diploma de escuela secundaria, licenciatura, maestría, etc.
     * @param profesion El parámetro "profesión" representa la profesión del usuario. Es un valor de
     * cadena que indica la ocupación o campo de trabajo del usuario.
     * @param domicilioProfesion El parámetro “domicilioProfesión” se refiere a la dirección o
     * ubicación de la profesión o lugar de trabajo del usuario. Se utiliza para actualizar el campo
     * "domicilio_profesion" en la tabla de "usuario".
     * @param rfc El parámetro "rfc" significa "Registro Federal de Contribuyentes", que es un número
     * de identificación fiscal único asignado a personas físicas o jurídicas en México. Se utiliza con
     * fines fiscales e identificación en diversas transacciones.
     * @param celular El parámetro "celular" se utiliza para actualizar el número de celular del
     * usuario en la base de datos.
     * @param correo El parámetro "correo" representa la dirección de correo electrónico del usuario.
     * @param telefonoCasa El parámetro "telefonoCasa" es el número de teléfono particular del usuario.
     * @param telefonoTrabajo El parámetro "telefonoTrabajo" representa el número de teléfono de
     * trabajo del usuario.
     * @param domicilio El parámetro "domicilio" se refiere a la dirección o residencia del usuario. Se
     * utiliza para actualizar la dirección del usuario en la base de datos.
     * @param tipoSangre El parámetro "tipoSangre" hace referencia al tipo de sangre del usuario. Se
     * utiliza para actualizar el campo de tipo de sangre en el registro del usuario en la base de
     * datos.
     * @param padecimientos El parámetro padecimientos se refiere a cualquier condición médica o
     * enfermedad que pueda tener el usuario. Se utiliza para actualizar la información médica del
     * usuario en la base de datos.
     * @param alergias El parámetro "alergias" se utiliza para actualizar las alergias de un usuario en
     * la base de datos. Es una cadena que representa las alergias que tiene el usuario.
     * @param seguro El parámetro "seguro" se refiere a la información del seguro del usuario. Podría
     * incluir detalles como la compañía de seguros, número de póliza, cobertura, etc.
     * @param contactoEmergenciaNombre El parámetro "contactoEmergenciaNombre" es el nombre del
     * contacto de emergencia del usuario.
     * @param contactoEmergenciaTel El parámetro "contactoEmergenciaTel" es el número de teléfono del
     * contacto de emergencia del usuario.
     * @param conyugue El parámetro “conyugue” se refiere al cónyuge o pareja del usuario.
     * @param conyugueCumple El parámetro "conyugueCumple" representa el cumpleaños del cónyuge o
     * pareja del usuario.
     * @param fechagrado1 El parámetro "fechagrado1" es una fecha que representa la primera fecha de
     * graduación del usuario.
     * @param fechagrado2 El parámetro "fechagrado2" es una fecha que representa la segunda fecha de
     * graduación del usuario.
     * @param fechagrado3 El parámetro "fechagrado3" es un campo de fecha que representa la fecha de la
     * tercera graduación.
     * @param estado El parámetro "estado" representa el estado o status del usuario. Podría ser un
     * valor de cadena que indique si el usuario está activo, inactivo o cualquier otro estado definido
     * en el sistema.
     * @param idUsuario El parámetro `idUsuario` es el ID del usuario que se desea actualizar en la
     * base de datos. Se utiliza para identificar el registro de usuario específico que debe
     * actualizarse.
     * 
     * @return un valor booleano. Si la ejecución de la consulta es exitosa, devolverá verdadero. De lo
     * contrario, devolverá falso.
     */
    public function update(
        $fecha_ingreso_taller,
        $nombre,
        $apellidoM,
        $apellidoP,
        $fechaNacimiento,
        $fotografia,
        $grado,
        $profesion,
        $domicilioProfesion,
        $rfc,
        $celular,
        $correo,
        $telefonoCasa,
        $telefonoTrabajo,
        $domicilio,
        $tipoSangre,
        $padecimientos,
        $alergias,
        $seguro,
        $contactoEmergenciaNombre,
        $contactoEmergenciaTel,
        $conyugue,
        $conyugueCumple,
        $fechagrado1,
        $fechagrado2,
        $fechagrado3,
        $estado,
        $idUsuario
    ) {
        $statement = "UPDATE usuario 
                        SET fecha_ingreso_taller = :fecha_ingreso_taller, 
                        nombre = :nombre, 
                        apellidoM = :apellidoM,
                        apellidoP = :apellidoP,
                        fecha_nacimiento = :fecha_nacimiento,
                        fotografia = :fotoUsuario,
                        grado = :grado,
                        profesion = :profesion,
                        domicilio_profesion = :domicilioProfesion,
                        rfc = :rfc,
                        celular = :celular,
                        correo = :correo,
                        telefonoCasa = :telefonoCasa,
                        telefonoTrabajo = :telefonoTrabajo,
                        domicilio = :domicilio, 
                        tipoSangre = :tipoSangre,
                        padecimientos = :padecimientos,
                        alergia = :alergias,
                        seguro = :seguro,
                        contacto_emergenciaNombre = :contacto_emergenciaNombre,
                        contacto_emergenciaTelefono	= :contacto_emergenciaTelefono,
                        conyugue = :conyugue,
                        conyugueCumpleaños = :conyugueCumple,
                        fechagrado1 = :fechagrado1,
                        fechagrado2 = :fechagrado2,
                        fechagrado3 = :fechagrado3,
                        estado = :estadoUsuario
                        WHERE id_usuario  = :idUsuario";

        $query = $this->PDO->prepare($statement);

        $query->bindParam(":fecha_ingreso_taller", $fecha_ingreso_taller);
        $query->bindParam(":nombre", $nombre);
        $query->bindParam(":apellidoM", $apellidoM);
        $query->bindParam(":apellidoP", $apellidoP);
        $query->bindParam(":fecha_nacimiento", $fechaNacimiento);
        $query->bindParam(":fotoUsuario", $fotografia);
        $query->bindParam(":grado", $grado);
        $query->bindParam(":profesion", $profesion);
        $query->bindParam(":domicilioProfesion", $domicilioProfesion);
        $query->bindParam(":rfc", $rfc);
        $query->bindParam(":celular", $celular);
        $query->bindParam(":correo", $correo);
        $query->bindParam(":telefonoCasa", $telefonoCasa);
        $query->bindParam(":telefonoTrabajo", $telefonoTrabajo);
        $query->bindParam(":domicilio", $domicilio);
        $query->bindParam(":tipoSangre", $tipoSangre);
        $query->bindParam(":padecimientos", $padecimientos);
        $query->bindParam(":alergias", $alergias);
        $query->bindParam(":seguro", $seguro);
        $query->bindParam(":contacto_emergenciaNombre", $contactoEmergenciaNombre);
        $query->bindParam(":contacto_emergenciaTelefono", $contactoEmergenciaTel);
        $query->bindParam(":conyugue", $conyugue);
        $query->bindParam(":conyugueCumple", $conyugueCumple);
        $query->bindParam(":fechagrado1", $fechagrado1);
        $query->bindParam(":fechagrado2", $fechagrado2);
        $query->bindParam(":fechagrado3", $fechagrado3);
        $query->bindParam(":estadoUsuario", $estado);
        $query->bindParam(":idUsuario", $idUsuario);


        return ($query->execute())?true : false ;
    }
}
