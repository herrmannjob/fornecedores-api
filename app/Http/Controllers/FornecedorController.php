<?php

namespace App\Http\Controllers;

use App\Repositories\FornecedorRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class FornecedorController extends Controller
{
    protected $fornecedorRepository;
    private $client;

    public function __construct(FornecedorRepositoryInterface $fornecedorRepository)
    {
        $this->fornecedorRepository = $fornecedorRepository;
        $this->client = new Client();
    }

    public function index(Request $request)
    {
        try {
            $query = $this->fornecedorRepository->query();

            // Filtragem
            if ($request->has('nome')) {
                $query->where('nome', 'like', '%' . $request->input('nome') . '%');
            }

            if ($request->has('cnpj')) {
                $query->where('cnpj', 'like', '%' . $request->input('cnpj') . '%');
            }

            // Ordenação
            if ($request->has('sort_by')) {
                $sortBy = $request->input('sort_by');
                $sortOrder = $request->input('sort_order', 'asc'); // Valor padrão é 'asc'
                $query->orderBy($sortBy, $sortOrder);
            }

            // Paginação
            $perPage = $request->input('per_page', 10); // Valor padrão é 10
            $fornecedores = $query->paginate($perPage);

            return response()->json($fornecedores);
        } catch (\Exception $e) {
            Log::error("Erro ao listar fornecedores: " . $e->getMessage());
            return response()->json(['error' => 'Erro ao listar fornecedores'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'cnpj' => 'required|numeric|digits:14|unique:fornecedores',
                'nome' => 'required|string|max:255',
                'contato' => 'required|string|max:255',
                'endereco' => 'required|string|max:255',
            ]);

            $fornecedor = $this->fornecedorRepository->create($validatedData);

            return response()->json($fornecedor, 201);
        } catch (\Exception $e) {
            Log::error('Erro ao cadastrar fornecedor: ' . $e->getMessage());
            return response()->json(['error' => 'Erro interno no servidor'], 500);
        }
    }

    public function show($id)
    {
        try {
            $fornecedor = $this->fornecedorRepository->find($id);
            return response()->json($fornecedor);
        } catch (\Exception $e) {
            Log::error("Erro ao cadastrar fornecedor: " . $e->getMessage());
            return response()->json(['error' => 'Erro ao cadastrar fornecedor'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'cnpj' => 'required|numeric|digits:14|unique:fornecedores,cnpj,' . $id,
                'nome' => 'required|string|max:255',
                'contato' => 'required|string|max:255',
                'endereco' => 'required|string|max:255',
            ]);

            $fornecedor = $this->fornecedorRepository->update($id, $validatedData);

            return response()->json($fornecedor);
        } catch (\Exception $e) {
            Log::error("Erro ao atualizar fornecedor: " . $e->getMessage());
            return response()->json(['error' => 'Erro ao atualizar fornecedor'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->fornecedorRepository->delete($id);

            return response()->json(null, 204);
        } catch (\Exception $e) {
            Log::error('Erro ao remover fornecedor: ' . $e->getMessage());
            return response()->json(['error' => 'Erro interno no servidor'], 500);
        }
    }

    public function buscaCNPJ($cnpj)
    {
        try {
            $response = $this->client->request('GET', "https://brasilapi.com.br/api/cnpj/v1/{$cnpj}");
            $data = json_decode($response->getBody(), true);

            return response()->json($data);
        } catch (\Exception $e) {
            Log::error("Erro ao buscar CNPJ na BrasilAPI: " . $e->getMessage());
            return response()->json(['error' => 'Erro ao buscar CNPJ na BrasilAPI'], 500);
        }
    }
}
