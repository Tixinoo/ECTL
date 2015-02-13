<?php

include_once 'DataBase.php';

class Utilisateur {

    /**
     * Attributs d'un utilisateur
     * (correspondent aux colonnes de la table 'Utilisateur')
     */
    private $idU, $pseudoU, $mdpU, $nomU, $prenomU, $telU, $emailU, $urlAvatarU;

    public function __construct() {
        
    }

    /**
     * retourne un attribut suivant son nom
     * s'il existe
     * @param $attr_pseudoU nom de l'attribut
     */
    public function __get($attr_pseudoU) {
        if (property_exists(__CLASS__, $attr_pseudoU)) {
            return $this->$attr_pseudoU;
        }
    }

    /**
     * modifie un attribut suivant son nom
     * et une nouvelle valeur
     * s'il exsite
     * @param $attr_pseudoU nom de l'attribut
     * @param $attr_val nouvelle valeur de l'attribut
     */
    public function __set($attr_pseudoU, $attr_val) {
        if (property_exists(__CLASS__, $attr_pseudoU)) {
            $this->$attr_pseudoU = $attr_val;
        }
    }

    /**
     * met à jour le tuple de la table 'Utilisateur'
     * qui correspond à l'objet courant
     * (même idU)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function update() {
        try {
            if (!isset($this->idU)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : update impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "UPDATE Utilisateur SET pseudoU = :pseudoU , mdpU = :mdpU, nomU = :nomU, prenomU = :prenomU, telU = :telU, emailU = :emailU, urlAvatarU = :urlAvatarU WHERE idU = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':pseudoU', $this->pseudoU);
            $statement->bindParam(':mdpU', $this->mdpU);
            $statement->bindParam(':nomU', $this->nomU);
            $statement->bindParam(':prenomU', $this->prenomU);
            $statement->bindParam(':telU', $this->telU);
            $statement->bindParam(':emailU', $this->emailU);
            $statement->bindParam(':urlAvatarU', $this->urlAvatarU);
            $statement->bindParam(':id', $this->idU);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant update: $trace";
        }
    }

    /**
     * supprime le tuple de la table 'Utilisateur'
     * qui correspond à l'objet courant
     * (même idU)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function delete() {
        try {
            if (!isset($this->idU)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : delete impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "DELETE Utilisateur WHERE idU = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $this->idU);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant delete: $trace";
        }
    }

    /**
     * insère le tuple de la table 'Utilisateur'
     * qui correspond à l'objet courant
     * (même idU)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function insert() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "INSERT INTO Utilisateur (pseudoU,mdpU,nomU,prenomU,telU,emailU,urlAvatarU) VALUES(:pseudoU,:mdpU,:nomU,:prenomU,:telU,:emailU,:urlAvatarU)";
            $statement = $db->prepare($query);
            $statement->bindParam(':pseudoU', $this->pseudoU);
            $statement->bindParam(':mdpU', $this->mdpU);
            $statement->bindParam(':nomU', $this->nomU);
            $statement->bindParam(':prenomU', $this->prenomU);
            $statement->bindParam(':telU', $this->telU);
            $statement->bindParam(':emailU', $this->emailU);
            $statement->bindParam(':urlAvatarU', $this->urlAvatarU);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insert: $trace";
        }
    }
    
    public function insertType($idtypeU) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "INSERT INTO DocumentType (idD,idtypeU) VALUES(:idD,:idtypeU)";
            $statement = $db->prepare($query);
            $statement->bindParam(':idD', $this->idU);
            $statement->bindParam(':idtypeU', $idtypeU);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insertType: $trace";
        }
    }

    public function idTypeUs() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM UtilisateurType WHERE idU = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $this->idU);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un tableau avec tous les types (sous forme de leur id) de l'utilisateur
                $tab[] = $row['idTypeU'];
            }

            // Retour du tableau d'utilisateur
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findAll: $trace";
        }
    }

    /**
     * retourne dans un objet Utilisateur
     * les informations de la base
     * relative au utilisateur dont l'id
     * est celui donné en paramètre
     * @param $id identifiant de l'ariste dans la base
     * @return un objet Utilisateur rempli avec les informations contenues dans la base
     */
    public static function findById($id) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Utilisateur WHERE idU = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet Utilisateur avec les informations contenues dans le tuple
            $utilisateur = new Utilisateur();
            $utilisateur->idU = $row['idU'];
            $utilisateur->pseudoU = $row['pseudoU'];
            $utilisateur->mdpU = $row['mdpU'];
            $utilisateur->nomU = $row['nomU'];
            $utilisateur->prenomU = $row['prenomU'];
            $utilisateur->telU = $row['telU'];
            $utilisateur->emailU = $row['emailU'];
            $utilisateur->urlAvatarU = $row['urlAvatarU'];

