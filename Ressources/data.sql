-- Table Document
-- -> stocke toutes les informations relatives aux documents
INSERT INTO `Document` (`idD`, `nomD`, `descD`, `contenuD`, `urlD`, `publication_idp`) VALUES
(1, 'Manuel Conducteur', 'Ce manuel conducteur rassemble l''ensemble des consignes et des bonnes pratiques que doivent suivrent chacun des conducteurs de la société.', 'MANUEL CONDUCTEUR (2014)Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet hendrerit lectus. Ut vulputate sit amet nunc sit amet pretium. Mauris vitae pretium orci. Etiam molestie, leo elementum bibendum tempus, ante ligula lobortis justo, eget lobortis lorem nibh sit amet odio. Nam vel lorem ac ante elementum auctor. Nam egestas felis purus, at gravida diam congue a. Donec convallis hendrerit pulvinar. Fusce sagittis elementum sem et ultricies. Proin nec fringilla felis, non bibendum risus. Praesent ac metus vestibulum, gravida justo vitae, molestie tellus. Integer purus dui, pretium lacinia dui eu, dictum fermentum dolor. Nulla id fringilla leo. Sed eleifend tincidunt ante ornare rutrum. Mauris tellus odio, porttitor eu auctor vel, bibendum a nisl. Aliquam quam magna, vulputate id tristique et, rutrum non erat. Morbi cursus placerat dapibus.Proin justo nulla, convallis rutrum varius ut, scelerisque in enim. Vivamus velit sapien, bibendum at libero in, semper accumsan nunc. Praesent ipsum mauris, ornare accumsan rhoncus at, rhoncus ac eros. In mauris turpis, ultrices ut efficitur eu, imperdiet vitae erat. Ut ac lorem finibus, molestie nibh et, fermentum eros. Nulla tristique libero vel blandit interdum. Sed ac mauris lobortis, malesuada velit sed, feugiat odio. Sed at malesuada velit. Nullam rutrum luctus est non lobortis. In in faucibus ante. Morbi consectetur eros nec posuere ultrices. Nulla efficitur placerat leo quis dignissim.Ut nulla nibh, faucibus id dui at, luctus efficitur enim. Quisque lorem turpis, pellentesque et eros in, tempus vehicula erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed mi neque, accumsan sit amet facilisis luctus, condimentum sit amet dolor. Ut auctor justo vestibulum ex commodo ultricies. Nulla consequat elit ut enim blandit bibendum. Phasellus bibendum erat nisi, sit amet aliquet elit ullamcorper in. Aliquam id quam dapibus, sollicitudin nisi in, vehicula nisi. Nulla facilisi.Donec augue odio, suscipit sed consectetur et, rhoncus semper elit. Integer nisl purus, ultrices ac magna ut, placerat ornare nisi. Ut accumsan purus lacus, quis viverra quam semper at. Morbi fermentum velit in augue efficitur tincidunt. Etiam ultricies pharetra dolor sed gravida. Praesent egestas sapien nisi. Vivamus laoreet dui quis ullamcorper ultrices. Aliquam non nulla id augue venenatis lacinia. Ut risus metus, suscipit sed dapibus a, volutpat id neque. Ut ultricies, purus ut pharetra scelerisque, nunc ante cursus eros, non euismod dui nibh id quam. Maecenas iaculis nisi ut elit consectetur, in pellentesque arcu molestie. Proin magna metus, interdum eu ultricies at, porttitor sed ante. Vestibulum sit amet arcu sit amet augue faucibus accumsan. Mauris a mollis libero.Donec vitae tincidunt dui, a varius elit. Suspendisse ornare quam orci, eget posuere enim dapibus sit amet. Aliquam quis lectus nec justo consequat consectetur at at felis. Nullam elementum euismod mi. Vestibulum eget velit nec nunc laoreet ultrices quis at tortor. Suspendisse et enim quis erat mollis porttitor id id magna. Phasellus dignissim quam ut erat convallis ornare. Donec et magna rutrum, sodales mauris ut, sollicitudin tortor. Nam eros nisi, faucibus cursus mauris quis, vestibulum ullamcorper velit. Integer posuere auctor eros, non congue lacus faucibus at. Pellentesque. ', 'http://www.education.gov.yk.ca/pdf/pdf-test.pdf', NULL),
(2, 'Flash Info 01/2015', 'Ce document est le Flash Info de janvier 2015.', 'Flash Info 01/2015 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet hendrerit lectus. Ut vulputate sit amet nunc sit amet pretium. Mauris vitae pretium orci. Etiam molestie, leo elementum bibendum tempus, ante ligula lobortis justo, eget lobortis lorem nibh sit amet odio. Nam vel lorem ac ante elementum auctor. Nam egestas felis purus, at gravida diam congue a. Donec convallis hendrerit pulvinar. Fusce sagittis elementum sem et ultricies. Proin nec fringilla felis, non bibendum risus. Praesent ac metus vestibulum, gravida justo vitae, molestie tellus. Integer purus dui, pretium lacinia dui eu, dictum fermentum dolor. Nulla id fringilla leo. Sed eleifend tincidunt ante ornare rutrum. Mauris tellus odio, porttitor eu auctor vel, bibendum a nisl. Aliquam quam magna, vulputate id tristique et, rutrum non erat. Morbi cursus placerat dapibus.Proin justo nulla, convallis rutrum varius ut, scelerisque in enim. Vivamus velit sapien, bibendum at libero in, semper accumsan nunc. Praesent ipsum mauris, ornare accumsan rhoncus at, rhoncus ac eros. In mauris turpis, ultrices ut efficitur eu, imperdiet vitae erat. Ut ac lorem finibus, molestie nibh et, fermentum eros. Nulla tristique libero vel blandit interdum. Sed ac mauris lobortis, malesuada velit sed, feugiat odio. Sed at malesuada velit. Nullam rutrum luctus est non lobortis. In in faucibus ante. Morbi consectetur eros nec posuere ultrices. Nulla efficitur placerat leo quis dignissim. ', 'http://www.education.gov.yk.ca/pdf/pdf-test.pdf', NULL),
(3, 'Réglementation XYZ', 'Ceci est la réglementation XYZ pour les conducteurs ABCD.', 'Réglementation XYZ Ut nulla nibh, faucibus id dui at, luctus efficitur enim. Quisque lorem turpis, pellentesque et eros in, tempus vehicula erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed mi neque, accumsan sit amet facilisis luctus, condimentum sit amet dolor. Ut auctor justo vestibulum ex commodo ultricies. Nulla consequat elit ut enim blandit bibendum. Phasellus bibendum erat nisi, sit amet aliquet elit ullamcorper in. Aliquam id quam dapibus, sollicitudin nisi in, vehicula nisi. Nulla facilisi.Donec augue odio, suscipit sed consectetur et, rhoncus semper elit. Integer nisl purus, ultrices ac magna ut, placerat ornare nisi. Ut accumsan purus lacus, quis viverra quam semper at. Morbi fermentum velit in augue efficitur tincidunt. Etiam ultricies pharetra dolor sed gravida. Praesent egestas sapien nisi. Vivamus laoreet dui quis ullamcorper ultrices. Aliquam non nulla id augue venenatis lacinia. Ut risus metus, suscipit sed dapibus a, volutpat id neque. Ut ultricies, purus ut pharetra scelerisque, nunc ante cursus eros, non euismod dui nibh id quam. Maecenas iaculis nisi ut elit consectetur, in pellentesque arcu molestie. Proin magna metus, interdum eu ultricies at, porttitor sed ante. Vestibulum sit amet arcu sit amet augue faucibus accumsan. Mauris a mollis libero. ', 'http://www.education.gov.yk.ca/pdf/pdf-test.pdf', NULL);

