<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function searchSchedule(Request $request) {
        $nid = $request->input('nid');

        // Find user based on NID (mocked example)
        $user = User::where('nid', $nid)->first();

        if ($user) {
            return view('your-view-name', ['user' => $user]);
        } else {
            return view('your-view-name', ['notFound' => true]);
        }
    }
}
