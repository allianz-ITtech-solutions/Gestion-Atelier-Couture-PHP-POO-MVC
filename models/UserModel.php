<?php

class UserModel extends Model {

    // NB : En PHP, l'encapsulation, n'est pas vraiment respecté. Ce qui fait que si on veut, on peut
    //      utiliser public devant les attributs pour éviter de mettre des getters et des setters.
    //      En POO, ce n'est pas bon, mais en PHP c'est très utilisé.
    public int $id;
    public string $nomComplet;
    public string $login;
    public string $password;
    public string $role;


    public function __construct()
    {
        parent::__construct();
        $this->tableName = "users";
    }


    public function findUserByLoginAndPassword(string $login, string $password) {
        return $this->executeSelect("select * from $this->tableName where login like :login and password like :password",
                                    [
                                        "login"=>$login, 
                                        "password"=>$password
                                    ], true);
    }

}

?>