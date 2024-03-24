<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Requestclient;

class Musiclist extends Model
{
    use HasFactory;
    protected $table = 'music_list';
    protected $fillable = [
        'title',
        'genre',
        'time',
        'img',
        'link',
        'audio'
    ];

    public function requestclients()
    {
        return $this->hasMany(Requestclient::class, 'user_id', 'owner_id');
    }
}
