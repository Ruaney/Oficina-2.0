<?php
$i = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Filtragem dos Clientes</title>
    <meta charset="utf-8">
    <!--Importando bootstrap-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> 
    <!--Pra poder usar o icone de editar\exclusão-->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  </head>

  <body>
<!--Barra de navegação-->
    <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
        <span class="navbar-brand mb-0 h1">Clientes filtrados</span>    
        <div class="navbar-nav pull-right">
            <a class="nav-item nav-link btn btn-primary" style="color: white" href="/cadastrar_Cliente">Cadastrar</a>
            <a class="nav-item nav-link btn btn-secondary" style="color: white; margin-left:20px" href="/preenche_pesquisa">Consultar Cliente(s)</a>   
            <a class="nav-item nav-link btn btn-info" style="color: white; margin-left:20px"  href="/lista_Cliente">Listar Todos</a>
        </div>
    </nav>
<!-- Resultado da pesquisa-->
  <div class="container" style="padding-top: 15px">
    <div class="row">    
      <div class="table-responsive">
        @if(isset($errors) && count ($errors)>0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <p>{{$error}}</p>                 
            @endforeach
        </div>
      @endif
        <table class="table table-bordered table-striped table-hover">
        <caption> Clientes</caption>
        <thead class="thead-dark">
            <tr>
                <th>#</th> 
                <th>Nome</th>               
                <th>Orçamentos</th>
                <th>Vendedor</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
         <!--Lista todos os clientes que foram filtrados-->
            @foreach($pesquisa as $client)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$client->nome}}</td>
                    <td>{{$client->orcamento}}</td>
                    <td>{{$client->vendedor}}</td>                    
                    <td>{{$client->descricao}}</td>                   
                    <td>
                      <a href="{{$client->id}}/editar_Cliente"><span class="fas fa-edit" style='font-size:20px'></span></a>                      
                      <a href="{{$client->id}}/excluir"><span class="fas fa-trash" style='font-size:20px; color:red;'></span></a>
                    </td>
                </tr>           
            @endforeach

        </tbody>
    </table>
    <!--Quando tiver paginação e o usuario for passar para a próx página, não dará um 'reset' na pesquisa-->
      {!! $pesquisa->appends(['cliente'=>isset($cliente)? $cliente:'', 'vendedor'=>isset($vendedor)? $vendedor:'']  )->links() !!} 
      </div>
    </div>
  </div>  
    
  </body>
</html>
