<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'body', 'image'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

//    protected static function booted()
//    {
//        static::addGlobalScope('active', function (Builder $builder) {
//            $builder->where('status', 1);
//        });
//    }
//
//    public function scopeViewer($query)
//    {
//        $query->where('viewer', '>=', 700);
//    }
}
