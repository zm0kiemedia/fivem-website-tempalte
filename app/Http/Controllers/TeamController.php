<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $members = \App\Models\TeamMember::orderBy('rank_order', 'asc')->get();
        return view('team.index', compact('members'));
    }
}
