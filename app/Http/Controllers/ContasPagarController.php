<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

class ContasPagarController extends Controller
{
    public function listar(){

        $contas_pagar = DB::select('select * from contas_pagar');
        $html = '';
        foreach ($contas_pagar as $value) {
            $html .= 'Descrição: '.$value->descricao."<br>";
            $html .= 'Valor: '.$value->valor."<br>";
        }
        return $html;
    }
}
