<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Formulario de Cadastro</title>
    <meta charset="utf-8">
    <!--Importando bootstrap-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> 
  </head>
  
  <body>
  <!--Barra de navegação-->
  <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
    <span class="navbar-brand mb-0 h1">Cadastrar</span>   
     <div class="navbar-nav pull-right">
        <a class="nav-item nav-link btn btn-primary" style="color: white" href="/preenche_pesquisa">Consultar Cliente(s)</a>   
        <a class="nav-item nav-link btn btn-secondary" style="color: white; margin-left:20px" href="/lista_Cliente">Listar Todos</a>
      </div>  
  </nav>

  <div class="container" style="padding-top: 15px">
   <div class="row">

<!--Exibição de erro-->
    <div class="col-md-4">
      @if(isset($errors) && count ($errors)>0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <p>{{$error}}</p>                 
            @endforeach
        </div>
      @endif
    </div>
    <!--Grid para deixar o formulario centralizado-->
    <div class="col-md-4">
    <!--Formulario que solicita informações do cliente -->
    <form method="get" action="/cadastrar">
        {!! csrf_field()!!}
        <div class="form-group">
            <label for="nome">Nome do cliente:</label>
          <input type="text" class="form-control" name="nome" id="nome" value="{{old('nome')}}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descreva o problema:</label>
            <input type="text" class="form-control" name="descricao" id="descricao" value="{{old('descricao')}}" required>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="vendedor">Vendedor:</label>
            <input type="text" class="form-control" name="vendedor" id="vendedor" value="{{old('vendedor')}}" required>
            </div>

            <div class="form-group col-md-6">
            <label for="orcamento">Orçamento:</label>
            <input type="text" class="form-control" name="orcamento" id="orcamento" value="{{old('orcamento')}}" required>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
    </form> <!-- Fim do formulario que solicita informações do cliente -->
    </div><!--fim da div com 4 colunas (para centralizar o formulario)-->

    <!--last-Grid com 4 colunas-->
    <div class="col-md-4"></div>

   </div> <!--fim-row-->
  </div> <!--fim-container-->
  
  </body>
</html>