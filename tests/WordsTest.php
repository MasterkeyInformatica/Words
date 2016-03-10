<?php namespace Masterkey\Words;

    use PHPUnit_Framework_TestCase;

    class WordsTest extends PHPUnit_Framework_TestCase
    {
        public function testRemoveAcentos()
        {
            $this->assertEquals('Ola', Words::removeAcentos('Olá'));
            $this->assertEquals('Joana das Gracas', Words::removeAcentos('Joana das Graças'));
            $this->assertEquals('MARIA ANTUNES', Words::removeAcentos('Maria Antuñes', true));
            $this->assertEquals('JOSE BENEDITO', Words::removeAcentos('José Benedito', true));
            $this->assertEquals('Roberto Gomez Bolanos', Words::removeAcentos('Roberto Gómez Boláños'));
            $this->assertEquals('MARIA DAS GRACAS GONCALVES', Words::removeAcentos('MARIA DAS GRAÇAS GONÇALVES', true));
        }
    }
