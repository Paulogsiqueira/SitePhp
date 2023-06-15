<?php
    require_once "classe.php";
    session_start();

    $nome = $_GET['nome'];
    $quantidade = $_GET['quantidade'];
    // $array_carrinho = unserialize($_SESSION['carrinho']);
    $dados = $_SESSION['carrinho'];
    $carrinho = unserialize($dados);

    // $carrinho = $array_carrinho->produtos;

    for ($i=0; $i < count($carrinho->produtos); $i++) { 
        var_dump($carrinho->produtos[0]['nome']);
        if($carrinho->produtos[$i]['nome'] === $nome){
            $carrinho->excluirQuantidade($nome,$carrinho);
            $carrinho->produtos[$i]['quantidade'] = 0;
            var_dump($carrinho->produtos[$i]['quantidade']);
            $dados2 = serialize($carrinho);
              $_SESSION['carrinho'] = $dados2;
            header('Location: carrinho.php');
        }
    }


?>
