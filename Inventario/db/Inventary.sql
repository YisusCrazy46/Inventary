-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2022 a las 23:20:51
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventary`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaborador`
--

CREATE TABLE `colaborador` (
  `ID_Usuario` int(20) NOT NULL,
  `Nombres` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Apellidos` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Num_Empleado` int(10) NOT NULL,
  `Puesto` int(30) NOT NULL,
  `Area` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Fecha_Ingreso` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Correo` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Usuario` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Responsivas` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `colaborador`
--

INSERT INTO `colaborador` (`ID_Usuario`, `Nombres`, `Apellidos`, `Num_Empleado`, `Puesto`, `Area`, `Fecha_Ingreso`, `Correo`, `Usuario`, `Responsivas`) VALUES
(1, 'Kevin', 'Ojeda', 54684168, 0, 'IT support', '10102022', 'kevin@gmail.com', 'kevinojeda', 541681681),
(2, 'Juan de Dios', 'Pantoja', 2244341, 0, 'Compras', '22032020', 'JuanPantoja@gmail.com', 'JuanPantoja', 21651);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `ID_Activo` int(15) NOT NULL,
  `Num_Serie` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Host` varchar(9) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Marca` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Modelo` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Capacidad_DD` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Capacidad_RAM` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Sis_Operativo` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Area` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Usuario` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Fecha_Modificacion` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Fecha_Asignacion` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Observaciones` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `IDNum_Responsiva` int(20) NOT NULL,
  `Estado_del_Equipo` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Fecha_proximoservicio` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`ID_Activo`, `Num_Serie`, `Host`, `Marca`, `Modelo`, `Capacidad_DD`, `Capacidad_RAM`, `Sis_Operativo`, `Area`, `Usuario`, `Fecha_Modificacion`, `Fecha_Asignacion`, `Observaciones`, `IDNum_Responsiva`, `Estado_del_Equipo`, `Fecha_proximoservicio`) VALUES
(2, 'HPPSFJRCVJFKGUJSHDNV', 'MXJAM420', 'HP', 'ELITEDESK 750', '1TB', '8 GB', 'WINDOWS 10', 'IT', 'KEVINOJEDA', '10012022', '10012022', 'NUEVA', 585414, 'NUEVO', '10012022'),
(3, 'dcvsdfdsfsdfsdv', 'sdvsdvsdv', 'sdvsdvsdvs', 'sdvsdvsdvsdf', 'fvsfdvfdsv', 'svsdfvsdv', 'dsvsdvdsv', 'svdvsdv', 'dfgbdfg', '10102022', '10102022', 'dtfhdfgh', 42827378, 'fgbfgdbfg', '10102022'),
(4, 'JHNVUIHVIURHVIRUHV', 'MXJAM560', 'Hp', 'Zbook G7', '1TB', '8 GB', 'Windows 10', 'IT', 'KevinOjeda', '10102022', '11082022', 'Se actualizo el disco duro', 256, 'Bien', '10042023'),
(5, 'SVIRIURBNVINRRV', 'MXJAM615', 'Lenovo', 'ThinkPad L14', '1TB', '16GB', 'Windows 11', 'ABE', 'JuanPeralta', '10102022', '15042022', 'Se formateo el equipo', 2456, 'Bueno', '10042023'),
(6, 'UIHRIPVHDRPIUVHRD', 'MXJAM450', 'Lenovo', 'ThinkPad L15 G3', '1TB', '32GB', 'Windows 11', 'ABE', 'JuanPantoja', '10102022', '04052020', 'Se realizo mantenimiento preventivo', 561681, 'Bueno', '10042023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsiva`
--

CREATE TABLE `responsiva` (
  `IDNum_Responsiva` int(20) NOT NULL,
  `Nombre_Completo` varchar(60) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Usuario` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Correo` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Fecha_de_asignacion` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `No_serie` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Cargador` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `responsiva`
--

INSERT INTO `responsiva` (`IDNum_Responsiva`, `Nombre_Completo`, `Usuario`, `Correo`, `Fecha_de_asignacion`, `No_serie`, `Cargador`) VALUES
(1, 'SDVSRDV', 'RGRDGDRG', 'RDGRD@GVFDF.COM', '0000-00-00', 'SDC4D68CV4S1DE', 'X6F6F1V6FX'),
(2, 'Kevin yesua ojeda lomeli', 'kevinoj', 'kevin.sparco46@gmail.com', '10202022', 'SVRVDGDH18631DG6816', 'SVRVDBVBD1T358B1681B6'),
(3, 'Kevin Yesua', 'Ojeda Lomeli', 'Kevin@gmail.com', '10122022', 'DVCSGFRG', 'SCSEFERGTERBRNHRYJ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(10) NOT NULL,
  `usuario_nombre` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_apellido` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_usuario` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_clave` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_email` varchar(70) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_usuario`, `usuario_clave`, `usuario_email`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'Admin', 'Admin@gmail.com'),
(2, 'Admin', 'Admin', 'Admin1', '$2y$10$9hmBr1b4PUWS/xr5ew.CjehsdBbX3cgPiEPaHt.GbRaZ1LNWpScaa', 'Admin2@gmail.com'),
(5, 'Kevin Yesua', 'Ojeda Lomeli', 'KevinOjeda', '$2y$10$4xlOddTT3zfjlK40QNGM2O2qZQkLTG6yTyy46HM0xCFZ3FpJZjiVq', 'kevin.sparco46@gmail.com'),
(6, 'Juan', 'Pantoja', 'JuanPantoja', '$2y$10$Yh6GqT02PC4gRoccJx0DcupQzNhfdCx05J6YBhpZmNm3vNhhxsr7e', 'JuanPantoja@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`ID_Activo`);

--
-- Indices de la tabla `responsiva`
--
ALTER TABLE `responsiva`
  ADD PRIMARY KEY (`IDNum_Responsiva`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `ID_Usuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `ID_Activo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `responsiva`
--
ALTER TABLE `responsiva`
  MODIFY `IDNum_Responsiva` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
