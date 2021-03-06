<?php

namespace GestBD {

    use Exception;
    use PDO;
    use PDOException;
    use mysqli;

    //On desactive les erreurs affiché pas PHP
    error_reporting(0);

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

        function envoiBDScript($maTableScript)
        {
            // Create connection
            $conn = new mysqli($this->ip, $this->utilisateur, $this->motDePasse);
            // Check connection
            if ($conn->connect_error) {
                die("<br/>Connection failed: " . $conn->connect_error);
            }

            if(!mysqli_select_db($conn,$this->nomBD))
            {
              $conn->query($maTableScript);
            }

            mysqli_select_db($conn,$this->nomBD);

            if ($conn->query($maTableScript) === TRUE) {
                echo "<br/>Database table successfully";
                return true;
            } else {
                echo "<br/>Error creating table: " . $conn->error;
                return false;
            }

            $conn->close();
        }

        /**
         * Test de connexion au SGBDR avec l'utilisatuer courant
         * 
         * 
         * @return -> un bool true connexion reussi, false echec : bool
         */

        function testConnexionUtilisateur()
        {
            $link = mysqli_connect($this->ip, $this->utilisateur, $this->motDePasse);
            if (!$link) {
                return false;
            } else {
                return true;
            }

            mysqli_close($link);
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

        function insertionClasse($uneClasse)
        {

            $sql = 'CALL PSI_AjoutClasse(\'' . $uneClasse . '\')';

            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = array();
            }

            return $res;
        }
        /**
         * Retourne la liste des classes présent dans la base de données
         * 
         * @return -> Liste de classe : array
         */
        function listeClasse()
        {
            $sql = 'CALL PSS_ListeClasse';

            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = array();
            }

            return $res;
        }
        /**
         * Retourne la liste des élèves présent dans la base de données
         * 
         * @return -> liste d'élève : array
         */
        function listeEleve()
        {
            $sql = 'CALL PSS_ListeEleve';

            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = array();
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
                $res = array();
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
        function modificationEleves($id, $nom, $prenom, $uneClasse, $unMail, $unTrig)
        {
            $sql = 'CALL PSU_ModificationEleves(\'' . $id . '\',\'' . $nom . '\',\'' . $prenom . '\',\'' . $uneClasse .'\',\'' . $unMail .'\',\'' . $unTrig . '\')';
            echo $sql;
            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = array();
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
                $res = array();
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
                $res = array();
            }

            return $res;
        }

        /**
         * Supprime une classe dans la base de donnée
         * 
         * @param uneClasse -> identifiant unique de la classe : int
         * 
         * @return -> erreur ou non de la requete : string
         */
        function supprimerClasse($uneClasse)
        {
            $sql = 'CALL PSD_SuppressionClasse(' . $uneClasse . ')';

            try {
                $res = $this->queryRequest($sql);
            } catch (PDOException $e) {
                $res = array();
            }

            return $res;
        }
    }
}
