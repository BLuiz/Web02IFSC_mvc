<?php
include "../controller/UsuarioController.php";

$usuario = new UsuarioController();
$load = $usuario->carregar();
//var_dump($load);

if(!empty($_GET['id'])){
    $usuario->deletar($_GET['id']);
    header("location: UsuarioList.php");
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
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
</body>
</html>