-- Table DocumentType
-- -> fait le lien entre un document et son type
-- EXEMPLE :
-- Ici, le document d'id 1 (manuel conducteur) est un document dont le type a pour id 1 (Référence)
-- Ici, le document d'id 2 (flashinfo 01/2015) est un document dont le type a pour id 2 (Flash Info)
INSERT INTO `DocumentType` (`idD`, `idTypeD`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- Table Droit
-- -> définit les droits pour chaque type d'utilisateur
-- EXEMPLE :
-- Ici, les utilisateurs dont le type a pour id 1 (administratueur) ont les droits suivants sur les documents dont le type a pour id 1 (référence) : publication, modification, suppression, commentaire.
-- Ici, les utilisateurs dont le type a pour id 2 (conducteur) ont les droits suivant sur les documents dont le type a pour id 3 (réglementation) : rien.
INSERT INTO `Droit` (`idTypeU`, `idTypeD`, `publication`, `modification`, `suppression`, `commentaire`) VALUES
(1, 1, 1, 1, 1, 1),
(1, 2, 1, 1, 1, 1),
(1, 3, 1, 1, 1, 1),
(2, 1, 0, 0, 0, 0),
(2, 2, 0, 0, 0, 0),
(2, 3, 0, 0, 0, 0);

-- Table TypeD
-- -> définit les différents types de documents
INSERT INTO `TypeD` (`idTypeD`, `nomTypeD`, `descTypeD`) VALUES
(1, 'Référence', 'Documents de référence pour la société.'),
(2, 'Flash Info', 'Flash Info, publiés tous les mois.'),
(3, 'Réglementation', 'Réglementations respectées par la société.');

-- Table TypeU
-- -> définit les différents types d'utilisateurs
INSERT INTO `TypeU` (`idTypeU`, `nomTypeU`, `descTypeU`) VALUES
(1, 'Administrateur', 'Administrateur de l''espace.'),
(2, 'Conducteur', 'Conducteur de la société.');

-- Table Utilisateur
-- -> stocke toutes les informations relatives aux utilisateurs
INSERT INTO `Utilisateur` (`idU`, `pseudoU`, `mdpU`, `nomU`, `prenomU`, `telU`, `emailU`, `urlAvatarU`) VALUES
(1, 'Tixinoo', 'toto', 'Nosal', 'Antoine', '+33632281849', 'antoine.nosal@gmail.com', 'http://icons.iconarchive.com/icons/yellowicon/game'),
(2, 'Tamok', 'toto', 'Engeln', 'Jonathan', '+33616841762', 'nautiluce@gmail.com', 'http://icons.iconarchive.com/icons/sonya/swarm/128'),
(3, 'Conducteur', 'toto', 'Monsieur', 'Conducteur', '+33612345678', 'conducteur@mail.com', 'http://icons.iconarchive.com/icons/sonya/swarm/128');

-- Table UtilisateurType
-- -> fait le lien entre un utilisateur et son type
-- EXEMPLE :
-- Ici, l'utilisateur d'id 1 (Tixinoo) est un utilisateur donc le type a pour id 1 (Administrateur)
-- Ici, l'utilisateur d'id 3 (Conducteur) est un utilisateur donc le type a pour id 2 (Conducteur)
INSERT INTO `UtilisateurType` (`idU`, `idTypeU`) VALUES
(1, 1),
(2, 1),
(3, 2);
