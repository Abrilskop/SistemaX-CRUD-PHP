# SistemaX-CRUD-PHP

## Descripción
Implementacion de un sistema básico de gestión para clientes y productos. Utilizando PHP del lado del servidor con el apoyo de Ajax, esta aplicación permite realizar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) en una base de datos relacional. 

## Características
- Inserción de registros en las tablas de clientes y productos.
- Búsqueda y filtrado eficiente de datos almacenados.
- Actualización de registros existentes.
- Eliminación segura de registros.
- Interfaz mejorada con Ajax para minimizar recargas de página.

## Requisitos previos
- XAMPP instalado para configurar un servidor local.
- Sublime Text o cualquier otro editor de texto para modificar los archivos.
- Conocimientos básicos en PHP, SQL y Ajax.

## Estructura del proyecto
- **/extend:** Contiene archivos auxiliares como `alerta.php`.
- **/usuarios:** Incluye scripts clave como:
  - `ins_usuario.php` (Inserción de usuarios).
  - `eliminar_usuario.php` (Eliminación de usuarios).
  - `up_nivel.php` (Actualización de datos).
- **/js:** Archivos JavaScript para la validación, como `validacion.php`.

## Instalación
1. Clona este repositorio en tu máquina local:
   ```bash
   git clone https://github.com/tuusuario/SistemaX-CRUD-PHP.git
2. Copia los archivos al directorio htdocs de tu instalación de XAMPP.
3. Inicia los servicios de Apache y MySQL desde el panel de control de XAMPP.
4. Crea la base de datos necesaria y configura las credenciales de conexión en los archivos PHP correspondientes.

## Uso
- **Inserción:** Navega al formulario correspondiente y añade nuevos registros.
- **Búsqueda:** Utiliza el cuadro de búsqueda para filtrar resultados.
- **Actualización:** Edita los registros existentes desde la interfaz.
- **Eliminación:** Borra registros de forma segura con confirmaciones.

## Tecnologías utilizadas
- PHP 7.4+
- MySQL
- Ajax
- XAMPP
- JavaScript

## Licencia
Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.
