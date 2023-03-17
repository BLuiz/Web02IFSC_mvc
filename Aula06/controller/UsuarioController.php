<?php
include "../model/BD.class.php";

class UsuarioController{

    private $model;
    private $table = "usuario";

    

    public function __construct(){
        $this->model = new BD();
    }

    public function salvar($dados){
        $this->model->inserir($this->table, $dados);
    }

    public function carregar(){
        return $this->model->select($this->table);
    }

}



?>