# **README 📖**


## **WebAppAsistencias ✍🏻**

Es una aplicación web desarrollada con PHP, siguiendo la arquitectura MVC. Diseñada para optimizar la gestión de asistencia estudiantil, permite al profesor y/o administrador registrar de forma detallada las asistencias, faltas y justificaciones. La aplicación genera reportes personalizados en formato PDF y ofrece una interfaz intuitiva construida con JavaScript y Bootstrap, brindando una experiencia de usuario moderna y responsiva.


## **Introducción**

webAppAsistencias se presenta como una solución eficaz para optimizar la gestión de la asistencia, mejorando la eficiencia y la calidad de los datos.


## **Tecnologías utilizadas**

- **Backend:** PHP (POO, PDO), MySQL.
- **Frontend:** HTML, CSS, JavaScript, Bootstrap.


## **Características principales**

1. Registro detallado de asistencias, faltas y justificaciones.
2. Generación de reportes con graficas en formato PDF.
3. Interfaz intuitiva y fácil de usar.
4. Alta seguridad gracias al uso de PDO para la gestión de la base de datos.
5. Escalable y adaptable a las diferentes necesidades requeridas.

## **Instalación**

### **1. Clonar el repositorio:**
```Bash
git clone https://github.com/Adri13A/WebAppAsistencias.git
```

### **2. Configurar el servidor web:**
  - **Apache**: Asegúrate de que PHP esté habilitado y de igual manera tu servidor, configura las rutas para que apunten al directorio raíz de tu proyecto.
  - **Nginx**: Configura un bloque de servidor para tu aplicación, indicando la raíz del proyecto y la ubicación de los archivos PHP.

### **3. Crear la base de datos:**

- Utiliza phpMyAdmin o la línea de comandos para crear una nueva base de datos con el nombre especificado en tu configuración.
  ```PHP
  CREATE DATABASE webAppAsistencias;
  ```
### **4. Importar la estructura:**
- Importa las tablas necesarias del archivo *webApp.sql*

### **5. Configurar el archivo `config.php`:**
- Edita el archivo `config.php` y establece las credenciales de la base de datos.
```PHP
<?php
    class Conexion
    {
        private $server = "";
        private $db = "webAppAsistencias";
        private $user = "";
        private $password = "";
    }
?>
```

### **6. Iniciar el servidor**


## **Licencia**

webAppAsistencias is released under the MIT License.

## **Autores**

webAppAsistencias fue creado por **[Adrian Gurrola](https://github.com/Adri13A)**.
