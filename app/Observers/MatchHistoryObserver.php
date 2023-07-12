<?php

namespace App\Observers;

use App\Models\MatchHistory;
use App\Models\User;

class MatchHistoryObserver
{
    /**
     * Handle the MatchHistory "created" event.
     *
     * @param  \App\Models\MatchHistory  $matchHistory
     * @return void
     */
    public function created(MatchHistory $matchHistory)
    {
        //
        \Log::info("*****======-----MatchHistoryObserver::create-----======*****");
        
        $player1 = User::where('id', $matchHistory->player1)->first();
        $score1 = $matchHistory->score1;
        $score2 = $matchHistory->score2;

        $score1 > $score2 ? $player1->point += 30 : $player1->point += $score1-30;
        $score1 > $score2 ? $player1->win += 1 : $player1->lose += 1;
        $player1->save();

        $player2 = User::where('id', $matchHistory->player2)->first();
        $score1 < $score2 ? $player2->point += 30 : $player2->point += $score2-30;
        $score1 < $score2 ? $player2->win += 1 : $player2->lose += 1;
        $player2->save();
    }

    /**
     * Handle the MatchHistory "updated" event.
     *
     * @param  \App\Models\MatchHistory  $matchHistory
     * @return void
     */
    public function updated(MatchHistory $matchHistory)
    {
        //
    }

    /**
     * Handle the MatchHistory "deleted" event.
     *
     * @param  \App\Models\MatchHistory  $matchHistory
     * @return void
     */
    public function deleted(MatchHistory $matchHistory)
    {
        //
    }

    /**
     * Handle the MatchHistory "restored" event.
     *
     * @param  \App\Models\MatchHistory  $matchHistory
     * @return void
     */
    public function restored(MatchHistory $matchHistory)
    {
        //
    }

    /**
     * Handle the MatchHistory "force deleted" event.
     *
     * @param  \App\Models\MatchHistory  $matchHistory
     * @return void
     */
    public function forceDeleted(MatchHistory $matchHistory)
    {
        //
    }
}
