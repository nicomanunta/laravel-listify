<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['to_do_list_id', 'description', 'status'];

    public function toDoLists(){
        return $this->belongsTo(ToDoList::class);
    }
}
