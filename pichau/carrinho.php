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

      require "classe.php";
      session_start();

      $dados = $_SESSION['carrinho'];
      $carro = unserialize($dados);
      $array =$carro->produtos;

      for ($i = 0; $i < count($array); $i++) {
        if($array[$i]['quantidade']>0){
          ?>
          <div class="carrinho__card">
            <div>
              <img class="carrinho_card-img" src="<?php echo $array[$i]['img'] ?>">
            </div>
            <div class="carrinho__card-titulo">
             <?php echo  $array[$i]['nome']?> </h2>
            </div>
            <div class="carrinho__card-quantidade">
            <div class="botao__qtd" id="bota-div">
              <a href="diminui_quantidade?nome=<?php echo $array[$i]['nome'] ?>&quantidade=<?php echo $array[$i]['quantidade'] ?>" class="botao__comprar-qtd">-</a>
            </div>
                Qtd: <?php echo $array[$i]['quantidade']?>
                <div class="botao__qtd" id="bota-div">
                  <a href="aumenta_quantidade?nome=<?php echo $array[$i]['nome'] ?>&quantidade=<?php echo $array[$i]['quantidade'] ?>" class="botao__comprar-qtd" >+</a>
                </div>
            </div>
            <div class="carrinho__card-valor">
                R$ <?php echo $array[$i]['quantidade']*$array[$i]['valor'] ?>
            </div>
            <div class="botao__excluir" id="bota-div">
                <a href="excluir_quantidade?nome=<?php echo $array[$i]['nome'] ?>&quantidade=<?php echo $array[$i]['quantidade'] ?>" class="botao__excluir-icone" >X</a>
              </div>
          </div>
          <?php
        }
       


      }
      $soma = 0;
      for ($i = 0; $i < count($array); $i++) {
       $soma = $soma + ($array[$i]['quantidade']*$array[$i]['valor']);
        
      } 
      ?>
      <div class="carrinho__soma">
      Soma dos Produtos: R$ <?php echo $soma?>
      </div>

      <?php
      
      $carrinho = unserialize($dados);
    

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