<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'User\HomeController@home')->name("");
Route::get('/', 'User\HomeController@initial')->name("home");
Route::get('/home','User\HomeController@initial')->name("home.index");

// Routes Functions
Route::get('/functions/menu', 'Functions\IncrementalController@menu')->name("user.functions.menu");
Route::get('/functions/incremental/values', 'Functions\IncrementalController@values')->name("functions.incremental.values");
Route::post('/functions/incremental/results', 'Functions\IncrementalController@results')->name("functions.incremental.results");
Route::get('/functions/bisection/values', 'Functions\BisectionController@values')->name("functions.bisection.values");
Route::post('/functions/bisection/results', 'Functions\BisectionController@results')->name("functions.bisection.results");
Route::get('/functions/falserule/values', 'Functions\FalseRuleController@values')->name("functions.falserule.values");
Route::post('/functions/falserule/results', 'Functions\FalseRuleController@results')->name("functions.falserule.results");
Route::get('/functions/fixedpoint/values', 'Functions\FixedPointController@values')->name("functions.fixedpoint.values");
Route::post('/functions/fixedpoint/results', 'Functions\FixedPointController@results')->name("functions.fixedpoint.results");
Route::get('/functions/newton/values', 'Functions\NewtonController@values')->name("functions.newton.values");
Route::post('/functions/newton/results', 'Functions\NewtonController@results')->name("functions.newton.results");
Route::get('/functions/secant/values', 'Functions\SecantController@values')->name("functions.secant.values");
Route::post('/functions/secant/results', 'Functions\SecantController@results')->name("functions.secant.results");
Route::get('/functions/roots/values', 'Functions\RootsController@values')->name("functions.roots.values");
Route::post('/functions/roots/results', 'Functions\RootsController@results')->name("functions.roots.results");



//Routes Arrays
Route::get('/arrays/menu', 'Arrays\EliminationController@menu')->name("user.arrays.menu");
Route::get('/arrays/elimination/initial', 'Arrays\EliminationController@initial')->name("arrays.elimination.initial");
Route::post('/arrays/elimination/values', 'Arrays\EliminationController@values')->name("arrays.elimination.values");
Route::post('/arrays/elimination/results', 'Arrays\EliminationController@results')->name("arrays.elimination.results");
Route::get('/arrays/partial/initial', 'Arrays\PartialController@initial')->name("arrays.partial.initial");
Route::post('/arrays/partial/values', 'Arrays\PartialController@values')->name("arrays.partial.values");
Route::post('/arrays/partial/results', 'Arrays\PartialController@results')->name("arrays.partial.results");
Route::get('/arrays/total/initial', 'Arrays\TotalController@initial')->name("arrays.total.initial");
Route::post('/arrays/total/values', 'Arrays\TotalController@values')->name("arrays.total.values");
Route::post('/arrays/total/results', 'Arrays\TotalController@results')->name("arrays.total.results");
Route::get('/arrays/lusimple/initial', 'Arrays\LusimpleController@initial')->name("arrays.lusimple.initial");
Route::post('/arrays/lusimple/values', 'Arrays\LusimpleController@values')->name("arrays.lusimple.values");
Route::post('/arrays/lusimple/results', 'Arrays\LusimpleController@results')->name("arrays.lusimple.results");
Route::get('/arrays/lupartial/initial', 'Arrays\LupartialController@initial')->name("arrays.lupartial.initial");
Route::post('/arrays/lupartial/values', 'Arrays\LupartialController@values')->name("arrays.lupartial.values");
Route::post('/arrays/lupartial/results', 'Arrays\LupartialController@results')->name("arrays.lupartial.results");
Route::get('/arrays/crout/initial', 'Arrays\CroutController@initial')->name("arrays.crout.initial");
Route::post('/arrays/crout/values', 'Arrays\CroutController@values')->name("arrays.crout.values");
Route::post('/arrays/crout/results', 'Arrays\CroutController@results')->name("arrays.crout.results");
Route::get('/arrays/doolittle/initial', 'Arrays\DoolittleController@initial')->name("arrays.doolittle.initial");
Route::post('/arrays/doolittle/values', 'Arrays\DoolittleController@values')->name("arrays.doolittle.values");
Route::post('/arrays/doolittle/results', 'Arrays\DoolittleController@results')->name("arrays.doolittle.results");
Route::get('/arrays/cholesky/initial', 'Arrays\CholeskyController@initial')->name("arrays.cholesky.initial");
Route::post('/arrays/cholesky/values', 'Arrays\CholeskyController@values')->name("arrays.cholesky.values");
Route::post('/arrays/cholesky/results', 'Arrays\CholeskyController@results')->name("arrays.cholesky.results");
Route::get('/arrays/jacobi/initial', 'Arrays\JacobiController@initial')->name("arrays.jacobi.initial");
Route::post('/arrays/jacobi/values', 'Arrays\JacobiController@values')->name("arrays.jacobi.values");
Route::post('/arrays/jacobi/results', 'Arrays\JacobiController@results')->name("arrays.jacobi.results");
Route::get('/arrays/gauss/initial', 'Arrays\GaussController@initial')->name("arrays.gauss.initial");
Route::post('/arrays/gauss/values', 'Arrays\GaussController@values')->name("arrays.gauss.values");
Route::post('/arrays/gauss/results', 'Arrays\GaussController@results')->name("arrays.gauss.results");
Route::get('/arrays/sor/initial', 'Arrays\SorController@initial')->name("arrays.sor.initial");
Route::post('/arrays/sor/values', 'Arrays\SorController@values')->name("arrays.sor.values");
Route::post('/arrays/sor/results', 'Arrays\SorController@results')->name("arrays.sor.results");

