-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql26-farm10.kinghost.net
-- Tempo de geração: 24/05/2024 às 13:21
-- Versão do servidor: 10.6.16-MariaDB-log
-- Versão do PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `greengoifpr`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alternativa`
--

CREATE TABLE IF NOT EXISTS `alternativa` (
  `idAlternativa` int(11) NOT NULL,
  `descricaoAlternativa` varchar(200) NOT NULL,
  `alternativaCerta` tinyint(4) NOT NULL,
  `idQuestao` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Fazendo dump de dados para tabela `alternativa`
--

INSERT INTO `alternativa` (`idAlternativa`, `descricaoAlternativa`, `alternativaCerta`, `idQuestao`) VALUES
(12, 'alt1', 0, 7),
(13, 'alt2', 0, 7),
(14, '333', 0, 7),
(15, 'alt4', 1, 7),
(16, 'alt1', 1, 8),
(17, 'alt2', 0, 8),
(18, '333', 0, 8),
(19, 'alt4', 0, 8),
(20, 'alt1', 0, 9),
(21, 'alt2', 1, 9),
(22, 'alt3', 0, 9),
(23, 'alt4', 0, 9),
(28, 'Alt1', 0, 11),
(29, 'Alt2', 0, 11),
(30, '', 0, 11),
(31, '', 1, 11),
(32, 'Alt1', 0, 12),
(33, 'Alt2', 1, 12),
(34, 'Alt3', 0, 12),
(35, 'Alt4', 0, 12),
(36, 'Xablau', 0, 13),
(37, 'Berimbau', 0, 13),
(38, 'Cacau', 1, 13),
(39, 'Bau', 0, 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipe`
--

