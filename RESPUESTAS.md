1. ¿Qué es el patrón MVC y qué responsabilidad tiene cada parte?

El patrón MVC es patron de diseño de la estructura de un proyecto que usa tres capas para
organizar mejor el código. Estas tres capas con sus responsabilidades son:

- Modelo (M): Maneja la lógica de negocio y el acceso a datos.

- Vista (V): Es la interfaz que ve el usuario. Solo muestra datos, no tiene lógica compleja.

- Controlador(C): Actúa como intermediario entre el modelo y la vista: recibe la petición, usa 
el modelo y devuelve una vista.

2. Diferencia entre los métodos HTTP GET y POST. ¿Cuándo usarías cada uno?

Su principal diferencia funcional es que la longitud máxima de un metodo POST es casi ilimitada, 
mientras que la de un metodo GET no. Lo usaria de acuerdo a su proposito:
Su proposito se encuentra en la intencion que tiene cada metodo; para un metodo GET se busca obtener
informacion, para un metodo POST se busca enviar informacion, crear recursos y realizar transacciones.

3. ¿Qué es Eloquent en Laravel y qué problema resuelve?

Es el ORM de Laravel, es decir, permite poryectar las tablas de bases de datos con modelos y realizar
consultas y transacciones con objetos en lugar de SQL.

4. ¿Qué hace el comando php artisan migrate y para qué sirven las migraciones?

Este comando ejecuta las migraciones pendientes, las migraciones sirven para tener un control en las
versiones de la base de datos.

5. Diferencia entre == y === en PHP. Da un ejemplo donde el resultado cambie.

== compara valores y el tipo de los datos comparados se infiere automaticamente, mientras que === compara
tanto el valor como el tipo de los datos.

0 == "0"   // true, porque "0" se convierte a número
0 === "0"  // false, porque en === no hay conversión

6. ¿Qué es Composer y cuál es la diferencia entre composer install y composer
update?

Composer es el gestor de dependencias para PHP, sus equivalentes en otros lenguajes son npm, maven, etc.
composer install instala las dependencias según composer.lock, mientras que composer update busca 
versiones nuevas según composer.json.

7. En Git, ¿cuál es la diferencia entre git pull y git fetch?

git pull trae los cambios remotos (fetch interno) y luego hace merge con los cambios locales, mientras que
git fetch trae los cambios remotos sin tocar los cambios locales.
