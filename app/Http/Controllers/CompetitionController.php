<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display the teams input form
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Handle the submission of the teams input form
     *
     * Validate the input, clear the previous data, add the teams to the database
     * and redirect the user to the first round.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addTeams(Request $request)
    {
        $request->validate(['teams' => 'required|array|min:8|max:8']);

        // Clear previous data
        Team::truncate();

        // Add teams to the database
        foreach ($request->teams as $teamName) {
            Team::create(['name' => $teamName]);
        }

        return redirect('/round/1');
    }

    /**
     * Display the round form
     *
     * Shows the round form with the teams to select the winners from.
     *
     * @param  int  $round
     * @return \Illuminate\View\View
     */
    public function round($round)
    {
        $teams = Team::all();
        $wildCardEntry = ($round == 3); // Enable wildcard entry for round 3
        $requiredWinners = match ($round) {
            1 => 4,
            2 => 2,
            3 => 2,
            4 => 1,
            default => 0,
        };
    
        return view('round', compact('teams', 'wildCardEntry', 'round', 'requiredWinners'));
    }

    /**
     * Select the winners of a round
     *
     * Validates the input, marks the selected teams as winners and the rest as losers,
     * handles wildcard entries for round 3, and redirects to the next round.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function selectWinners(Request $request)
    {
        $request->validate(['winners' => 'required|array']);

        // Mark winners and losers for this round
        $winners = $request->winners;
        $losers = Team::whereNotIn('id', $winners)->get();

        foreach ($losers as $loser) {
            $loser->delete();
        }

        // Handle wild card entry in Round 3
        if ($request->wild_card_teams) {
            foreach ($request->wild_card_teams as $teamName) {
                Team::create(['name' => $teamName]);
            }
        }

        if (Team::count() == 1) {
            // If 1 team left, declare winner
            $winner = Team::first();
            return view('winner', compact('winner'));
        }

        // Redirect to the next round
        $nextRound = $request->round + 1;
        return redirect("/round/{$nextRound}");
    }
}
