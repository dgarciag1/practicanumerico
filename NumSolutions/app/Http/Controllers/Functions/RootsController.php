<?php

namespace App\Http\Controllers\Functions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class RootsController extends Controller
{

    public function menu()
    {
      return view('user.functions.menu');
    }

    public function values()
    {
        return view('user.functions.roots.values');
    }

    public function results(Request $request)
    {
        $request->validate([
            "function" => "required",
            "dxFunction" => "required" ,
            'dxdxFunction' => "required",
            "initialX" => "required" ,
            "tolerance" => "required|numeric|gte:0",
            "iterations" => "required|numeric|gt:0",
          ]);
        $data = [];
        $function = $request->input('function');
        $dxFunction = $request->input('dxFunction');
        $dxdxFunction = $request->input('dxdxFunction');
        $initialX = $request->input('initialX');
        $tolerance = $request->input('tolerance');
        $iterations = $request->input('iterations');
        $function = '"'.$function.'"';
        $dxFunction = '"'.$dxFunction.'"';
        $dxdxFunction = '"'.$dxdxFunction.'"';
        $initialX = '"'.$initialX.'"';
        $tolerance = '"'.$tolerance.'"'; 
        $iterations = '"'.$iterations.'"';    
        $data['function'] = $function;
        $data['dxFunction'] = $dxFunction;
        $data['dxdxFunction'] = $dxdxFunction;
        $data['initialX'] = $initialX;
        $data['tolerance'] = $tolerance;
        $data['iterations'] = $iterations;
        $command = 'python "'.public_path().'\methods\multiple_roots.py" '."{$function} {$dxFunction} {$dxdxFunction} {$initialX} {$tolerance} {$iterations}";
        exec($command, $output);
        $data["title"] = __('functions.roots.results');
        $data["results"] = $output;
        $data["error"] = false;
        if (!(strpos($output[0], "Error") === false)){
            $data["error"] = true;
        }else{
            $i = count($data["results"]);
            $ivalues = explode(",", $data["results"][$i-1]);
            $data["xm"] = $ivalues[1];
        }
        return view('user.functions.roots.results')->with("data",$data);
        
    }

   

}
