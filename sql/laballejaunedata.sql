-- Contenu de la base de données :  `laballejaune`

-- Contenu de la table categories

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Raquettes'),
(2, 'Chaussures'),
(3, 'Textiles'),
(4, 'Sacs'),
(5, 'Balles');

-- Contenu de la table membres

INSERT INTO `membres` (`id`, `pseudo`, `email`, `password`) VALUES
(1, 'Zyok', 'elasriyass@cy-tech.fr', '123');

-- Contenu de la table produits

INSERT INTO `produits` (`id`, `ref`, `nom`, `prix`, `stock`) VALUES
(1, 'r1', 'Wilson Bkade', 160, 9),
(2, 'r2', 'Babolat Pure Aero', 170, 8),
(3, 'r3', 'Head Radical', 120, 7),
(4, 'r4', 'Prince Premier 110', 140, 6),
(5, 'r5', 'Tecjnifibre TF40', 117, 5),
(6, 'c1', 'Adidas SoleCourt', 160, 9),
(7, 'c2', 'Wilson Kaos 3.0', 140, 8),
(8, 'c3', 'Asics Gel Solution', 95, 5),
(9, 'c4', 'Nike Air Zoom Vapor', 128, 3),
(10, 'c5', 'New Balance V3', 70, 5),
(11, 't1', 'Nike HeadBand', 14, 9),
(12, 't2', 'Nike Court Jacket', 110, 8),
(13, 't3', 'Tee-Shirt Nike AMP', 25, 7),
(14, 't4', 'Short Nike Flex Ace', 36, 4),
(15, 't5', 'Chaussettes Nike', 11, 5),
(16, 's1', 'Sac Prince', 78, 9),
(17, 's2', 'Sac Head', 70, 8),
(18, 's3', 'Sac Wilson', 112, 7),
(19, 's4', 'Sac Babolat', 99, 6),
(20, 's5', 'Sac Tecnifibre', 72, 5),
(26, 'b1', 'Balle Dunlop', 8, 9),
(27, 'b2', 'Balle Head', 7, 8),
(28, 'b3', 'Balle Wilson', 7, 7),
(29, 'b4', 'Balle Babolat', 7, 6),
(30, 'b5', 'Balle Tecnifibre', 5, 5);