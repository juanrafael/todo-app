<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = "todos";
    protected $fillable = ['task', 'status'];
}
