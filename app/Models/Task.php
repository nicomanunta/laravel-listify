<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['todolist_id', 'description', 'status'];

    public function todolists(){
        return $this->belongsTo(ToDoList::class, 'todolist_id');
    }
}
