<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use MongoDB\Laravel\Eloquent\Model;

class EventController extends Controller
{
    public function index()
    {
        $events = Events::all();
        return view('index', compact('events'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'event_name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
        ]);

        Events::create($data);

        return redirect()->route('index');
    }

    public function destroy($id)
    {
        Events::findOrFail($id)->delete();

        return redirect()->route('index');
    }
}
