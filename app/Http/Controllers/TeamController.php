<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::all();

        return view('team.index', compact('team'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
    {
        $team = new Team;
        $team->name = $request->get('team_name');
        $team->coins = $request->get('team_coin');
        $team->save();

        return redirect()->route('team.create')->with('status', 'Teams successfully added!');
    }

    public function show(Team $team)
    {
        return view('team.show', compact('team'));
    }

    public function edit(Team $team)
    {
        return view('team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $team->name = $request->get('team_name');
        $team->coins = $request->get('team_coin');
        $team->save();

        return redirect()->route('team.edit', ['team' => $team->id])->with('status', 'Teams successfully updated!');
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('team.index')->with('status', 'Team successfully removed!');
    }
}
