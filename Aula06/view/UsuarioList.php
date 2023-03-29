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
</head>
<body>

    <form action="UsuarioList.php" method="post">
        <select name="campo">
            <option value="nome">Nome</option>
            <option value="telefone">Telefone</option>
        </select>
        <input type="text" name="valor"/>
        <input type="submit" value="buscar"/>
    </form>

    <a href="UsuarioForm.php">Cadastrar</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Telefone</th>
        </tr>

        <?php
            foreach($load as $item){
                echo "<tr>
                    <td>$item->id</td>
                    <td>$item->nome</td>
                    <td>$item->telefone</td>
                    <td>
                        <a href='./UsuarioForm.php?id=$item->id'> Editar </a>
                    </td>
                    <td>
                        <a href='./UsuarioList.php?id=$item->id' onclick='return confirm(\"Deseja Excluir\")'> Excluir </a>
                    </td>

                    </tr>";
            }
        ?>
    </table>
























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>