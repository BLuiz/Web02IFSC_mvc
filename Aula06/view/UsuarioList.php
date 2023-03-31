<?php
include "../controller/UsuarioController.php";
include '../Util.class.php';

Util::verificar();

$usuario = new UsuarioController();
//var_dump($load);

if(!empty($_GET['id'])){
    $usuario->deletar($_GET['id']);
    header("location: UsuarioList.php");
}

if(!empty($_POST)){
    $load = $usuario->pesquisar($_POST);
}else{
    $load = $usuario->carregar();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h1>Listagem de Usuários</h1>
        <form action="UsuarioList.php" method="post">
            <div class="row">
                <div class="col-2">
                    <select name="campo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="telefone">Telefone</option>
                    </select>
                </div>
                <div class="col-4">
                    <input type="text" name="valor" class="form-control" placeholder="Pesquisar"/>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-magnifying-glass"></i> Buscar
                    </button>
                    <a href="UsuarioForm.php" class="btn btn-success"> Cadastrar </a>
                </div>
            </div>
        </form>
    

        <table class="table table-striped table-hover">
            
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>

            <tbody>
            <?php
            //<span class=\"material-symbols-outlined\">edit</span> </a>
                foreach($load as $item){
                    echo "
                        <tr>
                            <td scope=\"row\">$item->id</t>
                            <td>$item->nome</td>
                            <td>$item->telefone</td>
                            <td>
                                <a class=\"text-info\" href='./UsuarioForm.php?id=$item->id'> 
                                
                                <i class=\"fa-solid fa-pen-to-square fa-lg \" style=\"color: #002f80;\"></i></a>
                            </td>
                            <td>
                                <a class=\"text-danger\" href='./UsuarioList.php?id=$item->id' onclick='return confirm(\"Deseja Excluir\")'>
                                <i class=\"fa-solid fa-trash\" style=\"color: #c50d0d;\"></i> </a>
                            </td>
                        </tr>";
                }
            ?>
            </tbody>

        </table>
    </div>
























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>