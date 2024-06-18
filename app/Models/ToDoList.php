<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;
    protected $table = 'to_do_lists';

    protected $fillable = ['user_id', 'title', 'subtitle', 'expiration_date', 'priority', 'slug'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }



}
