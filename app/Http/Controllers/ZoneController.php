<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShowPlayStationsRequest;
use App\Models\Zone;


class ZoneController extends Controller
{

    public function index()
    {
        return view('dashboard', [
            'zones' => Zone::all(),
            'ps_stores' => null
        ]);
    }
    
    
    public function show(ShowPlayStationsRequest $request)
    {

        $zone_ps_relation = Zone::where('name', $request->input('zone_name'))->
            firstOrFail()->
            playStations();

        if ($request->input('ps_name'))
            $zone_ps_relation = $zone_ps_relation->where('name', $request->input('ps_name'));

        $ps_stores = $zone_ps_relation->
            orderBy('hour_price')->
            paginate(5);

        return redirect()->back()->with([
            'zones' => Zone::all(),
            'ps_stores' => $ps_stores
        ]);

    }
}
