<?php

namespace Galoa\ExerciciosPhp\Tests\TextWrap;

use Galoa\ExerciciosPhp\TextWrap\Resolucao;
use PHPUnit\Framework\TestCase;

/**
 * Tests for Galoa\ExerciciosPhp\TextWrap\Resolucao.
 *
 * @codeCoverageIgnore
 */
class TextWrapTest extends TestCase {

  /**
   * Test Setup.
   */
  public function setUp() {
    $this->resolucao = new Resolucao();
    $this->baseString = "Se vi mais longe foi por estar de pé sobre ombros de gigantes";
    $this->baseString2 = "Um teste para palavras maiores que o limite da linha 12345678 como horizontalmente";
    $this->baseString3 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et, sagittis ac, posuere eu, lectus. Nam mattis, felis ut adipiscing";
  }

  /**
   * Checa o retorno para strings vazias.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForEmptyStrings() {
    $ret = $this->resolucao->textWrap("", 2018);
    $this->assertCount(1, $ret);
    $this->assertEmpty($ret[0]);
  }

  /**
   * Testa a quebra de linha para palavras curtas.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForSmallWords() {
    $ret = $this->resolucao->textWrap($this->baseString, 8);
    $this->assertCount(10, $ret);
    $this->assertEquals("Se vi", $ret[0]);
    $this->assertEquals("mais", $ret[1]);
    $this->assertEquals("longe", $ret[2]);
    $this->assertEquals("foi por", $ret[3]);
    $this->assertEquals("estar de", $ret[4]);
    $this->assertEquals("pé", $ret[5]);
    $this->assertEquals("sobre", $ret[6]);
    $this->assertEquals("ombros", $ret[7]);
    $this->assertEquals("de", $ret[8]);
    $this->assertEquals("gigantes", $ret[9]);
  }

  /**
   * Testa a quebra de linha para palavras curtas.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForSmallWords2() {
    $ret = $this->resolucao->textWrap($this->baseString, 12);
    $this->assertCount(6, $ret);
    $this->assertEquals("Se vi mais", $ret[0]);
    $this->assertEquals("longe foi", $ret[1]);
    $this->assertEquals("por estar de", $ret[2]);
    $this->assertEquals("pé sobre", $ret[3]);
    $this->assertEquals("ombros de", $ret[4]);
    $this->assertEquals("gigantes", $ret[5]);
  }

   /**
   * Testa a quebra de linha para palavras longas.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForBigWords() {
    $ret = $this->resolucao->textWrap($this->baseString2, 6);
    $this->assertCount(16, $ret);
    $this->assertEquals("Um", $ret[0]);
    $this->assertEquals("teste", $ret[1]);
    $this->assertEquals("para p", $ret[2]);
    $this->assertEquals("alavra", $ret[3]);
    $this->assertEquals("s maio", $ret[4]);
    $this->assertEquals("res", $ret[5]);
    $this->assertEquals("que o", $ret[6]);
    $this->assertEquals("limite", $ret[7]);
    $this->assertEquals("da", $ret[8]);
    $this->assertEquals("linha", $ret[9]);
    $this->assertEquals("123456", $ret[10]);
    $this->assertEquals("78", $ret[11]);
    $this->assertEquals("como h", $ret[12]);
    $this->assertEquals("orizon", $ret[13]);
    $this->assertEquals("talmen", $ret[14]);
    $this->assertEquals("te", $ret[15]);
  }

   /**
   * Testa a quebra de linha para palavras longas.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForBigWords2() {
    $ret = $this->resolucao->textWrap($this->baseString2, 10);
    $this->assertCount(10, $ret);
    $this->assertEquals("Um teste", $ret[0]);
    $this->assertEquals("para", $ret[1]);
    $this->assertEquals("palavras", $ret[2]);
    $this->assertEquals("maiores", $ret[3]);
    $this->assertEquals("que o", $ret[4]);
    $this->assertEquals("limite da", $ret[5]);
    $this->assertEquals("linha", $ret[6]);
    $this->assertEquals("12345678", $ret[7]);
    $this->assertEquals("como horiz", $ret[8]);
    $this->assertEquals("ontalmente", $ret[9]);
  }

   /**
   * Testa a quebra de linha para textos longos.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  
  public function testForLongTexts() {
    $ret = $this->resolucao->textWrap($this->baseString3, 30);
    $this->assertCount(13, $ret);
    $this->assertEquals("Lorem ipsum dolor sit amet,", $ret[0]);
    $this->assertEquals("consectetur adipiscing elit.", $ret[1]);
    $this->assertEquals("Etiam eget ligula eu lectus", $ret[2]);
    $this->assertEquals("lobortis condimentum. Aliquam", $ret[3]);
    $this->assertEquals("nonummy auctor massa.", $ret[4]);
    $this->assertEquals("Pellentesque habitant morbi", $ret[5]);
    $this->assertEquals("tristique senectus et netus et", $ret[6]);
    $this->assertEquals("malesuada fames ac turpis", $ret[7]);
    $this->assertEquals("egestas. Nulla at risus.", $ret[8]);
    $this->assertEquals("Quisque purus magna, auctor", $ret[9]);
    $this->assertEquals("et, sagittis ac, posuere eu,", $ret[10]);
    $this->assertEquals("lectus. Nam mattis, felis ut", $ret[11]);
    $this->assertEquals("adipiscing", $ret[12]);
  }

}