<?php
namespace projetQCM\modele;

class ModeleUtilisateur{
	
    /* ELEMENTS BDD */
    public $idUtilisateur;
    public $nom;
    public $prenom;
    public $login;
    public $mdp;
    public $role;
    public $adresseMail;

    //----------------------------------------------------------------------------------------------------//

    public function __construct($idUtilisateur = null, $nom = null, $prenom = null, $login = null, $mdp = null, $role = null, $adresseMail = null){
        if($idUtilisateur === null){
                return;
        }
        $this->idUtilisateur = $idUtilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->role = $role;
        $this->adresseMail = $adresseMail;
    }

     public static function constructWithId($idUtilisateur){
        $req = ConnexionBDD::instanceBDD()->prepare('SELECT * from utilisateur WHERE idUtilisateur = :idUtilisateur');
        $req->execute(['idUtilisateur' => $idUtilisateur]);
        $u = $req->fetch();
        $utilisateur = new ModeleUtilisateur($u['idUtilisateur'], $u['nom'], $u['prenom'],$u['login'] , $u['mdp'], $u['role'], $u['adresseMail']);
        return $utilisateur;
    }
    
     //----------------------------------------------------------------------------------------------------//
    
    /* GETTERS & SETTERS */
    
    public function getIdUtilisateur(){		
        return $this->idUtilisateur;
    }

    public function getNom(){		
        return $this->nom;
    }

    public function getPrenom(){		
        return $this->prenom;
    }

    public function getLogin(){		
        return $this->login;
    }

    public function getMdp(){		
        return $this->mdp;
    }
    
    public function setMdp($mdp){		
        $this->mdp = $mdp;
    }

    public function getRole(){		
        return $this->role;
    }

    public function getAdresseMail(){		
        return $this->adresseMail;
    }

    //----------------------------------------------------------------------------------------------------//
    
    /* METHODES */
    
    public static function utilisateurExiste($login, $mdp){
        $req = ConnexionBDD::instanceBDD()->prepare('SELECT * FROM utilisateur WHERE login = :login ');
        $req->execute(['login' => $login]);
        if($req->rowCount() == 0){
            return null;
        }else{
            foreach ($req->fetchAll() as $u){
                if(password_verify($mdp,$u['mdp'])){
                    $utilisateur = new ModeleUtilisateur($u['idUtilisateur'], $u['nom'], $u['prenom'], $u['login'], null, $u['role'], $u['adresseMail']);
                    return $utilisateur;
                }
            }
            return 0;
        }
    }
    
    public static function selectionTousEtudiants($role){
        $return = [];
        $req = ConnexionBDD::instanceBDD()->prepare('SELECT utilisateur.idUtilisateur, utilisateur.nom, utilisateur.prenom, utilisateur.adresseMail FROM utilisateur WHERE role = :role;');
        $req->execute(['role' => $role]);
        $rslt = $req->fetchAll();
            foreach ($rslt as $u){
                $utilisateur = new ModeleUtilisateur($u['idUtilisateur'], $u['nom'], $u['prenom'], null, null, null, $u['adresseMail']);
                $return [] = $utilisateur;
            }
        return $return;
    }
    
    public static function estConnecte(){
        if(isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur'])){
            return true;
        }else{
            return false;
        }
    }
    
    
}

?>