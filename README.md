# WordPress Docker Template

Este proyecto proporciona un entorno completo para el desarrollo y despliegue de sitios WordPress utilizando Docker. Incluye entornos separados para **desarrollo** y **producción**, gestión de base de datos con MySQL, PhpMyAdmin (en dev), configuración de PHP personalizada y control total sobre plugins, temas y archivos de configuración.

---

## 📦 Requisitos

* Docker >= 20.10
* Docker Compose v2
* Git

---

## 🚀 Primeros pasos

### 1. Clonar el repositorio

```bash
git clone https://github.com/joanC0492/wordpress-docker-template-jcc.git
cd wordpress-docker-template-jcc
```

### 2. Crear archivo de entorno

```bash
cp .env.example .env
```

Completa las variables con tus datos de base de datos.

### 3. Crear archivos de configuración

```bash
touch wp-config.php .htaccess
```

---

## 🧪 Entorno de Desarrollo

Levanta el entorno de desarrollo con PhpMyAdmin:

```bash
docker compose -f docker-compose.dev.yml up -d --build
```

### Accesos:

* WordPress: [http://localhost:8085](http://localhost:8085)
* PhpMyAdmin: [http://localhost:8086](http://localhost:8086) (usuario y contraseña según tu `.env`)

### Detener:

```bash
docker compose -f docker-compose.dev.yml down -v
```

### Reiniciar Dev

```bash
docker compose -f docker-compose.dev.yml down && docker compose -f docker-compose.dev.yml up -d
```

---

## 📦 Entorno de Producción

```bash
docker compose up -d --build
```

### Detener:

```bash
sudo docker compose down -v
```

### Reiniciar Prod

```bash
sudo docker compose down && sudo docker compose up -d
```

---

## 🔁 Sincronizar plugins y temas desde contenedor

```bash
cp -r wordpress/wp-content/plugins/mi-plugin wp-content/plugins/
cp -r wordpress/wp-content/themes/mi-tema wp-content/themes/
```

---

## 💾 Backup de Base de Datos (desarrollo)

1. Asegurate que el entorno esté corriendo
2. Identifica el nombre del contenedor de base de datos

```bash
docker compose -p NOMBRE_PROYECTO ps
```

3. Ejecuta:

```bash
docker exec -t NOMBRE_CONTENEDOR_DB mysqldump -u root -p"rootpassword" nombre_bd > backup-local.sql
```

Ejemplo:

```bash
docker exec -t dreduardoflorescirugiape-database-1 mysqldump -u root -p"rootpassword" dreduardoflores_db > backup-local.sql
```

---

## 🧱 Construir imagen personalizada

Desde la raíz del proyecto:

```bash
sudo docker build -t custom-wordpress:latest .
```

---

## 🔐 SSL (opcional para localhost)

```bash
openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
  -keyout localhost.key -out localhost.crt \
  -subj "/C=US/ST=YourState/L=YourCity/O=YourOrganization/CN=localhost"
```

---

## 📊 Monitor de espacio

* Espacio total ocupado por Docker:

```bash
docker system df
```

* Espacio libre en tu Ubuntu:

```bash
df -h
```

---

## ⚙️ Parámetros de configuración PHP

Estos valores están definidos en `uploads.ini`:

```ini
upload_max_filesize = 64M
post_max_size = 128M
memory_limit = 256M
max_execution_time = 300
```

---

## 🧼 Limpieza de imágenes

```bash
sudo docker rmi custom-wordpress
```

---

## 📌 Observaciones

* No se versiona el core de WordPress.
* Se versionan únicamente plugins/temas personalizados.
* El entorno es portable entre entornos de desarrollo y producción.

---

> Mantenido por Joan Cochachi — basado en buenas prácticas de WordPress + Docker.