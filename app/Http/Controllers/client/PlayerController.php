<?php
/**
 * @description : This is my page controller.
 * @author :Uranus
 * @created date :2023-07-12 
 */
namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MatchHistory;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /**
     * Handle an index.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        $histories = MatchHistory::where('player1', Auth::user()->id)
                                    ->orWhere('player2', Auth::user()->id)
                                    ->orderby('id', 'desc')
                                    ->paginate(10);
        return view('pages.mypage.index', [
            'histories' => $histories,
        ]);
    }
}
