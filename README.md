# Sistema de Ventas

Sistema web para la gestión de productos e inventario desarrollado con PHP y MySQL

## Tecnologías
- PHP
- MySQL
- HTML
- Tailwind CSS
- Git

## Funcionalidades
- Crear productos
- Visualizar productos
- Editar productos
- Eliminar productos
- Validación de formularios
- Control de stock
- Dashboard con estadísticas
- Prepared Statements para consultas SQL
- Diseño responsive

## Características técnicas
El proyecto cuenta con operaciones CRUD:

- `CREATE` → agregar producto
- `READ` → consultar productos
- `UPDATE` → editar productos
- `DELETE` → eliminar productos

Para las operaciones que reciben datos del usuario se utilizan Prepared Statements mediante `mysqli`.

También se utilizan validaciones en PHP y `htmlspecialchars()` para escapar contenido antes de mostrarlo en HTML.

## Instalación
1. Clonar el repositorio.
2. Colocar el proyecto dentro de `htdocs`.
3. Crear la base de datos en MySQL.
4. Configurar las credenciales en `includes/conexion.php`.
5. Iniciar Apache y MySQL desde XAMPP.
6. Acceder al proyecto desde `localhost`.

## Autor
Greco Fernandez :)