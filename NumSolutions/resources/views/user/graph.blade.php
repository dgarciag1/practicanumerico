@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<head>
    <script type='text/javascript'>
    window.onload = function(){
        document.getElementById('plot-error').style.display = 'none';
        document.getElementById('form').onsubmit = function (event) {
            event.preventDefault();
            draw();
        };
        function draw() {
            try {
            functionPlot({
                target: '#plot',
                data: [{
                fn: document.getElementById('eq').value.replace('ln', 'log'),
                sampler: 'builtIn',  // this will make function-plot use the evaluator of math.js
                graphType: 'polyline'
                }]
            });
            document.getElementById('plot-error').style.display = 'none';
            }
            catch (err) {
            console.log(err);
            document.getElementById('plot-error').innerHTML ='<div class="alert alert-danger alert-dismissible fade show" role="alert">' + err+ '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            document.getElementById('plot-error').style.display = 'block';  
            }
            
        }
        draw();
}
    </script>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card">
                <div class="card-header">
                {{ __('graph.graphtitle') }}
                </div>
                <div class="card-body">
                        <form id="form" class="form">
                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <label>{{ __('graph.function') }}</label>
                                    <input type="text" class="form-control" id = "eq" value="{{ empty($data['function']) ? 'ln(x)' : $data['function'] }}" /><br>
                                    <p align="center"><input type="submit" value="{{ __('graph.graph') }}" class="btn btn-outline-success"></p>
                                </div>
                            </div>
                        </form>
                        <div id="plot" class="d-flex justify-content-center"></div>
                        <div id="plot-error">

                        </div>
                        <p>{{ __('graph.library') }} <a href="https://github.com/maurizzzio/function-plot">https://github.com/maurizzzio/function-plot</a></p>
                        <div class="card card-body">
                            <li>{{ __('graph.require') }}<a href="https://mathjs.org/docs/expressions/syntax.html#operators">MathJs operators</a></li>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection