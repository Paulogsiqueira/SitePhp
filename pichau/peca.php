<?php require_once "classe.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="/pichau/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="body__peca">
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="inicial.php"><img class="nav__logo" src="https://static.pichau.com.br/logo-pichau-2021.png" alt="Logomarca Pichau"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Digite o que procura" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar  <i class="fa fa-search"></i></button>
          </form>
          <a href="carrinho.php" class="carrinho__link"><button type="button" class="btn btn-success botao_margem">Carrinho</a> <i class="fa fa-cart-shopping"></i></button></a>
        </div>
      </nav>
      <?php

      require_once "classe.php";
      include("./produtos.php");
      session_start();

      $dados = $_SESSION['carrinho'];

      $nome = $_GET['nome'];

      foreach($produtos as $index=>$produto){
        if($produto->nome == $nome){
         $valor = $produto->preco;
         $img = $produto->imagem;
        }

      }
      ?>

      <div class="peca">
        <div class="peca__img">
          <img class="peca__img-icone" src="<?php echo $img ?>">

        </div>
        <div class="peca__text">
          <h3><?php echo $nome ?></h3>
          <h1>R$<?php echo $valor ?></h1>
          <span class="garantia"><Strong>Garantia:</Strong> 12 meses</span>
          <form method="POST">
          <input type="hidden" name="tipo_produto" value="<?php echo $nome ?>" >
          <div class="botao__comprar" id="bota-div">
            <button type="submit" class="botao__comprar-btn" id="botao" name="button1">Comprar</button>
          </div>
          </form>
          <span class="garantia__texto">Todos os produtos vendidos pelo site oficial da Pichau possuem garantia de fábrica e direito a reembolso em até 7 dias da entrega do produto.</span>
          <div class="parcelamento">
            <h3><u>Parcelamento</u></h3>
            <span>1x de R$<?php echo number_format($valor, 2, '.', '') ?> </span>
            <span>2x de R$<?php echo number_format($valor/2, 2, '.', '') ?> </span>
            <span>3x de R$<?php echo number_format($valor/3, 2, '.', '') ?> </span>
            <span>4x de R$<?php echo number_format($valor/4, 2, '.', '') ?> </span>
            <span>5x de R$<?php echo number_format($valor/5, 2, '.', '') ?> </span>
          </div>
        </div>
      </div>


      <?php
        $carrinho = unserialize($dados);
     
      if(isset($_POST['button1'])) {
          $carrinho->adicionarProduto($nome,1,$valor ,$img);
          echo '<script type="text/javascript">
          alert("Compra realizada, produto adicionado ao carrinho");
          </script>';
         $serial= $_SESSION['carrinho'];
      }

      $dados2 = serialize($carrinho);
      $_SESSION['carrinho'] = $dados2;

      ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>
</html>