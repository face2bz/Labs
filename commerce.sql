-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 04 Mars 2015 à 09:32
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `achats`
--

CREATE TABLE IF NOT EXISTS `achats` (
`id_achat` int(10) unsigned NOT NULL,
  `a_nom_produit` varchar(255) NOT NULL,
  `a_qt` int(11) NOT NULL,
  `a_last_prix` float(11,2) NOT NULL,
  `a_last_date` datetime NOT NULL,
  `id_type_produit` int(10) unsigned NOT NULL,
  `id_membre` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `achats`
--

INSERT INTO `achats` (`id_achat`, `a_nom_produit`, `a_qt`, `a_last_prix`, `a_last_date`, `id_type_produit`, `id_membre`) VALUES
(1, 'Cabochon 12mm', 50, 3.40, '2015-02-16 00:00:00', 1, 1),
(2, 'Cabochon 20mm', 40, 11.99, '2015-02-10 00:00:00', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
`id_config` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `c_nom_societe` varchar(255) NOT NULL DEFAULT 'Nom Société' COMMENT 'Nom de votre entreprise, société',
  `c_description` text NOT NULL COMMENT 'Description de votre société',
  `c_siret` varchar(14) NOT NULL DEFAULT '00000000000000' COMMENT 'Numéro de SIRET',
  `c_date_activite` date NOT NULL COMMENT 'Date du début de votre activité',
  `c_type_activite` varchar(80) NOT NULL COMMENT 'Type d''activité (Commercial, libéral...)',
  `c_ca_t` float(11,2) NOT NULL COMMENT 'Plafond du chiffre d''affaire',
  `c_organisme` varchar(80) NOT NULL COMMENT 'Organisme de retraite (RSI..)',
  `c_plafond` int(11) NOT NULL COMMENT 'Plafond du chiffre d''affaire',
  `c_cotisation` float(11,2) NOT NULL COMMENT 'Taux de cotisation',
  `c_impot` float(11,2) NOT NULL COMMENT 'Taux impôt sur le revenu',
  `c_budget_depart` float(11,2) NOT NULL COMMENT 'Budget de lancement de votre société',
  `c_resultat_banque` float(11,2) NOT NULL COMMENT 'Montant disponible sur votre compte',
  `c_tel` varchar(25) NOT NULL COMMENT 'Numéro de téléphone pro',
  `c_accre` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Si ACCRE valeur à 1 sinon 0 par defaut',
  `c_adresse` varchar(255) NOT NULL COMMENT 'Adresse de la société',
  `c_logo` varchar(255) NOT NULL COMMENT 'Logo de la société',
  `c_avatar` varchar(255) NOT NULL COMMENT 'Avatar de la personne',
  `c_site` varchar(255) NOT NULL COMMENT 'Site internet',
  `c_pseudo` varchar(255) NOT NULL COMMENT 'Pseudo de la personne',
  `c_email_societe` varchar(255) NOT NULL COMMENT 'Email de contact de la societe',
  `c_email_perso` varchar(255) NOT NULL COMMENT 'Email perso',
  `c_nom` varchar(255) NOT NULL COMMENT 'Votre nom',
  `c_prenom` varchar(255) NOT NULL COMMENT 'Votre prénom',
  `c_phrase_secret` varchar(255) NOT NULL COMMENT 'Phrase secret proposé',
  `c_phrase_verif` varchar(255) NOT NULL COMMENT 'Vérification du résultat de la phrase secréte',
  `c_password` varchar(60) NOT NULL COMMENT 'Password du portail',
  `c_valide` tinyint(1) NOT NULL COMMENT 'Valide le site',
  `c_taux_paypal` float(11,2) NOT NULL COMMENT 'Taux en % demandé par PayPal',
  `c_montant_paypal` float(11,2) NOT NULL COMMENT 'Montant demandé par PayPal',
  `c_taux_payplug` float(11,2) NOT NULL COMMENT 'Taux en % demandé par PayPlug',
  `c_montant_payplug` float(11,2) NOT NULL COMMENT 'Montant demandé par PayPlug',
  `c_check_paypal` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Sur 1 PayPal est utilisé',
  `c_check_payplug` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Sur 1 PayPlug est utilisé'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

--
-- Contenu de la table `configurations`
--

INSERT INTO `configurations` (`id_config`, `id_membre`, `c_nom_societe`, `c_description`, `c_siret`, `c_date_activite`, `c_type_activite`, `c_ca_t`, `c_organisme`, `c_plafond`, `c_cotisation`, `c_impot`, `c_budget_depart`, `c_resultat_banque`, `c_tel`, `c_accre`, `c_adresse`, `c_logo`, `c_avatar`, `c_site`, `c_pseudo`, `c_email_societe`, `c_email_perso`, `c_nom`, `c_prenom`, `c_phrase_secret`, `c_phrase_verif`, `c_password`, `c_valide`, `c_taux_paypal`, `c_montant_paypal`, `c_taux_payplug`, `c_montant_payplug`, `c_check_paypal`, `c_check_payplug`) VALUES
(1, 1, 'Little Owl', 'Description de votre société', '000 000 000 00', '2015-01-01', '', 82200.00, '', 0, 0.00, 0.00, 1.00, 1.00, '2164261', 0, '13 Rue du Général Beuret Paris, France', '', '', 'http://monsite.fr', '', 'contact@monsite.fr', '', 'Dupont', 'Jean', '', '', '', 0, 0.00, 0.00, 0.00, 0.00, 0, 0),
(2, 2, 'Moltes', 'Description de votre société', '000 000 000 00', '2015-01-01', '', 82200.00, '', 0, 0.00, 0.00, 1.00, 1.00, '2164261', 0, '13 Rue du Général Beuret Paris, France', '', '', 'http://monsite.fr', '', 'contact@monsite.fr', '', 'Dupont', 'Jean', '', '', '', 0, 0.00, 0.00, 0.00, 0.00, 0, 0),
(3, 3, 'AnCat Corp', 'Description de votre société', '000 000 000 00', '2015-01-01', '', 82200.00, '', 0, 0.00, 0.00, 1.00, 1.00, '2164261', 0, '13 Rue du Général Beuret Paris, France', '', '', 'http://monsite.fr', '', 'contact@monsite.fr', '', 'Dupont', 'Jean', '', '', '', 0, 0.00, 0.00, 0.00, 0.00, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE IF NOT EXISTS `fournisseurs` (
`id_fournisseur` int(11) NOT NULL,
  `f_nom` varchar(80) NOT NULL COMMENT 'Nom du fournisseur',
  `f_ref` varchar(255) NOT NULL DEFAULT '000000' COMMENT 'Référence du fournisseur',
  `f_email` varchar(255) NOT NULL DEFAULT 'email@email.fr',
  `f_site` varchar(255) NOT NULL DEFAULT 'http://site.fr' COMMENT 'Lien du site du fournisseur',
  `f_tel` varchar(30) NOT NULL DEFAULT '0102030405' COMMENT 'Numéro de téléphone du fournisseur',
  `f_fax` varchar(30) NOT NULL DEFAULT '0102030405' COMMENT 'Fax du fournisseur',
  `f_commentaire` text NOT NULL COMMENT 'Commentaire sur le fournisseur',
  `f_pays` varchar(60) NOT NULL DEFAULT 'Inconnu' COMMENT 'Pays du fournisseur',
  `f_logo` varchar(255) NOT NULL COMMENT 'Logo du fournisseur',
  `f_adresse` varchar(255) NOT NULL DEFAULT 'Inconnu' COMMENT 'Adresse du du fournisseur',
  `f_code_postal` varchar(10) NOT NULL,
  `f_ville` varchar(255) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32;

--
-- Contenu de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fournisseur`, `f_nom`, `f_ref`, `f_email`, `f_site`, `f_tel`, `f_fax`, `f_commentaire`, `f_pays`, `f_logo`, `f_adresse`, `f_code_postal`, `f_ville`, `id_membre`) VALUES
(1, 'Hema', '', '', '', '', '', '', '', '', '', '', '', 3),
(2, 'Polo', '', '', '', '', '', '', '', '', '', '', '', 1),
(3, 'Hema', '', '', '', '0000000', '', '', '', '', '', '', '', 1),
(4, 'Marco', '', '', '', '', '', '', 'FR', '', '', '', '', 1),
(5, 'Polo', '', '', '', '', '', '', 'FR', '', '', '', '', 2),
(6, 'Lidl', '', '', '', '', '', '', 'FR', '', '', '', '', 1),
(7, 'Salutation', '', '', '', '', '', '', 'FR', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `historiques`
--

CREATE TABLE IF NOT EXISTS `historiques` (
`id_h` int(11) NOT NULL,
  `h_page` varchar(255) NOT NULL,
  `h_date` datetime NOT NULL,
  `h_type` varchar(255) NOT NULL,
  `h_description` text NOT NULL,
  `h_ip` varchar(255) NOT NULL,
  `h_id_membre` int(10) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf32;

--
-- Contenu de la table `historiques`
--

INSERT INTO `historiques` (`id_h`, `h_page`, `h_date`, `h_type`, `h_description`, `h_ip`, `h_id_membre`) VALUES
(1, 'Ajout d''un fournisseur', '2015-02-27 17:03:02', '2', 'Ajout du fournisseur Hema', '127.0.0.1', 3),
(2, 'Ajout d''un fournisseur', '2015-02-27 17:12:48', '2', 'Ajout du fournisseur Polo', '127.0.0.1', 1),
(3, 'Ajout d''un fournisseur', '2015-02-27 21:12:30', '2', 'Ajout du fournisseur Hema', '127.0.0.1', 1),
(4, 'Ajout d''un fournisseur', '2015-02-27 21:17:14', '2', 'Ajout du fournisseur Marco', '127.0.0.1', 1),
(5, 'Ajout d''un fournisseur', '2015-02-27 21:50:54', '2', 'Ajout du fournisseur Polo', '127.0.0.1', 2),
(6, 'Ajout d''un fournisseur', '2015-02-27 23:49:18', '2', 'Ajout du fournisseur Lidl', '127.0.0.1', 1),
(7, 'Ajout d''un fournisseur', '2015-02-27 23:51:59', '2', 'Ajout du fournisseur Salutation', '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
`id_membre` int(11) NOT NULL,
  `m_nom_utilisateur` varchar(20) NOT NULL,
  `m_nom` varchar(20) NOT NULL,
  `m_prenom` varchar(20) NOT NULL,
  `m_password` varchar(255) NOT NULL,
  `m_email_pro` varchar(30) NOT NULL,
  `m_email_perso` varchar(30) NOT NULL,
  `m_date_inscription` datetime NOT NULL,
  `m_rang` int(11) NOT NULL DEFAULT '2',
  `m_valide` tinyint(1) NOT NULL,
  `m_key` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `m_nom_utilisateur`, `m_nom`, `m_prenom`, `m_password`, `m_email_pro`, `m_email_perso`, `m_date_inscription`, `m_rang`, `m_valide`, `m_key`) VALUES
(1, 'Jeranders', '', '', '8b317bd482b09ba8e7280c9c5cce83e7cd6066da', '', 'brechoire.j@gmail.com', '2015-02-19 10:52:15', 2, 1, '260219422188f771c39cc4ffeb08e28cc856a758189153db6587c94fd04e96d92a69a656f5e8d90e862e6Jeranders49097274e03bcb97f5ce55f3cab9d844f59261a808f71fdb'),
(2, 'Moltes', '', '', '8b317bd482b09ba8e7280c9c5cce83e7cd6066da', '', 'moltes@moltes.fr', '2015-02-27 17:00:04', 2, 1, '0990cd204056cac826b501958a42bddbd908192a621823db6587c94fd04e96d92a69a656f5e8d90e862e6Moltes42588755e03bcb97f5ce55f3cab9d844f59261a808f71fdb'),
(3, 'AnCat', '', '', '8b317bd482b09ba8e7280c9c5cce83e7cd6066da', '', 'ancat@ancat.fr', '2015-02-27 17:02:40', 2, 1, '81e3864e7b4b6d7f0e60495d9c81d3e100b5df71429443db6587c94fd04e96d92a69a656f5e8d90e862e6AnCat16967494e03bcb97f5ce55f3cab9d844f59261a808f71fdb');

-- --------------------------------------------------------

--
-- Structure de la table `produit_c`
--

CREATE TABLE IF NOT EXISTS `produit_c` (
`id_produit_c` int(11) NOT NULL,
  `pc_nom` varchar(255) NOT NULL COMMENT 'Nom du produit',
  `pc_ref` varchar(255) NOT NULL COMMENT 'Reférence du produit',
  `pc_type_produit` int(11) NOT NULL COMMENT 'id du type de produit',
  `pc_image` varchar(255) NOT NULL COMMENT 'Image du produit',
  `pc_dernier_prix` float(11,2) NOT NULL COMMENT 'Prix de la dernière commande',
  `pc_derniere_date` date NOT NULL COMMENT 'Date de la dernière commande',
  `pc_derniere_quantite` int(11) NOT NULL COMMENT 'Dernière quantité commandé',
  `pc_description` text NOT NULL COMMENT 'Description du produit',
  `pc_commentaire` text NOT NULL COMMENT 'Commentaire sur le produit',
  `pc_dernier_fournisseur` int(11) NOT NULL COMMENT 'id du dernier fournisseur de la dernière commande'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32 COMMENT='Produit consommable ';

--
-- Contenu de la table `produit_c`
--

INSERT INTO `produit_c` (`id_produit_c`, `pc_nom`, `pc_ref`, `pc_type_produit`, `pc_image`, `pc_dernier_prix`, `pc_derniere_date`, `pc_derniere_quantite`, `pc_description`, `pc_commentaire`, `pc_dernier_fournisseur`) VALUES
(1, 'Cabochon en verre 18mm', 'CABO18', 1, '', 3.30, '2015-01-05', 20, 'Cabochon en verre de taille 18mm', 'Très bon produit', 2);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
`id_test` int(11) NOT NULL,
  `budget` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id_test`, `budget`) VALUES
(1, 89),
(2, 91066615),
(3, 440000000),
(4, 20),
(5, 2147483647),
(6, 20),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 5),
(12, 65),
(13, 65);

-- --------------------------------------------------------

--
-- Structure de la table `type_produit`
--

CREATE TABLE IF NOT EXISTS `type_produit` (
`id_type_produit` int(11) NOT NULL,
  `tp_nom` varchar(255) NOT NULL COMMENT 'Nom du type de produit',
  `tp_description` text NOT NULL COMMENT 'Description du type de produit'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32;

--
-- Contenu de la table `type_produit`
--

INSERT INTO `type_produit` (`id_type_produit`, `tp_nom`, `tp_description`) VALUES
(1, 'Cabochon', 'Cabochon :\r\n\r\nProduit qui permet de faire un effet loupe sur un dessin.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `achats`
--
ALTER TABLE `achats`
 ADD PRIMARY KEY (`id_achat`);

--
-- Index pour la table `configurations`
--
ALTER TABLE `configurations`
 ADD PRIMARY KEY (`id_config`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
 ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `historiques`
--
ALTER TABLE `historiques`
 ADD PRIMARY KEY (`id_h`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
 ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `produit_c`
--
ALTER TABLE `produit_c`
 ADD PRIMARY KEY (`id_produit_c`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
 ADD PRIMARY KEY (`id_test`);

--
-- Index pour la table `type_produit`
--
ALTER TABLE `type_produit`
 ADD PRIMARY KEY (`id_type_produit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `achats`
--
ALTER TABLE `achats`
MODIFY `id_achat` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `configurations`
--
ALTER TABLE `configurations`
MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `historiques`
--
ALTER TABLE `historiques`
MODIFY `id_h` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `produit_c`
--
ALTER TABLE `produit_c`
MODIFY `id_produit_c` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `type_produit`
--
ALTER TABLE `type_produit`
MODIFY `id_type_produit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
