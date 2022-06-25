<?php

namespace App\Http\Controllers;

use App\Models\AppUserEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
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
        $event = $user->events;
        return response()->json($event, 200);
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
        $user = User::find($userId);
        $event = AppUserEvent::create([
            'name' => $request->name,
            'meetLocation' => $request->meetLocation,
            'description' => $request->description,
            'eventLink' => $request->eventLink,
            'color' => $request->color,
            'type' => $request->type,
            'inviteeQuestions' => $request->inviteeQuestions,
            'user_id' => $user->id
        ]);
        /* $event = $user->events()->create($request->all()); */
        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->query("eventId");
        $event = AppUserEvent::find($id);
        return response()->json($event, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = AppUserEvent::find($id);
        $event->update($request->all());
        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AppUserEvent::destroy($id);
        return response()->json("Deleted User", 200);
    }
}
