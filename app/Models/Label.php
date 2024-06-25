<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'label_name', 'label_color'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function todolists(){
        return $this->belongsToMany(ToDoList::class, 'label_todolist', 'todolist_id', 'label_id');
    }
}
