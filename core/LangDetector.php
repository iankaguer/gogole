<?php
namespace Core;


class LangDetector {
    private array $english;
    private array $french;
    private array  $german;
    private array $spanish;
    private array $italian;
    private array $dannish; //dansk
    private array $latine;
    private array $hungarian; //magyar
    private array $nederlands;
    private array $norwegian; //norsk
    private array $finnish; //suomi


    public function __construct(
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

    ){
        $this->english = $english;
        $this->french = $french;
        $this->german = $german;
        $this->spanish = $spanish;
        $this->italian = $italian;
        $this->dannish = $dannish;
        $this->latine = $latine;
        $this->hungarian = $hungarian;
        $this->nederlands = $nederlands;
        $this->norwegian = $norwegian;
        $this->finnish = $finnish;

      

    }

    public function getLang($wordset){
        $wordset = trim(strtolower($wordset));
        
        $wordset = str_replace(["¿", "¡"], "", $wordset);
        if(str_word_count($wordset) == 1){
            $wordLang = $this->detectWordLang($wordset);
        }else{
            $wordLang = $this->detectSentenceLang($wordset);
        }
       
        return $wordLang;
    }

    private function detectWordLang( $wordset){
       
       
        if(in_array($wordset, $this->english)){
            return "English";
        }
        if(in_array($wordset, $this->french)){
            return "French";
        }
        if(in_array($wordset, $this->german)){
            return "German";
        }
        if(in_array($wordset, $this->spanish)){
            return "Spanish";
        }
        if(in_array($wordset, $this->italian)){
            return "Italian";
        }
        if(in_array($wordset, $this->dannish)){
            return "Danish";
        }
        if(in_array($wordset, $this->latine)){
            return "Latin";
        }
        if(in_array($wordset, $this->hungarian)){
            return "Hungarian";
        }
        if(in_array($wordset, $this->nederlands)){
            return "Nederlands";
        }
        if(in_array($wordset, $this->norwegian)){
            return "Norwegian";
        }
        if(in_array($wordset, $this->finnish)){
            return "Finnish";
        }
        return "Unknown";
    }

    public function detectSentenceLang($text){
        $text = str_replace([",", ";","."], " ", $text); 
        $text = explode(" ", $text);
        $english = 0;
        $french = 0;
        $german = 0;
        $spanish = 0;
        $italian = 0;
        $dannish = 0;
        $latine = 0;
        $hungarian = 0;
        $nederlands = 0;
        $norwegian = 0;
        $finnish = 0;
        $unknown = 0;

        foreach($text as $word){
            $word = trim($word);
            
            if(in_array($word, $this->english)){
                $english++;
            }
            if(in_array($word, $this->french)){
                $french++;
            }
            if(in_array($word, $this->german)){
                $german++;
            }
            if(in_array($word, $this->spanish)){
                $spanish++;
            }
            if(in_array($word, $this->italian)){
                $italian++;
            }
            if(in_array($word, $this->dannish)){
                $dannish++;
            }
            if(in_array($word, $this->latine)){
                $latine++;
            }
            if(in_array($word, $this->hungarian)){
                $hungarian++;
            }
            if(in_array($word, $this->nederlands)){
                $nederlands++;
            }
            if(in_array($word, $this->norwegian)){
                $norwegian++;
            }
            if(in_array($word, $this->finnish)){
                $finnish++;
            }
        }
        $langs = [
            "English" => $english,
            "French" => $french,
            "German" => $german,
            "Spanish" => $spanish,
            "Italian" => $italian,
            "Danish" => $dannish,
            "Latin" => $latine,
            "Hungarian" => $hungarian,
            "Nederlands" => $nederlands,
            "Norwegian" => $norwegian,
            "Finnish" => $finnish,
            "Unknown" => $unknown
        ];
        $value = max($langs);
        $key = array_search($value, $langs);
        if(($value)>0){
            return $key;
        }else{
            return "Unknown";
        }
        
    }
}