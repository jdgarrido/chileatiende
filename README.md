Wordpress Plugin Chileatiende
=============================

Mediante la API de Chileatiende este plugin obtiene las fichas de un Servicio en particular

Instalación
===========

* Descargamos el código, descomprimimos y lo copiamos a la carpeta ~/wp-content/plugins/
* Habilitamos el plugin desde el administrador de plugins
* Nos dirigimos a la configuración del plugin que se encuentra en la categoría Herramientas
* Ingresamos nuestro access_token y guardamos, sino lo tienes, debes solicitarlo en https://www.chileatiende.cl/desarrolladores/access_token
* A continuación se despliegan 3 campos más: Servicios, Fichas y Número de fichas a desplegar
* En Servicio, elegimos el servicio del cual deseamos obtener las fichas
* En Fichas, especificamos que fichas SOLO deseamos que se muestren, si deseamos listarlas todas dejamos el campo en blanco
* Finalmente en Número de fichas, colocamos el numero de fichas a desplegar, 0 si se desean desplegar todas las fichas. Si el campo Fichas contiene fichas, este campo quedará anulado

Para desplegar el contenido en alguna parte de nuestro sitio, simplemente copiamos el siguiente código <?= chileatiende_fichasportada() ?> y lo agregamos en nuestro template

Licencia
========

<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.es_CL"><img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a><br />Este obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.es_CL">Licencia Creative Commons Atribución-NoComercial-CompartirIgual 3.0 Unported</a>.