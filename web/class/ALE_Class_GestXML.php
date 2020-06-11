<?php

namespace GestXML {

    use SimpleXMLElement;

    class FichierXML
    {
        var $FichierXML,
            $CheminFichier,
            $ip,
            $BDName,
            $utilisateur,
            $motDePasse;

        function __construct($unCheminFichier)
        {
            $this->CheminFichier = $unCheminFichier;
            $this->FichierXML = new SimpleXMLElement('<bdconfig></bdconfig>');

            if (!file_exists($this->CheminFichier)) 
            {
                $this->ip = '';
                $this->BDName = '';
                $this->utilisateur = '';
                $this->motDePasse = '';
            }
            else
            {
                $this->ip = $this->getIp();
                $this->BDName = $this->getBDName();
                $this->utilisateur = $this->getUtilisateur();
                $this->motDePasse = $this->getMotDePasse();
            }
            
            $this->sauvegardeFichierXML();
        }

        function sauvegardeFichierXML(){
            $this->FichierXML = new SimpleXMLElement('<bdconfig></bdconfig>');

            $this->FichierXML->addChild('ip', $this->ip);
            $this->FichierXML->addChild('dbname', $this->BDName);
            $this->FichierXML->addChild('uti', $this->utilisateur);
            $this->FichierXML->addChild('pwd', $this->motDePasse);

            $this->FichierXML->saveXML($this->CheminFichier);
        }
        function getIp()
        {
            $valeurIP = '';
            $xml = simplexml_load_file($this->CheminFichier);
            $valeurIP = $xml->children()[0];

            return $valeurIP;
        }
        function setIp($uneIP)
        {
            $this->ip = $uneIP;
        }

        function getBDName()
        {
            $valeurDBName = '';
            $xml = simplexml_load_file($this->CheminFichier);
            $valeurDBName = $xml->children()[1];

            return $valeurDBName;
        }
        function setBDName($unBDName)
        {
            $this->BDName = $unBDName;
        }

        function getUtilisateur()
        {
            $valeurUtilisateur = '';
            $xml = simplexml_load_file($this->CheminFichier);
            $valeurUtilisateur = $xml->children()[2];

            return $valeurUtilisateur;
        }
        function setUtilisateur($unUtilisateur)
        {
            $this->utilisateur = $unUtilisateur;
        }

        function getMotDePasse()
        {
            $valeurMotDePasse = '';
            $xml = simplexml_load_file($this->CheminFichier);
            $valeurMotDePasse = $xml->children()[3];

            return $valeurMotDePasse;
        }
        function setMotDePasse($unMotDePasse)
        {
            $this->motDePasse = $unMotDePasse;
        }
    }
}
