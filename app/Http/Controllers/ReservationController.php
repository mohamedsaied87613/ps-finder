<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReservationRequest;
use App\Models\Reservation;
use App\Models\PlayStation;
use App\Models\User;


class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::where('user_id', auth()->user()->id)->
            orWhere('owner_id', auth()->user()->id)->
            orderByDesc('start_time')->
            paginate(5);

        return view('showresvs', [
            'reservations' => $reservations
        ]);
        //dd($reservations);
    }

    public function store(CreateReservationRequest $request, $id)
    {
        $ps = PlayStation::find($id);
        $user = auth()->user();

        // It doesn't make sense to reserve on your bussiness.
        // It's handled in the view but just in case some hacker passed this request with this condition.
        // We return 404 custom view.

        if ($ps->user_id == $user->id)
            return redirect()->route('error');

        Reservation::create([
            'start_time' => str_replace("T", " ", $request->input('start_time')),
            'status' => 'Active',
            'owner_id' => $ps->user_id,
            'user_id' => $user->id,
            'play_station_id' => $id
        ]);

        return redirect()->route('dashboard');
        
    }

    public function update($id, $status)
    {
        $reservation = Reservation::find($id);

        $reservation->update([
            'status' => $status
        ]);

        return redirect()->back();
    }
}
