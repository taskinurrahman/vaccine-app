<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchScheduleRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{

    public function searchSchedule(SearchScheduleRequest $request): JsonResponse
    {
        $nid = $request->input('nid');

        $user = User::where('nid', $nid)->first();

        if ($user) {
            return response()->json(['success' => true, 'user' => $user]);
        }

        return response()->json(['success' => false, 'message' => 'User not found.']);
    }
}
