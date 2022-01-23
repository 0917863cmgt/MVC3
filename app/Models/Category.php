<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'is_parent',
        'parent_id',
        'name',
        'slug',
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

        $query->where('name','like','%' . $search .'%')
            ->orWhere('slug','like','%' . $search .'%')
        )
        );

        $query->when($filters['parent'] ?? false, fn($query, $parent) =>
        $query->where('parent_id', $parent)
        );

    }

    public function recipes(){
        return $this->belongsToMany(Recipe::class, 'category_recipe');
    }

    public function parent()
    {
        return $this->belongsTo('Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Category', 'parent_id');
    }
}
