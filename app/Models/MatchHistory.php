<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchHistory extends Model
{
    use HasFactory;

    protected $table = 'match_history';

    /**
     * Get the player1 user associated with the player.
     */
    public function playerOne()
    {
        return $this->hasOne(User::class, 'id', 'player1');
    }

    /**
     * Get the player2 user associated with the player.
     */
    public function playerTwo()
    {
        return $this->hasOne(User::class, 'id', 'player2');
    }
}
