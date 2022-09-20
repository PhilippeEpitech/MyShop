-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 20 sep. 2022 à 12:16
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `my_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'chaussure ', 1),
(2, 'sweat-shirt', 2),
(3, 'tee-shirt', 3);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` text,
  `photo` text NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `photo`, `category_id`) VALUES
(1, 'Nike Air Max 90', '149.99', 'Il n\'existe rien d’aussi aérien, confortable et inégalé. La Nike Air Max 90 reste fidèle au modèle original, avec sa semelle extérieure à motif gaufré emblématique, ses renforts cousus et ses détails classiques en plastique moulé. Les couleurs vives apportent une touche stylée, tandis que l’amorti Max Air vous offre un confort optimal.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/7062746c-5f0c-44e6-8cce-80b50cc07bcf/chaussure-air-max-90-pour-SlFTWq.png', 1),
(2, 'Nike Air Max 90 SE', '149.99', 'Apportez une touche sauvage à cette véritable pièce de collection. La Nike Air Max 90 SE reste fidèle au modèle original avec sa semelle extérieure à motif gaufré emblématique, ses renforts cousus et ses détails classiques en TPU. L\'empeigne patchwork présente un mélange de tissus texturés qui s\'associent à des imprimés animaux pour révéler votre style indomptable.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/e3169504-c77c-453c-92fa-d2296efd5ecd/chaussure-air-max-90-se-pour-JFn245.png', 1),
(3, 'Nike Air Max Plus 3', '179.99', 'Revendiquez votre côté rebelle avec la Nike Air Max Plus 3, un modèle Tuned Air qui revisite la sneaker OG de 1998 avec des lignes futuristes et des tissus résistants conçus pour la jungle urbaine. Reprenant les détails en plastique classiques du modèle d\'origine, ce modèle affiche un look dégradé et intègre un amorti Air visible, pour vous offrir une foulée confortable et un look futuriste.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/ac4960a6-fe53-44cb-b4ee-b5ac07325001/chaussure-air-max-plus-3-pour-9j8t5J.png', 1),
(5, 'Chaussure de sport Nike Air 1 SP', '149.99', 'Conçue pour vous emmener partout, la Cross Trainer original de 1987 vous permet désormais d\'arpenter les rues de la ville de long en large en toute confiance. Certains détails comme le strap à l\'avant-pied permettent de conserver le look rétro que vous aimez, tandis que les motifs réfléchissants et les touches irisées vous aident à rester visible. Alors, où vont vous conduire vos chaussures de sport ?', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/d81731df-eacb-47bc-887b-781e70db1e10/chaussure-de-sport-air-1-sp-pour-bPPvrx.png', 1),
(7, 'Nike Air Pegasus 83', '99.99', 'Voyagez en première classe sans réservation avec la Nike Air Pegasus 83 Premium. Offrant une touche d\'héritage running, un zeste de style rétro et une bonne dose de confort, c\'est votre modèle de prédilection pour des performances éprouvées. Grâce au daim et au tissu résistant rappelant le style de l\'époque, elle est facile à porter. Le rembourrage confortable et le cuir épuré au niveau de la cheville donnent l\'impression d\'être installé dans son fauteuil préféré. Nul besoin d\'un avion pour vous déplacer. Il vous suffit de lacer vos sneakers pour arriver à destination dans un look tendance.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/2d981421-9885-45ff-87df-796cfd9ea791/chaussure-air-pegasus-83-pour-hq200x.png', 1),
(8, 'Nike LeBron 9', '239.99', 'Tout a commencé avec le basketball. Enfin, peut-être. Quoi qu\'il en soit, cette sneaker inspirée du « Big Bang » (sortie lors du All-Star Weekend de 2012) revisite un modèle emblématique dans un style intergalactique. L\'empeigne orange explosive affiche un style qui se démarque, tandis que la semelle extérieure phosphorescente apporte la touche finale à ce look cosmique.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/8c8029a3-2763-4bcd-b491-bec522deaffe/chaussure-lebron-9-pour-cp3Z88.png', 1),
(9, 'Nike Air Max 97', '179.99', 'Affichant les ondulations emblématiques du modèle d\'origine inspiré des trains à grande vitesse japonais, la Nike Air Max 97 affiche un style fulgurant qui en met plein la vue.Elle reprend l\'unité Nike Air révolutionnaire sur toute la longueur qui a secoué le monde du running, et ajoute des matières tendance pour vous permettre d\'évoluer dans le plus grand confort.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/8cb12b09-5b67-4890-86aa-561ea6c858af/chaussure-air-max-97-pour-Bc9BgR.png', 1),
(10, 'Air Jordan Legacy 312 Low', '139.99', 'La Air Jordan Legacy 312 Low rend hommage au parcours de Michael Jordan, en arborant le code postal 312 de Chicago. Ce modèle associe à sa façon tous les éléments emblématiques de Jordan.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/9bfad942-8485-4cf7-8953-e7fe1272bc91/chaussure-air-jordan-legacy-312-low-pour-GbnrhZ.png', 1),
(11, 'Nike Sportswear Tech Fleece', '119.99', 'Prêt à porter la chaleur et le confort de votre sweat-shirt à capuche préféré, mais tout en gardant un look épuré ? Le sweat à capuche Nike Sportswear Tech Fleece trouve l\'équilibre parfait avec un modèle léger et discret qui vous permet de rester au chaud sans ajouter de volume. Facile à superposer tant à la maison que dans les bouchons.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/8e3828a9-b1b1-4a51-94c5-3e4ef66b2333/sweat-a-capuche-a-zip-sportswear-tech-fleece-pour-kC99j3.png', 2),
(12, 'Nike Dri-FIT', '99.99', 'Ce sweat à capuche a tout bon : l\'apparence de votre pull préféré à l\'extérieur et un tissu haute performance doux à l\'intérieur, l\'idéal lorsque vous vous donnez à fond sur le green. Avec notre sweat à capuche Dri-FIT à coupe décontractée, vous bénéficiez d\'une chaleur optimale et d\'un confort absolu par temps froid, tandis que la capuche vous assure une protection supplémentaire.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/240a6a96-08d4-4a2f-be93-35f8339f1037/sweat-a-capuche-de-golf-dri-fit-pour-lkKxk1.png', 2),
(14, 'Nike Sportswear Tech Fleece', '114.99', 'Prêt à porter la chaleur et le confort de votre sweat-shirt à capuche préféré, mais tout en gardant un look épuré ? Le sweat à capuche Nike Sportswear Tech Fleece trouve l\'équilibre parfait avec un modèle léger et discret qui vous permet de rester au chaud sans ajouter de volume. Facile à superposer tant à la maison que dans les bouchons.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/063c5841-2bee-4d23-8b54-5656f6be2508/sweat-a-capuche-a-zip-sportswear-tech-fleece-pour-P7whj5.png', 2),
(15, 'Sweat-shirt de danse', '69.99', 'Échauffez-vous, récupérez ou détendez-vous avec notre sweat-shirt oversize. Ample au niveau du corps et des hanches, ce modèle vous offre suffisamment d\'espace pour que vous puissiez vous étirer et bouger dans le plus grand confort et réussir les chorégraphies les plus folles. Les couleurs juxtaposées revisitent ce vêtement doux et incontournable en mettant l\'accent sur le logo Swoosh.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/6d7aef40-161e-4bf6-a7f4-bc05a0fdb702/sweat-shirt-de-danse-ultra-oversize-en-tissu-fleece-sportswear-F7qnFJ.png', 2),
(17, 'Nike Solo Swoosh', '89.99', 'La collection Solo Swoosh met en valeur la simplicité épurée de nos modèles classiques.Ce sweat à capuche emblématique associe la sensation de douceur d\'un tissu Fleece premium à une coupe ample, pour créer un modèle décontracté, confortable et facile à porter.', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/6d59b9b7-0ee2-4857-825d-64dcc3238764/haut-camouflage-en-tissu-fleece-solo-swoosh-pour-pb2xZS.png', 2),
(18, 'test', '12.00', '', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/939c8738-9c1a-4a23-a85f-833cd33151a5/tee-shirt-sportswear-pour-GzhZwP.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `admin`) VALUES
(40, 'admin', '$2y$10$9GO09i0KEJIYhHOQ/69l9eIKQK9.S6sEpPNMooK9iJDdqV18tEiHa', 'admin@admin.fr', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
