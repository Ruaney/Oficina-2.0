<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
/** ****** Cadastra o cliente no banco******
 * Recebe um parametro com as informações do cliente, acessa o banco de dados e salva o cliente.
 * informações das variaveis: Nome|tipo;$cliente|Instancia de App\Clientes;$request|Array;
 * */
    public static function cadastrar($request){
        $cliente = new \App\Clientes();
        $cliente->nome = $request->nome;
        $cliente->descricao = $request->descricao;
        $cliente->vendedor = $request->vendedor;
        $cliente->orcamento = $request->orcamento;
        $cliente->save();
    }
/** ******Salva as alterações de edição******
 * Recebe 3 parametros para substituir os dados no banco de dados e salva as alterações dos dados.
 * informações das variaveis: Nome|tipo;$request|Array;$id|String|$cliente|String;
 */
   public static function editar($request, $id, $cliente){ 
        $cliente->nome = $request->nome;   
        $cliente->descricao = $request->descricao;  
        $cliente->vendedor = $request->vendedor; 
        $cliente->orcamento = $request->orcamento;  
        $cliente->save();      
   }

/** ****** Pesquisa de clientes no banco******
 * Recebe como parametro os nomes que vão ser pesquisados no banco, e verifica se $cliente ou $vendedor
 * foi informado para fazer as pesquias especificas, seja por: cliente E vendedor ou cliente OU vendedor.
 * informações das variaveis: Nome|tipo;$cliente|String;$Vendedor|String;$query|instancia de \App\clientes
 * $r|Array; /r == resultado
 */
   public static function pesquisar($cliente,$vendedor){
        $query = new \App\Clientes;
        if($cliente || $vendedor){
            $r = $query->where('nome','LIKE', '%'.$cliente.'%')
                ->where('vendedor', 'LIKE','%'.$vendedor.'%')
                ->orderby('created_at', 'DESC')
                ->paginate(10);
        }   
        return $r;
   }
}
