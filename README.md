# RPG PHP
Videojuego creado en PHP
## Getting Started

Proyecto creado para la asignatura de Implantación de Aplicaciones Web. Se trata de un sencillo juego escrito principalmente en lenguaje *PHP*. Permite escoger entre tres personajes (cada uno con unos atributos de vida y ataque diferentes) que combaten contra enemigos (extraídos aleatoriamente en cada combate de la BD).

Tras escoger el personaje principal, aparece una breve historia acerca de los acontecimientos acaecidos en el laboratorio en el que transcurren los combates.

### Requisitos

* Necesario servidor web (Apache) y motor de BBDD (MySQL)

### Instalación

Inicializar el servidor web y de BBDD. Crear y caragar los datos en la base de datos. Una vez hecho, acceder al servidor local y... ¡a disfrutar!
# Aviso importante

Es necesario crear la base de datos y cargar los elementos (se hace la primera vez, para ello acceder al menú  [Developer](BBDD/index.php))
## Pantallas
Mostramos unos ejemplos de cómo se ve el juego (algunas pantallas como la de tienda están aún por implementar). Las imágenes (así como las fuentes) utilizadas **no** son nuestras ni nos atribuimos autoría alguna, se han utilizado con fines única y exclusivamente didácticos.
### Inicio
![firefox_2020-12-16_21-37-40](https://user-images.githubusercontent.com/51420640/102404868-959d2b00-3fe8-11eb-94e8-e1f3ffdb29bd.jpg)

### Selección de personaje
![firefox_2020-12-16_21-39-45](https://user-images.githubusercontent.com/51420640/102404744-64bcf600-3fe8-11eb-9552-dad3cdc853f0.png)
### Menú _ingame_
![firefox_2020-12-16_21-40-15](https://user-images.githubusercontent.com/51420640/102404793-77372f80-3fe8-11eb-857f-e1b7270b21c0.jpg)
### Combate
Se generan de forma **aleatoria** (extrae de la base de datos al azar uno de los enemigos).

![firefox_2020-12-16_21-54-54](https://user-images.githubusercontent.com/51420640/102405374-591dff00-3fe9-11eb-8ace-c15f6d9d7a61.jpg)

### Confirmación fin de partida
![2020-12-16_21-58-59](https://user-images.githubusercontent.com/51420640/102405767-ec573480-3fe9-11eb-91e3-4f40bf9b24d1.png)

### Combate ganado
Todos los combates tienen un elemento de aleatoriedad (se genera dependiendo de la vida y ataque de ambos) así como en caso de empate se realiza de forma aleatoria el desempate.

![firefox_2020-12-16_21-56-17](https://user-images.githubusercontent.com/51420640/102405659-c92c8500-3fe9-11eb-9277-d02cace3e486.png)

### Pantalla de fin de la partida (_Game Over_)
Incluye un gif del enemigo que te ha matado.

![2020-12-16_22-01-46](https://user-images.githubusercontent.com/51420640/102406249-9afb7500-3fea-11eb-846c-e54b62942a42.gif)

### Mejores puntuaciones
![firefox_2020-12-16_21-39-22](https://user-images.githubusercontent.com/51420640/102404844-874f0f00-3fe8-11eb-8cf5-9178cb4c34bd.png)


## Built With

* [Netbeans](https://atom.io/) - Editor de texto utilizado
* [XAMPP](https://www.apachefriends.org/es/index.html) - Servidor web y motor de BBDD utilizado


## Autores

* **Diego Gonzalez** - *Front-end* -
* **Carlos Garcia** - *Back-end* - [c-garciao](https://gist.github.com/c-garciao)

## License

This project is licensed under the GNU License - see the [LICENSE.md](LICENSE.md) file for details

## Agradecimientos

* A Alberto y Félix, nuestros profesores. 
* Web de [MCLibre](https://www.mclibre.org/) 
