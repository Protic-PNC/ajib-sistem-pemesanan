<?php

namespace Tests\Feature;

use App\Models\DetailConsumer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_add_product_to_cart(): void
    {
        $user = User::factory()
            ->has(DetailConsumer::factory(), 'detailConsumer')
            ->create();
        $this->actingAs($user);

        $response = $this->post(route('cart.store'), [
            "product_id" => 1,
            "qty" => 1
        ]);

        $response->assertSuccessful();
        $response->assertJson(["count" => 1]);
    }

    // TODO
    // public function test_user_can_delete_item_from_cart(): void
    // {
    //     $user = User::factory()
    //         ->has(DetailConsumer::factory(), 'detailConsumer')
    //         ->create();
    //     $this->actingAs($user);

    //     $this->withSession([

    //     ])->delete(route('cart.destroy', ["id" => 456]));
    // }
}
