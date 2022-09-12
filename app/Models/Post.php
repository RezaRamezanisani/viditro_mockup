<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'except',
        'content',
        'thumbnail',
        'aep',
        'script',
        'project_token',
        'project_model',
        'project_direction',
        'parent',
        'post_type',
        'status',
        'published_at',
        'deleted_at',
        'renders',
    ];

    public function layers(){
        return $this->hasMany(Layers::class);
    }
    public function userProjects(){
        return $this->hasMany(UserProject::class);
    }
    public function href(){
        return url("{$this->post_type}/{$this->id}/{$this->slug}");
    }
}
