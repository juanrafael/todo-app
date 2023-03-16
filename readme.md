# Todos app
Gestion de tareas CRUD

### Requerimiento minimos
- PHP >= 7.1.3
- Composer
- MAMP o XAMPP

### Instalación 🔧
_Via Composer_

```
git clone https://github.com/juanrafael/todo-app.git
cd todo-app && composer install
php artisan serve
```
Nota: Debe de crear la base de datos manualmente
La base de datos es: todos_app

### Correr migraciones

_Via Composer_
```
php artisan migrate
```

## Ruta principal

`En el navegador ingrese a la ruta:`
```
localhost{puerto}/tareas
```