<?php
/**
 * @description : This is match history controller.
 * @author :Uranus
 * @created date :2023-07-12 
 */
namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MatchHistory;

class MatchHistoryController extends Controller
{
    /**
     * Handle an register.
     *
     * @param  \Illuminate\Http\Request  $player2
     * @return \Illuminate\Http\Response
     */
    public function Index($player2 = null)
    {
        $users = User::paginate(10);
        return view('pages.match.history', [
            'users' => $users,
            'player2' => $player2
        ]);
    }
}
