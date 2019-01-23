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


