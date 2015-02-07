<?php

include_once 'DataBase.php';

class TypeD {

    /**
     * Attributs d'un document
     * (correspondent aux colonnes de la table 'TypeD')
     */
    private $idTypeD, $nomTypeD, $descTypeD;

    public function __construct() {
        
    }

    /**
     * retourne un attribut suivant son nom
     * s'il existe
     * @param $attr_nomTypeD nom de l'attribut
     */
    public function __get($attr_nomTypeD) {
        if (property_exists(__CLASS__, $attr_nomTypeD)) {
            return $this->$attr_nomTypeD;
        }
    }

    /**
     * modifie un attribut suivant son nom
     * et une nouvelle valeur
     * s'il exsite
     * @param $attr_nomTypeD nom de l'attribut
     * @param $attr_val nouvelle valeur de l'attribut
     */
    public function __set($attr_nomTypeD, $attr_val) {
        if (property_exists(__CLASS__, $attr_nomTypeD)) {
            $this->$attr_nomTypeD = $attr_val;
        }
    }

    /**
     * met à jour le tuple de la table 'TypeD'
     * qui correspond à l'objet courant
     * (même idTypeD)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function update() {
        try {
            if (!isset($this->idTypeD)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : update impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "UPDATE TypeD SET nomTypeD = :nomTypeD , descTypeD = :descTypeD WHERE idTypeD = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':nomTypeD', $this->nomTypeD);
            $statement->bindParam(':descTypeD', $this->descTypeD);
            $statement->bindParam(':id', $this->idTypeD);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant update: $trace";
        }
    }

    /**
     * supprime le tuple de la table 'TypeD'
     * qui correspond à l'objet courant
     * (même idTypeD)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function delete() {
        try {
            if (!isset($this->idTypeD)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : delete impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "DELETE TypeD WHERE idTypeD = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $this->idTypeD);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant delete: $trace";
        }
    }

    /**
     * insère le tuple de la table 'TypeD'
     * qui correspond à l'objet courant
     * (même idTypeD)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function insert() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "INSERT INTO TypeD (nomTypeD,descTypeD) VALUES(:nomTypeD,:descTypeD)";
            $statement = $db->prepare($query);
            $statement->bindParam(':nomTypeD', $this->nomTypeD);
            $statement->bindParam(':descTypeD', $this->descTypeD);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insert: $trace";
        }
    }

    /**
     * retourne dans un objet TypeD
     * les informations de la base
     * relative au document dont l'id
     * est celui donné en paramètre
     * @param $id identifiant de l'ariste dans la base
     * @return un objet TypeD rempli avec les informations contenues dans la base
     */
    public static function findById($id) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM TypeD WHERE idTypeD = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet TypeD avec les informations contenues dans le tuple
            $typeD = new TypeD();
            $typeD->idTypeD = $row['idTypeD'];
            $typeD->nomTypeD = $row['nomTypeD'];
            $typeD->descTypeD = $row['descTypeD'];

            // Retour de l'document
            return $typeD;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findById: $trace";
        }
    }

    public static function findByNom($nomTypeD) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM TypeD WHERE nomTypeD LIKE :nomTypeD";
            $statement = $db->prepare($query);
            $str = "%" . $nomTypeD . "%";

            $statement->bindParam(':nomTypeD', $str);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet TypeD avec les informations contenues dans le tuple courant
                $typeD = new TypeD();
                $typeD->idTypeD = $row['idTypeD'];
                $typeD->nomTypeD = $row['nomTypeD'];
                $typeD->descTypeD = $row['descTypeD'];
                $tab[] = $typeD;
            }

            // Retour du tableau de tracks
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findByName: $trace";
        }
    }

    /**
     * retourne dans un tableau d'objets TypeD
     * tous les documents contenus dans la base
     * @return un tableau d'objets TypeD rempli avec les documents contenues dans la base
     */
    public static function findAll() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM TypeD";
            $statement = $db->prepare($query);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet TypeD avec les informations contenues dans le tuple courant
                $typeD = new TypeD();
                $typeD->idTypeD = $row['idTypeD'];
                $typeD->nomTypeD = $row['nomTypeD'];
                $typeD->descTypeD = $row['descTypeD'];
                $tab[] = $typeD;
            }

            // Retour du tableau d'document
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findAll: $trace";
        }
    }

}
