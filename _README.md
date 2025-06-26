```bash
docker compose --profile dev up
```
```bash
docker compose --profile dev down
```
---
```bash
docker compose --profile prod up
```

# Ejecutar un docker compose en especifico
---
docker-compose -f docker-compose.dev.yml up -d

docker-compose -f docker-compose.prod.yml up -d

<!-- Bajar compose -->
docker compose -f docker-compose.dev.yml down -v


--- 
# Terminando de iniciar con up y terminado de modificar hacemos
cp -r wordpress/wp-content/plugins/mi-plugin wp-content/plugins/
cp -r wordpress/wp-content/themes/mi-tema wp-content/themes/

# hacemos backup de la bd de datos
- Debemos tener ejecutando nuestro compose dev
- Luego vemos el nombre de nuestra imagen mysql
  docker compose -p dreduardoflorescirugiape ps
  "dreduardoflorescirugiape-database-1"
- Ejecutar:
docker exec -t tu-contenedor-mysql-local mysqldump -u root -p"${MYSQL_ROOT_PASSWORD}" "${MYSQL_DATABASE}" > backup-local.sql  
- En nuestro caso el codigo seria:  
docker exec -t dreduardoflorescirugiape-database-1 mysqldump -u root -p"rootpassword" "dreduardoflores_db" > backup-local.sql


<!-- # Desde la raíz de tu proyecto (donde está el Dockerfile)
docker build -t custom-wordpress:latest . -->
sudo docker compose -f docker-compose.prod.yml down -v
sudo rm -rf dreduardoflorescirugia.pe/
sudo docker rmi custom-wordpress

<!-- EN SERVER -->
git clone proyect
sudo git clone https://github.com/joanC0492/docker-wp-dreduardo.git dreduardoflorescirugia.pe

cd proyect

# 
sudo docker build -t custom-wordpress:latest .

sudo cp .env.example .env

---Configurar el .env

crear el archivo de configuracion
sudo touch wp-config.php .htaccess

sudo docker compose -f docker-compose.prod.yml up -d

# Para verlo en prod
sudo docker compose -f docker-compose.prod.yml ls
sudo docker compose -p dreduardoflorescirugia ps

# Entrar al contenedor de mi custom wordpress
sudo docker exec -it docker-wp-dreduardo-wordpress-1 bash
docker-wp-dreduardo-wordpress-1: Es el name que nos da al ejecutar 
                                sudo docker compose -p docker-wp-dreduardo ps


dreduardoflorescirugiape-wordpress-1
sudo docker exec -it dreduardoflorescirugiape-wordpress-1 bash


---
Reiniciar Dev
docker compose -f docker-compose.dev.yml down && docker compose -f docker-compose.dev.yml up -d

Reinicar Prod
sudo docker compose -f docker-compose.prod.yml down && sudo docker compose -f docker-compose.prod.yml up -d




---
# Tamaño máximo permitido para subir archivos individuales (ej. imágenes, PDFs) es de 64 MB.
upload_max_filesize = 64M
# Tamaño máximo de todos los datos enviados en una solicitud POST. Esto incluye archivos subidos y otros campos de formulario. Debe ser igual o mayor que upload_max_filesize.
post_max_size = 128M
# Límite máximo de memoria que un script PHP puede consumir. Esto afecta el rendimiento al ejecutar plugins o subir archivos grandes.
memory_limit = 256M


---
Tamaño total ocupado por Docker
docker system df

---
Cuanto espacio tengo en mi ubuntu server
df -h



--- 
SSL
openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout localhost.key -out localhost.crt -subj "/C=US/ST=YourState/L=YourCity/O=YourOrganization/CN=localhost"