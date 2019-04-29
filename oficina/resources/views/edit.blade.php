<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Formulario de Edição</title>
    <meta charset="utf-8">
    <!--Importando bootstrap-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> 
  </head>

  <body>
<!--Barra de navegação-->
  <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
    <span class="navbar-brand mb-0 h1">Editar Cliente</span>   
        <div class="navbar-nav pull-right">
            <a class="nav-item nav-link btn btn-primary" style="color: white" href="/cadastrar_Cliente">Cadastrar</a>
            <a class="nav-item nav-link btn btn-secondary" style="color: white; margin-left:20px" href="/preenche_pesquisa">Consultar Cliente(s)</a>   
            <a class="nav-item nav-link btn btn-info" style="color: white; margin-left:20px" href="/lista_Cliente">Listar Todos</a>
        </div>  
  </nav>

<!--Edição de clientes-->
  <div class="container">
   <div class="row">

    <div class="col-md-4">
      @if(isset($errors) && count ($errors)>0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <p>{{$error}}</p>                 
            @endforeach
        </div>
      @endif  
    </div>    

    <div class="col-md-4">     
        <form method="get" action="/{{$cliente->id}}/editar">
        {!! csrf_field()!!}     
            <div class="form-group">
                <label for="nome">Nome do cliente:</label>
                <input type="text" class="form-control" value="{{$cliente->nome}}" name="nome" id="nome" value="{{old('nome')}}" >
            </div>

            <div class="form-group">
                <label for="descricao">Descreva o problema:</label>
                <input type="text" class="form-control" value="{{$cliente->descricao}}" name="descricao" id="descricao" value="{{old('descricao')}}">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="vendedor">Vendedor:</label>
                <input type="text" class="form-control" value="{{$cliente->vendedor}}"name="vendedor" id="vendedor" value="{{old('vendedor')}}">
                </div>

                <div class="form-group col-md-6">
                <label for="orcamento">Orçamento:</label>
                <input type="text" class="form-control" value="{{$cliente->orcamento}}" name="orcamento" id="orcamento" >
                </div>
            </div>      

            <button type="submit" class="btn btn-primary btn-block">Atualizar Cliente</button>

        </form>
    </div>

    <div class="col-md-4"></div>

   </div> <!--row-->
  </div> <!--container-->
  
  </body>
</html>