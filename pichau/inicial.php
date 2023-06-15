<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" media="screen" href="/pichau/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Pichau | Home</title>
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

      <div class="container">

  
      <?php
      
      require "classe.php";
      session_start();

      $carrinho = new Carrinho();
      $dados = serialize($carrinho);
      
      if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = $dados;
    } 

    ?>
    <?php
   
     
      include("./produtos.php");

      foreach($produtos as $produto){

      ?>
      <a href="peca.php?nome=<?php echo $produto->nome ?>" >
      <div class="card">
          <img class="card__image" src="<?php echo $produto->imagem; ?>">
          <div class="card__info">
            <h5 class="card__tittle">
              <?php echo $produto->nome; ?>
            </h5>
            <!-- <strong> </strong><br> -->
            <div class="card__preco">
              <span class="card__preco__modo"> à vista </span>
              <span class="card__preco__valor"> R$ <?php echo $produto->preco; ?> </span>
            </div>
          </div>
        
      </div>
      </a>


      
      




<?php
      }
?>




      </div>
  








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