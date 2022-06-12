-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2020 at 09:40 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deca_19l4_mp_06`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambiente`
--

CREATE TABLE `ambiente` (
  `idambiente` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `observaçoes` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ambiente`
--

INSERT INTO `ambiente` (`idambiente`, `nome`, `observaçoes`) VALUES
(1, 'Biblioteca', '1º prateleira '),
(2, 'Escritório', NULL),
(3, 'Sala de Estar', '3º prateleira');

-- --------------------------------------------------------

--
-- Table structure for table `autores`
--

CREATE TABLE `autores` (
  `idautores` int NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autores`
--

INSERT INTO `autores` (`idautores`, `nome`) VALUES
(1, 'Camões'),
(2, 'Stephen King'),
(3, 'Fernando Pessoa'),
(4, 'Jorge Amado'),
(5, 'Jorge Amado'),
(6, 'J. K. Rowling'),
(7, 'J. R. R. Tolkien'),
(8, 'Erich Maria Remarque'),
(9, 'Erich Maria Remarque');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nome`) VALUES
(3, 'Biografia'),
(4, 'Culinária'),
(2, 'Drama'),
(10, 'Ficção Científica'),
(5, 'História Brasileira'),
(1, 'Poesia'),
(11, 'Política');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `idcomentarios` int NOT NULL,
  `texto_comentario` varchar(255) NOT NULL,
  `ref_id_livro` int NOT NULL,
  `ref_id_leitores` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`idcomentarios`, `texto_comentario`, `ref_id_livro`, `ref_id_leitores`) VALUES
(1, 'bela bosta', 1, 1),
(6, 'porcaria', 2, 10),
(7, 'porcaria', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `editora`
--

CREATE TABLE `editora` (
  `ideditora` int NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `editora`
--

INSERT INTO `editora` (`ideditora`, `nome`) VALUES
(1, 'Pearson'),
(2, 'Porto'),
(3, 'Leya'),
(4, 'Companhia das Letras'),
(5, 'Rocco'),
(6, 'Edições Loyola');

-- --------------------------------------------------------

--
-- Table structure for table `leitores`
--

CREATE TABLE `leitores` (
  `idleitores` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password_hash` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leitores`
--

INSERT INTO `leitores` (`idleitores`, `nome`, `email`, `password_hash`) VALUES
(1, 'João Pedro', 'jpzabrie@gmail.com', '$2y$10$MwAtqOKmOAUMTXskkVm0Yur.rujFipiVAc81SiB.2vRDuK1DUMrfW'),
(10, 'Amaury', 'aas1953@gmail.com', '$2y$10$OPI/9wA5QUIFAKpvGsINrOkFUie6sxB/rrl/uyyFZNk9aFQ9QDmPu');

-- --------------------------------------------------------

--
-- Table structure for table `livros2`
--

CREATE TABLE `livros2` (
  `idlivro` int NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `data_lancamento` year DEFAULT NULL,
  `data_edicao` year NOT NULL,
  `sinopse` mediumtext NOT NULL,
  `review` mediumtext,
  `categoria_id` int NOT NULL,
  `autor_id` int NOT NULL,
  `editora_id` int NOT NULL,
  `ambiente_id` int NOT NULL,
  `capa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livros2`
--

INSERT INTO `livros2` (`idlivro`, `titulo`, `data_lancamento`, `data_edicao`, `sinopse`, `review`, `categoria_id`, `autor_id`, `editora_id`, `ambiente_id`, `capa`) VALUES
(1, 'Os Lusíadas', NULL, 2020, '“Os Lusíadas” é uma epopeia do escritor português Luís Vaz de Camões, que tem como assunto a viagem de Vasco da Gama às Índias. A Narrativa é dividida em dez cantos que são organizados em 1.102 estrofes, cada uma com oito versos, todos decassílabos heroicos, e com rima ABABABCC.', 'Incrvel! Mais que uma obra literária, pode-se dizer que é uma obra de arte, tal foi o empenho do autor em mantê-la com esta regularidade formal.', 1, 1, 2, 1, 'lusiadas'),
(2, 'O Hobbit', NULL, 2003, 'Como a maioria dos hobbits, Bilbo Bolseiro leva uma vida tranquila até o dia em que recebe uma missão do mago Gandalf. Acompanhado por um grupo de anões, ele parte numa jornada até a Montanha Solitária para libertar o Reino de Erebor do dragão Smaug.', 'Não é tão bom quanto a trilogia do Senhor dos Anéis, mas consegue divertir e adicionar informações ao já riquíssimo universo da Terra-Média. Com certeza vale a leitura! ', 2, 7, 4, 3, 'The_Hobbit'),
(3, 'Nada de Novo no Front', 1929, 2020, 'Um grupo de estudantes alemães é convencido por um professor excessivamente nacionalista a se alistar no Exército durante a Primeira Guerra Mundial. Ao testemunharem morte e mutilações, o heroísmo dá lugar aos horrores e às tragédias da guerra.', 'Fortíssimo! Um livro denso, muito triste e que surpreende do começo ao fim! Já indiquei para centenas de amigos e vou continuar indicando sempre que tiver a oportunidade!', 3, 8, 6, 2, 'nada_de_novo_no_front'),
(4, 'Harry Potter e a Pedra Filosofal', 1997, 2015, 'Harry Potter é um garoto órfão que vive infeliz com seus tios, os Dursleys. Ele recebe uma carta contendo um convite para ingressar em Hogwarts, uma famosa escola especializada em formar jovens bruxos. Inicialmente, Harry é impedido de ler a carta por seu tio, mas logo recebe a visita de Hagrid, o guarda-caça de Hogwarts, que chega para levá-lo até a escola. Harry adentra um mundo mágico que jamais imaginara, vivendo diversas aventuras com seus novos amigos, Rony Weasley e Hermione Granger.', 'Sensacional! Passei minha infância lendo!', 10, 8, 6, 2, 'HP_Pedra_Filosofal');

-- --------------------------------------------------------

--
-- Table structure for table `livros_has_leitores`
--

CREATE TABLE `livros_has_leitores` (
  `livros_idlivros` int NOT NULL,
  `leitores_idleitores` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livros_has_leitores`
--

INSERT INTO `livros_has_leitores` (`livros_idlivros`, `leitores_idleitores`) VALUES
(2, 1),
(1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`idambiente`),
  ADD UNIQUE KEY `idambiente_UNIQUE` (`idambiente`),
  ADD UNIQUE KEY `nome_UNIQUE` (`nome`);

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idautores`),
  ADD UNIQUE KEY `idautores_UNIQUE` (`idautores`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `idcategoria_UNIQUE` (`idcategoria`),
  ADD UNIQUE KEY `nome_UNIQUE` (`nome`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcomentarios`),
  ADD KEY `id_leitores` (`ref_id_leitores`),
  ADD KEY `ref_livro` (`ref_id_livro`);

