# **API de musica** 

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p>
    API de musica creada con el framework de PHP Laravel. 
</p>
<p>
    Esta API de música ha sido desarrollada para ofrecer una amplia gama de funcionalidades relacionadas con la gestión de música. Con ella, puedes acceder a una gran cantidad de datos musicales, como canciones, álbumes, artistas y generos, y realizar diversas operaciones sobre ellos.
</p>
<p>
    Gracias a su integración con el framework de PHP, esta API es altamente flexible y escalable, lo que la hace ideal para proyectos de cualquier tamaño. Ya sea que estés construyendo una aplicación de streaming de música, un reproductor en línea o una plataforma de descubrimiento musical, esta API te proporcionará las herramientas necesarias para llevar tu proyecto al siguiente nivel.
</p>

# **Autenticaciòn**

## **Registro de usuario**
Este endpoint crea un nuevo usuario con los datos que se especifica en la request.

### **HTTP Request**
```bash
POST /api/v1/register
```

### **Request Headers**
| Clave | Valor |
|----------|----------|
| Accept    | application/json   |

### **URL Parametros**

| Parametro | Descripcion |
|----------|----------|
| name    | El nombre del usuario   |
| email    | El correo del usuario   |
| password    | La contraseña del usuario   |

## **Login de usuario**
Este endpoint logea un nuevo usuario con su correo y contraseña.

### **HTTP Request**
```bash
POST /api/v1/login
```

### **Request Headers**
| Clave | Valor |
|----------|----------|
| Accept    | application/json   |

### **URL Parametros**

| Parametro | Descripcion |
|----------|----------|
| email    | El correo del usuario   |
| password    | La contraseña del usuario   |

## **Logout de usuario**
Este endpoint cierra session a un nuevo usuario con token.

### **HTTP Request**
```bash
POST /api/v1/logout
```

### **Request Headers**
| Clave | Valor |
|----------|----------|
| Accept    | application/json   |

### **Authorization (Bearer Token)**

| Parametro | Descripcion |
|----------|----------|
| Token    | < token >   |

## **Datos de usuario**
Este endpoint muestra los datos del usuario logeado con un token.

### **HTTP Request**
```bash
GET /api/v1/user
```

### **Request Headers**
| Clave | Valor |
|----------|----------|
| Accept    | application/json   |

### Authorization (Bearer Token)

| Parametro | Descripcion |
|----------|----------|
| Token    | <token>   |

# **Genero**

## **Listado generos**
Este endpoint muestra el listado de los generos.

### **HTTP Request**
```bash
GET /api/v1/generos
```

## **Get genero especificado**
Este endpoint muestra un genero en especifico.

### **HTTP Request**
```bash
GET /api/v1/genero/<id>
```

### **URL Parametros**

| Parametro | Descripcion |
|----------|----------|
| ID    | El ID del genero a buscar   |


# **Artista**

## **Listado artistas**
Este endpoint muestra el listado de los artistas.

### **HTTP Request**
```bash
GET /api/v1/artistas
```

## **Get artista especificado**
Este endpoint muestra un artista en especifico.

### **HTTP Request**
```bash
GET /api/v1/artista/<id>
```

### **URL Parametros**

| Parametro | Descripcion |
|----------|----------|
| ID    | El ID del artista a buscar   |


# **Album**

## **Listado de albumes**
Este endpoint muestra el listado de los albumes.

### **HTTP Request**
```bash
GET /api/v1/albumes
```

## **Get album especificado**
Este endpoint muestra un album en especifico.

### **HTTP Request**
```bash
GET /api/v1/album/<id>
```

### **URL Parametros**

| Parametro | Descripcion |
|----------|----------|
| ID    | El ID del album a buscar   |


# **Canciòn**

## **Listado de canciones**
Este endpoint muestra el listado de los canciones.

### **HTTP Request**
```bash
GET /api/v1/canciones
```

## **Get canciòn especificado**
Este endpoint muestra un canciòn en especifico.

### **HTTP Request**
```bash
GET /api/v1/cancion/<id>
```

### **URL Parametros**

| Parametro | Descripcion |
|----------|----------|
| ID    | El ID del canciòn a buscar   |