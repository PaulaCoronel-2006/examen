<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## EXAMEN-LAVANDERÍA

# Sistema de Gestión de Lavandería - LavaExpress

Este proyecto es una aplicación web desarrollada con Laravel para la gestión de pedidos de lavandería, diseñada para ser utilizada en dispositivos móviles por el personal de recepción.

## 1. Decisiones de Diseño

### Estructura de Datos

Se ha implementado una tabla denominada `pedidos` con los siguientes campos técnicos:

* **cliente**: Almacena el nombre del cliente (Tipo String, 100 caracteres).
* **telefono**: Almacena el contacto para notificaciones (Tipo String, 20 caracteres).
* **servicio**: Define el tipo de trabajo a realizar (Lavado, Secado, etc.).
* **cantidad_prendas**: Campo numérico para el control de inventario.
* **estado**: Campo con valor predeterminado 'Recibido' para control de flujo.
* **timestamps**: Registro automático de fecha y hora de recepción.


<img width="419" height="446" alt="image" src="https://github.com/user-attachments/assets/2aa69bf6-9a10-4e66-87ae-07ba7f4a2100" />



### Lógica de Negocio y Validaciones (PHP)

Para garantizar la integridad de la base de datos **examen**, se implementaron validaciones estrictas en el controlador:

* **Integridad**: Todos los campos son obligatorios para evitar registros incompletos.
* **Validación de Nombre**: Se utiliza una expresión regular (`regex:/^[a-zA-Z\s]+$/`) que prohíbe el ingreso de números en el nombre del cliente.
* **Validación Numérica**: El campo `cantidad_prendas` solo acepta números enteros (`integer`) y valores mayores a cero (`min:1`).

https://github.com/PaulaCoronel-2006/examen

### Gestión de Registros

* **Eliminación**: Se permite la eliminación de registros para mantener la base de datos libre de errores de digitación.

<img width="886" height="962" alt="image" src="https://github.com/user-attachments/assets/1100e6eb-1ee3-40f4-864b-cf8de5e44547" />
<img width="886" height="511" alt="image" src="https://github.com/user-attachments/assets/9f5b9653-9bd4-4b11-bc5b-3b61546a54ea" />
<img width="886" height="305" alt="image" src="https://github.com/user-attachments/assets/2a4623ee-a802-418e-b660-e341bbd3e100" />


