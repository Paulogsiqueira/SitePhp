<?php
    if (isset($_POST['nome'])) {
        $carrinho->metodoDoCarrinho($_POST['nome'],1);
        var_dump($carrinho->getProdutos());
    }

?>