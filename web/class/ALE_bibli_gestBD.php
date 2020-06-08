<?php

namespace GestBD {

    use PDO;
    use PDOException;

    class ConnexionBD
    {
        var $ip, $nomBD, $utilisateur, $motDePasse;

        function __construct($uneIp, $unNomBD, $unUtilisateur, $unMotDePasse)
        {
            $this->ip = $uneIp;
            $this->nomBD = $unNomBD;
            $this->utilisateur = $unUtilisateur;
            $this->motDePasse = $unMotDePasse;
        }

        function connexion()
        {
            try {
                return new PDO('mysql:dbname=' . $this->nomBD . ';host=' . $this->ip, $this->utilisateur, $this->motDePasse);
            } catch (PDOException $e) {
                echo 'Connexion échouée : ' . $e->getMessage();
            }
        }
    }

    class RequeteBD
    {
        var $Connexion;

        function __construct(ConnexionBD $maConnexion)
        {
            $this->Connexion = $maConnexion;
        }

        private function queryRequest($uneRequeteSQL)
        {
            return $this->Connexion->connexion()->query($uneRequeteSQL);
        }

        function listeEleves()
        {
            $sql = 'SELECT Nom, Prenom, Trigramme, Mail FROM eleves';
            return $this->queryRequest($sql);
        }
    }
}
