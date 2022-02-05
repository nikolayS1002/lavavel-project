<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNewsAvaileble()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function testNewsShow()
    {
        $response = $this->get(route('news.show', ['id' => mt_rand(1, 10)]));

        $response->assertStatus(200);
    }

    public function testNewsAdminAvaileble()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testNewsCreateAdminAvaileble()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testAboutAvaileble()
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
    }

    public function testNewsAdminCreated()
    {
        $category = Category::factory()->create();
        $responseData = News::factory()->create([
            'category_id' => $category->id,
            'title' => 'Some title',
            ]);
        dd($responseData);
        $responseData = [
            'category_id' => '3',
            'title' => 'Some title',
            'author' => 'Admin',
            'status' => 'DRAFT',
            'description' => 'Some text'
        ];

        $response = $this->post(route('admin.news.store'), $responseData);

        $response->assertStatus(302);
    }

}
