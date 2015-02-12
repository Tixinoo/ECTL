<?php

include_once 'DataBase.php';

class Document {

    /**
     * Attributs d'un document
     * (correspondent aux colonnes de la table 'Document')
     */
    private $idD, $nomD, $descD, $contenuD, $urlD, $publication_idp;

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
     * met à jour le tuple de la table 'Document'
     * qui correspond à l'objet courant
     * (même idD)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function update() {
        try {
            if (!isset($this->idD)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : update impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "UPDATE Document SET nomD = :nomD , descD = :descD, contenuD = :contenuD, urlD = :urlD, publication_idp = :publication_idp WHERE idD = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':nomD', $this->name);
            $statement->bindParam(':descD', $this->descD);
            $statement->bindParam(':contenuD', $this->contenuD);
            $statement->bindParam(':urlD', $this->urlD);
            $statement->bindParam(':publication_idp', $this->publication_idp);
            $statement->bindParam(':id', $this->idD);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant update: $trace";
        }
    }

    /**
     * supprime le tuple de la table 'Document'
     * qui correspond à l'objet courant
     * (même idD)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function delete() {
        try {
            if (!isset($this->idD)) {
                throw new Exception(__CLASS__ . " : Clé primaire non définie : delete impossible");
            }

            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "DELETE Document WHERE idD = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $this->idD);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant delete: $trace";
        }
    }

    /**
     * insère le tuple de la table 'Document'
     * qui correspond à l'objet courant
     * (même idD)
     * @return Booléen à TRUE en cas de succés, FALSE en cas d'échec
     * @throws Exception si problème pendant exécution de la méthode
     */
    public function insert() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "INSERT INTO Document (nomD,descD,contenuD,urlD,publication_idp) VALUES(:nomD,:descD,:contenuD,:urlD,:publication_idp)";
            $statement = $db->prepare($query);
            $statement->bindParam(':nomD', $this->nomD);
            $statement->bindParam(':descD', $this->descD);
            $statement->bindParam(':contenuD', $this->contenuD);
            $statement->bindParam(':urlD', $this->urlD);
            $statement->bindParam(':publication_idp', $this->publication_idp);

            // Exécution de la requête préparée
            $res = $statement->execute();

            //    $document->idD = PDO::lastInsertId();
            $this->idD = $db->lastInsertId();

            $this->insertPublication();

            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insert: $trace";
        }
    }

    public function insertPublication() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            session_start();

            $dateP = date('Y/m/d H:i:s');
            $commentP = "";
            $idU = $_SESSION['idU'];

            // Création de la requête préparée
            $query = "INSERT INTO Publication (dateP,commentP,idU,document_idd) VALUES(:dateP,:commentP,:idU,:document_idd)";
            $statement = $db->prepare($query);
            $statement->bindParam(':dateP', $dateP);
            $statement->bindParam(':commentP', $commentP);
            $statement->bindParam(':idU', $idU);
            $statement->bindParam(':document_idd', $this->idD);

            // Exécution de la requête préparée
            $res = $statement->execute();
            
            //Mise à jour du document
            $db->exec("UPDATE Document SET publication_idp='" . $db->lastInsertId() . "' WHERE idD='" . $this->idD . "'");
            
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insert: $trace";
        }
    }

    public function insertType($idTypeD) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "INSERT INTO DocumentType (idD,idTypeD) VALUES(:idD,:idTypeD)";
            $statement = $db->prepare($query);
            $statement->bindParam(':idD', $this->idD);
            $statement->bindParam(':idTypeD', $idTypeD);

            // Exécution de la requête préparée
            $res = $statement->execute();
            return $res;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant insertType: $trace";
        }
    }

    /**
     * retourne dans un objet Document
     * les informations de la base
     * relative au document dont l'id
     * est celui donné en paramètre
     * @param $id identifiant de l'ariste dans la base
     * @return un objet Document rempli avec les informations contenues dans la base
     */
    public static function findById($id) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Document WHERE idD = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);

            // Exécution de la requête préparée
            $statement->execute();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un objet Document avec les informations contenues dans le tuple
            $document = new Document();
            $document->idD = $row['idD'];
            $document->nomD = $row['nomD'];
            $document->descD = $row['descD'];
            $document->contenuD = $row['contenuD'];
            $document->urlD = $row['urlD'];
            $document->publication_idp = $row['publication_idp'];

            // Retour de l'document
            return $document;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findById: $trace";
        }
    }

    public static function findByNom($nomD) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Document WHERE nomD LIKE :nomD";
            $statement = $db->prepare($query);
            $str = "%" . $nomD . "%";

            $statement->bindParam(':nomD', $str);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Document avec les informations contenues dans le tuple courant
                $document = new Document();
                $document->idD = $row['idD'];
                $document->nomD = $row['nomD'];
                $document->descD = $row['descD'];
                $document->contenuD = $row['contenuD'];
                $document->urlD = $row['urlD'];
                $document->publication_idp = $row['publication_idp'];
                $tab[] = $document;
            }

            // Retour du tableau de tracks
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findByName: $trace";
        }
    }

    /**
     * retourne dans un tableau d'objets Document
     * tous les documents contenus dans la base
     * @return un tableau d'objets Document rempli avec les documents contenues dans la base
     */
    public static function findAll() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Document";
            $statement = $db->prepare($query);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Document avec les informations contenues dans le tuple courant
                $document = new Document();
                $document->idD = $row['idD'];
                $document->nomD = $row['nomD'];
                $document->descD = $row['descD'];
                $document->contenuD = $row['contenuD'];
                $document->urlD = $row['urlD'];
                $document->publication_idp = $row['publication_idp'];
                $tab[] = $document;
            }

            // Retour du tableau d'document
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findAll: $trace";
        }
    }

    /**
     * retourne dans un tableau d'objets Document
     * tous les documents contenus dans la base
     * @return un tableau d'objets Document rempli avec les documents contenues dans la base
     */
    public static function findByIdTypeD($idtyped) {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Document NATURAL JOIN DocumentType WHERE idTypeD = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $idtyped);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();
            // Tant que des lignes sont retournées
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Remplissage d'un objet Document avec les informations contenues dans le tuple courant
                $document = new Document();
                $document->idD = $row['idD'];
                $document->nomD = $row['nomD'];
                $document->descD = $row['descD'];
                $document->contenuD = $row['contenuD'];
                $document->urlD = $row['urlD'];
                $document->publication_idp = $row['publication_idp'];
                $tab[] = $document;
            }

            // Retour du tableau d'document
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findByIdTypeD: $trace";
        }
    }

    public function findPublication() {
        try {
            // Récupération d'une connexion à la base
            $db = DataBase::getConnection();

            // Création de la requête préparée
            $query = "SELECT * FROM Publication WHERE idP = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $this->publication_idp);

            // Exécution de la requête préparée
            $statement->execute();

            $tab = Array();

            // Récupération du tuple correspondant à l'id en paramètre
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Remplissage d'un tableau contenant les informations de la publication
            $tab["idP"] = $row['idP'];
            $tab["dateP"] = $row['dateP'];
            $tab["commentP"] = $row['commentP'];
            $tab["idU"] = $row['idU'];

            // Retour du tableau d'document
            return $tab;
        } catch (Exception $e) {
            $trace = $e->getTrace();
            echo "Erreur pendant findByIdTypeD: $trace";
        }
    }

}