CREATE TABLE IF NOT EXISTS `equipe` (
  `idEquipe` int(11) NOT NULL,
  `nomeEquipe` varchar(100) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `icone` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Fazendo dump de dados para tabela `equipe`
--

INSERT INTO `equipe` (`idEquipe`, `nomeEquipe`, `cor`, `icone`) VALUES
(9, 'Cacto', '#bddc8f', '../../public/icon/cacto_icon.png'),
(10, 'Florzinha', '#ee6d87', '../../public/icon/flor_icon.png'),
(11, 'Árvore', '#6ca776', '../../public/icon/arvore_icon.png'),
(12, 'Planta no Vaso', '#38998d', '../../public/icon/samambaia_icon.png'),
(17, 'Quarteto do Mal', '#7a219e', '../../public/icon/samambaia_icon.png'),
(18, 'Camelinho', '#a67b01', '../../public/icon/cacto_icon.png'),
(19, 'Mistérios SA', '#ee719e', '../../public/icon/flor_icon.png'),
(21, 'Má', '#e100ff', '../../public/icon/arvore_icon.png'),
(22, 'Banca', '#c406f9', '../../public/icon/flor_icon.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `especie`
--

CREATE TABLE IF NOT EXISTS `especie` (
  `idEspecie` int(11) NOT NULL,
  `nomePop` varchar(100) NOT NULL,
  `nomeCie` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `imagemEspecie` varchar(200) NOT NULL,
  `frutifera` tinyint(1) NOT NULL,
  `comestivel` tinyint(1) NOT NULL,
  `raridade` tinyint(1) NOT NULL,
  `medicinal` tinyint(1) NOT NULL,
  `toxicidade` tinyint(1) NOT NULL,
  `exotica` tinyint(1) NOT NULL,
  `nativa` tinyint(4) NOT NULL,
  `endemica` tinyint(4) NOT NULL,
  `ornamental` tinyint(4) NOT NULL,
  `panc` tinyint(4) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Fazendo dump de dados para tabela `especie`
--

INSERT INTO `especie` (`idEspecie`, `nomePop`, `nomeCie`, `descricao`, `imagemEspecie`, `frutifera`, `comestivel`, `raridade`, `medicinal`, `toxicidade`, `exotica`, `nativa`, `endemica`, `ornamental`, `panc`, `idUsuario`) VALUES
(18, 'Cactus', 'Cactus cientifucsio', '<p>Cactus nasce no deserto.</p>', '../../public/especies/632aaa8d7f1e8dfea4df5445d8181a84.jpg', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 22),
(22, 'Ipê-de-jardim', 'Handroanthus impetiginosus', '<p>&eacute; uma esp&eacute;cie recorrente no Brasil.</p>\r\n', '../../public/especies/6417358ec1caf425de6b04921b378581.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 22),
(23, 'Pitangueira', 'Eugenia uniflora', '<p>A planta denominada popularmente de <strong>pitangueira</strong>, <strong>pitanga</strong> ou <strong>pitanga-vermelha</strong> tem seu nome derivado do tupi &ldquo;pi&rsquo;t&atilde;g&rdquo;, que quer dizer vermelho, em alus&atilde;o &agrave; cor do seu fruto. &Eacute; conhecida mundialmente como <em>cerisier</em> de Cayenne e <em>cerisier</em> de Surinam, nos pa&iacute;ses de l&iacute;ngua francesa;<em> Brazil cherry,</em> <em>Surinam cherry</em>, <em>Cayenne cherry</em>, <em>Florida cherry</em> e pitanga, nos de l&iacute;ngua inglesa; <em>grosella</em> de Mexico, <em>cereza</em> de Surinam e pitanga, em alguns de l&iacute;ngua espanhola, e na Argentina &eacute; chamada <em>nangapiri</em> e <em>array&aacute;n</em> (FOUQU&Eacute;, 1981; VILLACHICA et al., 1996).</p>\r\n\r\n<p>Trata-se de um arbusto denso de 2-4m de altura, ou mais raramente, uma pequena &aacute;rvore de 6-9m, ramificada, com copa arredondada de 3-6m de di&acirc;metro, com folhagem persistente ou semidec&iacute;dua; sistema radicular profundo, com uma raiz pivotante e numerosas ra&iacute;zes secund&aacute;rias e terci&aacute;rias. As folhas s&atilde;o opostas, simples, com pec&iacute;olo curto (2mm).&nbsp;</p>\r\n\r\n<p>&Eacute; uma esp&eacute;cie nativa, por&eacute;m n&atilde;o end&ecirc;mica do Brasil, sendo encontrada tamb&eacute;m no Paraguai, Argentina e Uruguai. No Brasil ocorre nas regi&otilde;es Nordeste (Bahia), Centro-Oeste (Mato Grosso do Sul),</p>\r\n\r\n<p>Sudeste (Esp&iacute;rito Santo, Minas Gerais, Rio de Janeiro, S&atilde;o Paulo) e Sul (Paran&aacute;, Rio Grande do Sul, Santa Catarina) (FLORA DO BRASIL, 2017).&nbsp;</p>\r\n\r\n<p>Devido &agrave; sua adaptabilidade &agrave;s mais distintas condi&ccedil;&otilde;es de clima e solo, a pitangueira foi disseminada e &eacute; cultivada nas mais variadas regi&otilde;es do globo.&nbsp; O fruto, de sabor ex&oacute;tico, &eacute; rico em vitaminas, principalmente, vitamina A (BEZERRA et al., 2018).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Fontes:</strong>&nbsp;</p>\r\n\r\n<p>BEZERRA et al. Eugenia uniflora: pitanga. Dispon&iacute;vel em <a href="https://www.alice.cnptia.embrapa.br/alice/bitstream/doc/1106305/1/Pitanga.pdf">https://www.alice.cnptia.embrapa.br/alice/bitstream/doc/1106305/1/Pitanga.pdf</a>.</p>\r\n\r\n<p>FLORA DO BRASIL. Flora do Brasil 2020 em constru&ccedil;&atilde;o. Jardim Bot&acirc;nico do Rio de Janeiro. Dispon&iacute;vel em: &lt; http://floradobrasil.jbrj.gov.br/ &gt;. Acesso em: 17 Dez. 2017.</p>\r\n\r\n<p>FOUQU&Eacute;, A. Les plantes m&eacute;dicinales pr&eacute;sentes en For&ecirc;t Guyanaise. Fruits, 36(10), 567- 592, 1981.</p>\r\n\r\n<p>VILLACHICA, H.; CARVALHO, J.E.U.; M&Uuml;LLER, C.H.; DIAZ S., C.; ALMANZA, M. Frutales y hortalizas promisorios de la Amazonia. Lima: Tratado de Cooperacci&oacute;n Amazonica, 1996, p.227-231. (SPT-TCA, 44).</p>\r\n\r\n<p><strong>Foto:&nbsp;</strong>Autoria pr&oacute;pria do Projeto GreenGo.</p>\r\n', '../../public/especies/ad17588b13b3745b9da226918979f1c8.jpg', 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 22),
(24, 'Azaléia', 'Rhododendron simsii', '<p>A azaleia é uma planta ornamental propagada comercialmente por meio de estacas, sendo difícil o seu o enraizamento em muitos casos, o que resulta em baixa produção de mudas (LONE et al., 2010). Ela é uma planta ornamental originária da China, pertencente à família Ericaceae, muito cultivada no Brasil, em jardins e interiores, em razão do efeito decorativo de suas flores, sendo formada por hibridação e melhoramento (LORENZI &amp; SOUZA, 1995). Sua propagação é realizada comercialmente por meio de estacas (CLARKE, 1982). Entretanto, em muitos casos, a porcentagem de enraizamento dessa planta é baixa, resultando em baixa produção de mudas (CHALFUN et al., 1997). Segundo LEE (1965), o enraizamento das estacas está relacionado ao tipo da espécie a ser cultivada, bem como às condições do ambiente em que são conduzidas, tais como: tipo de substrato, umidade, temperatura, irrigação e luminosidade. ZUFFELLATO-RIBAS &amp; RODRIGUES (2001) destacam ainda a importância das auxinas na formação de raízes de estacas.</p><p>&nbsp;</p><p><strong>Fonte: </strong>LONE et al., 2010</p><p><strong>Disponível em:</strong> <a href="https://www.scielo.br/j/cr/a/cq7zfW65pRPhSS8XsFw3zpj/">Link</a></p><p><strong>Foto:&nbsp;</strong>Autoria própria do Projeto GreenGo.</p>', '../../public/especies/86837dcade6013f4d8590c2b5d6a5e8b.jpeg', 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 23),
(25, 'Jaçanã', 'Victoria amazonica', '', '../../public/especies/23bf66e5ad15ccbeccddb8a65b0cebad.jpeg', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 22),
(26, 'Taioba', 'Xanthosoma sagittifolium', '<p>Vulgarmente conhecida por orelha-de-elefante (quando usada como planta ornamental), macabo, mangará, mangará-mirim, mangareto, mangarito, taioba, taiova, taiá ou yautia, é uma espécie da família das Araceae, originária da América Central e hoje largamente cultivada nas regiões tropicais e subtropicais.&nbsp;</p><p>Produz cormos ricos em amidos, muito utilizados na alimentação humana e animal. Suas cultura e a utilização são muito semelhantes às do taro.</p><p>A taioba é de cultivo fácil e gosta de climas quentes e úmidos.</p><p>O sabor de suas folhas lembra o do espinafre. É importante que o seu consumo seja feito logo após a colheita, já que a taioba apresenta vida útil relativamente curta, de 1 a 2 dias em temperatura ambiente.</p>', '../../public/especies/9ddf9c1df4f4a17fe3e35b39751e041b.jpeg', 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 22),
(27, 'Ora-pro-nóbis', 'Pereskia aculeata', '<p>A Pereskia aculeata, popularmente conhecida como ora-pro-nóbis (do latim ora pro nobis: ''ora por nós''), orabrobó, lobrobó ou lobrobô, é uma cactácea trepadeira folhosa. É uma planta bastante rara, rústica, perene, desenvolvendo-se bem em vários tipos de solo, tanto à sombra como ao sol. Muito usada em cercas vivas, com frutos do tipo baga, amarelos e redondos. A planta é também empregada para a produção de mel.</p><p>É originária do continente americano, onde tem ampla distribuição - desde o sul dos Estados Unidos até a Argentina, passando pelas ilhas do Caribe. Planta perene, rústica e resistente à seca, é a única espécie do gênero Pereskia que tem hábito de liana. No Brasil, ocorre em florestas perenifólias, nos estados de Maranhão, Ceará, Pernambuco, Alagoas, Sergipe, Bahia, Minas Gerais, Espírito Santo e Rio de Janeiro.</p><p>As folhas e flores são ingredientes de diferentes receitas de sopas, omeletes, tortas e refogados, sendo muito usadas na culinária das cidades históricas do estado de Minas Gerais, onde a planta é muito conhecida.</p>', '../../public/especies/2a7caf1c030c17be2e5f1f84deb978bb.jpg', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 22),
(28, 'Lírio-do-brejo', 'Hedychium coronarium', '<p>O lírio-do-brejo (Hedychium coronarium) é uma planta perene nativa da Ásia Tropical, possui uma folhagem verde brilhante muito ornamental. Esta planta palustre é muito vistosa, suas flores são brancas, grandes, muito perfumadas e se formam o ano todo. Seu crescimento é muito rápido e pode ser cultivada em grupos para melhor valorização de seu efeito paisagístico.</p><p>Aprecia solos ricos em matéria orgânica e brejosos, isto é, permanentemente molhados, sem no entanto ficar abaixo da água. Seu porte varia entre 1,5-2,0 metros de altura. Deve ser cultivada à sombra. Apresenta potencial invasivo. Multiplica-se por divisão das touceiras, tomando o cuidado de deixar uma boa parte de rizoma e folhas em cada muda.</p><p>Sua flor é perfumada com cheiro parecido com outras espécies de jasmim.</p><p>Nomes Populares: gengibre-branco, lírio-do-brejo, lágrima-de-moça, lírio-branco, borboleta, lágrima-de-vênus, jasmin-borboleta.</p><p>Existe também a variedade Hedychium coronarium ''Roseum'' que apresenta as mesmas características da espécie Hedychium coronarium. Esta difere apenas na cor das flores, que são mais rosadas.</p>', '../../public/especies/9bf6a467ad03fb1db51defe7339c0491.jpeg', 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 22),
(30, 'Extremosa', 'Lagerstroemia indica', '<p>Lagerstroemia indica (L.) Pers., popularmente conhecido como extremosa, escumilha, resedá ou árvore-de-júpiter, é uma planta da família Lythraceae, nativa da República Popular da China e Índia. A espécie foi introduzida nos Estados Unidos em 1790 pelo botânico Andre Michaux e é cultivada hoje em dia como árvore ornamental.</p><p>No Brasil é utilizada amplamente em arborização urbana. Por se tratar de um arbusto conduzido facilmente reproduzido através de estaqueamento, foi tida como panaceia para o plantio em ruas com fiação elétrica. Como resultado, em algumas cidades esta espécie sozinha representa mais de 20 por cento das árvores em via pública.</p>', '../../public/especies/0bc1065c1af7cb85b8f5389ce397da31.jpeg', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 23),
(38, 'Flor-do-cerrado', 'Calliandra californica', '<p>Calliandra californica é um arbusto lenhoso e perene com folhas compostas bipinadas em orientação alternativa. Os folíolos são pequenos, de cor verde escuro e formato semelhante a uma samambaia. O arbusto assume a forma de um vaso completo com ramos em forma de cana que caem. As flores de longa duração têm formato de almofada de alfinetes e variam de vermelho vibrante a fúcsia. Das flores, C. californica produz vagens finas, verde-claras, eretas e oblongas que se descascam para liberar as sementes de dentro.</p><p>Nativa da Baja California, no México, em espanhol, a planta também é conhecida vernacularmente como tabardillo, zapotillo ou chuparosa. As flores, que aparecem no início do verão, têm cachos de estames vermelhos. No Brasil, ao ser introduzida, se adaptou bem ao clima do país.</p><p>&nbsp;</p><p><strong>Fonte: </strong>Public.asu.edu</p><p>Site: <a href="http://apps.cals.arizona.edu/arboretum/taxon.aspx?id=980">https://apps.cals.arizona.edu/arboretum/taxon.aspx?id=980</a></p>', '../../public/especies/e09f0947e8764012df40e1a04e51eaea.jpg', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 23),
(39, 'Ipê-amarelo', 'Handroanthus albus', '<p>O <i>Handroanthus albus</i> caracteriza-se por árvores terrícolas, perenes, deciduifólias, hermafroditas, e apresenta síndrome de dispersão anemocórica. Ocorre nos biomas <strong>Mata Atlântica</strong> e <strong>Cerrado</strong>, desenvolve-se em floresta estacional decídua, floresta estacional semi decídua, floresta ombrófila e floresta ombrófila mista, em solos encharcados, à beira de mata de encosta. Espécie de crescimento lento, sendo utilizada em projetos de restauração florestal. É protegida por unidades de conservação e não é considerada uma espécie ameaçada no âmbito nacional (CNCFlora, 2012).</p><p>Os nomes populares são ipê-da-serra e ipê-branco.&nbsp; Apesar das flores amarelas, a palavra "albus" refere-se ao tomento branco das folhas jovens&nbsp; (CNCFlora, 2012).</p><p>A espécie é encontrada principalmente nos sub-bosques dos pinhais, onde se pode encontrar regeneração regular, sobretudo em locais onde a floresta não é densa. Nas florestas densas, sua ocorrência é rara ou muito rara, não se verificando regeneração (CARVALHO, 2022).</p><p>Uma das características que chama mais a atenção são suas flores amarelas, com 4 a 10 cm de</p><p>comprimento, em tirso multifloral terminal com 10 a 20 cm ou mais de comprimento. Elas facilitam a identificação à distância desta planta (CARVALHO, 2022).</p><p>&nbsp;</p><p><strong>Fontes:</strong></p><p>CARVALHO, P. E. R. Espécies Arbóreas Brasileiras. Ipê-Amarelo (Tabebuia alba). Volume 1. Embrapa. 2022. Disponível em &lt;<a href="https://ainfo.cnptia.embrapa.br/digital/bitstream/item/231721/1/Especies-Arboreas-Brasileiras-vol-1-Ipe-Amarelo.pdf">https://ainfo.cnptia.embrapa.br/digital/bitstream/item/231721/1/Especies-Arboreas-Brasileiras-vol-1-Ipe-Amarelo.pdf</a>&gt;</p><p>CNCFlora. Handroanthus albus in Lista Vermelha da flora brasileira versão 2012.2 Centro Nacional de Conservação da Flora. 2012. Disponível em &lt;<a href="http://cncflora.jbrj.gov.br/portal/pt-br/profile/Handroanthus albus">http://cncflora.jbrj.gov.br/portal/pt-br/profile/Handroanthus albus</a>&gt;. Acesso em 17 setembro 2023.</p><p><strong>Foto:&nbsp;</strong>Autoria própria do Projeto GreenGo.</p><p>&nbsp;</p>', '../../public/especies/37319dec8badb93ec5f4103ecc057b31.jpg', 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 23),
(40, 'Pau-brasil', 'Paubrasilia echinata', '<p>O <strong>pau-brasil</strong> é uma espécie de grande importância econômica com histórico de mais de 500 anos de exploração em nosso país. É endêmica do Brasil, típica da Mata Atlântica e apesar da extração da madeira para o mercado de corante ter sido encerrada em meados de 1800 devido à produção de corante sintético, a extração da madeira para confecção de arcos para violino ganhou notoriedade e existe até hoje em dia. &nbsp;</p><p>Embora o cultivo tenha sido iniciado em algumas das localidades de ocorrência da espécie, sua população não pode ser considerada estável, pois as principais ameaças (exploração e perda do hábitat) não cessaram.&nbsp;</p><p>As árvores adultas possuem de 4 a 20 metros de altura e se desenvolvem bem em terrenos baixos e bem drenados. A floração é de setembro a dezembro e a frutificação ocorre de outubro a janeiro. Floresce anualmente coincidindo com a perda total das folhas, na estação seca, durante cerca de duas semanas e a flor tem duração de um dia.&nbsp;</p><p>&nbsp;</p><p><strong>Fonte:&nbsp; </strong>CNCFlora. Caesalpinia echinata in Lista Vermelha da flora brasileira versão 2012.2 Centro Nacional de Conservação da Flora. Disponível em &lt;<a href="http://cncflora.jbrj.gov.br/portal/pt-br/profile/Caesalpinia echinata">http://cncflora.jbrj.gov.br/portal/pt-br/profile/Caesalpinia echinata</a>&gt;. Acesso em 17 setembro 2023.</p><p><strong>Foto:&nbsp;</strong>Autoria própria do Projeto GreenGo.</p>', '../../public/especies/fe690cfae6c514e91e91a2ad5b69911b.jpg', 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 22),
(41, 'Palmeira-jerivá', 'Syagrus romanzoffiana', '<p>O <em>Syagrus romanzoffiana</em>, conhecido popularmente como <strong>coqueiro-jeriv&aacute;</strong>, <strong>coco-de-cachorro</strong>, <strong>baba-de-boi</strong>, <strong>coco-de-catarro</strong>, <strong>coco-bab&atilde;o</strong> ou <strong>jeriv&aacute;</strong>, &eacute; uma esp&eacute;cie com caule do tipo estipe solit&aacute;rio, cil&iacute;ndrico, com espessura quase uniforme e aspecto liso. Apresenta folhas alternas, pinadas, curvas, medindo at&eacute; 5 m de comprimento. A infloresc&ecirc;ncia &eacute; interfoliar, ramificada, na cor creme-amarelado, com numerosas flores. A infrutesc&ecirc;ncia mede entre 80 e 120 cm de comprimento, a qual apresenta 800 frutos, em m&eacute;dia. O fruto &eacute; uma dupra globosa a elipsoide e quando maduro apresenta colora&ccedil;&atilde;o amarela-alaranjada. &Eacute; carnoso e liso, com epicarpo fino e mesocarpo fibroso com aspecto viscoso e comest&iacute;vel. Mede de 3-5 cm de comprimento e 2-3 cm de di&acirc;metro e apresenta apenas uma semente. A semente possui entre 1-3 cm de comprimento.</p>\r\n\r\n<p>Nativa do Brasil, a esp&eacute;cie ocorre no Cerrado e Mata Atl&acirc;ntica, floresce o ano todo, por&eacute;m com maior intensidade na primavera e no ver&atilde;o. A matura&ccedil;&atilde;o dos frutos ocorre no outono, inverno e primavera.</p>\r\n\r\n<p>&Eacute; uma esp&eacute;cie &eacute; altamente decorativa, utilizada na arboriza&ccedil;&atilde;o de ruas e avenidas em todo o pa&iacute;s. Por causa de sua madeira resistente a &aacute;gua salgada, &eacute; bastante usada no preparo de estivados sobre solos brejosos, pinguelas e trapiches. Tamb&eacute;m &eacute; utilizada como poste, cerca viva em pastos, material de cobertura na constru&ccedil;&atilde;o de casas r&uacute;sticas e material de artesanato. Al&eacute;m disso, produz um palmito de boa qualidade, com sabor amargo, sendo uma das esp&eacute;cies indicadas para a produ&ccedil;&atilde;o deste alimento. A esp&eacute;cie apresenta ra&iacute;zes superficiais, ideais para o plantio em margens de rios, e seus frutos servem de alimentos para diversos animais, tornando-a bastante indicada para programas de restaura&ccedil;&atilde;o de &aacute;reas degradas e recomposi&ccedil;&atilde;o de matas ciliares. As folhas e os frutos podem ser utilizados na alimenta&ccedil;&atilde;o de animais dom&eacute;sticos.</p>\r\n\r\n<p>As folhas e os frutos podem ser utilizados na alimenta&ccedil;&atilde;o de animais dom&eacute;sticos.</p>\r\n\r\n<p>O ch&aacute; da casca e da flor, junto com brotos de amora, &eacute; usado no combate ao amarel&atilde;o e problemas de rins e diarreias. A sua casca tamb&eacute;m &eacute; verm&iacute;fuga.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Fonte: </strong>Horto Bot&acirc;nico - Universidade Federal do Rio de Janeiro</p>\r\n\r\n<p><strong>Dispon&iacute;vel em: </strong><a href="https://www.museunacional.ufrj.br/hortobotanico/Palmeiras/syagrusromanzoffiana.html">https://www.museunacional.ufrj.br/hortobotanico/Palmeiras/syagrusromanzoffiana.html</a></p>\r\n\r\n<p><strong>Foto:&nbsp;</strong>Autoria pr&oacute;pria do Projeto GreenGo.</p>\r\n', '../../public/especies/923366e17d52d9dfe2f21e0b643ebaf9.jpg', 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 22),
(42, 'Orquídea Olho-de-boneca', 'Dendrobium nobile', '<p>A <em>Dendrobium nobile</em> &eacute; uma esp&eacute;cie nativa de regi&otilde;es montanhosas da &Aacute;sia, como a China, a &Iacute;ndia e o Vietnam. Ela pode crescer em altitudes que variam de 500 a 2000 metros acima do n&iacute;vel do mar e &eacute; encontrada em ambientes que v&atilde;o desde florestas tropicais a paisagens rochosas. Essas orqu&iacute;deas s&atilde;o geralmente encontradas crescendo em condi&ccedil;&otilde;es de umidade alta e luz solar filtrada pelas &aacute;rvores. Elas crescem at&eacute; cerca de 30 a 60 cent&iacute;metros de altura e possuem folhas caducas, ou seja que caem em determinada &eacute;poca do ano, normalmente essas orqu&iacute;deas derrubam as folhas no per&iacute;odo do inverno, as folhas s&atilde;o normalmente na tonalidade podem ser de um verde brilhante ou verde folha.</p>\r\n\r\n<p>As flores da <em>Dendrobium nobile</em> s&atilde;o m&eacute;dias, com cerca de 3 a 10 cent&iacute;metros de di&acirc;metro e podem ser de cor branca, rosa, roxo ou amarela. Elas geralmente crescem ao longo do bulbo, podendo atingir at&eacute; 50 flores na sua &eacute;poca, e quanto mais velhas mais flores podem produzir, existem alguns exemplares mais antigos podem chegar a ter at&eacute; 100 ou mais flores.</p>\r\n\r\n<p>As flores da <em>Dendrobium nobile</em> s&atilde;o perfumadas, o que as torna ainda mais atrativas para polinizadores como abelhas, borboletas, mariposas e besouros e elas podem durar at&eacute; 6 semanas.&nbsp;</p>\r\n\r\n<p>Todos os <strong>dendr&oacute;bios</strong> (orqu&iacute;deas do g&ecirc;nero <em>Dendrobium</em>) s&atilde;o <strong>ep&iacute;fitos</strong>, isto &eacute;, desenvolvem-se sobre o tronco das &aacute;rvores. Elas <strong>n&atilde;o s&atilde;o parasitas</strong>, apenas utilizam as &aacute;rvores como suporte e prote&ccedil;&atilde;o para o seu crescimento. Por este motivo elas podem ser cultivadas sobre as &aacute;rvores, inicialmente amarradas com barbantes ou sisal.&nbsp;</p>\r\n\r\n<p>No Brasil ela &eacute; popularmente conhecida como orqu&iacute;dea olho de boneca.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Fonte: </strong>Campo das Orqu&iacute;deas (2023).</p>\r\n\r\n<p><strong>Dispon&iacute;vel em:</strong> <a href="https://campodasorquideas.com.br/dendrobium-nobile/">https://campodasorquideas.com.br/dendrobium-nobile/</a></p>\r\n\r\n<p><strong>Foto:&nbsp;</strong>Autoria pr&oacute;pria do Projeto GreenGo.</p>\r\n', '../../public/especies/f16a5c63e5d27f6e9e623422b31e0d52.jpg', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 22),
(43, 'Trapoeraba roxa', 'Tradescantia pallida purpurea', '<p>Popularmente conhecida como <strong>trapoeraba-roxa</strong> ou <strong>cora&ccedil;&atilde;o-roxo</strong>, a esp&eacute;cie<em> Tradescantia pallida</em> var. <em>purpurea</em>, embora <strong>origin&aacute;ria do M&eacute;xico</strong>, &eacute; amplamente cultivada no Brasil, facilmente encontrada em jardins e muito utilizada em projetos de ornamenta&ccedil;&atilde;o. Esta esp&eacute;cie &eacute; uma erva com cerca de 30 cm de altura, prostrada, com folhagem de cor roxa extremamente decorativa, muito usada para cobertura de espa&ccedil;os amplos que necessitem de contraste de cores. As folhas da trapoeraba-roxa s&atilde;o carnosas, lanceoladas, com face adaxial de cor roxo-escuro e de textura agrad&aacute;vel ao toque. A face abaxial possui cor roxa-esbranqui&ccedil;ada, com nervuras um pouco mais escuras, muito vis&iacute;veis pr&oacute;ximo &agrave; bainha da folha. Suas flores s&atilde;o terminais, tr&iacute;meras, com p&eacute;talas cor de rosa claro, contrastando com as anteras amarelas. A cor roxa caracter&iacute;stica da esp&eacute;cie se deve a altas concentra&ccedil;&otilde;es de um pigmento denominado antocianina, um flavonoide respons&aacute;vel pela cor vermelha a azul/arroxeada presente em in&uacute;meras esp&eacute;cies vegetais, atuando como regulador da fotoss&iacute;ntese e na prote&ccedil;&atilde;o contra os danos causados pela luz solar e a radia&ccedil;&atilde;o ultravioleta.</p>\r\n\r\n<p>H&aacute; algum tempo, a <strong>trapoeraba-roxa</strong> vem sendo usada como uma esp&eacute;cie bioindicadora em programas de biomonitoramento e de discrimina&ccedil;&atilde;o de emiss&otilde;es de gases poluentes, j&aacute; que responde &agrave; polui&ccedil;&atilde;o atmosf&eacute;rica, acumulando metais pesados em seus tecidos e apresentando altera&ccedil;&otilde;es detect&aacute;veis e mensur&aacute;veis.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Fonte:</strong> Sandra Zorat Cordeiro (2020).</p>\r\n\r\n<p><strong>Dispon&iacute;vel em:</strong> <a href="http://www.unirio.br/ccbs/ibio/herbariohuni/tradescantia-pallida-rose-d-r.hunt">http://www.unirio.br/ccbs/ibio/herbariohuni/tradescantia-pallida-rose-d-r.hunt</a></p>\r\n\r\n<p><strong>Foto:</strong>&nbsp;Autoria pr&oacute;pria do Projeto GreenGo.</p>\r\n', '../../public/especies/e4f09a6b6d697b90b0627e7876dbd029.jpg', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 22),
(44, 'Cóleus', 'Plectranthus scutellarioides', '<p><em>Plectranthus scutellarioides</em>, antigamente conhecida por&nbsp;<em>Solenostemon scutellarioides</em>,&nbsp;ou, popularmente, <strong>coleus,</strong> &eacute; uma planta, nativa do <strong>sudeste asi&aacute;tico</strong>, vem sendo usada, desde meados do s&eacute;culo XIX, em jardins tropicais e em projetos paisag&iacute;sticos e de ornamenta&ccedil;&atilde;o, pela sua bel&iacute;ssima e incr&iacute;vel folhagem variegada. H&aacute; muito vem sofrendo hibridiza&ccedil;&otilde;es para a sele&ccedil;&atilde;o de cultivares que apresentem folhas com diferentes combina&ccedil;&otilde;es de cores, padr&otilde;es e tamanhos, com predile&ccedil;&otilde;es para cultivo a pleno sol, sombra ou interiores.</p>\r\n\r\n<p>Esta esp&eacute;cie se apresenta como uma erva ou arbusto que atinge 1,5 m de altura, com caule ereto ou procumbente, semi-lenhoso na base, com por&ccedil;&atilde;o transversal quadrangular. Sua filotaxia &eacute; oposta-cruzada, com folhas pecioladas, de formato ovalado, atenuado na base e acuminado no &aacute;pice, com margem podendo ser crenada, denteada, lobada ou inteira, dependendo do cultivar. As folhas s&atilde;o multicoloridas e apresentam in&uacute;meros padr&otilde;es de colora&ccedil;&atilde;o em vermelho, rosa, roxo, p&uacute;rpura, verde, marrom, amarelo ou laranja, sendo de maior import&acirc;ncia ornamental que as flores. Suas infloresc&ecirc;ncias s&atilde;o terminais, racemosas, tipo pan&iacute;cula, com flores de c&aacute;lice persistente ap&oacute;s sua senesc&ecirc;ncia e corola gamop&eacute;tala e bilabiada, podendo ser roxa, azulada ou branco-azulada. &nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Fonte: </strong>Sandra Zorat Cordeiro (2020).</p>\r\n\r\n<p><strong>Dispon&iacute;vel em: </strong><a href="http://www.unirio.br/ccbs/ibio/herbariohuni/plectranthus-scutellarioides-l-r-br">http://www.unirio.br/ccbs/ibio/herbariohuni/plectranthus-scutellarioides-l-r-br</a></p>\r\n\r\n<p><strong>Foto:&nbsp;</strong>Autoria pr&oacute;pria do Projeto GreenGo.</p>\r\n', '../../public/especies/d8127fe82a1e7ada147b2d2fc5eaf504.jpg', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 22),
(45, 'Coqueiro-de-vênus', 'cordyline fruticosa', '<p><i>Cordyline fruticosa</i>, o popular coqueiro-de-vênus ou dracena-vermelha, é uma planta ornamental nativa da região tropical do sudeste asiático, leste da Austrália e Papua Nova Guiné. Seu aspecto original e visual extremamente colorido acabaram fazendo do coqueiro-de-vênus uma espécie pantropical, com variedades que, ao longo do tempo, deram origem a dezenas de cultivares, distintos na cor, forma e tamanho das folhas, comercializados no mundo todo, muito empregados na decoração e composição de jardins.</p><p>A <i>Cordyline fruticosa </i>é um arbusto ereto, lenhoso, que atinge de 2,0 a 3,0 metros de altura. Possui rizóforos, tanto aéreos como subterrâneos, profusamente ramificados e entumescidos, que funcionam como um órgão de reserva. Seu caule, delgado e ereto, com poucas ramificações, dá à planta um aspecto linear, expandido apenas na extremidade por conta do leque de folhas, que se apresentam com filotaxia espiralada com folhas dispostas em roseta, mas que se mantém eretas, levemente arqueadas; este aspecto faz com que seja frequentemente confundida com uma palmeira, daí o nome coqueiro-de-vênus. As folhas, com até 50 cm, que podem ser oblongas, lanceoladas ou elípticas, são pecioladas, flexíveis, com a borda lisa e com finas nervuras paralelas ao longo da lâmina; possuem grande efeito ornamental e são multicoloridas, com diversos tons de verde, rosa, vinho, púrpura, laranja, amarela, comumente variegadas, dependendo do cultivar. À medida que as folhas caem, deixam uma cicatriz no caule, que, com o tempo, se torna cheio de anéis horizontais. Suas flores, docemente perfumadas, de tépalas brancas ou levemente rosadas, distribuem-se densamente em longas e pendentes inflorescências terminais, tipo panícula, que também contribuem para o uso decorativo da planta. Seu fruto é tipo baga, de cor púrpura, com pequenas sementes escuras.&nbsp;</p><p>Estudos farmacológicos comprovaram que a dracena-vermelha possui propriedades antioxidantes, antimicrobianas, anti-inflamatórias e antitumorais. Na medicina tradicional, o uso popular desta espécie no tratamento de doenças é muito disseminado e recomendado nas suas áreas de distribuição natural (sudeste asiático) e onde foi naturalizada (ilhas do Pacífico). Ela é muito empregada em diversas preparações, sozinha ou com outras plantas, para tratamento de dores de cabeça, febres, feridas, doenças de pele, doenças respiratórias, tuberculose, disfunções intestinais e problemas menstruais. Nestas regiões, é também considerada uma PANC: seus rizóforos são cozidos ou assados e consumidos como doces ou usados na preparação de caldas ou xaropes, devido ao alto percentual de frutose que possuem; por conta disso, são também utilizados como adoçante natural. Ademais, seus rizóforos, tanto como seus meristemas e sementes, são usados na preparação de uma bebida fermentada muito popular e apreciada.</p><p>Acredita-se que a <i>Cordyline fruticosa</i> foi levada pelos nativos do sudeste asiático às ilhas do Pacífico e proximidades, até chegar ao Havaí. Nestas regiões, onde começou a ser essencialmente cultivada, tornando-se naturalizada, é popular e localmente conhecida como Ti plant (planta Ti). Em cada uma destas localidades (Bornéu, Nova Guiné, Fiji, Samoa, Nova Zelândia, Havaí, entre outras), os povos nativos passaram a utilizá-la de modo distinto, além da medicina tradicional, revelando uma extensa cultura etnobotânica, profundamente ritualística e religiosa associada à esta espécie.</p><p>O nome do gênero, Cordyline, vem da palavra grega kordyle, que significa cordão, em referência ao aspecto usual de seus rizóforos aéreos; o epíteto específico, fruticosa não tem nada a ver com frutos, como parece sugerir, mas deriva do latim fruticōsus, que significa "com muitos brotos", indicando seu hábito arbustivo.</p><p>&nbsp;</p><p><strong>Fonte: </strong>Sandra Zorat Cordeiro (2020)</p><p><strong>Disponível em:</strong> <a href="http://www.unirio.br/ccbs/ibio/herbariohuni/cordyline-fruticosa-l-a-chev">http://www.unirio.br/ccbs/ibio/herbariohuni/cordyline-fruticosa-l-a-chev</a></p><p><strong>Foto:&nbsp;</strong>Autoria própria do Projeto GreenGo</p>', '../../public/especies/922ba67849bbf2236bd56b5c18e8e9c6.jpg', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 23),
(46, 'Alface d'' água', 'Pistia stratiotes', '<p>&Eacute; uma herb&aacute;cea flutuante livre. Cresce em lagoas e arroios de &aacute;guas tranquilas, podendo sobreviver enraizada em per&iacute;odos de pouca &aacute;gua. Seu principal uso &eacute; ornamental, para lagos pequenos e aqu&aacute;rios. Na natureza &eacute; habitat de pequenos peixes e invertebrados. Se ingerida &eacute; t&oacute;xica, pois cont&eacute;m cristais de oxalato de c&aacute;lcio, podendo causar n&aacute;useas, ardor, v&ocirc;mitos e diarreias.</p>\r\n\r\n<p>Ocorre nos seguintes biomas: Amaz&ocirc;nia, Caatinga, Cerrado, Mata Atl&acirc;ntica, Pantanal.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Fonte:</strong></p>\r\n\r\n<p>SILVEIRA, F. F. Flora Campestre, 2020. Laborat&oacute;rio de Estudos em Vegeta&ccedil;&atilde;o Campestre - UFRGS. Dispon&iacute;vel em: <a href="https://www.ufrgs.br/floracampestre/pistia-stratiotes/">https://www.ufrgs.br/floracampestre/pistia-stratiotes/</a>. Acesso em: 17/9/2023.</p>\r\n\r\n<p><strong>Foto:&nbsp;</strong>Autoria pr&oacute;pria do Projeto GreenGo.</p>\r\n', '../../public/especies/4273bff9ff6b035e06c97571cb63bf64.jpg', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 22),
(47, 'Hibisco vermelho', 'Hibiscus rosa-sinensis', '<p>Nativo da &Aacute;sia Tropical, o <em>Hibiscus rosa-sinensis</em>, mais conhecido apenas como <strong>hibisco</strong>, &eacute; uma esp&eacute;cie extremamente <strong>ornamental</strong> de r&aacute;pido crescimento que, atualmente, pode ser encontrada em qualquer regi&atilde;o tropical do mundo. Sua utiliza&ccedil;&atilde;o com fins paisag&iacute;sticos e ornamentais impulsionou o cruzamento de diferentes variedades, gerando, ao longo de seu cultivo, mais de 5 mil cultivares, com flores e folhas de diferentes cores, tonalidades, tamanhos e texturas, para os mais diversos usos e prefer&ecirc;ncias. Essa esp&eacute;cie se apresenta, originalmente, como um arbusto lenhoso, ramificado, com est&iacute;pulas na base das folhas pecioladas, simples, de filotaxia alterna, margem serrada, de cor verde brilhante na face adaxial e verde opaco com nervuras protuberantes na face abaxial. Suas <strong>flores</strong> s&atilde;o <strong>grandes</strong>, vistosas, solit&aacute;rias, com cal&iacute;culo verde, c&aacute;lice verde gamoss&aacute;palo, corola dialip&eacute;tala, podendo ser de cor branca, salm&atilde;o, r&oacute;sea, vermelha ou amarela. No centro, h&aacute; o caracter&iacute;stico tubo estaminal (ou coluna estaminal), formado pelos filetes dos estames unidos, com o estilete percorrendo o seu interior e com o estigma no &aacute;pice. Por ser considerada um cult&iacute;geno, esta esp&eacute;cie dificilmente apresenta frutos desenvolvidos.&nbsp;</p>\r\n\r\n<p>Al&eacute;m de ornamental e medicinal, o hibisco tamb&eacute;m &eacute; muito utilizado em cerim&ocirc;nias ritual&iacute;sticas: no hindu&iacute;smo, por ser a flor preferida da deusa Kali e do deus Ganesha, &eacute; oferecido a essas divindades no intuito de atrair frequ&ecirc;ncias sutis e benevolentes a quem faz a oferenda. Na tradi&ccedil;&atilde;o dos povos Yorub&aacute;s, os galhos de hibisco s&atilde;o usados como bast&otilde;es de consagra&ccedil;&atilde;o aos orix&aacute;s Eleggu&aacute;, Ogun e Ox&oacute;ssi. No Hava&iacute; e na regi&atilde;o da Polin&eacute;sia, &eacute; muito utilizado para enfeitar ambientes e na recep&ccedil;&atilde;o de turistas, pois acredita-se que tem o poder de promover o Esp&iacute;rito de Aloha, uma maneira de viver e tratar a n&oacute;s mesmos e aos demais com profundo amor e respeito. O hibisco &eacute; ainda a flor nacional da Mal&aacute;sia, onde &eacute; chamada de Bunga raya, da cidade colombiana de Barranquilla, onde &eacute; conhecida como Cayena rosa e do estado venezuelano de Zulia, onde se chama La flor de Zulia.</p>\r\n\r\n<p>O nome do g&ecirc;nero Hibiscus vem do grego ebiskos ou ibiscos, usado pelo grego Dioscorides para plantas semelhantes &agrave; malva (Althaea officinalis), popularmente conhecida como marshmallow (malva-do-p&acirc;ntano); o seu ep&iacute;teto espec&iacute;fico, rosa-sinensis, significa, literalmente, rosa chinesa. Alguns autores justificam como uma refer&ecirc;ncia ao prov&aacute;vel local origem da planta, j&aacute; que n&atilde;o s&atilde;o encontrados registros da planta silvestre. Mesmo no mais antigo livro impresso sobre a flora asi&aacute;tica, com destaque para a regi&atilde;o do Malabar, no sudoeste indiano, o Hortus Indicus Malabaricus, de Rheede, escrito entre os anos de 1678-1693, o hibisco j&aacute; era tratado como uma planta cultivada.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Fonte: </strong>Sandra Zorat Cordeiro (2020).</p>\r\n\r\n<p><strong>Dispon&iacute;vel em:</strong> http://www.unirio.br/ccbs/ibio/herbariohuni/hibiscus-rosa-sinensis-l</p>\r\n\r\n<p><strong>Foto:&nbsp;</strong>Autoria pr&oacute;pria do Projeto GreenGo.</p>\r\n', '../../public/especies/ebc37391c02ef750bdfa3f4f23cb8ee2.jpg', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 22),
(48, 'Fruta-do-sabiá', 'Acnistus arborescens', '<p>Esta planta apresenta uma vasta distribuição geográfica, ocorrendo desde o Caribe e América Central, até a Região Sudeste do Brasil. Geralmente em capoeiras, ou seja, em ambientes em processo de regeneração. Em alguns lugares conhecida também como Marianeira.</p><p>A árvore da Fruta de Sabiá é de baixa estatura, de numerosos e pequenos frutos alaranjados e suculentos. Frutifica da Primavera ao Verão; extremamente atrativa para Pássaros e seu fruto também agrada a muitas espécies de peixes.</p><p>Via de regra é um arbusto de entre 01 e 02 metros, mas que pode chegar as 04 metros, com galhos finos e de madeira leve e pouco resistente. Destaca-se pela abundância de flores brancas em cachos, que logo se transformam em pequenas bagas alaranjadas. Nesta ocasião, fazem a alegria de muitos pássaros, inclusive o sabiá (Turdus rufiventris) que lhe traz fama.</p><p><strong>Atrai:</strong> Sabiás, tico-ticos-rei, saíras, tiês, sanhaços, gaturamos, juritis, chocões-barrados, tucanos, bem-te-vis, entre outros.</p><p>Fácil de cultivar, aprecia solos organo-argilosos e que retenham um pouco de umidade. Precisa de luz solar direta ou indireta para vegetar com vigor. Vai bem climas subtropicais e tropicais, até mesmo em vasos. Inicia sua frutificação em pouco tempo, aproximadamente 08 meses.&nbsp;</p><p>Ela é considerada&nbsp;por alguns epecialistas líder em recuperação de áreas degradas, sendo aconselhada para reflorestamento, recuperando áreas degradadas em curtos períodos de tempo. Seu plantio em beiras de córregos também é permitido.</p><p>&nbsp;</p><p><strong>Fonte: </strong>Site Fruta de Sabiá.</p><p>Disponível em: <a href="http://frutadesabia.com.br/fruta-de-sabia/">https://frutadesabia.com.br/fruta-de-sabia/</a></p>', '../../public/especies/8e981e2af0d094e4196ce07c73b9e120.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 22),
(49, 'Cosmos amarelo', 'Cosmos sulphureus', '<p>Origin&aacute;ria da Am&eacute;rica Central, o cosmos-amarelo &eacute; uma planta herb&aacute;cea, muito ramificada, atingindo, no m&aacute;ximo, 2,0 m de altura. Suas flores, de forte colora&ccedil;&atilde;o amarela-alaranjada s&atilde;o, na verdade, infloresc&ecirc;ncias tipo cap&iacute;tulo, ou seja, muitas flores diminutas organizadas espiraladamente sobre uma base denominada recept&aacute;culo. As &quot;p&eacute;talas&quot; alaranjadas, na verdade, n&atilde;o s&atilde;o p&eacute;talas, mas estruturas que comp&otilde;em uma corola ligulada, cuja fun&ccedil;&atilde;o &eacute; atrair polinizadores.</p>\n\n<p>Muito comum em diversas regi&otilde;es do mundo devido &agrave; facilidade de sua dispers&atilde;o e adapta&ccedil;&atilde;o &eacute;, por vezes, considerada indesejada, embora sua flora&ccedil;&atilde;o proporcione um belo espet&aacute;culo em &aacute;reas abertas. Com comprovado efeito alelop&aacute;tico inibit&oacute;rio sobre outras ervas daninhas, o Cosmos vem sendo estudado como fonte para obten&ccedil;&atilde;o de herbicidas naturais.</p>\n\n<p>A palavra <strong>Cosmos</strong> vem do grego <em>kosmos</em>, que significa <strong>ordem</strong>, disciplina e, de acordo com a Filosofia, refere-se ao universo, organizado de modo regular e integrado. No caso do cosmos-amarelo, uma clara refer&ecirc;ncia &agrave; organiza&ccedil;&atilde;o das suas flores e l&iacute;gulas no cap&iacute;tulo. O nome <em>sulphureus</em> significa da cor do enxofre, no caso, amarelo-alaranjado.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Fonte: </strong>Sandra Zorat Cordeiro (2020).</p>\n\n<p><strong>Dispon&iacute;vel em:</strong> <a href="http://www.unirio.br/ccbs/ibio/herbariohuni/cosmos-sulphureus-cav">http://www.unirio.br/ccbs/ibio/herbariohuni/cosmos-sulphureus-cav</a></p>\n\n<p><strong>Foto:&nbsp;</strong>Autoria pr&oacute;pria do Projeto GreenGo.</p>\n', '../../public/especies/8f91848455313eef3a8138d5a07ad010.jpg', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 22),
(58, 'Brinco-de-Índia', 'Cojoba arborea', '<p>A espécie Cojoba arborea (L.), é uma espécie nativa da América Central e do sul do México, com ocorrência em todo o continente americano (LORENZI et al., 2003). No Brasil, é amplamente utilizada na arborização urbana e na recuperação de áreas degradadas, dada sua alta capacidade de adaptação nos mais diversos ambientes (SALAS et al., 2018).&nbsp;</p><p>De hábito arbóreo, a planta adulta pode atingir até 30 m de altura, 1,0 m de diâmetro e densidade elevada, podendo ser utilizada tanto na construção civil quanto confecção de móveis (PAZ et al., 1999).</p><p>Fonte:</p><p>LORENZI, H.; SOUZA, H. M. de; TORRES, M. A. V.; BACHER, L. B. Árvores exóticas no Brasil: madeiras, ornamentais e aromáticas. Nova Odessa: Editora Plantarum, 2003.</p><p>PAZ, M. H.; SANDOVAL, C. H.; RAMÍREZ, J. A.; ALVAREZ, R. R.; CÁLIX, J. O. Barba de jolote – Cojoba arborea (L.) Brithand Rose. Colección maderas tropicales de Honduras. Lancetilla: PROECEN. 1999. 7 f.</p><p>SALAS, M. M.; MENDONÇA, A. P.; ARAÚJO, M. E. R.; CARVALHO, M. B. F.; MENDEZ, J. J. V.; FROTA, L. P. R.; ALIPAZ, L. M. Germinação de Cojoba arborea Britton &amp; Rose em diferentes substratos. Brazilian Journal of Animal and Environmental Research, v. 1, n. 2, p. 386-394, 2018.</p>', '../../public/especies/d885e9c72107119aedaef8f6dffb2300.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 23);

-- --------------------------------------------------------

--
-- Estrutura para tabela `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
  `idPartida` int(11) NOT NULL,
  `dataInicio` datetime DEFAULT NULL,
  `dataFim` datetime DEFAULT NULL,
  `limiteJogadores` int(11) NOT NULL,
  `tempoPartida` int(11) NOT NULL,
  `nomePartida` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senhaPartida` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Fazendo dump de dados para tabela `partida`
--

INSERT INTO `partida` (`idPartida`, `dataInicio`, `dataFim`, `limiteJogadores`, `tempoPartida`, `nomePartida`, `senhaPartida`, `idUsuario`) VALUES
(75, '2023-09-20 16:57:14', '2023-09-20 17:12:14', 4, 15, 'Trilha MIPEEC', '123', 22),
(131, '2023-11-24 10:47:34', '2023-11-24 10:50:20', 1, 10, 'Banca Final', '12345', 22),
(132, '2023-11-30 14:00:54', '2023-11-30 14:05:45', 4, 10, 'Seminário PPGIES', '12345', 23),
(133, '2023-11-30 15:45:54', '2023-11-30 15:54:39', 4, 15, 'Trilha PPGIES', '12345', 23),
(134, '2024-01-07 18:58:02', '2024-01-07 19:01:15', 1, 15, 'Rio Claro!', '12345', 11),
(135, '2024-02-03 13:10:37', '2024-02-03 13:11:59', 2, 6, 'AAAAAAAA', 'abcde', 11),
(136, '2024-03-12 14:34:20', '2024-03-12 14:35:33', 3, 30, 'Teste Marcela II', '123456', 23),
(137, '2024-05-02 09:13:34', '2024-05-02 09:34:52', 1, 60, 'Partida 1 ', '12345', 22);

-- --------------------------------------------------------

--
-- Estrutura para tabela `partida_equipe`
--

CREATE TABLE IF NOT EXISTS `partida_equipe` (
  `idPartidaEquipe` int(11) NOT NULL,
  `idEquipe` int(11) NOT NULL,
  `idPartida` int(11) NOT NULL,
  `pontuacaoEquipe` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Fazendo dump de dados para tabela `partida_equipe`
--

INSERT INTO `partida_equipe` (`idPartidaEquipe`, `idEquipe`, `idPartida`, `pontuacaoEquipe`) VALUES
(88, 19, 75, 1460),
(89, 17, 75, 940),
(90, 18, 75, 1320),
(173, 22, 131, 110),
(174, 11, 131, NULL),
(175, 9, 131, NULL),
(176, 18, 131, 60),
(180, 11, 132, NULL),
(181, 9, 132, 45),
(182, 10, 132, NULL),
(183, 9, 133, 65),
(184, 10, 133, NULL),
(185, 11, 133, NULL),
(186, 11, 134, 20),
(187, 19, 135, NULL),
(188, 11, 136, NULL),
(189, 9, 136, NULL),
(190, 11, 137, 25);

-- --------------------------------------------------------

--
-- Estrutura para tabela `partida_usuario`
--

CREATE TABLE IF NOT EXISTS `partida_usuario` (
  `idPartidaUsuario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPartidaEquipe` int(11) NOT NULL,
  `plantasLidas` varchar(1000) DEFAULT NULL,
  `pontuacao` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Fazendo dump de dados para tabela `partida_usuario`
--

INSERT INTO `partida_usuario` (`idPartidaUsuario`, `idUsuario`, `idPartidaEquipe`, `plantasLidas`, `pontuacao`) VALUES
(76, 41, 89, '133 | 134 | 136 | 137 | 135 | 138 | 141 | 147 | 146', 235),
(77, 49, 88, '133 | 134 | 135 | 137 | 138 | 142 | 140 | 136 | 139 | 141 | 144 | 145 | 146 | 147', 365),
(78, 44, 88, '133 | 134 | 136 | 135 | 137 | 138 | 142 | 140 | 139 | 141 | 144 | 145 | 146 | 147', 365),
(79, 45, 89, '133 | 134 | 136 | 137 | 135 | 138 | 141 | 147 | 146', 235),
(80, 42, 89, '133 | 134 | 135 | 137 | 136 | 138 | 141 | 147 | 146', 235),
(81, 52, 88, '133 | 134 | 136 | 135 | 137 | 138 | 142 | 140 | 139 | 141 | 144 | 145 | 146 | 147', 365),
(82, 26, 88, '133 | 134 | 136 | 135 | 137 | 138 | 142 | 140 | 139 | 141 | 144 | 145 | 146 | 147', 365),
(83, 47, 90, '133 | 147 | 146 | 145 | 144 | 141 | 139 | 140 | 137 | 135 | 136 | 142 | 138', 335),
(84, 43, 89, '133 | 134 | 135 | 137 | 136 | 138 | 141 | 147 | 146', 235),
(85, 48, 90, '133 | 147 | 146 | 145 | 144 | 141 | 140 | 139 | 138 | 137 | 135 | 136 | 134 | 142', 365),
(86, 46, 90, '134 | 146 | 145 | 144 | 139 | 141 | 140 | 142 | 138 | 137', 255),
(87, 40, 90, '133 | 147 | 146 | 134 | 145 | 144 | 141 | 139 | 140 | 138 | 142 | 137 | 136 | 135', 365),
(109, 9, 176, '133 | 135', 60),
(110, 11, 174, NULL, NULL),
(111, 40, 175, NULL, NULL),
(112, 26, 173, '139 | 166', 110),
(113, 38, 181, '133 | 144', 45),
(114, 38, 183, '144 | 133 | 147', 65),
(115, 63, 186, '133', 20),
(116, 26, 187, NULL, NULL),
(117, 26, 190, ' | 144', 25);

-- --------------------------------------------------------

--
-- Estrutura para tabela `partida_zona`
--

CREATE TABLE IF NOT EXISTS `partida_zona` (
  `idPartidaZona` int(11) NOT NULL,
  `idPartida` int(11) NOT NULL,
  `idZona` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Fazendo dump de dados para tabela `partida_zona`
--

INSERT INTO `partida_zona` (`idPartidaZona`, `idPartida`, `idZona`) VALUES
(72, 75, 47),
(150, 131, 47),
(151, 131, 46),
(153, 132, 47),
(154, 133, 47),
(155, 134, 47),
(156, 135, 46),
(157, 136, 47),
(158, 137, 47);

-- --------------------------------------------------------

--
-- Estrutura para tabela `planta`
--

CREATE TABLE IF NOT EXISTS `planta` (
  `idPlanta` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idEspecie` int(11) NOT NULL,
  `codNumerico` int(11) NOT NULL,
  `imagemPlanta` varchar(200) NOT NULL,
  `pontuacaoPlanta` int(4) NOT NULL,
  `codQR` varchar(5000) DEFAULT NULL,
  `nomeSocial` varchar(60) DEFAULT NULL,
  `historia` text DEFAULT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Fazendo dump de dados para tabela `planta`
--

INSERT INTO `planta` (`idPlanta`, `idZona`, `idEspecie`, `codNumerico`, `imagemPlanta`, `pontuacaoPlanta`, `codQR`, `nomeSocial`, `historia`, `idUsuario`) VALUES
(83, 34, 26, 1606, '../../public/plantas/b5cf3844bc24ad1ba14b1aecc893ee4b.jpeg', 80, '../../public/qrcode/qrcode_1606.png', 'Taioba', '', 23),
(84, 35, 28, 1706, '../../public/plantas/ad0e8ea51bac62b28baa4851b88a9b1b.jpeg', 45, '../../public/qrcode/qrcode_1706.png', 'Lírio-do-brejo', '<p>Este lírio já estava aqui quando chegamos. :)</p>', 23),
(85, 36, 30, 1806, '../../public/plantas/cfdcf591bd4c5a7b08f7503da2699c0a.jpeg', 90, '../../public/qrcode/qrcode_1806.png', 'Extremosa', '<p>A extremosa produz flores em formato de cachos.&nbsp;</p><p>Floresce a partir de novembro, permanecendo em floração até o final do verão.&nbsp;</p><p>Ela foi plantada neste local por conta do baixo porte e das raízes que não se espalham.</p>', 23),
(86, 36, 27, 1906, '../../public/plantas/cd4b265247c09c55a01cc28043480760.jpg', 60, '../../public/qrcode/qrcode_1906.png', 'Ora-pro-nóbis', '<p>Esta é uma PANC com alto teor de proteínas e foi plantada aqui no verão de 2005.</p>', 23),
(88, 37, 23, 1406, '../../public/plantas/6cb7c29b34e3a2865ab24a4e236d5c65.jpeg', 50, '../../public/qrcode/qrcode_1406.png', 'Pitanga', '<p>A pitanga, cientificamente chamada Eugenia uniflora, é uma árvore de porte médio que produz frutos pequenos e arredondados, de cor vermelha quando maduros. Suas frutas são comestíveis e possuem um sabor adocicado e levemente ácido. A pitanga é bastante apreciada tanto pelo seu valor nutricional quanto pelo seu uso na culinária, sendo utilizada em sucos, geleias e sorvetes. Além disso, suas folhas possuem propriedades medicinais e são utilizadas em chás e infusões.</p>', 22),
(89, 37, 24, 1306, '../../public/plantas/b0076c64a2db5f99cb483a69a9068505.jpeg', 25, '../../public/qrcode/qrcode_1306.png', 'ZAzaléia', '<p>A azaleia, conhecida pelo nome científico Rhododendron simsii, é um arbusto de folhagem perene que produz flores vistosas e coloridas, em tons que variam do branco ao rosa, vermelho e lilás. É uma planta muito apreciada como ornamental devido à beleza de suas flores e folhagem. Vale ressaltar que as folhas da azaleia são tóxicas se ingeridas, por isso é importante evitar o consumo pelos animais de estimação e crianças.</p>', 23),
(90, 37, 25, 1206, '../../public/plantas/059add6d7551c333aab384868f0851d0.jpeg', 60, '../../public/qrcode/qrcode_1206.png', 'Vitória-régia', '<p>A vitória-régia, cujo nome científico é Victoria amazonica, é uma planta aquática exótica e emblemática da região amazônica. Suas folhas são grandes e arredondadas, podendo atingir dimensões impressionantes. A vitória-régia é conhecida por suas flores brancas e perfumadas, que desabrocham à noite. É uma planta adaptada a ambientes aquáticos, geralmente encontrada em lagos e rios de águas calmas. Sua beleza e peculiaridades a tornam uma espécie muito apreciada e admirada.</p>', 22),
(91, 37, 22, 1506, '../../public/plantas/62e45a00d9626831aae860553793089d.jpeg', 25, '../../public/qrcode/qrcode_1506.png', 'Ipê Roxo', '<p>O ipê roxo, cujo nome científico é Handroanthus impetiginosus, é uma árvore de porte médio a grande, nativa do Brasil. Possui flores de cor roxa intensa, que surgem em cachos volumosos, criando um espetáculo visual impressionante. Suas flores são conhecidas por atrair polinizadores, como abelhas e borboletas. O ipê roxo é amplamente valorizado por sua beleza ornamental e resistência, sendo utilizado em paisagismo e reflorestamento.</p>', 22),
(133, 47, 38, 5156, '../../public/plantas/e46dc5d3d8b90351f28035328f8ca0e8.jpg', 20, '../../public/qrcode/qrcode_5156.png', 'Caliandra vermelha', '<p>Aqui estaria a hist&oacute;ria dessa planta em nosso campus.</p>\r\n', 23),
(134, 47, 39, 7396, '../../public/plantas/5a387e8805dddc7bfa1db77fa7374aad.jpg', 30, '../../public/qrcode/qrcode_7396.png', 'Ipê-amarelo', '<p>Aqui estar&aacute; a hist&oacute;ria dessa planta em nosso campus.</p>\r\n', 23),
(135, 47, 40, 4903, '../../public/plantas/bcf46f15455e00cd2d7dfdff78826a15.jpg', 40, '../../public/qrcode/qrcode_4903.png', 'Pau-brasil', '<p>Aqui estar&aacute; a hist&oacute;ria dessa planta em nosso campus.</p>\r\n', 23),
(136, 47, 41, 1352, '../../public/plantas/ace9d38d7b847ea4f1360d90513cb03f.jpg', 30, '../../public/qrcode/qrcode_1352.png', 'Palmeira-jerivá', '<p>Aqui estar&aacute; a hist&oacute;ria dessa planta em nosso campu</p>\r\n', 23),
(137, 49, 24, 8394, '../../public/plantas/950cc441c31b5f3a0d04c0598b09cfe4.jpg', 20, '../../public/qrcode/qrcode_8394.png', 'Azaléia', '<p>Aqui estará a história dessa planta em nosso campus.</p>', 23),
(138, 47, 42, 3397, '../../public/plantas/7b303784bf63f5dfc16d20afe8aa0d3b.jpg', 25, '../../public/qrcode/qrcode_3397.png', 'Orquídea Olho de Boneca', '<p>Aqui estar&aacute; a hist&oacute;ria dessa planta em nosso campus.</p>\r\n', 23),
(139, 47, 43, 9254, '../../public/plantas/50ace416462202a7cec066d418c6081a.jpg', 30, '../../public/qrcode/qrcode_9254.png', 'Trapoeraba roxa', '<p>Aqui estar&aacute; a hist&oacute;ria dessa planta em nosso campus.</p>\r\n', 23),
(140, 47, 44, 2901, '../../public/plantas/28cd077a73c37eea226b84e0d8217fab.jpg', 10, '../../public/qrcode/qrcode_2901.png', 'Cóleus', '<p>Aqui estar&aacute; a hist&oacute;ria dessa planta em nosso campus.</p>\r\n', 23),
(141, 47, 45, 7011, '../../public/plantas/696fb0ab84cfd6c44f44b991b16f0ca4.jpg', 20, '../../public/qrcode/qrcode_7011.png', 'Coqueiro-de-vênus', '<p>Aqui estar&aacute; a hist&oacute;ria dessa planta em nosso campus.</p>\r\n', 23),
(142, 47, 23, 2226, '../../public/plantas/8123c92d1badde32f8f21bb1a84749fc.jpg', 25, '../../public/qrcode/qrcode_2226.png', 'Pitangueira', '<p>Aqui estar&aacute; a hist&oacute;ria dessa planta em nosso campus.</p>\r\n', 23),
(144, 47, 46, 6388, '../../public/plantas/47ddc333d6c79c97567c0ba8f969631f.jpg', 25, '../../public/qrcode/qrcode_6388.png', '', '<p>Aqui estará a história dessa planta em nosso campus.</p><figure class="image"><img src="../../public/descricao/Foto 1.png"></figure><p>&nbsp;</p><p>Outra fotinha:</p><p>&nbsp;</p><figure class="image"><img src="../../public/descricao/IMG_5118.jpg"></figure>', 23),
(145, 47, 47, 1963, '../../public/plantas/90bc78479609f560613cd089b0aae862.jpg', 40, '../../public/qrcode/qrcode_1963.png', 'Hibisco vermelho', '<p>Aqui estar&aacute; a hist&oacute;ria dessa planta em nosso campus.</p>\r\n', 23),
(146, 47, 48, 3660, '../../public/plantas/0ff75b6610dfd6ac2fe5361f13c733bc.jpg', 30, '../../public/qrcode/qrcode_3660.png', 'Fruta-do-sabiá', '<p>Aqui estaria a hist&oacute;ria dessa planta em nosso campus.</p>\r\n', 23),
(147, 47, 49, 4641, '../../public/plantas/36978df1d6a00fafd91b78d4e3959780.jpg', 20, '../../public/qrcode/qrcode_4641.png', 'Cosmos amarelo', '<p>Aqui estar&aacute; a hist&oacute;ria dessa planta em nosso campus.</p>\r\n', 23);

-- --------------------------------------------------------

--
-- Estrutura para tabela `planta_questao`
--

CREATE TABLE IF NOT EXISTS `planta_questao` (
  `idPlantaQuestao` int(11) NOT NULL,
  `idQuestao` int(11) NOT NULL,
  `idPlanta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `questao`
--

CREATE TABLE IF NOT EXISTS `questao` (
  `idQuestao` int(11) NOT NULL,
  `descricaoQuestao` varchar(200) NOT NULL,
  `grauDificuldade` enum('facil','medio','dificil') NOT NULL,
  `imagemQuestao` text NOT NULL,
  `idEspecie` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Fazendo dump de dados para tabela `questao`
--

INSERT INTO `questao` (`idQuestao`, `descricaoQuestao`, `grauDificuldade`, `imagemQuestao`, `idEspecie`) VALUES
(7, 'qual é a cor amarela da planta chamda amarela?', 'medio', '../../public/questoes/3c43a3ab0156b3472c25baffca88b8ee.jpeg', 46),
(8, 'um prato de trigo para tres tigres tristes, o rato roeu a roupa do rei de roma', 'facil', '../../public/questoes/1bbdfaa2a747ab719b55fdfcd1c07abe.jpeg', 46),
(9, 'teste supremo hard', 'dificil', '../../public/questoes/68d66c9eb0f1c3dd87dad39e873b2910.jpeg', 46),
(11, 'Pergunta Teste', 'dificil', '../../public/questoes/db6ee18771b4bf253475f51c0aafc4d8.jpg', 46),
(12, 'Pergunta Teste', 'dificil', '../../public/questoes/2980c6f337252a1430d6fc3ba78df6a0.jpg', 46),
(13, 'Gagau', 'medio', '../../public/questoes/115350bb3972885e389acf976ad09c6e.jpg', 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(100) DEFAULT NULL,
  `genero` varchar(20) NOT NULL,
  `escolaridade` varchar(20) NOT NULL,
  `loginUsuario` varchar(30) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `tipoUsuario` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `genero`, `escolaridade`, `loginUsuario`, `email`, `senha`, `tipoUsuario`) VALUES
(9, 'Nikolas Oliveira', 'Masculino', 'Ensino Médio', 'Nikolas', 'nikolas@greengoifpr.com.br', '$2y$10$uznN5Uf4Ies3HXSxKAS1B.qFY7ovlISdcAeCjsOXZcQLaD4ZOcFh6', 2),
(11, 'Amanda Scheer', 'Feminino', 'Ensino Médio', 'Amandapscheer', 'amandapscheer@greengoifpr.com.br', '$2y$10$BJKpTWzQ/PFJ6uN99Nv1gOghdPXKGGvOfHrdmnBw2ZpiW9ffDZGeq', 2),
(22, 'Gabriel Mandelli', 'Masculino', 'Ensino Médio', 'Mandelli', 'mandelli@greengoifpr.com.br', '$2y$10$dCHSclxaFJMlKWerLzsAsOxCq9cSPfy7T0g5WsZqbW7cLYulNXaSK', 2),
(23, 'Marcela Turim Koschevic', 'Feminino', 'Ensino Superior', 'marcela.turim', 'marcela.turim@ifpr.edu.br', '$2y$10$0YZ0j//m.X1Gq95iY6kaEOY0JBcqJ1zk0yo63r0OfAe1wXeXSfPQ2', 2),
(26, 'aluno1', 'Feminino', '9° Ano (EF II)', 'aluno1', 'aluno1@gmail.com', '$2y$10$p0QYFQNrXUCdV49x6LQ53OKoo/2jIolsdIhL4AxwKQFhL6ghmJFWy', 1),
(27, 'Aluno 2', 'Outro', 'Ensino Médio', 'aluno2', 'aluno2@gmail.com', '$2y$10$gzXzvWDfmzO3VtJBBlHuQeag7h5rDfHRIOgmI7X0v5FWzJFYeHswm', 1),
(29, 'Guillermo del Toro Trillo', 'Masculino', 'Ensino Médio', 'Guille', 'guillermotoro61@gmail.com', '$2y$10$./.kcI53zOBQ/fZdqV38KOShY3mx5wjDiCDh0/xuKJTXfvNEH2HAa', 3),
(30, 'João Vitor Damaceno', 'Masculino', 'Ensino Médio', 'JVDamaceno', 'joao.damaceno.ifpr@gmai.com', '$2y$10$ye/o1vSCK3zSezQybAZrfuiioO5mKaQM/M8WY63C83NdCzya9u.LS', 1),
(31, 'Thiago Chan Ortega', 'Masculino', 'Ensino Médio', 'TH', 'thiagoortega.ifpr@gmail.com', '$2y$10$xBLjOCdLDSgYjvmZxYsSFe/ppf.RzZ8nQwh8SfC1WcKROGEZf.WlO', 1),
(32, 'Aluno Amanda Chedar', 'Feminino', 'Ensino Médio', 'amanda', 'amanda@aluno.com.br', '$2y$10$Ua5W6sUVyWkWq7us4VwU..2a5kI3u9plpEuO7N6LaIkDPoZv3cTYW', 1),
(33, 'Antônio Bandeiras', 'Outro', '6° Ano (EF II)', 'antonio', 'antonio@gmail.com', '$2y$10$ERMHESB0FqfaqX26qwJI1OveRcytUsLtUEFfv84tyDhyWugX/7XPW', 1),
(34, 'matheus', 'Masculino', 'Ensino Superior', 'matheus', 'matheus@a', '$2y$10$uGVBDvQ9lYtlO8VuqvbD0.IW/hKPf5GIXunGLcKRSJEraSj4ihPMu', 1),
(35, 'Antonio', 'Masculino', '9° Ano (EF II)', 'Antonio', 'antonio@menis.com', '$2y$10$ZwEMJ57Se09Jn8Jeb87FbuukWKBG4pnjHD.Unkwsk9MlEDYz2SBga', 1),
(36, 'Aluno 3', 'Masculino', 'Ensino Médio', 'aluno3', 'aluno3@gmail.com', '$2y$10$iKQCfDfa9sFADb4RrUP3rOpTDl1NH/fOCsAtoJ415umbl39UWVW0.', 1),
(37, 'Aluno Gabriel Mandela', 'Masculino', 'Ensino Médio', 'mandela', 'mandela@gmail.com', '$2y$10$u76Y1BJ6BDwyyUvv5UroNOop2gmDF/OQArPGI6WU2yvumnIQC4cvW', 3),
(38, 'Marcela Aluno', 'Feminino', 'Ensino Médio', 'alunomarcela', 'alunomarcela@gmail.com', '$2y$10$spu/bqFXtCv.F5UgC9WMg.ZhMTl0f7/OR/aofPBuylOLeSCwRaowO', 1),
(40, 'Annye Miyuki Furuti', 'Outro', 'Ensino Médio', 'Annye', 'annye.furuti@gmail.com', '$2y$10$foCck.R1HzE5hFUcjPDZ6.GRSBbY0ly0.jRWtb6Mb7ZBhfIB0pNLq', 1),
(41, 'Letícia Correa de Araujo ', 'Feminino', 'Ensino Médio', 'Letícia ', 'leticia.araujo.tds2023@gmail.com', '$2y$10$YpDIoTF.Kc9K3NSiErxTKeKdXmEHc50t/5QA/pzDnCeV0uK3E9Vcq', 1),
(42, 'Giovana Kassime De Souza Chaerki ', 'Feminino', 'Ensino Médio', 'Kassime', 'giovana.kassime.tds2023@gmail.com', '$2y$10$F9NhYye1Uh8SnIbNOIp4Dug365T2ajKlgfmgrOPbivFdo9k3NUy2a', 1),
(43, 'Ana Júlia Toledo', 'Feminino', 'Ensino Médio', 'Naju', 'anajulia.toledo.tds2023@gmail.com', '$2y$10$m3sA.a6YgmgaE4NQ9l67se3dvTs8AYZOC22btgYN.UhXsp/IjGSmi', 1),
(44, 'Guillermina', 'Outro', 'Ensino Médio', 'Mina', 'potifibar@gmail.com', '$2y$10$3LUTZIRX0V3E25BJQOKntOylod.SES0.pJIgbxPeO8r7qDymEQHmK', 1),
(45, 'Mayara Navakoviski Machado ', 'Feminino', 'Ensino Médio', 'Maya', 'mayara.navakoviski.tds2023@gmail.com', '$2y$10$Vub4YMERjLYhzCnvNSXHxuJAqNXb1RdydBor9ZqInGbYkrLXIUQy2', 1),
(46, 'Luís Henrique Rodrigues Gomes ', 'Masculino', 'Ensino Médio', 'Luís ', 'luishenriquerg29@gmail.com', '$2y$10$e5PAHu2P3ux2ow.qW23kIOg3m/PJENKhlgtJlu20uP2pt1ldeycyq', 1),
(47, 'Marcelo Henrique de Azevedo Wegner ', 'Masculino', 'Ensino Médio', 'Marcelo ', 'Marcelowegner10@gmail.com', '$2y$10$CSQ7D.NS6yLg0ILOsZxTsOLBYPflIOGHyDBo77EYzmJbGRMeOMiyC', 1),
(48, 'Matheus de Souza Cardoso ', 'Masculino', 'Ensino Médio', 'MatheusCardoso', 'mathcardoso792@gmail.com', '$2y$10$sfiJOiy/a43UtXxFEeQH/O.BrvMilGjX3IQ8Qe0JF9tIeEu5SR05q', 1),
(49, 'El Gabriel', 'Outro', 'Ensino Médio', 'elgabriel', 'gabrielcastro.ifpr@gmail.com', '$2y$10$kTUrg9A37Eyh7i9iX3sBwuZEDqdIwMpXY8HMZ2Jhx5FlhBCGgonsW', 1),
(50, 'Erick Renato Mendes dos Santos ', 'Masculino', 'Ensino Médio', 'Mosquito', 'erickrenatinhomendes@gmail.com', '$2y$10$fLsdWifCS4cZKHxFxnoQw.uHUDu8mULCpXC9MWuAt8CRh4lYWqRlO', 1),
(52, 'Luiz Felipe Basso', 'Masculino', 'Ensino Médio', 'Lukelipe', 'lukelipe.basso@gmail.com', '$2y$10$I.XxtXHM6C4qNs2W.0NKQeAv6yQpUyfHiUTVH3g15ga8x2oPwAu9m', 1),
(53, 'tolga beg', 'Masculino', 'Ensino Superior', 'ztolga', 'tolgabuys@gmail.com', '$2y$10$aWGVYrK3gX7IpGxTXkdiwu3CrV9nhD4V5FeZdb0MpEnQeordKe3ue', 1),
(54, 'Miaumiau', 'Outro', 'Ensino Médio', 'Miau', 'anabeatriz.netto@hotmail.com', '$2y$10$LZSjlhTZTT1UGNiZNYXIremorjBcJwdBKU/ia2dOo1P5RSMYb3T0G', 1),
(55, 'Guilherme Schu', 'Masculino', 'Ensino Superior', 'GuiSchu', 'guilherme.schu.contato@gmail.com', '$2y$10$R4mt9M8t/7WFgAR5KQrUiO3tbw3.F3brRROroYX0tlZTbUJFGoPIO', 1),
(56, 'Marcia Ap Procópio da Silva Scheer', 'Feminino', 'Ensino Superior', 'Maproc', 'maproc@gmail.com', '$2y$10$DmSPu9ZF21ANjgiMQ2zk3ODevMe2NZ53bBWWvSOgN0zvsqMLyE0t6', 1),
(57, 'Thais helena silveira costa ', 'Feminino', 'Ensino Superior', 'Thaïs ', 'thaismusicoterapeuta@hotmail.com', '$2y$10$/tf99bAryggRL92hRTyHT.PKtp6SVA2Z6yda0IcnRy1rZYpWBuK5O', 1),
(58, 'Amanda Romanha', 'Feminino', 'Ensino Médio', 'Amanda Romanha', 'aaromanha@gmail.com', '$2y$10$9uBq6GztJ4lKc2UtbHW.vOOER.GdpiQNtqBDM/eWN/ra/1R37W1Fi', 1),
(59, 'hellen roque ', 'Feminino', 'Ensino Médio', 'helleroque', 'hellen.roque.ifpr@gmail.com', '$2y$10$9mZwP0UYFVCCFD45J6oQB.uv0gqSV2wfXIusUoa.Hbr1DqNCh.jRy', 1),
(61, 'Evandro Cantú', 'Masculino', 'Ensino Superior', 'evandro.cantu', 'evandro.cantu@gmail.com', '$2y$10$NWoG2n642XL2qDdVNBKW9.j29Jf51fs6l6PAe01bDrOBOMzW.tJru', 1),
(62, 'Marco Aurélio Dias souza', 'Masculino', 'Ensino Médio', 'marcoads ', 'marcoads.pessoal@gmail.com', '$2y$10$3iK0//gSui4APWgOYh6hseCHwdM9rQenY9utXRLPhUduKS3kAuO22', 1),
(63, 'Marcelo Barros', 'Masculino', 'Ensino Superior', 'Marcelo', 'mabarros27@gmail.com', '$2y$10$JUyxF8nVsQ7.pSaZyXvfVevs.KQbelnS9TxmWZKsDmWRbATpZcLqe', 1),
(64, 'Harold Merida', 'Masculino', 'Ensino Superior', 'Haroldmg', 'hgmgsony@gmail.com', '$2y$10$VbaFE.63wgfDR2EUGD880uabK2REFDiXBYTwxSWIQeQoOOC6Za0Va', 1),
(65, 'Maria Luiza Ramos Teixeira ', 'Feminino', 'Ensino Médio', 'MariaLTeixeira', 'malurteixeira649@gmail.com', '$2y$10$jKJQSsOf5wjf0ZXXbayhHuUdsc9qvNNboKVty2Sb76Ja4b9MhW0dq', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `zona`
--

CREATE TABLE IF NOT EXISTS `zona` (
  `idZona` int(11) NOT NULL,
  `nomeZona` varchar(60) NOT NULL,
  `qntPlantas` int(11) DEFAULT NULL,
  `pontoZona` int(11) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Fazendo dump de dados para tabela `zona`
--

INSERT INTO `zona` (`idZona`, `nomeZona`, `qntPlantas`, `pontoZona`, `idUsuario`) VALUES
(34, 'Zona 01', 1, 80, 22),
(35, 'Zona 02', 1, 45, 22),
(36, 'Zona 03', 2, 150, 22),
(37, 'Zona Sepin', 4, 160, 22),
(46, 'Zona IFPR', 0, NULL, 11),
(47, 'Trilha MIPEEC', 13, 345, 22),
(49, 'Zona Camomila', 1, 20, 23),
(52, 'Trilha Unila-PTI', NULL, NULL, 23);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `alternativa`
--
ALTER TABLE `alternativa`
  ADD PRIMARY KEY (`idAlternativa`), ADD KEY `fk_alternativa_questao` (`idQuestao`);

--
-- Índices de tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`idEquipe`);

--
-- Índices de tabela `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`idEspecie`), ADD KEY `fk_usuario_especie` (`idUsuario`);

--
-- Índices de tabela `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`idPartida`), ADD KEY `fk_usuario_administrador` (`idUsuario`);

--
-- Índices de tabela `partida_equipe`
--
ALTER TABLE `partida_equipe`
  ADD PRIMARY KEY (`idPartidaEquipe`), ADD KEY `fk_equipe_partida` (`idEquipe`), ADD KEY `fk_partida_equipe` (`idPartida`);

--
-- Índices de tabela `partida_usuario`
--
ALTER TABLE `partida_usuario`
  ADD PRIMARY KEY (`idPartidaUsuario`), ADD KEY `fk_usuario_partidaequipe` (`idPartidaEquipe`), ADD KEY `fk_usuario_partida` (`idUsuario`);

--
-- Índices de tabela `partida_zona`
--
ALTER TABLE `partida_zona`
  ADD PRIMARY KEY (`idPartidaZona`), ADD KEY `fk_zona_partida` (`idZona`), ADD KEY `fk_partida_zona` (`idPartida`);

--
-- Índices de tabela `planta`
--
ALTER TABLE `planta`
  ADD PRIMARY KEY (`idPlanta`), ADD KEY `idZona` (`idZona`), ADD KEY `fkEspecie` (`idEspecie`), ADD KEY `fk_usuario_planta` (`idUsuario`);

--
-- Índices de tabela `planta_questao`
--
ALTER TABLE `planta_questao`
  ADD PRIMARY KEY (`idPlantaQuestao`), ADD KEY `fk_planta` (`idPlanta`), ADD KEY `fk_questao` (`idQuestao`);

--
-- Índices de tabela `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`idQuestao`), ADD KEY `fk_questao_especie` (`idEspecie`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices de tabela `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idZona`), ADD KEY `fk_usuario_zona` (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `alternativa`
--
ALTER TABLE `alternativa`
  MODIFY `idAlternativa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `idEquipe` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de tabela `especie`
--
ALTER TABLE `especie`
  MODIFY `idEspecie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de tabela `partida`
--
ALTER TABLE `partida`
  MODIFY `idPartida` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT de tabela `partida_equipe`
--
ALTER TABLE `partida_equipe`
  MODIFY `idPartidaEquipe` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT de tabela `partida_usuario`
--
ALTER TABLE `partida_usuario`
  MODIFY `idPartidaUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT de tabela `partida_zona`
--
ALTER TABLE `partida_zona`
  MODIFY `idPartidaZona` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT de tabela `planta`
--
ALTER TABLE `planta`
  MODIFY `idPlanta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=176;
--
-- AUTO_INCREMENT de tabela `planta_questao`
--
ALTER TABLE `planta_questao`
  MODIFY `idPlantaQuestao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de tabela `questao`
--
ALTER TABLE `questao`
  MODIFY `idQuestao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de tabela `zona`
--
ALTER TABLE `zona`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `alternativa`
--
ALTER TABLE `alternativa`
ADD CONSTRAINT `fk_alternativa_questao` FOREIGN KEY (`idQuestao`) REFERENCES `questao` (`idQuestao`) ON DELETE CASCADE;

--
-- Restrições para tabelas `especie`
--
ALTER TABLE `especie`
ADD CONSTRAINT `fk_usuario_especie` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Restrições para tabelas `partida`
--
ALTER TABLE `partida`
ADD CONSTRAINT `fk_usuario_administrador` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Restrições para tabelas `partida_equipe`
--
ALTER TABLE `partida_equipe`
ADD CONSTRAINT `fk_equipe_partida` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`idEquipe`),
ADD CONSTRAINT `fk_partida_equipe` FOREIGN KEY (`idPartida`) REFERENCES `partida` (`idPartida`) ON DELETE CASCADE;

--
-- Restrições para tabelas `partida_usuario`
--
ALTER TABLE `partida_usuario`
ADD CONSTRAINT `fk_usuario_partida` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
ADD CONSTRAINT `fk_usuario_partidaequipe` FOREIGN KEY (`idPartidaEquipe`) REFERENCES `partida_equipe` (`idPartidaEquipe`) ON DELETE CASCADE;

--
-- Restrições para tabelas `partida_zona`
--
ALTER TABLE `partida_zona`
ADD CONSTRAINT `fk_partida_zona` FOREIGN KEY (`idPartida`) REFERENCES `partida` (`idPartida`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_zona_partida` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`);

--
-- Restrições para tabelas `planta`
--
ALTER TABLE `planta`
ADD CONSTRAINT `fkEspecie` FOREIGN KEY (`idEspecie`) REFERENCES `especie` (`idEspecie`) ON DELETE CASCADE,
ADD CONSTRAINT `fkZona` FOREIGN KEY (`idZona`) REFERENCES `zona` (`idZona`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_usuario_planta` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Restrições para tabelas `planta_questao`
--
ALTER TABLE `planta_questao`
ADD CONSTRAINT `fk_planta` FOREIGN KEY (`idPlanta`) REFERENCES `planta` (`idPlanta`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_questao` FOREIGN KEY (`idQuestao`) REFERENCES `questao` (`idQuestao`) ON DELETE CASCADE;

--
-- Restrições para tabelas `questao`
--
ALTER TABLE `questao`
ADD CONSTRAINT `fk_questao_especie` FOREIGN KEY (`idEspecie`) REFERENCES `especie` (`idEspecie`);

--
-- Restrições para tabelas `zona`
--
ALTER TABLE `zona`
ADD CONSTRAINT `fk_usuario_zona` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
