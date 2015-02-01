<?php

class DataBase {
    
    private static $db;
    
    /*
     * Constructeur vide
     */
    public function __construct() {}
    
    /*
     * Retourne un objet de type PDO
     * représentant une connexion à la base
     * décrite dans le fichier de configuration
     * 'seadili-db.ini'
     */
    public static function connect() {
        try {
            
            // Création d'un tableau contenant les informations
            // contenue dans le fichier de configuration
            $ini = parse_ini_file("ectl-db.ini");
            
            // Création du dsn depuis les informations recueillies
            $dsn= $ini['driver'] . ":host=" . $ini['host'] . ";dbname=" . $ini['dbname'];
            
            // Création de l'instance PDO
            $db = new PDO($dsn, $ini['username'], $ini['password']);
            
            // Configuration de l'encodage
            $db->exec("SET CHARACTER SET utf8");
            
            return $db;
        } catch (PDOException $e) {
            throw new Exception("Connection: $dsn ".$e->getMessage(). '<br/>');
        }
    }
    
    public static function getConnection() {
        if (isset(self::$db)) {
            return self::$db;
        } else {
            self::$db = self::connect();
            return self::$db;
        }
    }
    
}