<?php

namespace Galoa\ExerciciosPhp\TextWrap;
require_once("TextWrapInterface.php");
/**
 * Implemente sua resolução aqui.
 */
class Resolucao implements TextWrapInterface {

  /**
   * {@inheritdoc}
   */
  public function textWrap(string $text, int $length): array {
    $resultado = array();
    $j = 0;/*Variavel de iteração */
    $posLinha = 0;/*Representa a posição do cursor na linha */
    $linha = 0;/*Represeta a linha atual*/

    /*Separa cada palavra da string fornecida em uma posicao do array teste, removendo todos espaços */
    $palavras = explode(" ",$text);

    /*Formata a string apartir do limite da linha*/
    foreach($palavras as $palavra){

      $lenPalavra = strlen($palavra);
  
      /*Verifica se a palavra é maior que o limite da linha */
      if($lenPalavra >$length){
        
          $posLinha++;/*Simula um espaço inserido */

          /*Verifica se o cursor após a simulação do espaço esta no fim de uma linha ou se ultrapassou o limite*/
          if($posLinha >= $length){
            $posLinha = 0;
            $linha++;
          }
          else{
            $resultado[$linha] .= " ";/*Adiciona  um espaço*/
          }
          
          /*Realiza o while enquanto a palavra nao tenha sido completamente 
          * copiada ao array resultado 
          */
          $j = 0;
          while($lenPalavra > $j){
          
            /*Verifica se o index do array ja existe*/
            if(array_key_exists($linha, $resultado) == false){
              $resultado[$linha] = $palavra[$j];
            }
            else{
              $resultado[$linha] .= $palavra[$j];
            }

            $j++;
            $posLinha++;

            /*Verifica se chegou ao limite da linha*/
            if($posLinha == $length){
              $posLinha = 0;
              $linha++;
            }
          }
      }
      else{/*Caso a palavra é menor que o limite da linha */

        if($posLinha != 0 && $posLinha != $length){/*Simula um espaço*/
          $posLinha++;
        }
        if($lenPalavra <= ($length-$posLinha)){/*Caso a palavra coube dentro do limite da linha */

          /*Verifica se o index do array ja existe*/
          if(array_key_exists($linha, $resultado) == false){
            $resultado[$linha] = $palavra;
          }
          else{
            $resultado[$linha] .= " ";/*Adiciona um espaço */
            $resultado[$linha] .= $palavra;
          }
        
          $posLinha += $lenPalavra;
      
        }
        else{/*Caso a palavra nao coube dentro do limite da linha */
          $posLinha = 0;
          $linha++;

          $resultado[$linha] = $palavra;
          $posLinha += $lenPalavra;
        }
      }
    }
    return $resultado;
  }
}

/*
$teste = new Resolucao();

//$texto = "Se vi mais longe foi por estar de pé sobre ombros de gigantes";

//$texto = "12345678 9";
//$texto = "Um teste para palavras maiores que o limite da linha 12345678 como horizontalmente";
//$texto = "";
//$texto = "O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente com os programas de publicação como o Aldus PageMaker que incluem versões do Lorem Ipsum.";
//$texto = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et, sagittis ac, posuere eu, lectus. Nam mattis, felis ut adipiscing";

$limiteLinha = 10;

$res = $teste->textWrap($texto,$limiteLinha);

echo("Resultado:</br>");
foreach($res as $print){
  print_r($print);
  echo("</br>");
}
*/

