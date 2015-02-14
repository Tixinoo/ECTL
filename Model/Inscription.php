<?php

include_once 'DataBase.php';

class Inscription {

    /**
     * Attributs d'un inscription
     * (correspondent aux colonnes de la table 'Inscription')
     */
    private $idI, $codeI, $validiteI, $idU, $idTypeU;

    public function __construct() {
        
    }

    /**
     * retourne un attribut suivant son nom
     * s'il existe
     * @param $attr_name nom de l'attribut
     */
    public function __get($attr_name) {
        if (property_exists(__CLASS__, $attr_name)) {
            return $this->$attr_name;
        }
    }

    /**
     * modifie un attribut suivant son nom
     * et une nouvelle valeur
     * s'il exsite
     * @param $attr_name nom de l'attribut
     * @param $attr_val nouvelle valeur de l'attribut
     */
    public function __set($attr_name, $attr_val) {
        if (property_exists(__CLASS__, $attr_name)) {
            $this->$attr_name = $attr_val;
        }
    }

    /**
     * met à jour le tuple de la table 'Inscription'
     * qui correspond à l'objet courant
     * (même idI)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function update() {
        try {
            if (!isset($this->idI)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : update impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "UPDATE Inscription SET codeI = :codeI , validiteI = :validiteI, idU = :idU, idTypeU = :idTypeU WHERE idI = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':codeI', $this->name);
            $statement->bindParam(':validiteI', $this->validiteI);
            $statement->bindParam(':idU', $this->idU);
            $statement->bindParam(':idTypeU', $this->idTypeU);
            $statement->bindParam(':id', $this->idI);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant update: $trace";
        }
    }

    /**
     * supprime le tuple de la table 'Inscription'
     * qui correspond à l'objet courant
     * (même idI)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function delete() {
        try {
            if (!isset($this->idI)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : delete impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "DELETE FROM Inscription WHERE idI = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $this->idI);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant delete: $trace";
        }
    }

    /**
     * insère le tuple de la table 'Inscription'
     * qui correspond à l'objet courant
     * (même idI)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function insert() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "INSERT INTO Inscription (codeI,validiteI,idU,idTypeU) VALUES(:codeI,:validiteI,:idU,:idTypeU)";
            $statement = $db->prepare($query);
            $statement->bindParam(':codeI', $this->codeI);
            $statement->bindParam(':validiteI', $this->validiteI);
            $statement->bindParam(':idU', $this->idU);
            $statement->bindParam(':idTypeU', $this->idTypeU);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insert: $trace";
        }
    }

    /**
     * retourne dans un objet Inscription
     * les informations de la base
     * relative au inscription dont l'id
     * est celui donné en paramètre
     * @param $id identifiant de l'ariste dans la base
     * @return un objet Inscription rempli avec les informations contenues dans la base
     */
    public static function findById($id) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Inscription WHERE idI = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet Inscription avec les informations contenues dans le tuple
            $inscription = new Inscription();
            $inscription->idI = $row['idI'];
            $inscription->codeI = $row['codeI'];
            $inscription->validiteI = $row['validiteI'];
            $inscription->idU = $row['idU'];
            $inscription->idTypeU = $row['idTypeU'];

            // Retour de l'inscription
            return $inscription;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findById: $trace";
        }
    }

    public static function findByCode($codeI) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();
            
            // Création de la requête préparée
            $query = "SELECT * FROM Inscription WHERE codeI = :codeI";
            $statement = $db->prepare($query);

            $statement->bindParam(':codeI', $codeI);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet Inscription avec les informations contenues dans le tuple courant
            $inscription = new Inscription();
            $inscription->idI = $row['idI'];
            $inscription->codeI = $row['codeI'];
            $inscription->validiteI = $row['validiteI'];
            $inscription->idU = $row['idU'];
            $inscription->idTypeU = $row['idTypeU'];
            
            // Retour du tableau de tracks
            return $inscription;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findByName: $trace";
        }
    }

    /**
     * retourne dans un tableau d'objets Inscription
     * tous les inscriptions contenus dans la base
     * @return un tableau d'objets Inscription rempli avec les inscriptions contenues dans la base
     */
    public static function findAll() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Inscription";
            $statement = $db->prepare($query);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Inscription avec les informations contenues dans le tuple courant
                $inscription = new Inscription();
                $inscription->idI = $row['idI'];
                $inscription->codeI = $row['codeI'];
                $inscription->validiteI = $row['validiteI'];
                $inscription->idU = $row['idU'];
                $inscription->idTypeU = $row['idTypeU'];
                $tab[] = $inscription;
            }

            // Retour du tableau d'inscription
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findAll: $trace";
        }
    }

    /**
     * retourne dans un tableau d'objets Inscription
     * tous les inscriptions contenus dans la base
     * @return un tableau d'objets Inscription rempli avec les inscriptions contenues dans la base
     */
    public static function findByIdTypeU($idtypeu) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Inscription NATURAL JOIN TypeU WHERE idTypeU = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $idtypeu);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Inscription avec les informations contenues dans le tuple courant
                $inscription = new Inscription();
                $inscription->idI = $row['idI'];
                $inscription->codeI = $row['codeI'];
                $inscription->validiteI = $row['validiteI'];
                $inscription->idU = $row['idU'];
                $inscription->idTypeU = $row['idTypeU'];
                $tab[] = $inscription;
            }

            // Retour du tableau d'inscription
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findByIdTypeU: $trace";
        }
    }

}