//Routes Interpolation
Route::get('/interpolation/menu', 'Interpolation\VandermondeController@menu')->name("user.interpolation.menu");
Route::get('/interpolation/vandermonde/initial', 'Interpolation\VandermondeController@initial')->name("interpolation.vandermonde.initial");
Route::post('/interpolation/vandermonde/values', 'Interpolation\VandermondeController@values')->name("interpolation.vandermonde.values");
Route::post('/interpolation/vandermonde/results', 'Interpolation\VandermondeController@results')->name("interpolation.vandermonde.results");
Route::get('/interpolation/newtondiv/initial', 'Interpolation\NewtondivController@initial')->name("interpolation.newtondiv.initial");
Route::post('/interpolation/newtondiv/values', 'Interpolation\NewtondivController@values')->name("interpolation.newtondiv.values");
Route::post('/interpolation/newtondiv/results', 'Interpolation\NewtondivController@results')->name("interpolation.newtondiv.results");
Route::get('/interpolation/lagrange/initial', 'Interpolation\LagrangeController@initial')->name("interpolation.lagrange.initial");
Route::post('/interpolation/lagrange/values', 'Interpolation\LagrangeController@values')->name("interpolation.lagrange.values");
Route::post('/interpolation/lagrange/results', 'Interpolation\LagrangeController@results')->name("interpolation.lagrange.results");
Route::get('/interpolation/lineal/initial', 'Interpolation\LinealController@initial')->name("interpolation.lineal.initial");
Route::post('/interpolation/lineal/values', 'Interpolation\LinealController@values')->name("interpolation.lineal.values");
Route::post('/interpolation/lineal/results', 'Interpolation\LinealController@results')->name("interpolation.lineal.results");
Route::get('/interpolation/cuadratic/initial', 'Interpolation\CuadraticController@initial')->name("interpolation.cuadratic.initial");
Route::post('/interpolation/cuadratic/values', 'Interpolation\CuadraticController@values')->name("interpolation.cuadratic.values");
Route::post('/interpolation/cuadratic/results', 'Interpolation\CuadraticController@results')->name("interpolation.cuadratic.results");
Route::get('/interpolation/cubic/initial', 'Interpolation\CubicController@initial')->name("interpolation.cubic.initial");
Route::post('/interpolation/cubic/values', 'Interpolation\CubicController@values')->name("interpolation.cubic.values");
Route::post('/interpolation/cubic/results', 'Interpolation\CubicController@results')->name("interpolation.cubic.results");

//Graph
Route::GET('/Graph','GraphController@grapher')->name("user.graph");
Route::POST('/Graph','GraphController@grapherUri')->name("urlgraph");

// Lang
Route::get('lang/{lang}','LanguageController@switchLang')->name('lang.switch');

// AUTH
Auth::routes();

