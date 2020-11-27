<?php

namespace App\Http\Controllers\Functions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class FalseRuleController extends Controller
{

    public function menu()
    {
      return view('user.functions.menu');
    }

    public function values()
    {
        return view('user.functions.falseRule.values');
    }

    public function results(Request $request)
    {
        $request->validate([
            "function" => "required",
            "aPoint" => "required" ,
            "bPoint" => "required" ,
            "tolerance" => "required|numeric|gte:0",
            "iterations" => "required|numeric|gt:0",
          ]);
        $data = [];
        $function = $request->input('function');
        $aPoint = $request->input('aPoint');
        $bPoint = $request->input('bPoint');
        $tolerance = $request->input('tolerance');
        $iterations = $request->input('iterations');
        $function = '"'.$function.'"';
        $aPoint = '"'.$aPoint.'"';
        $bPoint = '"'.$bPoint.'"';
        $tolerance = '"'.$tolerance.'"'; 
        $iterations = '"'.$iterations.'"';    
        $data['function'] = $function;
        $data['aPoint'] = $aPoint;
        $data['bPoint'] = $bPoint;
        $data['tolerance'] = $tolerance;
        $data['iterations'] = $iterations;
        $command = 'python "'.public_path().'\methods\false_rule.py" '."{$function} {$aPoint} {$bPoint} {$tolerance} {$iterations}";
        exec($command, $output);
        $data["title"] = __('functions.falseRule.results');
        $data["results"] = $output;
        $data["error"] = false;
        if (!(strpos($output[0], "Error") === false)){
            $data["error"] = true;
        }else{
            $i = count($data["results"]);
            $ivalues = explode(",", $data["results"][$i-1]);
            $data["xm"] = $ivalues[2];
        }
        return view('user.functions.falseRule.results')->with("data",$data);
        
    }

   

}
