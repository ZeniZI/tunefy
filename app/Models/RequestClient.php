<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Musiclist;
use Laravel\Sanctum\HasApiTokens;

class Requestclient extends Authenticatable
{
    use  HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user_request';
    protected $fillable = [
        'id',
        'email',
        'first_name',
        'last_name',
        'bpm',
        'genre',
        'instruments',
        'chord',
        'audio',
        'company',
        'notes',
        'payment',
    ];

    public function musiclist()
    {
        return $this->belongsTo(Musiclist::class, 'owner_id', 'user_id');
    }
}
