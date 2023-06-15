<?php
class Carrinho {
      public $produtos = [];
  
      public function adicionarProduto($nome, $quantidade, $valor ,$img) {
        $exists = false;
        foreach($this->produtos as &$produto) {
            if(array_key_exists('nome', $produto) && $produto['nome'] == $nome) {
                $produto['quantidade']++;
                $exists = true;
                break;
            }
        }
        if(!$exists) {
            $this->produtos[] = ['nome' => $nome, 'quantidade' => $quantidade, 'valor' => $valor, 'img' => $img];
        }
    }

    public function subtrairQuantidade($nome,$carrinho) {
        foreach($this->produtos as &$produto) {
            if(array_key_exists('nome', $produto) && $produto['nome'] == $nome) {
                $produto['quantidade']--;
                break;
            }
        }
    }

    public function aumentarQuantidade($nome) {
        foreach($this->produtos as &$produto) {
            if(array_key_exists('nome', $produto) && $produto['nome'] == $nome) {
                $produto['quantidade']+= 1;
                break;
            }
        }
    }
    
      public function excluirQuantidade($carrinho,$nome) {
        foreach($this->produtos as &$produto) {
            if(array_key_exists('nome', $produto) && $produto['nome'] == $nome) {
                var_dump($carrinho);
                $produto['quantidade']= 0;
                break;
            }
        }
      }
  
      public function getProdutos() {
          return $this->produtos;
      }
  }

?>