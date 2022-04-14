<?php
namespace Core;

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

        return $langDetector->getLang($this->wordset);
        
    }


    public function openDictFile($filename){
        $fp = @fopen("../resources/dict/".$filename, 'r'); 
        $array = array();
        if ($fp) {
        $array = explode("\n", fread($fp, filesize($filename)));
        }
        return $array;
        
    }
}