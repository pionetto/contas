<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\ContasPagar;

use Validator;

class ContasPagarController extends Controller
{
    public function listar(){

        //$contas_pagar = DB::select('select * from contas_pagar');
        $contas_pagar = ContasPagar::all();
        return view('listar')->with('contas_pagar', $contas_pagar);
    }
    public function cadastro(){
        return view('cadastro');
    }
    public function editar($id){
        $contas_pagar = ContasPagar::find($id);
        if (empty($contas_pagar)){
            return 'Contas a Pagar não existe';
            } else {
                return view('editar')->with('contas_pagar', $contas_pagar);
        }
    }
    public function apagar($id){
        $contas_pagar = ContasPagar::find($id);
        $contas_pagar->delete();
        
        return redirect()->action('ContasPagarController@listar');
    }
    public function update($id){
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        
        $contas_pagar = ContasPagar::find($id);
        $contas_pagar->descricao = $descricao;
        $contas_pagar->valor = $valor;
        $contas_pagar->save();

        return redirect()->action('ContasPagarController@listar')->withInput();
    }    
/*    public function apagar($id){
        $id = Request::delete();        
        return view('apagar');
    }    */

    public function salvar(){
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');

        $validator = Validator::make(
            [
                'descricao' => $descricao,
                'valor' => $valor
            ],
            [
                'descricao' => 'required|min:6',
                'valor' => 'required|numeric'
            ]
            );
            if ($validator->fails()){
                return redirect()->action('ContasPagarController@cadastro')->withErrors($validator);
            }

        /*DB::insert('INSERT INTO contas_pagar (descricao, valor) VALUES (?, ?)',
            array($descricao, $valor));*/
        
        $contas_pagar = new ContasPagar();
        $contas_pagar->descricao = $descricao;
        $contas_pagar->valor = $valor;
        $contas_pagar->save();

        return redirect()->action('ContasPagarController@listar')->withInput();
    }    
}
