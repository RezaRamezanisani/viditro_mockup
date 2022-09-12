<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Attachments extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'user_id',
        'relation_type',
        'relation_id',
        'title',
        'unique_name',
        'description',
        'poster',
        'mime',
        'type',
        'extension',
        'size',
        'duration',
        'path',
        'parent',
        'in',
        'deleted_at',
    ];
}
