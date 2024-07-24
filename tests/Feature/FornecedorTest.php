<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Fornecedor;

class FornecedorTest extends TestCase
{
    use RefreshDatabase;

    public function it_can_create_a_fornecedor()
    {
        $response = $this->postJson('/api/fornecedores', [
            'cnpj' => '12345678000195',
            'nome' => 'Fornecedor Teste',
            'contato' => '123456789',
            'endereco' => 'Rua Teste, 123',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'cnpj' => '12345678000195',
                     'nome' => 'Fornecedor Teste',
                 ]);
    }

    public function it_can_list_fornecedores()
    {
        // Cria alguns fornecedores usando a nova abordagem
        Fornecedor::factory()->count(3)->create();

        // Faz a requisição para listar os fornecedores
        $response = $this->getJson('/api/fornecedores');

        // Verifica se a resposta é bem-sucedida
        $response->assertStatus(200);

        // Verifica se os fornecedores estão na resposta
        $response->assertJsonCount(3, 'data');
    }

    public function it_can_update_a_fornecedor()
    {
        // Cria um fornecedor usando a fábrica
        $fornecedor = Fornecedor::factory()->create();

        // Dados para atualização
        $updatedData = [
            'nome' => 'Nome Atualizado',
            'contato' => 'Contato Atualizado',
        ];

        // Atualiza o fornecedor
        $response = $this->putJson("/api/fornecedores/{$fornecedor->id}", $updatedData);

        // Verifica se a resposta é bem-sucedida
        $response->assertStatus(200);

        // Verifica se os dados foram atualizados no banco de dados
        $this->assertDatabaseHas('fornecedores', $updatedData + ['id' => $fornecedor->id]);
    }

    public function it_can_delete_a_fornecedor()
    {
        // Cria um fornecedor usando a nova abordagem
        $fornecedor = Fornecedor::factory()->create();

        // Deleta o fornecedor
        $response = $this->deleteJson("/api/fornecedores/{$fornecedor->id}");

        // Verifica se a resposta é bem-sucedida
        $response->assertStatus(200);

        // Verifica se o fornecedor foi removido
        $this->assertDatabaseMissing('fornecedores', [
            'id' => $fornecedor->id,
        ]);
    }

    public function it_fetches_fornecedores()
    {
        // Cria um fornecedor usando a fábrica
        $fornecedor = Fornecedor::factory()->create();

        // Verifica se o fornecedor foi criado
        $this->assertDatabaseHas('fornecedores', [
            'cnpj' => $fornecedor->cnpj,
        ]);
    }
}
