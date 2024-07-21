<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
#use App\Models\Cliente as ModelsCliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{   //
    protected $model;
    public function __construct(cliente $cliente)
    {   //chamar o model e receber a variavel cliente
        $this->model = $cliente;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Vai listar tudo que tem na Tabela cliente
        return response($this->model->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        //Precisa preencher as informações que serão armazenadas dentro do requeste que vai ver de lá
        $this->model->create($request->all());
        return response('Criado com sucesso');
        } catch (\Throwable $th){
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $cliente = $this->model->find($id);
        if (!$cliente) {
            # code...
            return response('Cliente não localizado');
        }
        return response($cliente);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Tratando os dados recebidos para atualizar
        $cliente = $this->model->find($id);
        if (!$cliente) {
            return response('Cliente não encontrado!');
        }
        try {
            $dados = $request->all();
            $cliente->fill($dados)->save();
            return response('Cliente atualizado');

        } catch (\Throwable $th) {
            throw $th;
            
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cliente = $this->model->find($id);
        if (!$cliente) {
            return response('Cliente não encontrado');
        }
        try {
            $cliente->delete();
            return response('Cliente excluído');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
