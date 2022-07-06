-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2022 às 20:20
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdyourparty`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbadmin`
--

CREATE TABLE `tbadmin` (
  `idAdmin` int(11) NOT NULL,
  `nomeAdmin` varchar(200) NOT NULL,
  `emailAdmin` varchar(200) NOT NULL,
  `senhaAdmin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbbuffet`
--

CREATE TABLE `tbbuffet` (
  `idBuffet` int(11) NOT NULL,
  `nomeBuffet` varchar(200) NOT NULL,
  `descricaoBuffet` varchar(200) NOT NULL,
  `valorBuffet` decimal(15,2) NOT NULL,
  `fotoBuffet` varchar(200) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbbuffet`
--

INSERT INTO `tbbuffet` (`idBuffet`, `nomeBuffet`, `descricaoBuffet`, `valorBuffet`, `fotoBuffet`, `idEmpresa`) VALUES
(2, 'Palanc', 'Com o Buffet Marron Glacê o que não faltará em sua festa de casamento será variedade em serviços e personalidade. Acostumados a lidar com todo tipo de público nos diversos estilos de eventos que organ', '2000.00', 'images-db/628ab98261999.jpeg', 1),
(3, 'Buffet Marron Glacê', 'Um espaço sofisticado, clean e com mobiliário de bom gosto, ideal para a sua festa de casamento dos sonhos. O Espaço Fairbanks tem tantas qualidades que fica impossível não dar uma olhadinha em tudo o', '1500.00', 'images-db/628ab9b8771f3.jpg', 1),
(4, 'Madeira Buffet', 'Com mais de 33 anos de experiência no mercado de eventos sociais, a empresa Gastronomia Madeira (Madeira Buffet) está consolidada no seu segmento como sinônimo de qualidade e profissionalismo. Garante', '3900.00', 'images-db/628aba2b84821.jpeg', 3),
(5, 'Happy Moment Buffet & Eventos', 'Se vocês desejam surpreender os olhos e o paladar de todos os seus convidados no dia do seu casamento, contem com os serviços oferecidos pela Happy Moment. A empresa oferece aos noivos 2 formatos de c', '4000.00', 'images-db/628aba8a48554.jpg', 3),
(6, 'Buffet Tâmisa', 'A vida é cheia de momentos mágicos e cada um deles deve ser comemorado com estilo. Seja aniversário, casamento, evento corporativo ou cerimônia de debutante, cada detalhe deve ser perfeito e eternizad', '1000.00', 'images-db/628abac250309.jpg', 1),
(7, 'Buffet Prince', 'O Buffet Prince oferece tudo que você precisa para realizar a festa de seus sonhos tornando seu momento especial e inesquecível, além de a 25 anos, enriquecer sua relação de clientes bem atendidos.', '10000.00', 'images-db/628abaf8515a8.jpg', 2),
(8, 'Tatuapé Hall', 'O Tatuapé Hall oferece para seu casamento um serviço de buffet de excelência onde a qualidade dos cardápios é total prioridade. Seu convidados se surpreenderão com os pratos e doces elaborados por a e', '8600.00', 'images-db/628abb39ec55f.jpg', 2),
(9, 'Smaf Buffet', 'Com o Smaf Buffet, vocês terão a oportunidade de conseguirem um menu para o casamento que será inesquecível. A equipe do buffet tem amplo domínio sobre técnicas de receitas e preparo de refeições para', '5000.00', 'images-db/628abb9d2a764.jpeg', 1),
(10, 'Munhoz Buffet', 'Se vocês desejam encantar a todos os seus amigos e familiares pelo paladar, contem com a colaboração do Munhoz Buffet. A empresa atende a todos os tipos de celebrações, sempre oferecendo aos seus clie', '7300.00', 'images-db/628abbd1bad51.jpeg', 1),
(11, 'Vivi Buffets', 'A Vivi Eventos está no mercado há mais de 8 anos, com trabalho de buffet, decoração e espaços lindos . Durante este período de alta produção, o buffet já trabalhou para diferentes eventos, com destaqu', '4500.00', 'images-db/628abc2dec23a.jpg', 1),
(13, 'Buffet Cachorro Quente', 'BUffet especializado em cachorro quente', '4000.00', 'images-db/628ab8bc62702.jpg', 2),
(14, 'Buffet delicia ', 'Se vocês desejam surpreender os olhos e o paladar de todos os seus convidados no dia do seu casamento, contem com os serviços oferecidos pela Happy Moment. A empresa oferece aos noivos 2 formatos', '2000.00', 'images-db/62b9f56c11a00.jpg', 7),
(15, 'Buffet JK', 'Serviço de Buffet em Guaianazes.', '2000.00', 'images-db/62b9f617e6566.jpg', 7),
(16, 'Buffet Evento Perfeito', 'A gastronomia de toda a rede Evento Perfeito é assinada pelo Chef Noslen Przybycz. Com especialização pela ICIF - em Costigliole d´Asti, região norte da Itália, desenvolveu menus com pratos de grande ', '8000.00', 'images-db/62b9f6b60b357.jpg', 7),
(17, 'Buffet Sonho Meu', 'A gastronomia de toda a rede Evento Perfeito é assinada pelo Chef Noslen Przybycz. Com especialização pela ICIF - em Costigliole d´Asti, região norte da Itália, desenvolveu menus com pratos de grande', '5000.00', 'images-db/62b9f719e7db6.jpg', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcatalogoservico`
--

CREATE TABLE `tbcatalogoservico` (
  `idCatalogoServico` int(11) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idServico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcatalogoservico`
--

INSERT INTO `tbcatalogoservico` (`idCatalogoServico`, `idEmpresa`, `idServico`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 4, 1),
(4, 4, 2),
(5, 4, 3),
(6, 4, 4),
(7, 5, 1),
(8, 5, 2),
(9, 6, 2),
(10, 6, 3),
(11, 7, 3),
(12, 7, 4),
(13, 8, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) NOT NULL,
  `cpfCliente` varchar(14) NOT NULL,
  `emailCliente` varchar(100) NOT NULL,
  `senhaCliente` varchar(255) NOT NULL,
  `fotoCliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `cpfCliente`, `emailCliente`, `senhaCliente`, `fotoCliente`) VALUES
(1, 'Lucas Silva Lima', '111.222.333-00', 'luckassilvalima@hotmail.com', '$2y$10$CkaIFUBVB.0RUcAVmUQjFeWT5xpe9AYhV5ZOyvW.cipUTrIp8ccpS', 'img_usuario/JyhZpbtu_400x400.jpg'),
(2, 'Eduardo Sousa', '240.397.677-44', 'du@gmail.com', '$2y$10$QHvzZWenJP8FsLPwANHkV.9s7xHC5xrhKN4/lBq6Ozahk6mXQEfpe', 'images-db/62b4f8d755761.jpg'),
(3, 'Lucas Silva', '708.461.760-41', 'lucassilva@gmail.com', '$2y$10$D/WtPVXObWJRWDofZguoU.bNfluFbKaM8YfQIRhDiG.nV/xZfH7hG', 'images-random/not-image(3).png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdecoracao`
--

CREATE TABLE `tbdecoracao` (
  `idDecoracao` int(11) NOT NULL,
  `nomeDecoracao` varchar(200) NOT NULL,
  `valorDecoracao` decimal(15,2) NOT NULL,
  `descDecoracao` varchar(300) NOT NULL,
  `tipoDecoracao` varchar(60) NOT NULL,
  `temaDecoracao` varchar(60) NOT NULL,
  `fotoDecoracao` varchar(200) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbdecoracao`
--

INSERT INTO `tbdecoracao` (`idDecoracao`, `nomeDecoracao`, `valorDecoracao`, `descDecoracao`, `tipoDecoracao`, `temaDecoracao`, `fotoDecoracao`, `idEmpresa`) VALUES
(1, 'Vingadores - Marvel', '700.00', 'O Tema de Decoração da Festa Vingadores, Também conhecido como Decoração de Festa Avengers é indicado para Festa Infantil Meninos.\r\nPara uma Festa dos Vingadores completa, use balões, suportes e descartáveis Vermelho, Azul e Verde.\r\nPrepare seus poderes, coloque sua roupa de super-herói e aproveite!', 'Super Heróis ', 'Vingadores ', 'images-db/628abd47cf86e.jpg', 1),
(2, 'Decoração de Debutante', '1500.00', 'Uma festa de debutante tem que ser excepcional, você não concorda comigo? Pois bem, os 15 anos só se comemora uma vez na vida, e com ele acompanham grandes mudanças. Nós pensamos nisso e criamos tudo para que a festa da debutante seja completa e encantadora, tanto para a aniversariante quanto para s', '15 anos ', 'Debutante', 'images-db/628abda7092fd.jpg', 1),
(3, 'Batman - DC Comics', '2000.00', 'Bartman é o melhor super herói das sagas da DC', 'Super Heróis ', 'Batman', 'images-db/628abdf44dedc.png', 1),
(4, 'Decoração da Barbie', '1000.00', 'Tentaram me matar, mas esqueceram que a Barbie é buttefly. ', 'Barbie ', 'Barbie Buttefly', 'images-db/628abe3b03627.jpg', 3),
(5, 'Decoração Musical', '2500.00', 'Festa de Aniversario de um músico', 'Festa de Aniversario', 'Musica', 'images-db/628ac66453184.jpg', 2),
(6, 'Decoração de Casamento', '2800.00', 'Decoração de casamento', 'Casamento', 'Casamento', 'images-db/628ac7e98ef26.jpg', 2),
(7, 'Arraiá da Vlaur', '3150.00', 'Um arriá diferente, cheio de barracas para seus convidados se divertirem e um ambiente super aconchegante.', 'Festa Junina', 'Arraiá', 'images-db/62b4fd7dc2dbb.jpg', 4),
(8, 'Halloween', '2450.00', 'Uma festa bastante macabra para agitar seus convidados de festa!', 'Terror', 'Halloween', 'images-db/62b4fe222e465.jpg', 4),
(9, 'Casamento Rústico', '3000.00', 'Ideais para espaços mais despojados e em contato com a natureza, como sítios ou praia, a decoração rústica é marcada por elementos mais simples, que remetem à vida bucólica do campo', 'Casamento', 'Rústico', 'images-db/62b9e1b477fe8.jpg', 5),
(10, 'Casamento Retrô', '5000.00', ' Objetos antigos originais (vintage), como os “móveis da vovó” e fotos da família, compõem os ambientes junto com elementos estilizados com pátina, cores envelhecidas e craquelês (retrô). Tudo remete a um saudosismo romântico e elegante dos filmes clássicos dos anos 1940 e 50.', 'Casamento', 'Retrô', 'images-db/62b9e2b071cfe.png', 5),
(11, 'Casamento Romântico', '8000.00', 'O estilo romântico é uma variante mais “sentimental” do clássico e pode ser aplicado de forma discreta ou mais marcante. Corações, cupidos, velas, rosas e flores do campo são de lei! O vermelho e os tons de rosa podem contrastar com o branco para quebrar a monotonia e suavizar os ambientes.', 'Casamento', 'Romântico', 'images-db/62b9e337c3506.jpg', 5),
(12, 'Casamento Clean', '6000.00', 'A clássica regra “menos é mais” nunca sai da moda e é ideal para noivas mais discretas, que gostam de encontrar a elegância na simplicidade. Mas não confunda decoração minimalista com “pobre”. No estilo clean, tudo tem um objetivo, uma função. Os elementos são harmonizados sem exageros. Destaque par', 'Casamento', 'Clean', 'images-db/62b9e3c2ea4b1.jpg', 5),
(13, 'Decoração de aniversário do Mickey', '2000.00', 'O Mickey é um personagem da Disney que atravessa gerações agradando tanto crianças quanto adultos, e sem dúvida a decoração de aniversário Mickey é uma das mais clássicas para festa infantil.  ', 'Aniversário', 'Mickey', 'images-db/62b9ee7442153.jpg', 6),
(14, 'Aniversário da Frozen', '2500.00', 'Lançado em 2014, o filme Frozen conquistou uma legião de fãs mirins. Contando a história de simpáticos e fofos personagens, muitas crianças acabam desejando a longa-metragem como tema de sua festa de aniversário. Tons claros, flocos de neve e o amável boneco de neve Olaf são os os principais element', 'Aniversário', 'Frozen', 'images-db/62b9ef1a38a77.jpg', 6),
(15, 'Festa Hot Wheels', '1800.00', 'Com cores vibrantes e detalhes bem chamativos, a festa Hot Wheels é perfeita para quem busca um tema bem criativo e diferente. O resultado fica incrível com a presença de carros e elementos bem radicais.', 'Aniversário', 'Hot Wheels', 'images-db/62b9efa7c9166.jpg', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbempresa`
--

CREATE TABLE `tbempresa` (
  `idEmpresa` int(11) NOT NULL,
  `nomeEmpresa` varchar(80) NOT NULL,
  `cnpjEmpresa` varchar(30) NOT NULL,
  `enderecoEmpresa` varchar(80) NOT NULL,
  `numeroEmpresa` varchar(10) NOT NULL,
  `cidadeEmpresa` varchar(80) NOT NULL,
  `bairroEmpresa` varchar(80) NOT NULL,
  `cepEmpresa` varchar(20) NOT NULL,
  `estadoEmpresa` varchar(80) NOT NULL,
  `fotoEmpresa` varchar(200) NOT NULL,
  `emailEmpresa` varchar(100) NOT NULL,
  `senhaEmpresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbempresa`
--

INSERT INTO `tbempresa` (`idEmpresa`, `nomeEmpresa`, `cnpjEmpresa`, `enderecoEmpresa`, `numeroEmpresa`, `cidadeEmpresa`, `bairroEmpresa`, `cepEmpresa`, `estadoEmpresa`, `fotoEmpresa`, `emailEmpresa`, `senhaEmpresa`) VALUES
(1, 'Party Mania', '28.741.848/0001-90', 'Rua Antônio Viera de Barros', '2050B', 'Votorantim', 'Jardim Europa', '18117-704', 'SP', 'image-random/notFound(6)', 'partymania@gmail.com', '$2y$10$Zbvj/sse55T3ZIMSekGjwOCNdh6FwKSy.aJwDg4S6qmPtUMGBPO/K'),
(2, 'Condado Festas', '45.199.910/0001-83', 'Rua dos Motociclistas', '35A', 'Joinville', 'Itinga', '89233-735', 'SC', 'images-random/not-image(1)', 'condado@gmail.com', '$2y$10$V2OYo3IwSyU6UE8TCkFkGOkznvIgsZqi6XYnngQrYmVfrXKMnyhPC'),
(3, 'Aluga Festa', '98.460.439/0001-00', 'Alameda Padre Cícero', '245B', 'Castanhal', 'Caiçara', '68743-470', 'PA', 'images-random/not-image(6)', 'aluga@gmail.com', '$2y$10$2ZvXgaugedN5WwTGbkGH6eP13LH5FFCDGtEIwuqClfMcgSEuKB0sO'),
(4, 'Vlaur Events', '44.676.347/0001-24', 'Rua Luiza de Paula Ribeiro', '445', 'Campo Grande', 'São Francisco', '79118-042', 'MS', 'images-random/not-image(1)', 'vlaur@gmail.com', '$2y$10$LeshKWpoH3BSFZv9P1DAO.UjXurGprN1SbUzPYkjLNsA7sUdm2feW'),
(5, 'Sua festa', '11.122.266/6555-22', 'Rua Vilma', '102', 'São Paulo', 'Vila Jacuí', '08060-090', 'SP', 'images-random/not-image(4)', 'suafesta@gmail.com', '$2y$10$.oL7DJWanApQk9/jsPiZ6uEaEdaMZjfqOrIakpFscCA3tMH8Pbx8W'),
(6, 'Festas Feliz', '11.225.566/2323-3', '15ª Travessa Carmem Chaves', '100', 'Jaboatão dos Guararapes', 'Muribequinha', '54353-230', 'PE', 'images-random/not-image(6)', 'felizfesta@hotmail.com', '$2y$10$sh9QCmCbJoAV1usgF83kZu7nkDPrpve16XgqceubFsve4dIRWj4Ya'),
(7, 'Companhia Buffet\\\'s', '11.002.255/6662-22', 'Avenida Camilo', '11', 'Salvador', 'Vila Canária', '41390-360', 'BA', 'images-random/not-image(6)', 'companhiabufets@hotmail.com', '$2y$10$kAkY6tI1CkGqEVjPG9PtUe.WiJLa./qqFQgfHUiQ9GVVzw/Q7bH3u'),
(8, 'Segurança para Todos', '21.564.448/8776-66', 'Rua SC 40', '100', 'Goiânia', 'Jardim Lago Azul', '74474-710', 'GO', 'images-random/not-image(4)', 'segTodos@gmail.com', '$2y$10$mC.qJKQ01Dn/Tx.9DQpzC..VHxLfVAwr3jRJiMD2ILLPeT8gXay9K');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfonecliente`
--

CREATE TABLE `tbfonecliente` (
  `idFoneCliente` int(11) NOT NULL,
  `numeroFoneCliente` varchar(20) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbfonecliente`
--

INSERT INTO `tbfonecliente` (`idFoneCliente`, `numeroFoneCliente`, `idCliente`) VALUES
(1, '+55 (25) 24491-1', 1),
(2, '+55 (11) 94873-8844', 2),
(3, '+55 (71) 92484-8143', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfoneempresa`
--

CREATE TABLE `tbfoneempresa` (
  `idFoneEmpresa` int(11) NOT NULL,
  `numeroFoneEmpresa` varchar(20) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbfoneempresa`
--

INSERT INTO `tbfoneempresa` (`idFoneEmpresa`, `numeroFoneEmpresa`, `idEmpresa`) VALUES
(1, '21321', 1),
(2, '+55 (11) 11111-1111', 2),
(3, '+55 (11) 99988-7745', 3),
(4, '+55 (11) 84587-6345', 4),
(5, '+55 (11) 95562-3548', 5),
(6, '+55 (81) 95544-5522', 6),
(7, '+55 (71) 93364-2033', 7),
(8, '+55 (62) 97854-8523', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitembuffet`
--

CREATE TABLE `tbitembuffet` (
  `idItemBuffet` int(11) NOT NULL,
  `nomeItemBuffet` varchar(300) NOT NULL,
  `idBuffet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbitembuffet`
--

INSERT INTO `tbitembuffet` (`idItemBuffet`, `nomeItemBuffet`, `idBuffet`) VALUES
(1, 'Churrasco', 2),
(2, 'Salgados', 2),
(3, 'Comidas Veganas ', 2),
(4, 'Bebidas Artesanais ', 2),
(5, 'Comidas Vegetarianas', 2),
(6, 'Comidas Veganas ', 3),
(7, 'Comidas Vegetarianas ', 3),
(8, 'Churrasco', 3),
(9, 'Comidas Veganas ', 4),
(10, 'Churrasco', 4),
(11, 'Bebidas Artesanais ', 4),
(12, 'Salgados', 5),
(13, 'Comidas Veganas ', 5),
(14, 'Bebidas', 6),
(15, 'Comidas Veganas ', 6),
(16, 'Churrasco', 6),
(17, 'Comidas Veganas ', 7),
(18, 'Bebidas', 7),
(19, 'Churrasco', 7),
(20, 'Salgados', 8),
(21, 'Comidas Classe A', 8),
(22, 'Bebidas Artesanais', 8),
(23, 'Churrasco ', 9),
(24, 'Cervejas e Whisky ', 9),
(25, 'Salgados', 9),
(26, 'Comidas Veganas ', 10),
(27, 'Salgados', 10),
(28, 'Bebidas Artesanais', 10),
(29, 'Comidas Veganas ', 11),
(30, 'Salgados', 11),
(31, 'Bebidas', 11),
(35, 'Cachorro quente', 13),
(36, 'Mini cachorro quente', 13),
(37, 'Cachorro quente doce', 13),
(38, 'Mini X burguer ', 14),
(39, 'Mini hot dog ', 14),
(40, 'Batata frita com cheddar e bacon ', 14),
(41, 'Bolinho de carne seca ', 14),
(42, 'Coxinha ', 15),
(43, 'Mini X burguer ', 15),
(44, 'Bolinha de queijo', 15),
(45, 'Risole de presunto e queijo', 15),
(46, 'Empada de frango', 15),
(47, 'Mini tortinhas de mousse de morango ', 16),
(48, 'Brigadeiro ', 16),
(49, 'Mini trufas ', 16),
(50, 'Barquinha com salada fria ', 16),
(51, 'Escondidinho de carne seca ', 16),
(52, 'Empada de frango ', 17),
(53, 'Salada de repolho agridoce ', 17),
(54, 'Sobre coxa assada na cerveja ', 17),
(55, 'Arroz branco ', 17),
(56, 'Batata frita ', 17),
(57, 'Coca- cola ', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitemdecoracao`
--

CREATE TABLE `tbitemdecoracao` (
  `idItemDecoracao` int(11) NOT NULL,
  `nomeItemDecoracao` varchar(300) NOT NULL,
  `idDecoracao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbitemdecoracao`
--

INSERT INTO `tbitemdecoracao` (`idItemDecoracao`, `nomeItemDecoracao`, `idDecoracao`) VALUES
(1, 'Bonecos de papelão', 1),
(2, 'Balões personalizados ', 1),
(3, 'Tapete de dança ', 2),
(4, 'Balões personalizados', 2),
(5, 'Copos e mesas personalizadas', 2),
(6, 'Mesas e copos personalizados ', 3),
(7, 'Balões personalizados', 3),
(8, 'Batmans de enfeite ', 3),
(9, 'Barbie de brinquedo', 4),
(10, 'Mesas e copos personalizados ', 4),
(11, 'Balões personalizados', 4),
(12, 'Piano fictício ', 5),
(13, 'Toalhas de mesa personalizadas', 5),
(14, 'Balões pretos e brancos', 5),
(15, 'Bolo de isopor', 6),
(16, 'Balões dourados e brancos', 6),
(17, 'Flores personalizadas', 6),
(18, 'Fogueira fictícia', 7),
(19, 'Balões e bandeirolas', 7),
(20, 'Chapéus de palha', 7),
(21, 'Aranhas e teias', 8),
(22, 'Fantasminhas', 8),
(23, 'Bonecos grandes', 8),
(24, 'centros de mesa de xaxim', 9),
(25, 'flores campestres', 9),
(26, 'telefones antigos', 9),
(27, 'mobília em madeira pesada', 9),
(28, 'Tecidos e fibras naturais', 10),
(29, 'Molduras', 10),
(30, 'Caixotes e malas', 10),
(31, 'Altare divino', 10),
(32, 'móveis antigos', 10),
(33, 'Arranjos florais', 11),
(34, 'Balões ', 11),
(35, 'Moveis clean', 11),
(36, 'Moveis em tons pasteis', 12),
(37, 'Arranjo de flores', 12),
(38, 'vasos de flores', 12),
(39, 'Faixa Decorativa Festa Mickey Fãs', 13),
(40, 'Painel Relevo para Decoração Festa Mickey', 13),
(41, 'Trilho de Mesa Mickey Mouse', 13),
(42, 'Vela Turma Mickey Colorida', 13),
(43, 'Lembrancinha - Areia para Modelar Mickey', 13),
(44, 'FAIXA DECORATIVA PARABÉNS FROZEN', 14),
(45, 'TOALHA DE MESA PRINCIPAL PAPEL FROZEN', 14),
(46, 'KIT CAVALETE PARA PINTURA FROZEN', 14),
(47, 'CHAPÉU DE ANIVERSÁRIO FROZEN', 14),
(48, 'Painel Decorativo Hotwheels', 15),
(49, 'Balão Hotwheels', 15),
(50, 'Prato Descartável Hotwheels', 15),
(51, 'Decoração de Mesa Carros Hotwheels', 15),
(52, 'Toalha Aniversário Hotwheels', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitemorcamento`
--

CREATE TABLE `tbitemorcamento` (
  `idItemOrcamento` int(11) NOT NULL,
  `confirmaBuffet` int(3) DEFAULT NULL,
  `confirmaDecoracao` int(3) DEFAULT NULL,
  `confirmaLocal` int(3) DEFAULT NULL,
  `confirmaSeguranca` int(3) DEFAULT NULL,
  `avaliacaoBuffet` varchar(100) NOT NULL,
  `avaliacaoDecoracao` varchar(100) NOT NULL,
  `avaliacaoLocal` varchar(100) NOT NULL,
  `avaliacaoSeguranca` varchar(100) NOT NULL,
  `idOrcamentoEvento` int(11) DEFAULT NULL,
  `idBuffet` int(11) DEFAULT NULL,
  `idDecoracao` int(11) DEFAULT NULL,
  `idSeguranca` int(11) DEFAULT NULL,
  `idLocal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbitemorcamento`
--

INSERT INTO `tbitemorcamento` (`idItemOrcamento`, `confirmaBuffet`, `confirmaDecoracao`, `confirmaLocal`, `confirmaSeguranca`, `avaliacaoBuffet`, `avaliacaoDecoracao`, `avaliacaoLocal`, `avaliacaoSeguranca`, `idOrcamentoEvento`, `idBuffet`, `idDecoracao`, `idSeguranca`, `idLocal`) VALUES
(1, 0, 1, 2, 1, '0', '5', '0', '5', 1, NULL, 4, 2, 6),
(2, 1, 0, 0, 0, '4', '0', '0', '0', 2, 8, NULL, NULL, 9),
(3, 0, 0, 1, 0, '0', '0', '4', '0', 3, NULL, NULL, NULL, 3),
(4, 0, 0, 0, 1, '0', '0', '0', '5', 4, NULL, NULL, 7, NULL),
(5, 0, 0, 0, 1, '0', '0', '0', '5', 5, NULL, NULL, 7, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblocal`
--

CREATE TABLE `tblocal` (
  `idLocal` int(11) NOT NULL,
  `nomeLocal` varchar(100) NOT NULL,
  `valorLocal` decimal(15,2) NOT NULL,
  `enderecoLocal` varchar(80) NOT NULL,
  `numeroLocal` varchar(30) NOT NULL,
  `cidadeLocal` varchar(30) NOT NULL,
  `bairroLocal` varchar(30) NOT NULL,
  `cepLocal` varchar(9) NOT NULL,
  `estadoLocal` varchar(30) NOT NULL,
  `fotoLocal` varchar(200) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tblocal`
--

INSERT INTO `tblocal` (`idLocal`, `nomeLocal`, `valorLocal`, `enderecoLocal`, `numeroLocal`, `cidadeLocal`, `bairroLocal`, `cepLocal`, `estadoLocal`, `fotoLocal`, `idEmpresa`) VALUES
(1, 'Tatuapé Hall', '6800.00', 'Rua Antônio de Barros', '644', 'São Paulo', 'Tatuapé', '644 03089', 'SP', 'images-db/628abf4245b77.jpeg', 1),
(2, 'Salão Tâmisa', '7000.00', 'Av. Dr. José Higino', '865', 'São Paulo', 'Mocca', '03189-040', 'SP', 'images-db/628ac004c8831.jpg', 1),
(3, 'Fabrica de Alegria', '4000.00', 'Av Santo Antônio', '2723', 'Rio de Janeiro', 'Osasco', '06083215', 'RJ', 'images-db/628ac0a6f1a14.jpg', 1),
(4, 'Mansão Marion', '5200.00', 'Rua Curuça', '412', 'São Paulo', 'Vila Maria', '02120000', 'SP', 'images-db/628ac12e529c0.jpeg', 2),
(5, 'Armazém da Alegria', '3500.00', 'estrada do Riviera ', '644', 'São Paulo', 'Guarapiranga', '644 03089', 'SP', 'images-db/628ac1f1c63b0.jpeg', 2),
(6, 'Chácara Paulistana', '4000.00', 'Rua Zituo Karasawa', '1963', 'Cariacica', 'Expedito', '29151-790', 'ES', 'images-db/628acc6d6d51b.jpg', 3),
(7, 'Chácara Mega Recanto', '4000.00', 'Rua Mexiris', '201', 'Brasília', 'Samambaia Sul (Samambaia)', '72306-815', 'DF', 'images-db/628acdcb7e2fd.webp', 3),
(8, 'Salão Vlaur Plus', '1500.00', 'Rua Palmeira Real', '145B', 'Três Lagoas', 'Recanto das Palmeiras', '79641360', 'MS', 'images-db/62b4ff6a06e85.jpg', 4),
(9, 'Espaço Pamplona', '1000.00', 'Rua Pamplona', '1227', 'Teresina', 'Santo Antônio', '64028-050', 'PI', 'images-db/62b9e9c567d09.jpg', 5),
(10, 'Le Gourmet Buffet', '2000.00', 'Rua Antônio de Barros', '2457', 'Boa Vista', 'Caçari', '69307-755', 'RR', 'images-db/62b9ea3d5de9e.jpg', 5),
(11, 'Espaço Fairbanks', '1500.00', 'Alameda Raja Gabaglia', '177', 'Jaboatão dos Guararapes', 'Guararapes', '54325-008', 'PE', 'images-db/62b9eaf156ae3.jpg', 5),
(12, 'Espaço Prime', '7000.00', 'Avenida Casa Grande', '1365', 'Aracaju', 'Inácio Barbosa', '49040-710', 'SE', 'images-db/62b9eb5225442.jpg', 5),
(13, 'Enigma Club', '3000.00', 'Alameda dos Aicás', '1283', 'Bayeux', 'Centro', '58307-060', 'PB', 'images-db/62b9eca4e0772.jpg', 6),
(14, 'Fazenda Bella Vista Eventos', '500.00', 'Estrada Joaquim Cardoso Filho', '6500', 'Maceió', 'Cidade Universitária', '57073-033', 'AL', 'images-db/62b9ed18067e1.jpg', 6),
(15, 'Espaço P/ Eventos Corporativos', '1000.00', 'Avenida São Miguel', '9323', 'Porto Alegre', 'Hípica', '91755-436', 'RS', 'images-db/62b9ed898e7c1.jpg', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tborcamentoevento`
--

CREATE TABLE `tborcamentoevento` (
  `idOrcamentoEvento` int(11) NOT NULL,
  `valorOrcamentoEvento` decimal(15,2) NOT NULL,
  `dataOrcamentoEvento` date NOT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tborcamentoevento`
--

INSERT INTO `tborcamentoevento` (`idOrcamentoEvento`, `valorOrcamentoEvento`, `dataOrcamentoEvento`, `idCliente`) VALUES
(1, '8500.00', '2022-06-29', 3),
(2, '9600.00', '2022-06-29', 3),
(3, '4000.00', '2022-06-29', 3),
(4, '4200.00', '2022-06-29', 2),
(5, '4200.00', '2022-06-29', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbseguranca`
--

CREATE TABLE `tbseguranca` (
  `idSeguranca` int(11) NOT NULL,
  `descSeguranca` varchar(200) NOT NULL,
  `valorSeguranca` decimal(15,2) NOT NULL,
  `quantidadeSeguranca` int(11) NOT NULL,
  `fotoSeguranca` varchar(200) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbseguranca`
--

INSERT INTO `tbseguranca` (`idSeguranca`, `descSeguranca`, `valorSeguranca`, `quantidadeSeguranca`, `fotoSeguranca`, `idEmpresa`) VALUES
(1, 'Service Security ', '8000.00', 8, 'images-db/628ac292b22d9.jpeg', 1),
(2, 'Clean Work Security', '3500.00', 4, 'images-db/628ac29d75f3e.jpg', 1),
(3, 'G8 Segurança', '2700.00', 3, 'images-db/628ac2aaee9b5.jpg', 2),
(4, 'H.M Segurança', '2500.00', 3, 'images-db/62b4fa1213c9a.jpg', 2),
(7, 'Vlaur Security', '4200.00', 5, 'images-db/62b502ba5db48.jpg', 4),
(8, 'AMR3 Segurança e Serviço', '5000.00', 5, 'images-db/62ba02b2e70f8.jpg', 7),
(9, 'HVSEG Segurança Privada', '4000.00', 1, 'images-db/62ba031982400.jpg', 7),
(10, 'Aguiar Serviços', '6000.00', 6, 'images-db/62ba03a653583.jpg', 7),
(11, 'Nasbet Serviços', '5000.00', 6, 'images-db/62ba040504d20.jpg', 7),
(12, 'Ultraservice promoções e eventos ltda', '15000.00', 15, 'images-db/62ba04462c7d6.jpg', 7),
(13, 'Age-vigilância e Segurança', '4000.00', 3, 'images-db/62ba059c4df4d.jpg', 8),
(14, 'Plantão Serviço de Segurança', '2000.00', 2, 'images-db/62ba05c88c3ff.jpg', 8),
(15, 'Orsegrups Segrança', '6000.00', 9, 'images-db/62ba060d9b5a0.jpg', 8),
(16, 'Ação Segurança', '6000.00', 2, 'images-db/62ba0649dfecc.jpg', 8),
(17, 'Segurança Privada Archives', '3000.00', 2, 'images-db/62ba06c72a759.png', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbservico`
--

CREATE TABLE `tbservico` (
  `idServico` int(11) NOT NULL,
  `nomeServico` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbservico`
--

INSERT INTO `tbservico` (`idServico`, `nomeServico`) VALUES
(1, 'Local'),
(2, 'Decoração'),
(3, 'Buffet'),
(4, 'Segurança');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Índices para tabela `tbbuffet`
--
ALTER TABLE `tbbuffet`
  ADD PRIMARY KEY (`idBuffet`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbcatalogoservico`
--
ALTER TABLE `tbcatalogoservico`
  ADD PRIMARY KEY (`idCatalogoServico`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idServico` (`idServico`);

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `tbdecoracao`
--
ALTER TABLE `tbdecoracao`
  ADD PRIMARY KEY (`idDecoracao`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices para tabela `tbfonecliente`
--
ALTER TABLE `tbfonecliente`
  ADD PRIMARY KEY (`idFoneCliente`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Índices para tabela `tbfoneempresa`
--
ALTER TABLE `tbfoneempresa`
  ADD PRIMARY KEY (`idFoneEmpresa`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbitembuffet`
--
ALTER TABLE `tbitembuffet`
  ADD PRIMARY KEY (`idItemBuffet`),
  ADD KEY `idBuffet` (`idBuffet`);

--
-- Índices para tabela `tbitemdecoracao`
--
ALTER TABLE `tbitemdecoracao`
  ADD PRIMARY KEY (`idItemDecoracao`),
  ADD KEY `idDecoracao` (`idDecoracao`);

--
-- Índices para tabela `tbitemorcamento`
--
ALTER TABLE `tbitemorcamento`
  ADD PRIMARY KEY (`idItemOrcamento`),
  ADD KEY `idOrcamentoEvento` (`idOrcamentoEvento`),
  ADD KEY `idBuffet` (`idBuffet`),
  ADD KEY `idDecoracao` (`idDecoracao`),
  ADD KEY `idSeguranca` (`idSeguranca`),
  ADD KEY `idLocal` (`idLocal`);

--
-- Índices para tabela `tblocal`
--
ALTER TABLE `tblocal`
  ADD PRIMARY KEY (`idLocal`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tborcamentoevento`
--
ALTER TABLE `tborcamentoevento`
  ADD PRIMARY KEY (`idOrcamentoEvento`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Índices para tabela `tbseguranca`
--
ALTER TABLE `tbseguranca`
  ADD PRIMARY KEY (`idSeguranca`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbservico`
--
ALTER TABLE `tbservico`
  ADD PRIMARY KEY (`idServico`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbbuffet`
--
ALTER TABLE `tbbuffet`
  MODIFY `idBuffet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tbcatalogoservico`
--
ALTER TABLE `tbcatalogoservico`
  MODIFY `idCatalogoServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbdecoracao`
--
ALTER TABLE `tbdecoracao`
  MODIFY `idDecoracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbfonecliente`
--
ALTER TABLE `tbfonecliente`
  MODIFY `idFoneCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbfoneempresa`
--
ALTER TABLE `tbfoneempresa`
  MODIFY `idFoneEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbitembuffet`
--
ALTER TABLE `tbitembuffet`
  MODIFY `idItemBuffet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `tbitemdecoracao`
--
ALTER TABLE `tbitemdecoracao`
  MODIFY `idItemDecoracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `tbitemorcamento`
--
ALTER TABLE `tbitemorcamento`
  MODIFY `idItemOrcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tblocal`
--
ALTER TABLE `tblocal`
  MODIFY `idLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tborcamentoevento`
--
ALTER TABLE `tborcamentoevento`
  MODIFY `idOrcamentoEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbseguranca`
--
ALTER TABLE `tbseguranca`
  MODIFY `idSeguranca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tbservico`
--
ALTER TABLE `tbservico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbbuffet`
--
ALTER TABLE `tbbuffet`
  ADD CONSTRAINT `tbbuffet_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);

--
-- Limitadores para a tabela `tbcatalogoservico`
--
ALTER TABLE `tbcatalogoservico`
  ADD CONSTRAINT `tbcatalogoservico_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`),
  ADD CONSTRAINT `tbcatalogoservico_ibfk_2` FOREIGN KEY (`idServico`) REFERENCES `tbservico` (`idServico`);

--
-- Limitadores para a tabela `tbdecoracao`
--
ALTER TABLE `tbdecoracao`
  ADD CONSTRAINT `tbdecoracao_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);

--
-- Limitadores para a tabela `tbfonecliente`
--
ALTER TABLE `tbfonecliente`
  ADD CONSTRAINT `tbfonecliente_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`);

--
-- Limitadores para a tabela `tbfoneempresa`
--
ALTER TABLE `tbfoneempresa`
  ADD CONSTRAINT `tbfoneempresa_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);

--
-- Limitadores para a tabela `tbitembuffet`
--
ALTER TABLE `tbitembuffet`
  ADD CONSTRAINT `tbitembuffet_ibfk_1` FOREIGN KEY (`idBuffet`) REFERENCES `tbbuffet` (`idBuffet`);

--
-- Limitadores para a tabela `tbitemdecoracao`
--
ALTER TABLE `tbitemdecoracao`
  ADD CONSTRAINT `tbitemdecoracao_ibfk_1` FOREIGN KEY (`idDecoracao`) REFERENCES `tbdecoracao` (`idDecoracao`);

--
-- Limitadores para a tabela `tbitemorcamento`
--
ALTER TABLE `tbitemorcamento`
  ADD CONSTRAINT `tbitemorcamento_ibfk_1` FOREIGN KEY (`idOrcamentoEvento`) REFERENCES `tborcamentoevento` (`idOrcamentoEvento`),
  ADD CONSTRAINT `tbitemorcamento_ibfk_2` FOREIGN KEY (`idBuffet`) REFERENCES `tbbuffet` (`idBuffet`),
  ADD CONSTRAINT `tbitemorcamento_ibfk_3` FOREIGN KEY (`idDecoracao`) REFERENCES `tbdecoracao` (`idDecoracao`),
  ADD CONSTRAINT `tbitemorcamento_ibfk_4` FOREIGN KEY (`idSeguranca`) REFERENCES `tbseguranca` (`idSeguranca`),
  ADD CONSTRAINT `tbitemorcamento_ibfk_5` FOREIGN KEY (`idLocal`) REFERENCES `tblocal` (`idLocal`);

--
-- Limitadores para a tabela `tblocal`
--
ALTER TABLE `tblocal`
  ADD CONSTRAINT `tblocal_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);

--
-- Limitadores para a tabela `tborcamentoevento`
--
ALTER TABLE `tborcamentoevento`
  ADD CONSTRAINT `tborcamentoevento_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`);

--
-- Limitadores para a tabela `tbseguranca`
--
ALTER TABLE `tbseguranca`
  ADD CONSTRAINT `tbseguranca_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
