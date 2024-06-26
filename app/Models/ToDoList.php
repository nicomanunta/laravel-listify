<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;
    

    protected $fillable = ['user_id', 'title', 'subtitle', 'expiration_date', 'priority', 'slug'];

    protected $table = 'todolists';
    

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class, 'todolist_id');
    }

    public function labels(){
        return $this->belongsToMany(Label::class, 'label_todolist', 'todolist_id', 'label_id');
    }



}
