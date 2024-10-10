<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveHikeFormRequest;
use App\Models\Difficulty;
use App\Models\Hike;
use Illuminate\Http\Request;

class HikeController extends Controller
{
    public function saveHike(SaveHikeFormRequest $request)
    {

        $difficulty = Difficulty::where('name', $request->difficulty)
            ->first()
            ->getKey();

        $hike = Hike::create([
            'name' => $request->hikeName,
            'steepness' => $request->steepness,
            'miles' => $request->miles,
            'recommend' => $request->wouldRecommend,
            'difficulty_id' => $difficulty
        ]);
        return $hike;
    }

    public function getAll(Request $request)
    {
        return Hike::all();
    }

    public function getDetail(Hike $hike)
    {
        $hike->load('difficulty');
        return $hike;
    }
}
