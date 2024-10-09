<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use Illuminate\Http\Request;

class HikeController extends Controller
{
    public function saveHike(Request $request)
    {
        $recommend = $request->has('would_recommend') ? 1 : 0;
        $name = $request->input('hike_name');
        $steepness = $request->input('steepness');
        $miles = (float)$request->input('miles');
        dump($miles);
        $hike = Hike::create([
            'name' => $name,
            'steepness' => $steepness,
            'miles' => $miles,
            'recommend' => $recommend
        ]);

        return $hike;
    }

    public function getAll(Request $request)
    {
        return Hike::all();
    }

    public function getDetail(Hike $hike)
    {
        return $hike;
    }
}
