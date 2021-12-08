<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePSRequest;
use App\Http\Requests\UpdatePSRequest;
use App\Models\PlayStation;
use App\Models\Zone;


class PlayStationController extends Controller
{

    public function index()
    {
        return view('createbuss', [
            'zones' => Zone::all()
        ]);
    }
   
    public function store(StorePSRequest $request)
    {
        PlayStation::create([
            'name' => $request->input('name'),
            'full_address' => $request->input('full_address'),
            'description' => $request->input('description'),
            'offer' => $request->input('offer'),
            'hour_price' => $request->input('hour_price'),
            'open_at' => $request->input('open_at'),
            'closed_at' => $request->input('closed_at'),
            'user_id' => auth()->user()->id,
            'zone_id' => Zone::firstWhere('name', $request->input('zone_name'))->id
        ]);

        return redirect()->route('dashboard');
    }

    
    public function show_ps($id)
    {
        return view('/showps')->with('ps_store', PlayStation::find($id));
    }

    public function show_buss($id)
    {
        $ps = PlayStation::find($id);

        if (auth()->user()->id != $ps->user_id)
            return redirect()->route('error');

        return view('/bussprofile', [
            'ps_store' => $ps,
            'zones' => Zone::all()
        ]);
    }

    public function update(UpdatePSRequest $request, $id)
    {
        
        $zone_id = Zone::firstWhere('name', $request->input('zone_name'))->id;
        
        // owner is not updatable.

        PlayStation::where('id', $id)->
            update([
                'name' => $request->input('name'),
                'full_address' => $request->input('full_address'),
                'description' => $request->input('description'),
                'offer' => $request->input('offer'),
                'hour_price' => $request->input('hour_price'),
                'open_at' => $request->input('open_at'),
                'closed_at' => $request->input('closed_at'),
                'zone_id' => $zone_id
        ]);

        return redirect()->route('bussinessinfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PlayStation::where('id', $id)->delete();
        return redirect()->back();
    }
}
