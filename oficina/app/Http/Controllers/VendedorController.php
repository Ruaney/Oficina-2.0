<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Clientes;
use Validator; // Validação
use App\Http\Requests\ClienteRules;// Regras do formulário

class VendedorController extends Controller
{
/* *********listar cliente*********
* consulta o banco e retorna para a view() todos os clientes que foram achados na consulta.
*/
//listar clientes
    public function listar(){
        $cliente =  Clientes::paginate(10);
        return view('list', compact('cliente'));
    }

/* *********Formulário cliente*********
* retorna uma view() para o formulario de cadastro  
*/
    public function formCadastro(){
        return view('create');
    }
/* *********Função para cadastrar cliente*********
* recebe as informações do formulario via get, e chama a função cadastrar() de \App\Clientes.php passando um 
* parametro para salvar os dados do cliente e redireciona para a pagina que lista todos clientes.
*/
    public function cadastrar(ClienteRules $request){       
        Clientes::cadastrar($request);              
        $request->session()->flash('alert-success', 'Cliente: '.$request->nome.', cadastrado!!!');
        return redirect()->to('/lista_Cliente');       
    }

/* *********Formulário de edição*********
* coleta as informaçoes do cliente pelo $id, e em seguida retorna uma view() com as informaçoes do cliente para 
* a edição.
*/
    public function formEditar($id){
        $cliente = \App\Clientes::find($id);
        if($cliente == NULL){
            abort(404);
        }
        return view('edit', compact('cliente'));
    }
/* *********Função para salvar a edição*********
* Recebe os dados editados, e chama a função que está no model App\cliente.php passando 3 parametros para salvar 
* os dados alterados.
*/
    public function editar(ClienteRules $request, $id){ 
        $cliente = \App\Clientes::find($id);       
        if(!$cliente){ //caso o cliente com o id especifico não seja encontrado
            $request->session()->flash('alert-danger', 'Cliente não encontrado.');
            return redirect()->to('/lista_Cliente');
        }   
        Clientes::editar($request, $id, $cliente);
        $request->session()->flash('alert-success', 'Cliente: '.$request->nome.', Editado!!');  
        return redirect()->to('/lista_Cliente');
    }
    
/********** Exclusao de clientes*********
* Encontra o cliente com o id especifico, e logo em seguida é deletado e retornado um redirecionamento que lista
* todos os cliente.
*/
    public function excluir($id){
        $cliente = \App\Clientes::find($id);
        if(!$cliente){
            session()->flash('alert-Danger', 'Não foi econtrado nenhum cliente para exclusão.');
            return redirect()->to('/lista_Cliente');
        }
        $cliente->delete();
        session()->flash('alert-info', 'Cliente: '.$cliente->nome.', excluido.');
        return redirect()->to('/lista_Cliente');
    }

/* *********Formulário Pesquisar clientes*********
*função Preenchepesquisa de clientes, que redireciona para a view() com formulario para pesquisar clientes.
*/
    public function preenchePesq(){
        return view('preenchePesquisa');
    }
/* *********Função para achar os clientes*********
* Recolhe os INPUTs do cliente que foi informado no formulário, e é chamada a função pesquisar() do model que está
* em App\Clientes.php passando dois parametros, e depois é retornada uma view() passando 3 parametros para a página-destino;
*/    
    public function pesquisar(){
            $cliente = Input::get('cliente');
            $vendedor = Input::get('vendedor');       
            if($cliente == '' && $vendedor == '') { 
                session()->flash('alert-danger', 'Não foi informado nenhum nome e/ou letra, entao foram listados todos os Clientes');  
                return redirect()->to('/lista_Cliente');
            } 
            $pesquisa = Clientes::pesquisar($cliente, $vendedor);
            return view('pesquisaResult', compact('pesquisa', 'cliente', 'vendedor'));            
        }   
    }

?>


