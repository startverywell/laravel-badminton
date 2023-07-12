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
use Illuminate\Support\Facades\Auth;

class MatchHistoryController extends Controller
{
    /**
     * Handle an index.
     *
     * @param  \Illuminate\Http\Request  $player2
     * @return \Illuminate\Http\Response
     */
    public function Index($player2 = null)
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('pages.match.history', [
            'users' => $users,
            'player2' => $player2
        ]);
    }

    /**
     * Handle an STORE.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Save(Request $request)
    {
        $history = new MatchHistory;
        $history->player1 = $request->player1;
        $history->player2 = $request->player2;
        $history->score1 = $request->score1;
        $history->score2 = $request->score2;
        $history->match_time = $request->match_time;
        $history->match_date = $request->match_date;
        $history->save();

        return redirect()->route('mypage');
    }
}
