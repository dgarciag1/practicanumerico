<?php

namespace App\Http\Controllers\Arrays;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class JacobiController extends Controller
{

    public function menu()
    {
      return view('user.arrays.menu');
    }

    public function initial()
    {
        return view('user.arrays.jacobi.initial');
    }
    
    public function values(Request $request)
    {
        $request->validate([
            "size" => "required",
        ]);
        $data = [];
        $size = $request->input('size');
        $data['size'] = intval($size); 
        return view('user.arrays.jacobi.values')->with("data",$data);
    }

    public function results(Request $request)
    {
        $request->validate([
            "tolerance" => "required|numeric|gte:0",
            "iterations" => "required|numeric|gt:0",
          ]);
        $size = $request->input('size');
        $vector = "[";
        $matrix = "[";
        $initial = "[";
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
                $initial=$initial.($request->input('valuex'.$i));
                $matrix = $matrix.']';
            }else{
                $vector=$vector.($request->input('valuev'.$i)).',';
                $initial=$initial.($request->input('valuex'.$i)).',';
                $matrix = $matrix.'],';
            }
        }
        $vector = $vector.']';
        $initial = $initial.']';
        $matrix = $matrix.']';
        $tolerance = $request->input('tolerance');
        $iterations = $request->input('iterations');
        $tolerance = '"'.$tolerance.'"'; 
        $iterations = '"'.$iterations.'"'; 
        $data = [];   
        $data['matrix'] = $matrix;
        $data['vector'] = $vector;
        $data['initial'] = $initial;
        $data['tolerance'] = $tolerance;
        $data['iterations'] = $iterations;
        $command = 'python "'.public_path().'\methods\jacobi.py" '."{$matrix} {$vector} {$initial} {$tolerance} {$iterations}";
        exec($command, $output);
        $data["title"] = __('arrays.jacobi.results');
        $data["error"] = false;
        if (!(strpos($output[0], "Error") === false)){
            $data["error"] = true;
        }
        $pos = 0;
        for($i=0;$i<sizeof($output);$i++){
            if(!(strpos($output[$i], "iters") === false)){
                $pos = $i+1;
                break;
            }
        }
        $data["pos_iters"]=$pos;

        $data["iters"] = array_slice($output, $pos);
        $data["results"] = array_slice($output, 0, $pos-1); 
        return view('user.arrays.jacobi.results')->with("data",$data);
        
    }

}