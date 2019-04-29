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
    <span class="navbar-brand mb-0 h1">Pesquisar clientes</span>    
    <div class="navbar-nav">
      <a class="nav-link btn btn-primary" style="color: white" href="/cadastrar_Cliente">Cadastrar</a>
      <a class="nav-link btn btn-secondary" style="color: white; margin-left:20px" href="/lista_Cliente">Listar todos clientes</a>         
    </div>
  </nav>

<!--Pesquisar clientes-->
  <div class="container" style="padding-top: 15px">
   <div class="row">
    
    <div class="col-md-4"></div>

    <div class="col-md-4">
      
    <form method="get" action="/pesquisar">
        {!! csrf_field()!!}    
        <div class="form-row">
        
            <div class="form-group col-md-6">
                <label for="cliente">Nome do cliente:</label>
                <input type="text" class="form-control" name="cliente" id="cliente" placeholder="Nome do cliente">
            </div>

            <div class="form-group col-md-6">
                <label for="vendedor">Vendedor:</label>
                <input type="text" class="form-control" name="vendedor" id="vendedor" placeholder="Nome do vendedor">
            </div>           
        </div>
        
        <button type="submit" class="btn btn-primary btn-block">Procurar</button>
    </form>
 
    </div>

    <div class="col-md-4"></div>

   </div> <!--row-->
  </div> <!--container-->
  
  </body>
</html>