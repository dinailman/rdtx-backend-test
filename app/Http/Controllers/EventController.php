<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function create(Request $request)
    {
        $event = Events::create($request->all());

        return response()->json($event, 201);
    }

    public function update($id, Request $request)
    {
        $event = Events::findOrFail($id);
        $event->update($request->all());

        return response()->json($event, 200);
    }

    public function delete($id)
    {
        Events::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
    
}
