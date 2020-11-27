<?php

namespace App\Http\Controllers\Arrays;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class TotalController extends Controller
{

    public function menu()
    {
      return view('user.arrays.menu');
    }

    public function initial()
    {
        return view('user.arrays.total.initial');
    }
    
    public function values(Request $request)
    {
        $request->validate([
            "size" => "required",
        ]);
        $data = [];
        $size = $request->input('size');
        $data['size'] = intval($size); 
        return view('user.arrays.total.values')->with("data",$data);
    }

    public function results(Request $request)
    {
        
        $size = $request->input('size');
        $vector = "[";
        $matrix = "[";
        for ($i=1; $i <= $size; $i++) { 
            $matrix = $matrix."[";
            for ($j=1; $j <= $size; $j++) { 
                $value = '"'.($request->input('valuem'.$i.$j)).'"';
                if($j == $size){
                    $matrix=$matrix.$value;
                }else{
                    $matrix=$matrix.$value.',';
                }
            }
            if($i == $size){
                $vector=$vector.($request->input('valuev'.$i));
                $matrix = $matrix.']';
            }else{
                $vector=$vector.($request->input('valuev'.$i)).',';
                $matrix = $matrix.'],';
            }
        }
        $vector = $vector.']';
        $matrix = $matrix.']';
        $data = [];   
        $data['matrix'] = $matrix;
        $data['vector'] = $vector;
        $command = 'python "'.public_path().'\methods\total_pivot.py" '."{$matrix} {$vector}";
        exec($command, $output);
        $data["title"] = __('arrays.total.results');
        $data["results"] = $output;
        $data["error"] = false;
        if (!(strpos($output[0], "Error") === false)){
            $data["error"] = true;
        }

        return view('user.arrays.total.results')->with("data",$data);
        
    }

}