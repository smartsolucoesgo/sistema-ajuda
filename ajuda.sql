-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Mar-2020 às 05:45
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ajuda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ajuda`
--

DROP TABLE IF EXISTS `ajuda`;
CREATE TABLE IF NOT EXISTS `ajuda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_solicitante` int(11) DEFAULT NULL,
  `id_ajudante` int(11) DEFAULT NULL,
  `id_condominio` varchar(255) DEFAULT NULL,
  `grau` varchar(255) DEFAULT NULL,
  `solicitacao` text DEFAULT NULL,
  `situacao` varchar(255) DEFAULT 'Aguardando Ajuda',
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `id_update_user` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ajuda`
--

INSERT INTO `ajuda` (`id`, `id_solicitante`, `id_ajudante`, `id_condominio`, `grau`, `solicitacao`, `situacao`, `data_cadastro`, `data_alteracao`, `id_update_user`, `status`) VALUES
(1, 1, 1, '1', 'Urgente', '<p>testandotestando</p>', 'Ajudada', '2020-03-20 02:37:19', '2020-03-20 04:55:08', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominio`
--

DROP TABLE IF EXISTS `condominio`;
CREATE TABLE IF NOT EXISTS `condominio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sindico` varchar(255) DEFAULT '',
  `nome` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT '',
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `id_update_user` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `condominio`
--

INSERT INTO `condominio` (`id`, `id_sindico`, `nome`, `endereco`, `numero`, `complemento`, `cep`, `bairro`, `cidade`, `estado`, `data_cadastro`, `data_alteracao`, `id_update_user`, `status`) VALUES
(1, '6', 'Gran Paradiso', 'Rua Tambaqui', 'SN', '', '74370-469', 'Residencial Aquarios II', 'Goiânia', 'GO', '2020-03-19 21:15:07', '2020-03-19 23:57:44', 1, 1),
(2, '6', 'Gran Conquista', 'Rua Tambaqui', 'SN', '', '74370-469', 'Residencial Aquarios II', 'Goiânia', 'GO', '2020-03-19 21:15:48', '2020-03-20 00:48:40', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracao`
--

DROP TABLE IF EXISTS `configuracao`;
CREATE TABLE IF NOT EXISTS `configuracao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_title` varchar(255) NOT NULL,
  `protocol` enum('http://','https://') NOT NULL,
  `environment` enum('Desenvolvimento','Produção') NOT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_user` varchar(255) DEFAULT NULL,
  `mail_pass` varchar(255) DEFAULT NULL,
  `mail_auth` enum('true','false') DEFAULT 'true',
  `mail_secure` enum('ssl','tls') DEFAULT 'ssl',
  `mail_port` int(4) DEFAULT 465,
  `mail_sendtype` enum('isSMTP','isMAIL') DEFAULT 'isSMTP',
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `id_update_user` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `configuracao`
--

INSERT INTO `configuracao` (`id`, `app_title`, `protocol`, `environment`, `mail_host`, `mail_user`, `mail_pass`, `mail_auth`, `mail_secure`, `mail_port`, `mail_sendtype`, `data_cadastro`, `data_alteracao`, `id_update_user`, `status`) VALUES
(1, 'Ajude o Próximo', 'http://', 'Desenvolvimento', 'smtp.hostinger.com.br', 'no-reply@smartsolucoesinteligentes.com.br', '123456', 'true', 'ssl', 587, 'isSMTP', '2020-01-27 19:45:19', '2020-03-20 05:43:33', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acesso` varchar(255) NOT NULL DEFAULT 'Morador',
  `id_condominio` int(11) DEFAULT NULL,
  `bloco_torre` varchar(255) DEFAULT '',
  `apto_casa` varchar(255) DEFAULT '',
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT 'assets/img/avatar.jpg',
  `session` varchar(255) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `id_update_user` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `acesso`, `id_condominio`, `bloco_torre`, `apto_casa`, `nome`, `email`, `senha`, `telefone`, `imagem`, `session`, `data_cadastro`, `data_alteracao`, `id_update_user`, `status`) VALUES
(1, 'Administrador', 1, '02A', '303', 'Administrador', 'contato@smartsolucoesinteligentes.com.br', '202cb962ac59075b964b07152d234b70', '(11) 11111-1111', 'files/user/1_1584661541.jpg', '0576347001584682096', '2019-01-08 17:16:18', '2020-03-20 05:40:50', 1, 1),
(6, 'Sindico', 1, '', '', 'Jhonatan', 'sindico@site.com', '202cb962ac59075b964b07152d234b70', '(22) 22222-2222', 'assets/img/avatar.jpg', '', '2020-03-19 21:20:09', '2020-03-19 21:20:35', NULL, 1),
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
