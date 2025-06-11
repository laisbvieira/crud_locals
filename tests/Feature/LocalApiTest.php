<?php

namespace Tests\Feature;

use App\Models\Local;
use Illuminate\Support\Facades\Artisan;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LocalApiTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh');
    }

    #[Test]
    public function it_gets_all_locals()
    {
        $local = Local::factory()->count(3)->create();

        $response = $this->getJson('/api/locals/');

        $response->assertStatus(200);

        $response->assertJsonCount(3);

    }

    #[Test]
    public function it_gets_a_local_by_id()
    {
        $local = Local::factory()->create([
            'name' => 'Name Test',
            'slug' => 'test-slug',
            'city' => 'Test City',
            'state' => 'Test State',
        ]);

        $response = $this->getJson('/api/locals/' . $local->id);

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $local->id,
            'name' => 'Name Test',
            'slug' => 'test-slug',
            'city' => 'Test City',
            'state' => 'Test State',
        ]);
    }

    #[Test]
    public function it_gets_a_local_by_name()
    {
        Local::factory()->create([
            'name' => 'Paraisopolis',
            'slug' => 'paraisopolis-slug',
            'city' => 'Paraisopolis',
            'state' => 'MG',
        ]);

        Local::factory()->create([
            'name' => 'Outra Cidade',
            'slug' => 'outra-slug',
            'city' => 'Outra Cidade',
            'state' => 'SP',
        ]);

        $response = $this->getJson('/api/locals?name=Paraisopolis');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => 'Paraisopolis',
            'slug' => 'paraisopolis-slug',
            'city' => 'Paraisopolis',
            'state' => 'MG',
        ]);
    }

    #[Test]
    public function it_creates_a_local()
    {
        $response = $this->postJson('/api/locals', [
            'name' => 'São Paulo',
            'slug' => 'sp',
            'city' => 'São Paulo',
            'state' => 'SP',
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'São Paulo']);

        $this->assertDatabaseHas('locals', [
            'slug' => 'sp'
        ]);
    }

    #[Test]
    public function it_updates_a_local()
    {
        $local = Local::factory()->create([
            'name' => 'Name Test',
            'slug' => 'test-slug',
            'city' => 'Test City',
            'state' => 'Test State',
        ]);

        $response = $this->putJson('/api/locals/' . $local->id, [
            'name' => 'paraisopolis',
            'slug' => 'paris',
            'city' => 'Paraisopolis',
            'state' => 'minas gerais',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('locals', [
            'slug' => 'paris'
        ]);
    }

    #[Test]
    public function it_requires_name_to_create_a_local()
    {
        $response = $this->postJson('/api/locals', [
            'slug' => 'no-name',
            'city' => 'City',
            'state' => 'ST',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);
    }

    #[Test]
    public function it_requires_slug_to_create_a_local()
    {
        $response = $this->postJson('/api/locals', [
            'name' => 'no-slug',
            'city' => 'City',
            'state' => 'ST',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['slug']);
    }

    #[Test]
    public function it_requires_city_to_create_a_local()
    {
        $response = $this->postJson('/api/locals', [
            'name' => 'name',
            'slug' => 'slug',
            'state' => 'ST',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['city']);
    }

    #[Test]
    public function it_requires_state_to_create_a_local()
    {
        $response = $this->postJson('/api/locals', [
            'name' => 'name',
            'slug' => 'slug',
            'city' => 'City',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['state']);
    }
}
