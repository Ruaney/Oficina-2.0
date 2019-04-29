<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRules extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
//regras para o formulário de cadastro/edição 
    public function rules()
    {   
        return [
            'nome' => 'required|min:3',
            'descricao' => 'required|min:3',
            'vendedor' => 'required|min:3',
            'orcamento' => 'required|numeric'
        ];
    }
//função para personalização de mensagens
    public function messages(){
        return[
            #mensagens para preencher campos vazios
            'nome.required' => 'Informe seu nome.',
            'descricao.required' => 'Informe a descrição do produto.',
            'vendedor.required' => 'Informe o nome do vendedor.',
            'orcamento.required' => 'Informe o orçamento.', 
            #mensagens para informar que o campo é numerico e/ou tem uma quantidade minima de caracter
            'orcamento.numeric' => ' Preencha o orçamento apenas com números',
            'nome.min' => 'O nome tem que ter no minimo 3 letras.',
            'vendedor.min' => 'Nome do vendedor, minimo: 3 letras',
            'descricao.min' => 'A descrição tem que ter no minimo 3 letras.',
        ];
    }
}
