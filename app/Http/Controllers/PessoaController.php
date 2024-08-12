<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
        if ($pessoas->isEmpty()) {
            return response()->json(['message' => 'Não há ninguém na lista'], 404);
        }
    
        return response()->json($pessoas);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'dataNascimento' => 'required|date',
            'salario' => 'required|numeric',
            'observacoes' => 'nullable|string',
            'nomeMae' => 'nullable|string|max:255',
            'nomePai' => 'nullable|string|max:255',
            'cpf' => 'required|string|size:11|unique:pessoas',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $pessoa = Pessoa::create($request->all());
        return response()->json($pessoa, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $pessoa = Pessoa::find($id);

        if (!$pessoa) {
            return response()->json(['message' => 'Pessoa não encontrada'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($pessoa);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'sometimes|required|string|max:255',
            'dataNascimento' => 'sometimes|required|date',
            'salario' => 'sometimes|required|numeric',
            'observacoes' => 'nullable|string',
            'nomeMae' => 'nullable|string|max:255',
            'nomePai' => 'nullable|string|max:255',
            'cpf' => 'sometimes|required|string|size:11|unique:pessoas,cpf,' . $id . ',idPessoa',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $pessoa = Pessoa::find($id);

        if (!$pessoa) {
            return response()->json(['message' => 'Pessoa não encontrada'], Response::HTTP_NOT_FOUND);
        }

        $pessoa->update($request->all());
        return response()->json($pessoa);
    }

  
    public function destroy($id)
    {
        $pessoa = Pessoa::find($id);

        if (!$pessoa) {
            return response()->json(['message' => 'Pessoa não encontrada'], Response::HTTP_NOT_FOUND);
        }

        $pessoa->delete();
        return response()->json(['message' => 'Pessoa deletada com sucesso']);
    }
}
