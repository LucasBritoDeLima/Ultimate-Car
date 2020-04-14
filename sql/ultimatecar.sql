-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Dez-2019 às 00:06
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ultimatecar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `idAnuncio` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text NOT NULL,
  `fotoUm` varchar(255) NOT NULL,
  `fotoDois` varchar(255) NOT NULL,
  `fotoTres` varchar(255) NOT NULL,
  `dataCadastro` date NOT NULL,
  `usuario_idUsuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro`
--

CREATE TABLE `carro` (
  `idCarro` int(11) NOT NULL,
  `nomeCarro` varchar(45) NOT NULL,
  `ano` int(11) NOT NULL,
  `motor` varchar(45) NOT NULL,
  `combustivel` varchar(45) NOT NULL,
  `saeR` varchar(10) NOT NULL,
  `saeA` varchar(45) NOT NULL,
  `acea` varchar(45) DEFAULT NULL,
  `api` varchar(45) NOT NULL,
  `tipoOleo` varchar(45) NOT NULL,
  `capacidade` varchar(45) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `modelo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carro`
--

INSERT INTO `carro` (`idCarro`, `nomeCarro`, `ano`, `motor`, `combustivel`, `saeR`, `saeA`, `acea`, `api`, `tipoOleo`, `capacidade`, `foto`, `modelo_id`) VALUES
(2, 'KA ', 2005, '1.0 EFI CHARGER 8V - L4', 'Gasolina', '5W30', '0W30, 5W40, 10W30, 10W40, 15W40', 'A2.96 A1.98 OU A3.98', 'SJ OU SL', 'Sintético', '4,1', 'ford ka.jpg', 1),
(3, 'UNO MILLE', 2007, 'FIRE 1.0 8V L4', 'Gasolina', '5w30', '0W30,0W40,5W40,10W30,10W40', 'A2.96 A1.98 OU A3.98', 'SL OU SM', 'Sintético', '2,7', 'uno.jpg', 3),
(4, 'GOL GVI', 2015, '1.0 TEC 8V', 'Flex', '5W40', '5W30, 0W30, 0W40, 10W40', 'ACEA A3/B4', 'SM OU SN', 'Sintético', '3,3', 'gol.jpg', 2),
(5, 'GOL GVI', 2015, '1.0 TEC 8V', 'Flex', '5W40', '0W30, 5W40, 10W30, 10W40, 15W40', 'A2.96 A1.98 OU A3.98', 'SL OU SM', 'Sintético', '3,3', 'gol.jpg', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carroefiltro`
--

CREATE TABLE `carroefiltro` (
  `idCarroFiltro` int(11) NOT NULL,
  `filtro_idFiltro` int(11) NOT NULL,
  `carro_idCarro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carroefiltro`
--

INSERT INTO `carroefiltro` (`idCarroFiltro`, `filtro_idFiltro`, `carro_idCarro`) VALUES
(1, 1, 2),
(2, 3, 3),
(3, 4, 3),
(4, 5, 3),
(5, 6, 3),
(6, 7, 4),
(7, 8, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carroeoleo`
--

CREATE TABLE `carroeoleo` (
  `idCarroOleo` int(11) NOT NULL,
  `oleo_idOleo` int(11) NOT NULL,
  `carro_idCarro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carroeoleo`
--

INSERT INTO `carroeoleo` (`idCarroOleo`, `oleo_idOleo`, `carro_idCarro`) VALUES
(1, 1, 2),
(2, 11, 3),
(3, 2, 3),
(4, 15, 3),
(5, 3, 4),
(6, 10, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `centroautomotivo`
--

CREATE TABLE `centroautomotivo` (
  `idCentro` int(11) NOT NULL,
  `nomeFantasia` varchar(80) NOT NULL,
  `razaoSocial` varchar(80) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `ie` varchar(45) DEFAULT NULL,
  `logradouro` varchar(45) NOT NULL,
  `cep` varchar(14) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `servico` text NOT NULL,
  `email` varchar(70) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `dataCadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `centroautomotivo`
--

INSERT INTO `centroautomotivo` (`idCentro`, `nomeFantasia`, `razaoSocial`, `cnpj`, `ie`, `logradouro`, `cep`, `numero`, `bairro`, `cidade`, `estado`, `servico`, `email`, `foto`, `telefone`, `dataCadastro`) VALUES
(1, 'Lucas Brito de Lima--', 'Simas Turbo LTDA ME', '10581252000105', '14521785496', 'QNO 8 Conjunto B', '72251802', '1925', 'Ceilândia Norte (Ceilândia)', 'Brasília', 'DF', 'solda', 'po-py-copo@live.com', '/images/1574090233.png', '6198404271', '2019-11-14'),
(2, 'Oficina Carro Zero', 'Oficina Walmir LTDA ME', '10581252000106', '123456789', 'QNO 8 Conjunto B', '72251802', '16', 'Ceilândia Norte (Ceilândia)', 'Brasília', 'DF', 'Mecânica, Câmbios, Injeção Eletrônica, Air-bag, Direção hidráulica, Freios e ABS', 'oficinazerocarro@gmail.com', '/images/1575332877.png', '6133754291', '2019-12-03'),
(3, 'FABIO AUTOCENTER ', 'FABIO AUTOCENTER', '10581252000102', '123456', 'QNO 8 Conjunto A', '72251801', '18', 'Ceilândia Norte (Ceilândia)', 'Brasília', 'DF', 'DIAGNÓSTICO AUTOMOTIVO, LIMPEZA DE BICO, INJEÇÃO ELETRÔNICA, MECÂNICA EM GERAL', 'fabiocenter@gmail.com', '/images/1575343603.png', '6198564815', '2019-12-03'),
(4, 'OFICINA DO CHAGAS', 'FRANCISCO MECÂNICA LTDA ME', '10581252000101', '1234567', 'QNO 9 Conjunto A', '72252091', 'LOJA 52', 'Ceilândia Norte (Ceilândia)', 'Brasília', 'DF', 'Escapamentos e suspensões', 'ofchagas@gmail.com', '/images/1575344001.png', '6135855040', '2019-12-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `logradouro` varchar(80) NOT NULL,
  `cep` varchar(14) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `usuario_idUsuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `logradouro`, `cep`, `numero`, `bairro`, `cidade`, `estado`, `foto`, `usuario_idUsuario`) VALUES
(3, 'QNO 8 Bloco AComércio Local', '72251806', '1925', 'Ceilândia Norte (Ceilândia)', 'Brasília', 'DF', '/images/1574093324.png', 6),
(4, 'QNO 8 Bloco A Comércio Local', '72251806', '1', 'Ceilândia Norte (Ceilândia)', 'Brasília', 'DF', '/images/1575332552.png', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `centroAutomotivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empregado`
--

CREATE TABLE `empregado` (
  `idEmpregado` int(11) NOT NULL,
  `usuario_idUsuario` int(10) UNSIGNED NOT NULL,
  `centroautomotivo_idCentro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empregado`
--

INSERT INTO `empregado` (`idEmpregado`, `usuario_idUsuario`, `centroautomotivo_idCentro`) VALUES
(1, 3, 1),
(2, 4, 1),
(3, 10, 2),
(5, 12, 3),
(6, 13, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filtro`
--

CREATE TABLE `filtro` (
  `idFiltro` int(11) NOT NULL,
  `marcaFiltro` varchar(45) NOT NULL,
  `tipoFiltro` varchar(45) NOT NULL,
  `cod` varchar(45) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `motorFiltro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `filtro`
--

INSERT INTO `filtro` (`idFiltro`, `marcaFiltro`, `tipoFiltro`, `cod`, `foto`, `motorFiltro`) VALUES
(1, 'VOX', 'ÓLEO', 'LBM2', 'lbm2.png', 'GOL C/ MOTORES AT 1.0 8V, 16V, AT 1.0 TOTAL FLEX, AP 1.6, AP 1.6 TOTAL FLEX, AP 1.8, AP 2.0 PARATI C/ MOTORES AT 1.0 16V, AP 1.5, AP 1.6, AP 1.6 TOTAL FLEX, AP 1.8, AP, AP 1.8 TOTAL FLEX, AP 2.0'),
(2, 'TECFIL', 'ÓLEO', 'PSL47', 'psl47.PNG', 'CHRYSLER DART/LE BARON/MAGNUM 5.2 L 16V SOHC V8 - GASOLINA - ANO: 1969 - 1984 '),
(3, 'TECFIL', 'ÓLEO', 'PSL55', 'psl55.jpg', 'PALIO 1.0 8V/16V 2001=>  FIAT PALIO 1.3 8V 2002=>2005  CIVIC NACIONAL 1.6/1.7 2001=>  MITSUBISHI ECLIPSE 3.8 24V 2006=>  FIAT 500 1.4 20009=>  FIAT DOBLO 1.3 16V 2001=>2006  FIAT DOBLE 1.4 8V 2009=>  FIAT FIORINO 1.3 8V 2002=>2006  FIAT GRAN SIENA 1.4 8V '),
(4, 'TECFIL', 'AR', 'ARL4147', 'arl4147.jpg', 'FIAT ELBA WEEK 1.6 L 8V - GASOLINA/ALCOOL - ANO: 1991-1996 FIAT ELBA WEEK 1.5 L 8V - GASOLINA/ALCOOL - ANO: 1992-1996 FIAT FIORINO 1.5 L 8V - GASOLINA - ANO: 1991-1996 FIAT FIORINO 1.6 L 8V - GASOLINA - ANO: 1991-1993 FIAT FIORINO 1.6 L 8V - ALCOOL - ANO:'),
(5, 'TECFIL', 'COMBUSTÍVEL', 'GI40/7', 'gi407.jpg', 'FIAT UNO 1.3 8V - GASOLINA/ALCOOL - ANO: 1989 - 1991 FIAT UNO 1.0 8V - GASOLINA/ALCOOL - ANO: 1990 - 1999 FIAT UNO 1.5 8V - GASOLINA/ALCOOL - ANO: 1992 - 1996 FIAT UNO 1.5 8V - GASOLINA/ALCOOL - ANO: 1997 - 2004 FIAT UNO 1.0 8V - GASOLINA/ALCOOL - ANO: 20'),
(6, 'TECFIL', 'CABINE', 'ACP906', 'acp906.jpg', 'FIAT UNO 1.0 EVO 8V FIRE - FLEX - ANO: 01/05/2010 ... FIAT UNO 1.4 EVO 8V FIRE - FLEX - ANO: 01/05/2010 ... FIAT NOVO UNO - ANO: 10... FIAT PALIO - ANO: 12 FIAT GRAND SIENA'),
(7, 'TECFIL', 'ÓLEO', 'PSL545', 'psl545.jpg', 'gol 1.0 /1.6 2013 em diante'),
(8, 'TECFIL', 'COMBUSTÍVEL', 'GI50/7', 'gi50-7.jpg', 'gol 1.0 /1.6 2013 em diante'),
(9, 'WEGA', 'AR', 'FAP7007', 'fap7007.jpg', 'gol 1.0 /1.6 2013 em diante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `idModelo` int(11) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `montadora_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`idModelo`, `modelo`, `montadora_id`) VALUES
(1, 'KA', 2),
(2, 'FUSCA', 1),
(3, 'UNO', 3),
(4, 'GOL', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `montadora`
--

CREATE TABLE `montadora` (
  `idMontadora` int(11) NOT NULL,
  `montadora` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `montadora`
--

INSERT INTO `montadora` (`idMontadora`, `montadora`) VALUES
(1, 'VOLKSWAGEN'),
(2, 'FORD'),
(3, 'FIAT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oleo`
--

CREATE TABLE `oleo` (
  `idOleo` int(11) NOT NULL,
  `marcaOleo` varchar(60) NOT NULL,
  `nomeOleo` varchar(45) NOT NULL,
  `apiOleo` varchar(45) NOT NULL,
  `sae` varchar(45) NOT NULL,
  `acea` varchar(45) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tipoOleo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `oleo`
--

INSERT INTO `oleo` (`idOleo`, `marcaOleo`, `nomeOleo`, `apiOleo`, `sae`, `acea`, `foto`, `tipoOleo`) VALUES
(1, 'Mobil', 'Mobil Super', 'SL', '20W50', 'ACEA B3/B4', 'mobil.jpg', 'Semi-Sintético'),
(2, 'TOTAL', 'QUARTZ INEO ECS', 'SM', '5W30', 'ACEA C2', '5w30.jpg', 'Sintético'),
(3, 'TOTAL', 'QUARTZ 8000', 'SN', '5W40', 'ACEA A3/B4', '5w40.jpg', 'Sintético'),
(4, 'TOTAL', 'QUARTZ FUTURE 7000', 'SM', '10W30', 'ACEA A3', '10w30.png', 'Semi-Sintético'),
(5, 'TOTAL', 'QUARTZ 7000', 'SL', '10W40', 'ACEA A3/B4', '10w40.jpg', 'Semi-Sintético'),
(6, 'TOTAL', 'QUARTZ SM 7000', 'SM', '15W40', 'ACEA A3/B4', '15w40.jpg', 'Semi-Sintético'),
(7, 'MOBIL', 'MOBIL ECO POWER', 'SM', '5W30', 'ACEA A3/B4', '5w30-.jpg', 'Semi-Sintético'),
(8, 'MOBIL', 'MOBIL SUPER SEMI SINTÉTICO', 'SN', '15W40', 'ACEA A3/B4', '15w40-.jpg', 'Semi-Sintético'),
(9, 'MOBIL', 'MOBIL SUPER ORIGINAL', 'SN', '20W50', 'ACEA A3', '20W50-.jpg', 'Mineral'),
(10, 'MOBIL', 'MOBIL SUPER FLEX', 'SN', '10W40', 'ACEA A3/B4', '1040-.jpg', 'Semi-Sintético'),
(11, 'MOBIL', 'MOBIL ONE', 'SN', '5W30', 'ACEA A3/B4', 'one-.jpg', 'Sintético'),
(12, 'SHELL', 'SHELL HELIX ULTRA', 'SN', '5W40', 'ACEA A3/B4', '5w40--.jpeg', 'Sintético'),
(13, 'SHELL', 'SHELL HELIX HX8', 'SL', '5W30', 'ACEA A5/B5', '530--.jpg', 'Sintético'),
(14, 'SHELL', 'SHELL HELIX HX7', 'SN', '10W40', 'ACEA A3/B4', '1040--.jpg', 'Semi-Sintético'),
(15, 'SHELL', 'SHELL HELIX HX5', 'SN', '15W40', 'ACEA A3/B3', '1540--.jpg', 'Semi-Sintético'),
(16, 'SHELL', 'SHELL HELIX HX3', 'SL', '25W60', 'ACEA A3', '2560--.jpg', 'Semi-Sintético'),
(17, 'PETROBRÁS', 'LUBRAX VALORA', 'SM', '5W30', 'ACEA A3', '5w30--.jpg', 'Semi-Sintético'),
(18, 'PETROBRÁS', 'LUBRAX SUPERA', 'SN', '5W40', 'ACEA A3/B4', '540--.jpg', 'Sintético'),
(19, 'PETROBRÁS', 'LUBRAX ESSENCIAL SM', 'SM', '10W30', 'ACEA A3', '10w30---.jpg', 'Semi-Sintético'),
(20, 'PETROBRÁS', 'LUBRAX TECNO', 'SN', '10W40', 'A3', '10w40---.jpg', 'Semi-Sintético'),
(21, 'PETROBRÁS', 'LUBRAX TECNO', 'SN', '15W40', 'ACEA A3', '1540.jpg', 'Semi-Sintético');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `perfil` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `perfil`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Centro Automotivo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `situacao` char(1) NOT NULL DEFAULT '1',
  `usuario` varchar(70) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `dataCadastro` date NOT NULL,
  `perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `situacao`, `usuario`, `senha`, `nome`, `email`, `telefone`, `dataCadastro`, `perfil_id`) VALUES
(3, '0', 'oficina@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Lucas de Lima', 'oficina@hotmail.com', '8999825118', '2019-11-14', 3),
(4, '0', 'leo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Leonardo Alves de Souza', 'leo@gmail.com', '61984042712', '2019-11-18', 3),
(6, '1', 'gabriela@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Gabriela Souza Torres', 'gabriela@gmail.com', '61999825118', '2019-11-18', 2),
(8, '1', 'lucas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Lucas Brito', 'lucas@gmail.com', '61984042710', '2019-11-04', 1),
(9, '1', 'waldir@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Waldir Araújo Lima', 'waldir@gmail.com', '61985501232', '2019-12-03', 2),
(10, '1', 'walmir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Walmir Sousa', 'walmir@gmail.com', '61985300302', '2019-12-03', 3),
(12, '1', 'fabio@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fabio Souza', 'fabio@gmail.com', '61337542977', '2019-12-03', 3),
(13, '1', 'fsilva@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Francisco Silva', 'fsilva@gmail.com', '61993253958', '2019-12-03', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`idAnuncio`),
  ADD KEY `fk_anuncio_usuario1_idx` (`usuario_idUsuario`);

--
-- Indexes for table `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`idCarro`),
  ADD KEY `fk_carro_modelo1_idx` (`modelo_id`);

--
-- Indexes for table `carroefiltro`
--
ALTER TABLE `carroefiltro`
  ADD PRIMARY KEY (`idCarroFiltro`),
  ADD KEY `fk_carroefiltro_filtro1_idx` (`filtro_idFiltro`),
  ADD KEY `fk_carroefiltro_carro1_idx` (`carro_idCarro`);

--
-- Indexes for table `carroeoleo`
--
ALTER TABLE `carroeoleo`
  ADD PRIMARY KEY (`idCarroOleo`),
  ADD KEY `fk_carroeoleo_oleo1_idx` (`oleo_idOleo`),
  ADD KEY `fk_carroeoleo_carro1_idx` (`carro_idCarro`);

--
-- Indexes for table `centroautomotivo`
--
ALTER TABLE `centroautomotivo`
  ADD PRIMARY KEY (`idCentro`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_cliente_usuario1_idx` (`usuario_idUsuario`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `fk_comentario_cliente1_idx` (`cliente_id`),
  ADD KEY `fk_comentario_centroautomotivo1_idx` (`centroAutomotivo`);

--
-- Indexes for table `empregado`
--
ALTER TABLE `empregado`
  ADD PRIMARY KEY (`idEmpregado`),
  ADD KEY `fk_empregado_centroautomotivo1_idx` (`centroautomotivo_idCentro`),
  ADD KEY `fk_empregado_usuario1_idx` (`usuario_idUsuario`);

--
-- Indexes for table `filtro`
--
ALTER TABLE `filtro`
  ADD PRIMARY KEY (`idFiltro`);

--
-- Indexes for table `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`idModelo`),
  ADD KEY `fk_modelo_montadora1_idx` (`montadora_id`);

--
-- Indexes for table `montadora`
--
ALTER TABLE `montadora`
  ADD PRIMARY KEY (`idMontadora`);

--
-- Indexes for table `oleo`
--
ALTER TABLE `oleo`
  ADD PRIMARY KEY (`idOleo`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_usuario_perfil_idx` (`perfil_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `idAnuncio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carro`
--
ALTER TABLE `carro`
  MODIFY `idCarro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carroefiltro`
--
ALTER TABLE `carroefiltro`
  MODIFY `idCarroFiltro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carroeoleo`
--
ALTER TABLE `carroeoleo`
  MODIFY `idCarroOleo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `centroautomotivo`
--
ALTER TABLE `centroautomotivo`
  MODIFY `idCentro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empregado`
--
ALTER TABLE `empregado`
  MODIFY `idEmpregado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `filtro`
--
ALTER TABLE `filtro`
  MODIFY `idFiltro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `modelo`
--
ALTER TABLE `modelo`
  MODIFY `idModelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `montadora`
--
ALTER TABLE `montadora`
  MODIFY `idMontadora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oleo`
--
ALTER TABLE `oleo`
  MODIFY `idOleo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `fk_anuncio_usuario1` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `carro`
--
ALTER TABLE `carro`
  ADD CONSTRAINT `fk_carro_modelo1` FOREIGN KEY (`modelo_id`) REFERENCES `modelo` (`idModelo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `carroefiltro`
--
ALTER TABLE `carroefiltro`
  ADD CONSTRAINT `fk_carroefiltro_carro1` FOREIGN KEY (`carro_idCarro`) REFERENCES `carro` (`idCarro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carroefiltro_filtro1` FOREIGN KEY (`filtro_idFiltro`) REFERENCES `filtro` (`idFiltro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `carroeoleo`
--
ALTER TABLE `carroeoleo`
  ADD CONSTRAINT `fk_carroeoleo_carro1` FOREIGN KEY (`carro_idCarro`) REFERENCES `carro` (`idCarro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carroeoleo_oleo1` FOREIGN KEY (`oleo_idOleo`) REFERENCES `oleo` (`idOleo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_usuario1` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_centroautomotivo1` FOREIGN KEY (`centroAutomotivo`) REFERENCES `centroautomotivo` (`idCentro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentario_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `empregado`
--
ALTER TABLE `empregado`
  ADD CONSTRAINT `fk_empregado_centroautomotivo1` FOREIGN KEY (`centroautomotivo_idCentro`) REFERENCES `centroautomotivo` (`idCentro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empregado_usuario1` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `fk_modelo_montadora1` FOREIGN KEY (`montadora_id`) REFERENCES `montadora` (`idMontadora`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
