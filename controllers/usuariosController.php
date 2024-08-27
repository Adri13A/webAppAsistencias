<?php
require_once("../../models/usuarios.php");

/**
 * Clase controladora para gestionar las operaciones relacionadas con los usuarios.
 */
class usuariosController
{
    private $model;

    function __construct()
    {
        $this->model = new usuario();
    }

    /**
     * La función "readUsuario" devuelve el resultado del método "read" del modelo, o false si está
     * vacío.
     * 
     * @return el resultado del método de "lectura" del modelo. Si el método "leer" devuelve un
     * valor, se devolverá ese valor. De lo contrario, devolverá falso.
     */
    public function readUsuario()
    {
        return ($this->model->read()) ? $this->model->read() : false;
    }

    /**
     * La función lee un solo usuario de la base de datos y redirige a una página que muestra todos
     * los usuarios si el usuario no existe.
     * 
     * @param id El parámetro "id" es el identificador único del usuario (usuario) que desea leer
     * de la base de datos.
     * 
     * @return el resultado del método `readOne` del objeto modelo. Si el resultado no es falso,
     * devolverá el resultado. En caso contrario redirigirá al usuario a la página
     * "readAllUsuarios.php".
     */
    public function readOneUsuario($id)
    {
        return ($this->model->readOne($id) != false) ? $this->model->readOne($id) : header("Location: readAllUsuarios.php");
    }

    /**
     * La función "readUserState" lee el estado de un usuario del modelo y lo devuelve, o false si
     * no existe.
     * 
     * @param estado El parámetro "estado" es una variable que representa el estado de un usuario.
     * Se utiliza como argumento en la función "readUsuarioEstado" para recuperar datos del usuario
     * del modelo en función del estado especificado.
     * 
     * @return el resultado de la llamada al método `->model->readEstado()` si es
     * verdadero, de lo contrario devuelve `falso`.
     */
    public function readUsuarioEstado($estado)
    {
        return ($this->model->readEstado($estado)) ? $this->model->readEstado($estado) : false;
    }


    /**
     * El código define dos funciones, `updateUsuarios` e `insertUsuarios`, que se utilizan para
     * actualizar e insertar datos de usuario respectivamente.
     * 
     * @param fecha_ingreso_taller La fecha de entrada al taller.
     * @param nombre El parámetro "nombre" representa el nombre del usuario.
     * @param apellidoM El parámetro "apellidoM" representa el segundo nombre o la inicial del segundo
     * nombre del apellido de una persona.
     * @param apellidoP Apellido (paterno)
     * @param fechaNacimiento La fecha de nacimiento del usuario.
     * @param fotografia El parámetro "fotografia" probablemente se utilice para almacenar la imagen o
     * fotografía del usuario. Podría ser una ruta de archivo o una cadena codificada en base64 que
     * represente los datos de la imagen.
     * @param grado El parámetro "grado" se refiere al grado académico o nivel de educación del
     * usuario. Podría ser un diploma de escuela secundaria, licenciatura, maestría, etc.
     * @param profesion El parámetro "profesión" se refiere a la profesión u ocupación del usuario. Es
     * un valor de cadena que representa la profesión del usuario.
     * @param domicilioProfesion El parámetro “domicilioProfesión” se refiere a la dirección o
     * ubicación de la profesión o lugar de trabajo del usuario. Se utiliza para almacenar la dirección
     * donde el usuario trabaja o ejerce su profesión.
     * @param rfc El parámetro "rfc" significa "Registro Federal de Contribuyentes", que es un número
     * de identificación fiscal único asignado a personas físicas y jurídicas en México. Se utiliza con
     * fines fiscales e identificación en diversas transacciones financieras.
     * @param celular El parámetro "celular" hace referencia al número de celular del usuario.
     * @param correo El parámetro "correo" hace referencia a la dirección de correo electrónico del
     * usuario.
     * @param telefonoCasa El parámetro "telefonoCasa" hace referencia al número de teléfono del
     * domicilio del usuario.
     * @param telefonoTrabajo El parámetro "telefonoTrabajo" hace referencia al número de teléfono del
     * trabajo del usuario.
     * @param domicilio El parámetro "domicilio" se refiere a la dirección o residencia del usuario.
     * @param tipoSangre El parámetro "tipoSangre" hace referencia al tipo de sangre del usuario. Se
     * utiliza para almacenar y recuperar la información del tipo de sangre del usuario.
     * @param padecimientos El parámetro padecimientos se refiere a cualquier condición médica o
     * enfermedad que pueda tener el usuario.
     * @param alergias Una cadena que representa cualquier alergia que pueda tener el usuario.
     * @param seguro El parámetro "seguro" se refiere a la información del seguro del usuario. Podría
     * incluir detalles como el proveedor de seguro, número de póliza, detalles de cobertura, etc.
     * @param contactoEmergenciaNombre El nombre del contacto de emergencia del usuario.
     * @param contactoEmergenciaTel El parámetro "contactoEmergenciaTel" representa el número de
     * teléfono del contacto de emergencia de un usuario.
     * @param conyugue El parámetro “conyugue” se refiere al cónyuge o pareja del usuario.
     * @param conyugueCumple El parámetro "conyugueCumple" representa el cumpleaños o fecha de
     * nacimiento del cónyuge o pareja del usuario.
     * @param fechagrado1 El parámetro "fechagrado1" probablemente esté haciendo referencia a la fecha
     * de la primera graduación.
     * @param fechagrado2 El parámetro "fechagrado2" probablemente esté haciendo referencia a la fecha
     * de la segunda graduación.
     * @param fechagrado3 El parámetro "fechagrado3" probablemente esté haciendo referencia a la fecha
     * de la tercera graduación.
     * @param estado El parámetro "estado" representa el estado o estatus del usuario. Podría usarse
     * para indicar si el usuario está activo, inactivo o cualquier otro estado relevante en el
     * sistema.
     * @param idUsuario El identificador único del usuario en la base de datos.
     * 
     * @return Las funciones `updateUsuarios` e `insertUsuarios` están devolviendo el resultado de
     * llamar a los métodos `update` e `insert` del objeto `` respectivamente.
     */
    public function updateUsuarios(
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
        return ($this->model->update(
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
        ));
    }


    public function insertUsuarios(
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
        $estado
    ) {
        return ($this->model->insert(
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
            $estado
        ));
    }



    /**
     * La función de eliminación elimina un registro con la ID proporcionada y lo redirige a una página
     * diferente según el éxito o el fracaso de la eliminación.
     * 
     * @param id El parámetro "id" es el identificador único del registro que debe eliminarse. Se
     * utiliza para especificar qué registro debe eliminarse de la base de datos.
     * 
     * @return una ubicación de encabezado. Si la operación de eliminación tiene éxito, redirigirá a
     * "readAllUsuarios.php". Si la operación de eliminación falla, redirigirá a
     * "readOneUsuarios.php?id="., donde  es el parámetro pasado a la función.
     */
    public function delete($id)
    {
        return ($this->model->delete($id)) ? true: false;
    }
}
