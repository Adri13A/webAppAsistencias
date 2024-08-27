# **README 📖**

![banner](https://github.com/user-attachments/assets/25e0f6cd-b07e-4363-a3d1-6ebedda9bbdf)




## **WebAppAsistencias ✍🏻**

Es una aplicación web desarrollada con PHP, siguiendo la arquitectura MVC. Diseñada para optimizar la gestión de asistencias, permite al administrador registrar de forma detallada las asistencias, faltas y justificaciones. La aplicación genera reportes personalizados en formato PDF y ofrece una interfaz intuitiva construida con JavaScript y Bootstrap, brindando una experiencia de usuario moderna y responsiva.


## **Introducción**

webAppAsistencias se presenta como una solución eficaz para optimizar la gestión de la asistencia, mejorando la eficiencia y la calidad de los datos.


## **Tecnologías utilizadas**

- **Backend:** PHP (POO, PDO), MySQL, TCPDF Library.
- **Frontend:** HTML, CSS, JavaScript, Bootstrap.
<hr>

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)

<br>

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)


## **Características principales**

1. Registro detallado de asistencias, faltas y justificaciones.
2. Generación de reportes con graficas en formato PDF con la librería TCPDF.
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
- Importa las tablas necesarias del archivo *webApp.sql* dentro de la carpeta *config*

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


## **Imagenes**
### Inicio
> ![webAppAsistencias](https://github.com/user-attachments/assets/c6eda8fe-dd37-4033-a6d8-36cf59284b29)

### Listado de Asistencias
> ![webAppAsistencias-Asistencias](https://github.com/user-attachments/assets/bd054869-3c03-4bdd-ad1c-07650e6f2bcd)

### Usuarios
> ![webAppAsistencias-Usuarios](https://github.com/user-attachments/assets/2601a664-9f15-4502-991c-f59d04040272)

### Agregar Nuevo Usuario
> ![webAppAsistencias-AggUsuario](https://github.com/user-attachments/assets/193a4791-c101-4bf8-9a2c-7b3d889039b5)


### Repostes PDF
> ![webAppAsistencias-RepostesPDF](https://github.com/user-attachments/assets/84c05360-a115-4d41-a73a-8f0ba6e489b7)

## **Licencia**

webAppAsistencias is released under the MIT License.
<br>

[![Licence](https://img.shields.io/github/license/Ileriayo/markdown-badges?style=for-the-badge)](./LICENSE)


## **Autores**

webAppAsistencias fue creado en *02/02/2024* por **[Adrian Gurrola](https://github.com/Adri13A)**.
