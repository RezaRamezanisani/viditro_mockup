<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProjectOutput extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_project_id',
        'json',
        'render',
        'output',
        'status'
    ];
}
