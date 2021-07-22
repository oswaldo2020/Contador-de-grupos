<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dev6Controller extends Controller
{
    public function index(Request $request)
    {

        if(!$request->filled('words')){
            return view('dev.countGrups');
        }

        $frase1 = $request->words;
        $statement = explode(',',$frase1);

        $totalGrups = $this->countGrups ($statement);
        return view('dev.countGrups')->with(['totalWord'=>$totalGrups]);
    }

    function countGrups ($statement){
        $wordsNotrep = [];
        $wordsRep = [];
        $save = false;
        for($x=0;$x<count($statement) ;$x++){
            $a = isset($statement[$x]) ? $statement[$x]:null;
            $b = isset($statement[$x+1])? $statement[$x+1]:null ;
            $c = isset($statement[$x-1])? $statement[$x-1]:null ;
            $letters = str_split($a);
            $lettersc = str_split($c);
            $lettersb = str_split($b);

            for($y=0;$y<count($letters);$y++){
                $a0 = isset($letters[$y-1])? $letters[$y-1]:null ;
                $a1 = isset($letters[$y])? $letters[$y]:null ;
                $a2 = isset($letters[$y+1])? $letters[$y+1]:null ;
                $b1 = isset($lettersb[$y])? $lettersb[$y]:null ;
                $c1 = isset($lettersc[$y])? $lettersc[$y]:null ;
                $c2 = isset($lettersc[$y-1])? $lettersc[$y-1]:null ;

                if($a1 == $b1 || $a1 == $a0){
                    if ($a1 != $a2 && $a1 != $c1 && $a1 != $c2){
                        $save = true;
                        array_push($wordsRep,$a1);
                    }
                }
                if ($a1 != $a2 && $a1 != $b1 && $a1 != $a0 && $a1 != $c1){
                    array_push($wordsRep,$a1);
                }
            }
        }

        if($save==true){
            $totalVal = count($wordsRep);
            // dump($wordsRep);
            return $totalVal;
        }
        elseif($save==false){
            $null = null;
            $myArray = $this->remover($null, $wordsNotrep);
            $totalValue = count($myArray);
            return $totalValue;
        }
    }
    function remover ($valor,$arr){
        foreach (array_keys($arr, $valor) as $key)
        {
            unset($arr[$key]);
        }
        return $arr;
    }
    function clearString($string){
        $replace = $string;
        $replace = preg_replace('/[-_,ñ,Ñ.!;áéíóúÁÉÍÓÚñÑ."-".]/', '', $replace);
        return $replace;
    }

    function maxString($statement){

        foreach ($statement as $stame){
            $stame1 = strlen($stame);

            return $stame1;

        }
    }
}
// $fraseArray = $this->clearString($frase1);
// $totalletters= str_split($fraseArray);
// $unics = array_unique ($totalletters);
// $totalVal = array_count_values($unics);
// $total_sum = array_sum ($totalVal);
