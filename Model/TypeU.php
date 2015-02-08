<?php

include_once 'DataBase.php';

class TypeU {

    /**
     * Attributs d'un document
     * (correspondent aux colonnes de la table 'TypeU')
     */
    private $idTypeU, $nomTypeU, $descTypeU;

    public function __construct() {
        
    }

    /**
     * retourne un attribut suivant son nom
     * s'il existe
     * @param $attr_nomTypeU nom de l'attribut
     */
    public function __get($attr_nomTypeU) {
        if (property_exists(__CLASS__, $attr_nomTypeU)) {
            return $this->$attr_nomTypeU;
        }
    }

    /**
     * modifie un attribut suivant son nom
     * et une nouvelle valeur
     * s'il exsite
     * @param $attr_nomTypeU nom de l'attribut
     * @param $attr_val nouvelle valeur de l'attribut
     */
    public function __set($attr_nomTypeU, $attr_val) {
        if (property_exists(__CLASS__, $attr_nomTypeU)) {
            $this->$attr_nomTypeU = $attr_val;
        }
    }

    /**
     * met à jour le tuple de la table 'TypeU'
     * qui correspond à l'objet courant
     * (même idTypeU)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function update() {
        try {
            if (!isset($this->idTypeU)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : update impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "UPDATE TypeU SET nomTypeU = :nomTypeU , descTypeU = :descTypeU WHERE idTypeU = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':nomTypeU', $this->nomTypeU);
            $statement->bindParam(':descTypeU', $this->descTypeU);
            $statement->bindParam(':id', $this->idTypeU);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant update: $trace";
        }
    }

    /**
     * supprime le tuple de la table 'TypeU'
     * qui correspond à l'objet courant
     * (même idTypeU)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function delete() {
        try {
            if (!isset($this->idTypeU)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : delete impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "DELETE TypeU WHERE idTypeU = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $this->idTypeU);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant delete: $trace";
        }
    }

    /**
     * insère le tuple de la table 'TypeU'
     * qui correspond à l'objet courant
     * (même idTypeU)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function insert() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "INSERT INTO TypeU (nomTypeU,descTypeU) VALUES(:nomTypeU,:descTypeU)";
            $statement = $db->prepare($query);
            $statement->bindParam(':nomTypeU', $this->nomTypeU);
            $statement->bindParam(':descTypeU', $this->descTypeU);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insert: $trace";
        }
    }

    /**
     * retourne dans un objet TypeU
     * les informations de la base
     * relative au document dont l'id
     * est celui donné en paramètre
     * @param $id identifiant de l'ariste dans la base
     * @return un objet TypeU rempli avec les informations contenues dans la base
     */
    public static function findById($id) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM TypeU WHERE idTypeU = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet TypeU avec les informations contenues dans le tuple
            $typeD = new TypeU();
            $typeD->idTypeU = $row['idTypeU'];
            $typeD->nomTypeU = $row['nomTypeU'];
            $typeD->descTypeU = $row['descTypeU'];

            // Retour de l'document
            return $typeD;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findById: $trace";
        }
    }

    public static function findByNom($nomTypeU) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM TypeU WHERE nomTypeU LIKE :nomTypeU";
            $statement = $db->prepare($query);
            $str = "%" . $nomTypeU . "%";

            $statement->bindParam(':nomTypeU', $str);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet TypeU avec les informations contenues dans le tuple courant
                $typeD = new TypeU();
                $typeD->idTypeU = $row['idTypeU'];
                $typeD->nomTypeU = $row['nomTypeU'];
                $typeD->descTypeU = $row['descTypeU'];
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
     * retourne dans un tableau d'objets TypeU
     * tous les documents contenus dans la base
     * @return un tableau d'objets TypeU rempli avec les documents contenues dans la base
     */
    public static function findAll() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM TypeU";
            $statement = $db->prepare($query);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet TypeU avec les informations contenues dans le tuple courant
                $typeD = new TypeU();
                $typeD->idTypeU = $row['idTypeU'];
                $typeD->nomTypeU = $row['nomTypeU'];
                $typeD->descTypeU = $row['descTypeU'];
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
