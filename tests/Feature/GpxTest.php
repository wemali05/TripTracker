<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Trip;
use App\User;

class GpxTest extends TestCase
{
    
    public function testGpx()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->post(
            action('TripController@store'),
            ['file' => UploadedFile::fake()->create('example_text.gpx', 600, 600), 'name' => 'Trip Test']
        )->assertStatus(200);
    
    }
}
