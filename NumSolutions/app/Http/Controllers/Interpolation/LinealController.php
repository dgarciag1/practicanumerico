<?php

namespace App\Http\Controllers\interpolation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class LinealController extends Controller
{

    public function menu()
    {
      return view('user.interpolation.menu');
    }

    public function initial()
    {
        return view('user.interpolation.lineal.initial');
    }
    
    public function values(Request $request)
    {
        $request->validate([
            "size" => "required|numeric|gt:0",
        ]);
        $data = [];
        $size = $request->input('size');
        $data['size'] = intval($size); 
        return view('user.interpolation.lineal.values')->with("data",$data);
    }

    public function results(Request $request)
    {
        
        $size = $request->input('size');
        $xvector = "[";
        $yvector = "[";
        for ($i=1; $i <= $size; $i++) { 
            if($i == $size){
                $xvector=$xvector.($request->input('valuex'.$i));
                $yvector=$yvector.($request->input('valuey'.$i));
            }else{
                $xvector=$xvector.($request->input('valuex'.$i)).',';
                $yvector=$yvector.($request->input('valuey'.$i)).',';
            }
        }
        $xvector = $xvector.']';
        $yvector = $yvector.']';
        $table = '['.$xvector.','.$yvector.']';
        $table = '"'.$table.'"';
        $data = [];   
        $data['table'] = $table;
        $command = 'python "'.public_path().'\methods\lineal_spline.py" '."{$table}";
        exec($command, $output);
        $data["title"] = __('interpolation.lineal.results');
        $data["results"] = $output;
        $data["error"] = false;
        if (!(strpos($output[0], "Error") === false)){
            $data["error"] = true;
        }

        return view('user.interpolation.lineal.results')->with("data",$data);
        
    }

}