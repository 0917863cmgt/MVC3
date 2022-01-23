<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'recipe_id',
        'comment_id',
        'message',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo('Comment', 'comment_id');
    }

    public function children()
    {
        return $this->hasMany('Comment', 'comment_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
