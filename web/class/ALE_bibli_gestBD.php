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
            $sql = 'CALL PSS_ListeEleve';

            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = $e->getMessage();
            }

            return $res;
        }

        function insertionEleves($nom, $prenom)
        {

            //$sql = 'INSERT INTO eleves (Nom,Prenom) values (\'' . $nom . '\',\'' . $prenom . '\')';
            $sql = 'CALL PSI_AjoutEleve(\'' . $nom . '\',\'' . $prenom . '\')';
            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = $e->getMessage();
            }

            return $res;
        }

        function modificationEleves($id, $nom, $prenom)
        {
            $sql = 'CALL PSU_ModificationEleves(\''. $id .'\',\''.$nom.'\',\''. $prenom .'\')';
            
            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = $e->getMessage();
            }

            return $res;
        }

        function supprimerEleves($id)
        {
            $sql = 'CALL PSD_SuppressionEleves(' . $id .')';
            
            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = $e->getMessage();
            }

            return $res;
        }
    }
}
