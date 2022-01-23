<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'slug',
        'user_id',
        'title',
        'description',
        'image',
        'amount_people',
        'ingredients',
        'steps',
        'published',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query->where(fn($query) =>

        $query->where('title','like','%' . $search .'%')
            ->orWhere('description','like','%' . $search .'%')
        )
        );

        $query->when($filters['protein'] ?? false, fn($query, $protein) =>
        $query->wherehas('categories',fn($query)=>
        $query->where('category_id', $protein))
        );

        $query->when($filters['vegetables'] ?? false, fn($query, $vegetables) =>
        $query->wherehas('categories',fn($query)=>
        $query->where('category_id', $vegetables))
        );

        $query->when($filters['cuisine'] ?? false, fn($query, $cuisine) =>
        $query->wherehas('categories',fn($query)=>
        $query->where('category_id', $cuisine))
        );

        $query->when($filters['course'] ?? false, fn($query, $course) =>
        $query->wherehas('categories',fn($query)=>
        $query->where('category_id', $course))
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
        $query->whereHas('author',fn($query)=>
        $query->where('username', $author))
        );
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_recipe');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
