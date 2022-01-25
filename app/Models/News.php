<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews()
    {
        return \DB::table($this->table)
            ->select('id', 'category_id', 'title', 'slug', 'author', 'status', 'description')
            ->get();
    }

    public function getNewsById(int $id)
    {
        return \DB::table($this->table)->find($id);
    }

}