--
-- Indexes for table `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`ideditora`),
  ADD UNIQUE KEY `ideditora_UNIQUE` (`ideditora`);

--
-- Indexes for table `leitores`
--
ALTER TABLE `leitores`
  ADD PRIMARY KEY (`idleitores`),
  ADD UNIQUE KEY `idleitores_UNIQUE` (`idleitores`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `livros2`
--
ALTER TABLE `livros2`
  ADD PRIMARY KEY (`idlivro`),
  ADD KEY `editora_id_fk` (`idlivro`),
  ADD KEY `autor_id_fk` (`idlivro`),
  ADD KEY `categoria_id_fk` (`idlivro`) USING BTREE,
  ADD KEY `ambiente_id_fk` (`idlivro`),
  ADD KEY `autor_id` (`autor_id`),
  ADD KEY `editora_id` (`editora_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `ambiente_id` (`ambiente_id`);

--
-- Indexes for table `livros_has_leitores`
--
ALTER TABLE `livros_has_leitores`
  ADD PRIMARY KEY (`livros_idlivros`,`leitores_idleitores`),
  ADD KEY `fk_livros_has_leitores_leitores1_idx` (`leitores_idleitores`),
  ADD KEY `fk_livros_has_leitores_livros1_idx` (`livros_idlivros`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `idambiente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `idautores` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomentarios` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `editora`
--
ALTER TABLE `editora`
  MODIFY `ideditora` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leitores`
--
ALTER TABLE `leitores`
  MODIFY `idleitores` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `livros2`
--
ALTER TABLE `livros2`
  MODIFY `idlivro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `id_leitores` FOREIGN KEY (`ref_id_leitores`) REFERENCES `leitores` (`idleitores`),
  ADD CONSTRAINT `ref_livro` FOREIGN KEY (`ref_id_livro`) REFERENCES `livros2` (`idlivro`);

--
-- Constraints for table `livros2`
--
ALTER TABLE `livros2`
  ADD CONSTRAINT `ambiente_id` FOREIGN KEY (`ambiente_id`) REFERENCES `ambiente` (`idambiente`),
  ADD CONSTRAINT `autor_id` FOREIGN KEY (`autor_id`) REFERENCES `autores` (`idautores`),
  ADD CONSTRAINT `categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`idcategoria`),
  ADD CONSTRAINT `editora_id` FOREIGN KEY (`editora_id`) REFERENCES `editora` (`ideditora`);

--
-- Constraints for table `livros_has_leitores`
--
ALTER TABLE `livros_has_leitores`
  ADD CONSTRAINT `fk_livros_has_leitores_leitores1` FOREIGN KEY (`leitores_idleitores`) REFERENCES `leitores` (`idleitores`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_livros_has_leitores_livros1` FOREIGN KEY (`livros_idlivros`) REFERENCES `livros2` (`idlivro`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
