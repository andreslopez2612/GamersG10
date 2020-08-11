CREATE DATABASE gamergdiez;

USE gamergdiez;

CREATE TABLE usuarios (
    id int NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(180) NOT NULL,
    apellidos VARCHAR(255),
    email VARCHAR(200) NOT NULL,
    contraseña VARCHAR (200),
    role VARCHAR(20) NOT NULL,
    img VARCHAR(255),
    CONSTRAINT pk_user PRIMARY KEY (id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES (NULL,"Admin","Admin","admin@admin.com","123456","admin",NULL);

CREATE TABLE categorias (
    id int NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(180) NOT NULL,
    CONSTRAINT pk_category PRIMARY KEY (id)
)ENGINE=InnoDb;

INSERT INTO categorias VALUES(NULL, "FPS");
INSERT INTO categorias VALUES(NULL, "ARCADE");
INSERT INTO categorias VALUES(NULL, "BATTLE ROYAL");

CREATE TABLE productos(
    id int NOT NULL AUTO_INCREMENT,
    categoria_id int(255) not null,
    nombre VARCHAR(180) NOT NULL,
    descripcion text,
    precio float (100,2) NOT NULL,
    stock int(255) NOT NULL,
    fecha_publicacion date NOT NULL,
    imagen VARCHAR(255),
    CONSTRAINT pk_categorias PRIMARY KEY(id),
    CONSTRAINT fk_productos_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '1', 'Producto 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '30000', '20', '', NULL);

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '2', 'Producto 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '70000', '30', '', NULL);

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '3', 'Producto 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '30000', '40', '', NULL);

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '1', 'Producto 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '60000', '50', '', NULL);

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '2', 'Producto 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '50000', '20', '', NULL);

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '3', 'Producto 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '40000', '10', '', NULL);

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '1', 'Producto 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '120000', '20', '', NULL);

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '2', 'Producto 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '80000', '30', '', NULL);

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '3', 'Producto 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '40000', '40', '', NULL);

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '1', 'Producto 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '60000', '10', '', NULL);

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '2', 'Producto 11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '70000', '20', '', NULL);

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `fecha_publicacion`, `imagen`) VALUES (NULL, '3', 'Producto 12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '80000', '30', '', NULL);

CREATE TABLE pedidos(
    id int NOT NULL AUTO_INCREMENT,
    usuario_id int(255) not null,
    ciudad VARCHAR(180) NOT NULL,
    coste float (200,2) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    fecha date,
    hota time,
    CONSTRAINT pk_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_pedidos_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

CREATE TABLE ventas (
    id int NOT NULL AUTO_INCREMENT,
    pedido_id int(255) NOT NULL,
    producto_id int(255) NOT NULL,
    CONSTRAINT pk_ventas PRIMARY KEY(id),
    CONSTRAINT fk_ventas_pedido FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    CONSTRAINT fk_ventas_producto FOREIGN KEY (pedido_id) REFERENCES productos(id)
)ENGINE=InnoDb;