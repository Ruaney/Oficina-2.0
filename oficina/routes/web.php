<?php

//vai mostrar a pagina no resources>>>views>>>form.blade.php
Route::get('/lista_Cliente', 'VendedorController@listar');

//cadastrar
Route::get('/cadastrar_Cliente', 'VendedorController@formCadastro');
Route::get('/cadastrar', 'VendedorController@cadastrar');

//pesquisar cliente
Route::get('/preenche_pesquisa', 'VendedorController@preenchePesq');
Route::any('/pesquisar', 'VendedorController@pesquisar');


//agrupamento das rotas de edição e exclusão
Route::group(['prefix' => '{id}'], function(){
    //editar
    Route::get('/editar_Cliente', 'VendedorController@formEditar');
    Route::get('/editar', 'VendedorController@editar');

    //excluir
    Route::get('/excluir', 'VendedorController@excluir');     
});



Route::get('/', function () {
    return view('welcome');
});


