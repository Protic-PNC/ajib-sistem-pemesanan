<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CompleteDataTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_complete_data_index(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('complete-data.index'));

        $response
            ->assertSuccessful()
            ->assertViewHas("branches");
        $branches = $response->original["branches"];

        $this->assertIsArray($branches);
    }

    public function test_complete_data_store_validation_failed(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route("complete-data.store"), [
            'kabupaten' => "zxzxczxc",
            'kecamatan' => "wqeqwewq",
            'kelurahan' => "asdasdd",
            'branch_id' => "2",
            "rt" => 123
        ]);

        $response->assertSessionHasErrors(["rt", "rw"]);
    }

    public function test_complete_data_store_success(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image("rumah.jpg");

        $response = $this->post(route("complete-data.store"), [
            'kabupaten' => "zxzxczxc",
            'kecamatan' => "wqeqwewq",
            'kelurahan' => "asdasdd",
            'branch_id' => "2",
            'rt' => "1",
            'rw' => "1",
            'alamat' => "1",
            'kode_pos' => "1",
            'no_hp' => "1",
            'foto_rumah' => $file
        ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        // TODO: test file upload
        // dd(Storage::files());
        // Storage::assertExists($file->hashName());

        $this->assertNotNull($user->detailConsumer);
    }
}
