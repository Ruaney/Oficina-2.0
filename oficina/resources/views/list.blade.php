<?php
$i = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Listagem dos Clientes</title>
    <meta charset="utf-8">
    <!--Importando bootstrap-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> 
    <!--Pra poder usar o icone de editar\exclusão-->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  </head>
  <body>
<!--Barra de navegação-->  
  <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
    <span class="navbar-brand mb-0 h1">Clientes</span>    
    <div class="navbar-nav">
     <ul class="nav">
        <li class="nav-item"><a class="nav-link btn btn-primary" style="color: white" href="/cadastrar_Cliente">Cadastrar</a> </li>
        <li class="nav-item"><a class="nav-link btn btn-secondary" style="color: white; margin-left:20px" href="/preenche_pesquisa">Consultar Cliente(s)</a> </li>    
    </ul>
    </div>
  </nav>

  <div class="container" style="padding-top: 15px">
    <div class="row">    
      <div class="table-responsive">

        <table class="table table-bordered table-striped table-hover">
        <caption>Lista de Clientes</caption>
        <!--Mensagem quando Cliente é Editado/Excluido/Cadastrado -->
          <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                  <p class="alert alert-{{ $msg }}">{{Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="fechar">&times;</a></p>
                @endif
            @endforeach
        </div>
        <!--Mensagem quando Cliente é excluido -->
          @if (session('alert'))    
            <div class="alert alert-success">
              {{ session('alert-success') }}
            </div>
          @endif
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
        <tbody >
            @foreach($cliente as $client)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$client->nome}}</td>
                    <td>{{$client->orcamento}}</td>
                    <td>{{$client->vendedor}}</td>                    
                    <td><p>{{$client->descricao}}</p></td>                   
                    <td>
                      <a href="{{$client->id}}/editar_Cliente"><span class="fas fa-edit" style='font-size:20px'></span></a>                      
                      <a href="{{$client->id}}/excluir"><span class="fas fa-trash" style='font-size:20px; color:red;'></span></a>
                    </td>
                </tr>           
            @endforeach
        </tbody>
    </table>
    
    {!! $cliente->Links()!!}
      </div>
    </div>
  </div>  
    
  </body>
</html>
