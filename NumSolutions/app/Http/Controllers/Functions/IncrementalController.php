<?php

namespace App\Http\Controllers\Functions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class IncrementalController extends Controller
{

    public function menu()
    {
      return view('user.functions.menu');
    }

    public function values()
    {
        return view('user.functions.incremental.values');
    }

    public function results(Request $request)
    {
        $request->validate([
            "function" => "required",
            "initialX" => "required" ,
            "delta" => "required|numeric|gt:0" ,
            "iterations" => "required|numeric|gt:0",
          ]);
        $data = [];
        $function = $request->input('function');
        $initialX = $request->input('initialX');
        $delta = $request->input('delta');
        $iterations = $request->input('iterations');
        $function = '"'.$function.'"';
        $initialX = '"'.$initialX.'"';
        $delta = '"'.$delta.'"';
        $iterations = '"'.$iterations.'"';    
        $data['function'] = $function;
        $data['initialX'] = $initialX;
        $data['delta'] = $delta;
        $data['iterations'] = $iterations;
        $command = 'python "'.public_path().'\methods\incremental_search.py" '."{$function} {$initialX} {$delta} {$iterations}";
        exec($command, $output);
        $data["title"] = __('functions.incremental.results');
        $data["results"] = $output;
        $data["error"] = false;
        if (!(strpos($output[0], "Error") === false)){
            $data["error"] = true;
        }
        
        return view('user.functions.incremental.results')->with("data",$data);
        
    }

   

}
