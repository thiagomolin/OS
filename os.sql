-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Set-2017 às 19:31
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `os`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aplicacao`
--

CREATE TABLE `aplicacao` (
  `id` bigint(20) NOT NULL,
  `nm_aplicacao` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `aplicacao`
--

INSERT INTO `aplicacao` (`id`, `nm_aplicacao`) VALUES
(1, 'Hotel California'),
(2, 'OS'),
(3, 'Site Serviços'),
(4, 'App Serviços');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `id` bigint(20) NOT NULL,
  `ds_servico` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_tipo_servico` bigint(20) NOT NULL,
  `fk_aplicacao` bigint(20) NOT NULL,
  `fk_prioridade` bigint(20) NOT NULL,
  `fk_usuario` bigint(20) DEFAULT NULL,
  `fk_status` bigint(20) NOT NULL DEFAULT '1',
  `dt_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_assumida` timestamp NULL DEFAULT NULL,
  `dt_conclusao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`id`, `ds_servico`, `fk_tipo_servico`, `fk_aplicacao`, `fk_prioridade`, `fk_usuario`, `fk_status`, `dt_registro`, `dt_assumida`, `dt_conclusao`) VALUES
(22, 'eae', 1, 1, 1, 1, 3, '2017-09-16 07:02:10', '2017-09-16 07:02:13', '2017-09-16 07:02:19'),
(23, 'Arrumar botões adicionar/cancelar pagina adicionar.php', 2, 2, 4, NULL, 1, '2017-09-16 07:02:45', NULL, NULL),
(24, 'Dar uma geral no visu da pagina principal', 2, 2, 2, NULL, 1, '2017-09-16 07:03:02', NULL, NULL),
(25, 'filtro stackavel ', 6, 2, 1, NULL, 1, '2017-09-16 07:05:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prioridade`
--

CREATE TABLE `prioridade` (
  `id` bigint(20) NOT NULL,
  `nr_grau_prioridade` int(11) NOT NULL,
  `ds_prioridade` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `prioridade`
--

INSERT INTO `prioridade` (`id`, `nr_grau_prioridade`, `ds_prioridade`) VALUES
(1, 1, 'Baixíssima'),
(2, 2, 'Baixa'),
(3, 3, 'Média'),
(4, 4, 'Alta'),
(5, 5, 'Urgente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` bigint(20) NOT NULL,
  `ds_status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `ds_status`) VALUES
(1, 'Aguardando atendimento'),
(2, 'Em atendimento'),
(3, 'Finalizada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_servico`
--

CREATE TABLE `tipo_servico` (
  `id` bigint(20) NOT NULL,
  `ds_tipo_servico` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_servico`
--

INSERT INTO `tipo_servico` (`id`, `ds_tipo_servico`) VALUES
(1, 'Banco de dados'),
(2, 'Frontend'),
(3, 'Backend'),
(6, 'Regra de Negócio'),
(7, 'Design'),
(8, 'Teste'),
(9, 'Ortografia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL,
  `nm_usuario` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nm_usuario`, `senha`) VALUES
(1, 'thiago', '123'),
(2, 'allan', '321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplicacao`
--
ALTER TABLE `aplicacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_servico` (`fk_tipo_servico`),
  ADD KEY `fk_aplicacao` (`fk_aplicacao`),
  ADD KEY `fk_prioridade` (`fk_prioridade`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_status` (`fk_status`);

--
-- Indexes for table `prioridade`
--
ALTER TABLE `prioridade`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nr_grau_prioridade` (`nr_grau_prioridade`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_servico`
--
ALTER TABLE `tipo_servico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplicacao`
--
ALTER TABLE `aplicacao`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `prioridade`
--
ALTER TABLE `prioridade`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_servico`
--
ALTER TABLE `tipo_servico`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `os`
--
ALTER TABLE `os`
  ADD CONSTRAINT `os_ibfk_1` FOREIGN KEY (`fk_tipo_servico`) REFERENCES `tipo_servico` (`id`),
  ADD CONSTRAINT `os_ibfk_2` FOREIGN KEY (`fk_aplicacao`) REFERENCES `aplicacao` (`id`),
  ADD CONSTRAINT `os_ibfk_3` FOREIGN KEY (`fk_prioridade`) REFERENCES `prioridade` (`id`),
  ADD CONSTRAINT `os_ibfk_4` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `os_ibfk_5` FOREIGN KEY (`fk_status`) REFERENCES `status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
