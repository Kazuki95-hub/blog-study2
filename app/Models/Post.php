<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable=[
        'title',
        'body',
        'category_id'
        ];
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    public function getPaginateByLimit(int $limit_count = 6)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate(6);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function searchPaginateByLimit(string $keyword,int $limit_count =6 )
    {
        return $this->where('title', 'LIKE' ,"%{$keyword}")
                    ->orWhere('body' ,'LIKE',"%{$keyword}")
                    ->paginate($limit_count);
    }
}
