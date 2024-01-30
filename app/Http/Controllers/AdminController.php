<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        // Nouveaux utilisateurs dans les 24 dernières heures
        $newUsers24Hrs = User::where('created_at', '>=', $now->subDay())
            ->count();

        // Nouveaux utilisateurs dans la dernière semaine
        $newUsersWeek = User::where('created_at', '>=', $now->subWeek())
            ->count();

        // Nouveaux utilisateurs dans le dernier mois
        $newUsersMonth = User::where('created_at', '>=', $now->subMonth())
            ->count();

        return view('admin.dashboard', compact('newUsers24Hrs', 'newUsersWeek', 'newUsersMonth'));
    }
}

