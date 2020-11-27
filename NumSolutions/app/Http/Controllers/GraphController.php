<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GraphController extends Controller
{
    public function grapher(){
        $data = [];
        $data["title"] = __('graph.title');
        return view('user.graph')->with("data",$data);
    }
    public  function grapherUri(Request $request){
        $data = [];
        $function = $request->input('f_function');
        $function = str_replace("ln","log", $function);
        $data["title"] = __('graph.title');
        $data["function"] = ($function);
        return view('user.graph')->with("data",$data);
    }

}