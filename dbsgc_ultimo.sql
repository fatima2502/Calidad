-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2018 a las 01:06:08
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsgc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `a_codigo` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `c_codigo` int(8) NOT NULL,
  `c_cod_pac` varchar(8) NOT NULL,
  `c_cod_med` varchar(8) NOT NULL,
  `c_estado` varchar(10) NOT NULL,
  `c_fecha` date NOT NULL,
  `c_hora` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`c_codigo`, `c_cod_pac`, `c_cod_med`, `c_estado`, `c_fecha`, `c_hora`) VALUES
(1, 'PAPAFE72', 'MEMAXX78', 'Pendiente', '2018-06-04', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `e_codigo` varchar(4) NOT NULL,
  `e_nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`e_codigo`, `e_nombre`) VALUES
('ABCD', 'cardiologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `hc_codigo` int(8) NOT NULL,
  `hc_cod_pac` varchar(8) NOT NULL,
  `hc_peso` float(2,2) NOT NULL,
  `hc_talla` float(2,2) NOT NULL,
  `hc_alergia` varchar(30) NOT NULL,
  `hc_tipo_sangre` varchar(4) NOT NULL,
  `hc_adicional` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historia_clinica`
--

INSERT INTO `historia_clinica` (`hc_codigo`, `hc_cod_pac`, `hc_peso`, `hc_talla`, `hc_alergia`, `hc_tipo_sangre`, `hc_adicional`) VALUES
(1, 'PAPAFE72', 0.99, 0.99, 'acaros', 'RH+', 'asma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `h_codigo` varchar(4) NOT NULL,
  `h_dia` varchar(10) NOT NULL,
  `h_hora_ini` int(2) NOT NULL,
  `h_hora_fin` int(2) NOT NULL,
  `h_nro_cupos` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`h_codigo`, `h_dia`, `h_hora_ini`, `h_hora_fin`, `h_nro_cupos`) VALUES
('LUMA', 'lunes', 8, 12, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `m_codigo` varchar(8) NOT NULL,
  `m_univ_proc` varchar(30) NOT NULL,
  `m_grado` varchar(15) NOT NULL,
  `m_cod_esp` varchar(4) NOT NULL,
  `c_cod_hor` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`m_codigo`, `m_univ_proc`, `m_grado`, `m_cod_esp`, `c_cod_hor`) VALUES
('MEMAXX78', 'san marcos', 'doctor', 'ABCD', 'LUMA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `pa_codigo` varchar(8) NOT NULL,
  `pa_DNI` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`pa_codigo`, `pa_DNI`) VALUES
('PAPAFE72', 72979202),
('PA', 72979203);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `p_DNI` int(8) NOT NULL,
  `p_nombre` varchar(30) NOT NULL,
  `p_apellido` varchar(30) NOT NULL,
  `p_genero` varchar(9) NOT NULL,
  `p_fecha_nac` date NOT NULL,
  `p_direccion` varchar(80) NOT NULL,
  `p_telefono` int(9) NOT NULL,
  `p_estado` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`p_DNI`, `p_nombre`, `p_apellido`, `p_genero`, `p_fecha_nac`, `p_direccion`, `p_telefono`, `p_estado`) VALUES
(72979201, 'angela', 'marcelo', 'femenino', '1996-11-03', 'ate vitarte', 958625425, 'Activo'),
(72979202, 'pamela', 'fernandez', 'femenino', '1995-06-07', 'los portales', 987452632, 'Activo'),
(72979203, 'maria', 'fernandez', 'Femenino', '1997-05-03', 'las flores', 986253652, 'Activo'),
(78858755, 'maria', 'casas', 'Femenino', '1997-03-15', 'las flores', 985632145, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `r_codigo` int(8) NOT NULL,
  `r_medicamento` varchar(30) NOT NULL,
  `r_dosis` varchar(30) NOT NULL,
  `r_cod_res` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE `resultado` (
  `res_codigo` int(8) NOT NULL,
  `res_diagnostico` varchar(200) NOT NULL,
  `res_sintomas` varchar(200) NOT NULL,
  `res_cod_hc` int(8) NOT NULL,
  `res_cod_cita` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `u_codigo` varchar(8) NOT NULL,
  `u_DNI` int(8) NOT NULL,
  `u_username` varchar(15) NOT NULL,
  `u_password` varchar(15) NOT NULL,
  `u_tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`u_codigo`, `u_DNI`, `u_username`, `u_password`, `u_tipo`) VALUES
('ADANMA72', 72979201, 'liz', 'abc', 1),
('MEMAXX78', 78858755, 'maria', 'abc', 2),
('REPAPA72', 72979202, 'pamela', 'abc', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`a_codigo`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`c_codigo`),
  ADD KEY `Cita_fk0` (`c_cod_pac`),
  ADD KEY `Cita_fk1` (`c_cod_med`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`e_codigo`),
  ADD UNIQUE KEY `e_nombre` (`e_nombre`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`hc_codigo`),
  ADD KEY `Historia_Clinica_fk0` (`hc_cod_pac`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`h_codigo`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`m_codigo`),
  ADD KEY `Medico_fk1` (`m_cod_esp`),
  ADD KEY `Medico_fk2` (`c_cod_hor`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`pa_codigo`),
  ADD UNIQUE KEY `pa_DNI` (`pa_DNI`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`p_DNI`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`r_codigo`),
  ADD KEY `Receta_fk0` (`r_cod_res`);

--
-- Indices de la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`res_codigo`),
  ADD KEY `Resultado_fk0` (`res_cod_hc`),
  ADD KEY `Resultado_fk1` (`res_cod_cita`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`u_codigo`),
  ADD UNIQUE KEY `u_codigo` (`u_codigo`),
  ADD UNIQUE KEY `u_DNI` (`u_DNI`),
  ADD UNIQUE KEY `u_username` (`u_username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `c_codigo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `hc_codigo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `r_codigo` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `resultado`
--
ALTER TABLE `resultado`
  MODIFY `res_codigo` int(8) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `Administrador_fk0` FOREIGN KEY (`a_codigo`) REFERENCES `usuario` (`u_codigo`);

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `Cita_fk0` FOREIGN KEY (`c_cod_pac`) REFERENCES `paciente` (`pa_codigo`),
  ADD CONSTRAINT `Cita_fk1` FOREIGN KEY (`c_cod_med`) REFERENCES `medico` (`m_codigo`);

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `Historia_Clinica_fk0` FOREIGN KEY (`hc_cod_pac`) REFERENCES `paciente` (`pa_codigo`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `Medico_fk0` FOREIGN KEY (`m_codigo`) REFERENCES `usuario` (`u_codigo`),
  ADD CONSTRAINT `Medico_fk1` FOREIGN KEY (`m_cod_esp`) REFERENCES `especialidad` (`e_codigo`),
  ADD CONSTRAINT `Medico_fk2` FOREIGN KEY (`c_cod_hor`) REFERENCES `horario` (`h_codigo`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `Paciente_fk0` FOREIGN KEY (`pa_DNI`) REFERENCES `persona` (`p_DNI`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `Receta_fk0` FOREIGN KEY (`r_cod_res`) REFERENCES `resultado` (`res_codigo`);

--
-- Filtros para la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `Resultado_fk0` FOREIGN KEY (`res_cod_hc`) REFERENCES `historia_clinica` (`hc_codigo`),
  ADD CONSTRAINT `Resultado_fk1` FOREIGN KEY (`res_cod_cita`) REFERENCES `cita` (`c_codigo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Usuario_fk0` FOREIGN KEY (`u_DNI`) REFERENCES `persona` (`p_DNI`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