            // Retour de l'utilisateur
            return $utilisateur;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findById: $trace";
        }
    }

    public static function findByPseudoU($pseudoU) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Utilisateur WHERE pseudoU = :pseudoU";
            $statement = $db->prepare($query);

            $statement->bindParam(':pseudoU', $pseudoU);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet Utilisateur avec les informations contenues dans le tuple
            $utilisateur = new Utilisateur();
            $utilisateur->idU = $row['idU'];
            $utilisateur->pseudoU = $row['pseudoU'];
            $utilisateur->mdpU = $row['mdpU'];
            $utilisateur->nomU = $row['nomU'];
            $utilisateur->prenomU = $row['prenomU'];
            $utilisateur->telU = $row['telU'];
            $utilisateur->emailU = $row['emailU'];
            $utilisateur->urlAvatarU = $row['urlAvatarU'];

            // Retour de l'utilisateur
            return $utilisateur;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findByName: $trace";
        }
    }

    /**
     * retourne dans un tableau d'objets Utilisateur
     * tous les utilisateurs contenus dans la base
     * @return un tableau d'objets Utilisateur rempli avec les utilisateurs contenues dans la base
     */
    public static function findAll() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Utilisateur";
            $statement = $db->prepare($query);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Utilisateur avec les informations contenues dans le tuple courant
                $utilisateur = new Utilisateur();
                $utilisateur->idU = $row['idU'];
                $utilisateur->pseudoU = $row['pseudoU'];
                $utilisateur->mdpU = $row['mdpU'];
                $utilisateur->nomU = $row['nomU'];
                $utilisateur->prenomU = $row['prenomU'];
                $utilisateur->telU = $row['telU'];
                $utilisateur->emailU = $row['emailU'];
                $utilisateur->urlAvatarU = $row['urlAvatarU'];
                $tab[] = $utilisateur;
            }

            // Retour du tableau d'utilisateur
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findAll: $trace";
        }
    }

    /**
     * retourne dans un tableau d'objets Utilisateur
     * tous les utilisateurs contenus dans la base
     * @return un tableau d'objets Utilisateur rempli avec les utilisateurs contenues dans la base
     */
    public static function findByIdTypeU($idtypeu) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Utilisateur NATURAL JOIN UtilisateurType WHERE idTypeU = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $idtyped);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Utilisateur avec les informations contenues dans le tuple courant
                $utilisateur = new Utilisateur();
                $utilisateur->idU = $row['idU'];
                $utilisateur->pseudoU = $row['pseudoU'];
                $utilisateur->mdpU = $row['mdpU'];
                $utilisateur->nomU = $row['nomU'];
                $utilisateur->prenomU = $row['prenomU'];
                $utilisateur->telU = $row['telU'];
                $utilisateur->emailU = $row['emailU'];
                $utilisateur->urlAvatarU = $row['urlAvatarU'];
                $tab[] = $utilisateur;
            }

            // Retour du tableau d'utilisateur
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findByIdTypeU: $trace";
        }
    }

}
