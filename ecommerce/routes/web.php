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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/avisos', function(){
  //Comandos Exception
  $av = ['avisos' => [0 => [ 'data' => '06/09/202',
                             'aviso' => 'Estudar PHP',
                             'exibir' => true],

                       1 => ['data' => '09/09/202',
                             'aviso' => ' Sexta-feira',
                             'exibir' => false],

                       2 => ['data' => '18/09/202',
                             'aviso' => ' Meu Aniversario',
                             'exibir' => true]]];


  return view('avisos', $av);
});
