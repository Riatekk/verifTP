<?php

namespace GestBD {

    use PDO;
    use PDOException;

    /**
     * Cette classe permet d'etablir une connexion a une
     * base de données mysql en utilisant PDO
     */
    class ConnexionBD
    {
        var $ip, $nomBD, $utilisateur, $motDePasse;

        /**
         * Créer un objet de connexion a la base de données possédant
         * une ip, un nom de bd, un utilisateur et un mot de passe
         * 
         * @param uneIp -> une adresse IP : string
         * @param unNomBD -> un nom de base de données : string
         * @param unUtilisateur -> un nom d'utilisateur de la base de données : string
         * @param unMotDePasse -> un mot de passe lié a l'utilisateur de la base de données : string
         * 
         */
        function __construct($uneIp, $unNomBD, $unUtilisateur, $unMotDePasse)
        {
            $this->ip = $uneIp;
            $this->nomBD = $unNomBD;
            $this->utilisateur = $unUtilisateur;
            $this->motDePasse = $unMotDePasse;
        }

        /**
         * Objet de connexion a la base de données avant chaque
         * requete
         * 
         * @return -> une erreur ou un objet de connexion PDO : PDO
         */
        function connexion()
        {
            try {
                return new PDO('mysql:dbname=' . $this->nomBD . ';host=' . $this->ip, $this->utilisateur, $this->motDePasse);
            } catch (PDOException $e) {
                //echo 'Connexion échouée : ' . $e->getMessage();
                return false;
            }
        }

        /**
         * Recherche un base de données dans le SGBDR
         * 
         * 
         * @return -> un message d'erreur ou non : string
         */
        function testConnexionUtilisateur()
        {

            $otherConnexion = new ConnexionBD(
                $this->ip,
                'INFORMATION_SCHEMA',
                $this->utilisateur,
                $this->motDePasse
            );

            $sql = 'SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA';

            try {
                $res = $otherConnexion->connexion()->query($sql);
                return true;
            } catch (PDOException $e) {
                $res = $e->getMessage();
                return false;
            }

        }

        /**
         * Fonction qui recherche la base de données saisie
         * et présente dans le SGBDR
         * 
         * @param nomBaseDeDonnees -> nom de la base de donnees a chercher : string
         * @return -> la bases de données saisie : array
         */
        function testConnexionBD($nomBaseDeDonnees)
        {
            $otherConnexion = new ConnexionBD(
                $this->ip,
                'INFORMATION_SCHEMA',
                $this->utilisateur,
                $this->motDePasse
            );

            $sql = 'SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = \'' . $nomBaseDeDonnees . '\'';

            try {
                $res = $otherConnexion->connexion()->query($sql);
                return true;
            } catch (PDOException $e) {
                $res = $e->getMessage();
                return false;
            }

        }
    }

    /**
     * Cette classe permet déffectuer des requetes SQL
     * a l'aide de la classe ConnexionBD
     */
    class RequeteBD
    {
        var $Connexion;
        /**
         * Objet de requete en recupérant l'objet de connexion a la 
         * base de données
         * 
         * @param maConnexion -> une connexion a la base de données : ConnexionBD
         * 
         */
        function __construct(ConnexionBD $maConnexion)
        {
            $this->Connexion = $maConnexion;
        }
        
        /**
         * Fonction privé d'envoi d'une requete passé en parametre 
         * vers la base de données
         * 
         * @param uneRequeteSQL -> une requete SQL : string
         * 
         * @return -> Resultat de la requete : array
         */
        private function queryRequest($uneRequeteSQL)
        {
            return $this->Connexion->connexion()->query($uneRequeteSQL);
        }

        /**
         * Retourne la liste des élèves présent dans la base de données
         * 
         * @return -> liste d'élève : array
         */
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

        /**
         * Insert un seul élève dans la base de données
         * 
         * @param nom -> nom de l'élève : string
         * @param prenom -> prenom de l'élève : string
         * @param uneClasse -> id de la classe : int
         * 
         * @return -> erreur ou non de la requete : string
         */
        function insertionEleves($nom, $prenom, $uneClasse)
        {

            //$sql = 'INSERT INTO eleves (Nom,Prenom) values (\'' . $nom . '\',\'' . $prenom . '\')';
            $sql = 'CALL PSI_AjoutEleve(\'' . $nom . '\',\'' . $prenom . '\',' . $uneClasse . ')';

            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = $e->getMessage();
            }

            return $res;
        }

        /**
         * Modifier un élève dans la base de donnée
         * 
         * @param id -> identifiant unique de l'élève : int
         * @param nom -> nom de l'élève : string
         * @param prenom -> prenom de l'élève : string
         * @param uneClasse -> id de la classe : int
         * 
         * @return -> erreur ou non de la requete : string
         */
        function modificationEleves($id, $nom, $prenom, $uneClasse)
        {
            $sql = 'CALL PSU_ModificationEleves(\'' . $id . '\',\'' . $nom . '\',\'' . $prenom . '\',\'' . $uneClasse . '\')';

            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = $e->getMessage();
            }

            return $res;
        }

        /**
         * Supprime un élève dans la base de donnée
         * 
         * @param id -> identifiant unique de l'élève : int
         * 
         * @return -> erreur ou non de la requete : string
         */
        function supprimerEleves($id)
        {
            $sql = 'CALL PSD_SuppressionEleves(' . $id . ')';

            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = $e->getMessage();
            }

            return $res;
        }

        /**
         * Supprime les élèves d'une classe dans la base de donnée
         * 
         * @param uneClasse -> identifiant unique de la classe : int
         * 
         * @return -> erreur ou non de la requete : string
         */
        function supprimerElevesParClasse($uneClasse)
        {
            $sql = 'CALL PSD_SuppressionElevesParClasse(' . $uneClasse . ')';

            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = $e->getMessage();
            }

            return $res;
        }
    }
}
