CREATE DATABASE IF NOT EXISTS instagru;
USE instagru;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
 `id_user` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `mail` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 `preference` tinyint(1) NOT NULL DEFAULT '1',
 `token` varchar(255) NULL,
 `confirm` tinyint(1) NOT NULL DEFAULT '0'
);

--
-- Structure de la table `image`
--
CREATE TABLE `image` (
 `id_image` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `date` date NOT NULL
);

--
-- Structure de la table `like`
--
CREATE TABLE `like` (
 `id_user` int(11) NOT NULL,
 `id_image` int(11) NOT NULL
);

--
-- Structure de la table `comment`
--
CREATE TABLE `comment` (
 `id_user` int(11) NOT NULL,
 `id_image` int(11) NOT NULL,
 `content` text NOT NULL
);

-- --------------------------------------------------------
--
-- Index pour la table `like`
--
ALTER TABLE `like`
  ADD KEY `FK_id_user` (`id_user`),
  ADD KEY `FK_id_image` (`id_image`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD KEY `FK_id_user` (`id_user`),
  ADD KEY `FK_id_image` (`id_image`);


-- --------------------------------------------------------
--
-- Contraintes pour la table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `FK_id_user_like` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_id_image_like` FOREIGN KEY (`id_image`) REFERENCES `image` (`id_image`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_id_user_comment` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_id_image_comment` FOREIGN KEY (`id_image`) REFERENCES `image` (`id_image`);
