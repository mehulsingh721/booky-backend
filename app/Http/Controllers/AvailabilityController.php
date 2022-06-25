<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\User;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = $request->query("userId");
        $user = User::find($userId);
        $availabilites = $user->events;
        return response()->json($availabilites, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = $request->query("userId");
        $availability = Availability::create([
            'name' => $request->name,
            'rules' => $request->rules,
            'timezone' => $request->timezone,
            'user_id' => $userId
        ]);
        return $availability;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignEvent(Request $request)
    {
        $eventId = $request->query("eventId");
        $availabilityId = $request->query("availabilityId");

        $availability = Availability::find($availabilityId);
        $availability->update([
            'event_id' => $eventId
        ]);
        return $availability;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->query("availabilityId");
        $availability = Availability::find($id);
        return $availability;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->query("availabilityId");
        $availability = Availability::find($id);
        $availability->update($request->all());
        return response()->json($availability);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->query("availabilityId");
        $availability = Availability::destroy($id);
        return response()->json("Deleted Availability", 200);
    }
}
