<?php

namespace App\Http\Controllers\Functions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class FixedPointController extends Controller
{

    public function menu()
    {
      return view('user.functions.menu');
    }

    public function values()
    {
        return view('user.functions.fixedPoint.values');
    }

    public function results(Request $request)
    {
        $request->validate([
            "function" => "required",
            "gFunction" => "required" ,
            "initialX" => "required" ,
            "tolerance" => "required|numeric|gte:0",
            "iterations" => "required|numeric|gt:0",
          ]);
        $data = [];
        $function = $request->input('function');
        $gFunction = $request->input('gFunction');
        $initialX = $request->input('initialX');
        $tolerance = $request->input('tolerance');
        $iterations = $request->input('iterations');
        $function = '"'.$function.'"';
        $gFunction = '"'.$gFunction.'"';
        $initialX = '"'.$initialX.'"';
        $tolerance = '"'.$tolerance.'"'; 
        $iterations = '"'.$iterations.'"';    
        $data['function'] = $function;
        $data['gFunction'] = $gFunction;
        $data['initialX'] = $initialX;
        $data['tolerance'] = $tolerance;
        $data['iterations'] = $iterations;
        $command = 'python "'.public_path().'\methods\fixed_point.py" '."{$function} {$gFunction} {$initialX} {$tolerance} {$iterations}";
        exec($command, $output);
        $data["title"] = __('functions.fixedPoint.results');
        $data["results"] = $output;
        $data["error"] = false;
        if (!(strpos($output[0], "Error") === false)){
            $data["error"] = true;
        }else{
            $i = count($data["results"]);
            $ivalues = explode(",", $data["results"][$i-1]);
            $data["xm"] = $ivalues[1];
        }
        return view('user.functions.fixedPoint.results')->with("data",$data);
        
    }

   

}
