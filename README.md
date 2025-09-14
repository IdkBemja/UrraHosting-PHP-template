# PHP Starter Template for Urra Hosting + Coolify Panel

![Urra Hosting Logo](app/static/imgs/logo.png)

## Acerca de la plantilla
Este proyecto es una plantilla sencilla para desplegar aplicaciones PHP en Urra Hosting usando el panel Coolify. Está inspirado en la estructura de proyectos Python Flask, facilitando la transición y el desarrollo rápido.

**Sitio Web Oficial:** [https://www.urrahost.app](https://www.urrahost.app)

## Estructura del Proyecto

```
main.php
app/
  controllers/
  models/
  static/
  templates/
```
- **main.php**: Archivo principal que gestiona el ruteo y la lógica de controladores, similar al `app.py` en Flask.
- **app/controllers/**: Controladores PHP para manejar las rutas.
- **app/models/**: Modelos de datos (opcional).
- **app/static/**: Archivos estáticos (CSS, JS, imágenes).
- **app/templates/**: Plantillas HTML (como en Flask).

## Similitud con Python Flask
- El archivo `main.php` actúa como el punto de entrada y router, igual que `app.py` en Flask.
- Las rutas se gestionan por segmentos de URL y un switch-case, similar a los decoradores de Flask.
- Las plantillas HTML se almacenan en `app/templates/` y se sirven desde los controladores.
- Los archivos estáticos se sirven desde `app/static/`.

## Configuración para Urra Hosting y Coolify

### Dockerfile básico
Este Dockerfile permite desplegar la app en cualquier panel compatible con Docker, como Coolify:

```dockerfile
FROM php:8.2-cli

WORKDIR /app

COPY . .

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "main.php"]
```

### Despliegue
1. Sube tu proyecto y el `Dockerfile` al panel Coolify.
2. Construye la imagen y ejecuta el contenedor.
3. Accede a tu app en el puerto configurado (por defecto, 8000).

## Personalización
- Puedes agregar más controladores en `app/controllers/` y registrarlos en `main.php`.
- Modifica las plantillas en `app/templates/` para personalizar la interfaz.
- Agrega archivos estáticos en `app/static/` para estilos e imágenes.
- Agregar más archivos o dependencias como `app/models/` para modelos o `app/utils` para utilidades.

## Ejemplo de Uso
- Accede a la raíz (`/app`) para ver la página principal.
- Accede a una ruta no registrada (por ejemplo, `/test`) para ver el manejo de errores 404 personalizado.

---

**Ideal para desarrolladores que vienen de Flask y quieren una experiencia similar en PHP, lista para desplegar en Urra Hosting y Coolify Panel.**
