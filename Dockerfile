FROM wordpress:6.8.1-php8.2

# Copiar configuración PHP
COPY ./uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# Copiar plugins y temas (desde wp-content/)
COPY ./wp-content/plugins /var/www/html/wp-content/plugins
COPY ./wp-content/themes /var/www/html/wp-content/themes

# Limpiar caché para reducir tamaño de la imagen (¡NUEVO!)
RUN apt-get update && apt-get install -y --no-install-recommends \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Copiar wp-config.php personalizado (¡Ahora activo!)
# COPY ./wp-config.php /var/www/html/wp-config.php

# Opcional: wp-config.php personalizado (sin credenciales)
# COPY ./wp-config.php /var/www/html/wp-config.php