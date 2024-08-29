-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/08/2024 às 07:35
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

create database citasmedicas;

use citasmedicas;



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `citasmedicas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `citas`
--

CREATE TABLE `citas` (
  `idReserva` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `fechaCita` date NOT NULL,
  `horaCita` time NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `motivo` varchar(1000) NOT NULL,
  `doctorAsignado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `doctores`
--

CREATE TABLE `doctores` (
  `idDoctor` int(11) NOT NULL,
  `nombreCompleto` varchar(50) NOT NULL,
  `cedula` int(11) NOT NULL,
  `especialidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `doctores`
--

INSERT INTO `doctores` (`idDoctor`, `nombreCompleto`, `cedula`, `especialidad`) VALUES
(1, 'Dr. Juan Pérez', 123456789, 'Consulta General'),
(2, 'Dr. Ana García', 234567891, 'Ginecología'),
(3, 'Dr. Luis Rodríguez', 345678912, 'Geriatría'),
(4, 'Dr. Carmen Fernández', 456789123, 'Odontología'),
(5, 'Dr. Miguel López', 567891234, 'Psicología'),
(6, 'Dr. Laura González', 678912345, 'Dentista'),
(7, 'Dr. José Martínez', 789123456, 'Dentista'),
(8, 'Dr. Marta Sánchez', 891234567, 'Geriatría'),
(9, 'Dr. Carlos Gómez', 912345678, 'Odontología'),
(10, 'Dr. María Ruiz', 234567890, 'Psicología'),
(11, 'Dr. Javier Díaz', 345678901, 'Consulta General'),
(12, 'Dr. Silvia Jiménez', 456789012, 'Ginecología'),
(13, 'Dr. Pedro Moreno', 567890123, 'Geriatría'),
(14, 'Dr. Patricia Ramírez', 678901234, 'Odontología'),
(15, 'Dr. Roberto Torres', 789012345, 'Psicología'),
(16, 'Dr. Elena Vázquez', 890123456, 'Consulta General'),
(17, 'Dr. Andrés Mendoza', 901234567, 'Ginecología'),
(18, 'Dr. Teresa Castillo', 112345678, 'Geriatría'),
(19, 'Dr. Francisco Ortega', 223456789, 'Odontología'),
(20, 'Dr. Clara Vega', 334567890, 'Dentista');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(8) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono` int(8) NOT NULL,
  `Cedula` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`Id`, `Usuario`, `Nombre`, `Apellidos`, `Contrasena`, `Correo`, `Telefono`, `Cedula`) VALUES
(49, 'usuarioPrueba', 'Usuario', 'Prueba', '$2y$10$F6iwWqw4VExFJ.1uOwjwGe3Agkza2IJcmFNcJwz2Oyq7wT92gxAl.', 'mjimenez60052@ufide.ac.cr', 88888888, 12332523);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `fk_doctorAsignado` (`doctorAsignado`);

--
-- Índices de tabela `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`idDoctor`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `citas`
--
ALTER TABLE `citas`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `doctores`
--
ALTER TABLE `doctores`
  MODIFY `idDoctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_doctorAsignado` FOREIGN KEY (`doctorAsignado`) REFERENCES `doctores` (`idDoctor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
