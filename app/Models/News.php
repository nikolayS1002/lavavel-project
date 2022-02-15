<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpParser\Builder;

class News extends Model
{
    use HasFactory, Sluggable;

    public static $availableFields = [
        'id', 'title', 'author', 'status', 'image', 'description', 'created_at'
    ];
    protected $table = 'news';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'author',
        'status',
        'description',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /* protected $guarded = [
        'id'
    ]; */

//    public function getTitleAttribute($value) {
//        return mb_strtoupper($value);
//    }


  /*  public function getNews()
    {
        return \DB::table($this->table)
            ->select('id', 'category_id', 'title', 'slug', 'author', 'status', 'description')
            ->get();
    }

    public function getNewsById(int $id)
    {
        return \DB::table($this->table)->find($id);
    }
  */

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
