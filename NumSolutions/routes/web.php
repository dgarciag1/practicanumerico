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
Route::get('/arrays/elimination/initial', 'Arrays\EliminationController@initial')->name("arrays.elimination.initial");
Route::post('/arrays/partial/values', 'Functions\BisectionController@values')->name("arrays.partial.values");
Route::post('/arrays/partial/results', 'Functions\BisectionController@results')->name("arrays.partial.results");
Route::get('/arrays/elimination/initial', 'Arrays\EliminationController@initial')->name("arrays.elimination.initial");
Route::post('/arrays/total/values', 'Functions\FalseRuleController@values')->name("arrays.total.values");
Route::post('/arrays/total/results', 'Functions\FalseRuleController@results')->name("arrays.total.results");
Route::get('/arrays/elimination/initial', 'Arrays\EliminationController@initial')->name("arrays.elimination.initial");
Route::post('/arrays/lusimple/values', 'Functions\FixedPointController@values')->name("arrays.lusimple.values");
Route::post('/arrays/lusimple/results', 'Functions\FixedPointController@results')->name("arrays.lusimple.results");
Route::get('/arrays/elimination/initial', 'Arrays\EliminationController@initial')->name("arrays.elimination.initial");
Route::post('/arrays/lupartial/values', 'Functions\NewtonController@values')->name("arrays.lupartial.values");
Route::post('/arrays/lupartial/results', 'Functions\NewtonController@results')->name("arrays.lupartial.results");
Route::get('/arrays/elimination/initial', 'Arrays\EliminationController@initial')->name("arrays.elimination.initial");
Route::post('/arrays/crout/values', 'Functions\SecantController@values')->name("arrays.crout.values");
Route::post('/arrays/crout/results', 'Functions\SecantController@results')->name("arrays.crout.results");
Route::get('/arrays/elimination/initial', 'Arrays\EliminationController@initial')->name("arrays.elimination.initial");
Route::post('/arrays/doolittle/values', 'Functions\RootsController@values')->name("arrays.doolittle.values");
Route::post('/arrays/doolittle/results', 'Functions\RootsController@results')->name("arrays.doolittle.results");
Route::get('/arrays/elimination/initial', 'Arrays\EliminationController@initial')->name("arrays.elimination.initial");
Route::post('/arrays/cholesky/values', 'Functions\FixedPointController@values')->name("arrays.cholesky.values");
Route::post('/arrays/cholesky/results', 'Functions\FixedPointController@results')->name("arrays.cholesky.results");
Route::get('/arrays/elimination/initial', 'Arrays\EliminationController@initial')->name("arrays.elimination.initial");
Route::post('/arrays/jacobi/values', 'Functions\NewtonController@values')->name("arrays.jacobi.values");
Route::post('/arrays/jacobi/results', 'Functions\NewtonController@results')->name("arrays.jacobi.results");
Route::get('/arrays/elimination/initial', 'Arrays\EliminationController@initial')->name("arrays.elimination.initial");
Route::post('/arrays/gauss/values', 'Functions\SecantController@values')->name("arrays.gauss.values");
Route::post('/arrays/gauss/results', 'Functions\SecantController@results')->name("arrays.gauss.results");
Route::get('/arrays/elimination/initial', 'Arrays\EliminationController@initial')->name("arrays.elimination.initial");
Route::post('/arrays/sor/values', 'Functions\RootsController@values')->name("arrays.sor.values");
Route::post('/arrays/sor/results', 'Functions\RootsController@results')->name("arrays.sor.results");

//Routes Interpolation


Route::get('/user/routine', 'User\RoutineController@menu')->name("user.routine.menu");
Route::get('/user/routine/recommend', 'User\RoutineController@recommend')->name("user.routine.recommend");
Route::post('/user/routine/calculate', 'User\RoutineController@calculate')->name("user.routine.calculate");
Route::get('/user/routine/list', 'User\RoutineController@list')->name("user.routine.list");
Route::get('/user/routine/show/{id}', 'User\RoutineController@show')->name("user.routine.show");
Route::get('/user/routine/myroutine', 'User\RoutineController@myroutine')->name("user.routine.myroutine");

//Allies Products
Route::get('/user/ally', 'User\AllyController@menu')->name("user.ally.menu");
Route::get('/user/ally/list', 'User\AllyController@list')->name("user.ally.list");

// Lang
Route::get('lang/{lang}','LanguageController@switchLang')->name('lang.switch');

// AUTH
Auth::routes();

