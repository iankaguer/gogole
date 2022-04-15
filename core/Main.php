<?php
namespace Core;

use Core\LangDetector;

class Main
{
    private $wordset;

    public function __construct($word)
    {
        $this->wordset = $word;
    }

    public function getLang()
    {
        $english = $this->openDictFile("able.txt");
        $french = $this->openDictFile("gutenberg.txt");
        $german = $this->openDictFile("deutsch.txt");
        $spanish = $this->openDictFile("espanol.txt");
        $italian = $this->openDictFile("italiano.txt");
        $dannish = $this->openDictFile("dansk.txt");
        $latine = $this->openDictFile("latine.txt");
        $hungarian = $this->openDictFile("magyar.txt");
        $nederlands = $this->openDictFile("nederlands.txt");
        $norwegian = $this->openDictFile("norsk.txt");
        $finnish = $this->openDictFile("suomi.txt");



        $langDetector = new LangDetector(
            $english,
            $french,
            $german,
            $spanish,
            $italian,
            $dannish,
            $latine,
            $hungarian,
            $nederlands,
            $norwegian,
            $finnish
        );
        

        die (json_encode($langDetector->getLang($this->wordset)));
        
    }


    public function openDictFile($filename){

        $array = explode("\n", file_get_contents("./resources/dict/".$filename));
      
        return $array;
        
    }
}