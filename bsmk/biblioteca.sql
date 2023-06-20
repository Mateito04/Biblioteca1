-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2023 a las 14:42:24
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int NOT NULL,
  `nombre_autor` varchar(70) DEFAULT NULL,
  `nacionalidad_autor` varchar(60) DEFAULT NULL,
  `distinciones` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombre_autor`, `nacionalidad_autor`, `distinciones`) VALUES
(1, 'Gabriel García Márquez', 'Colombiano', 'Premio Nobel de Literatura'),
(2, 'Jane Austen', 'Británica', 'Clásico de la literatura inglesa'),
(3, 'Mario Vargas Llosa', 'Peruano', 'Premio Nobel de Literatura'),
(4, 'Virginia Woolf', 'Británica', 'Pionera de la literatura modernista'),
(5, 'Jorge Luis Borges', 'Argentino', 'Maestro del cuento y la literatura fantástica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int NOT NULL,
  `nombre_cliente` varchar(70) DEFAULT NULL,
  `celular` varchar(12) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `celular`, `direccion`) VALUES
(1, 'Juan Pérez', '1234567890', 'Calle 123, Ciudad'),
(2, 'María Gómez', '0987654321', 'Avenida Principal, Pueblo'),
(3, 'Pedro Rodríguez', '9876543210', 'Carrera 456, Villa'),
(4, 'Ana López', '5678901234', 'Calle Secundaria, Colonia'),
(5, 'Luisa Martínez', '4321098765', 'Avenida Central, Urbanización'),
(6, 'Carlos Sánchez', '8765432109', 'Carrera Principal, Barrio'),
(7, 'Laura Torres', '3456789012', 'Calle Principal, Sector'),
(8, 'Manuel González', '2109876543', 'Avenida Central, Residencial'),
(9, 'Sofía Ramírez', '6543210987', 'Carrera 789, Condominio'),
(10, 'Javier Herrera', '7890123456', 'Avenida Secundaria, Conjunto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int NOT NULL,
  `id_autor` int DEFAULT NULL,
  `nombre_libro` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `genero` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `personajes` varchar(200) DEFAULT NULL,
  `cantidad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `id_autor`, `nombre_libro`, `fecha_publicacion`, `genero`, `personajes`, `cantidad`) VALUES
(1, 1, 'Cien años de soledad', '1967-06-30', 'Realismo mágico', 'Buendía', 0),
(2, 1, 'El amor en los tiempos del cólera', '1985-03-08', 'Novela romántica', 'Fermina Daza', 4),
(3, 2, 'Orgullo y prejuicio', '1813-01-28', 'Novela romántica', 'Elizabeth Bennet', 2),
(4, 2, 'Emma', '1815-12-23', 'Novela romántica', 'Emma Woodhouse', 1),
(5, 3, 'La ciudad y los perros', '1962-10-20', 'Realismo social', 'El Jaguar', 0),
(6, 3, 'Conversación en La Catedral', '1969-10-10', 'Novela política', 'Santiago Zavala', 8),
(7, 4, 'Mrs. Dalloway', '1925-05-14', 'Modernismo', 'Clarissa Dalloway', 2),
(8, 4, 'Orlando', '1928-10-11', 'Ficción histórica', 'Orlando', 1),
(9, 5, 'Ficciones', '1944-05-29', 'Literatura fantástica', 'Pierre Menard', 0),
(10, 5, 'El Aleph', '1949-06-11', 'Cuentos', 'Borges (personaje)', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` int NOT NULL,
  `id_cliente` int DEFAULT NULL,
  `id_libro` int DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `id_cliente`, `id_libro`, `fecha_prestamo`, `fecha_devolucion`) VALUES
(1, 1, 1, '2022-01-01', '2022-01-10'),
(2, 2, 2, '2022-02-01', '2022-02-10'),
(3, 3, 3, '2022-03-01', '2022-03-10'),
(4, 4, 4, '2022-04-01', '2022-04-10'),
(5, 5, 5, '2022-05-01', '2022-05-10'),
(6, 6, 6, '2022-06-01', '2022-06-10'),
(7, 7, 7, '2022-07-01', '2022-07-10'),
(8, 8, 8, '2022-08-01', '2022-08-10'),
(9, 9, 9, '2022-09-01', '2022-09-10'),
(10, 10, 10, '2022-10-01', '2022-10-10'),
(11, 1, 2, '2022-11-01', '2022-11-10'),
(12, 2, 3, '2022-12-01', '2022-12-10'),
(13, 3, 4, '2023-01-01', '2023-01-10'),
(14, 4, 5, '2023-02-01', '2023-02-10'),
(15, 5, 6, '2023-03-01', '2023-03-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_libro` (`id_libro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
