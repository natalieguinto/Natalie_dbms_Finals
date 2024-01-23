<?php

namespace App\Http\Controllers;

use App\Models\Participants;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function show()
    {
        $participants = Participants::all();
        return view('show', compact('participants'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'participant_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Participants::create($data);

        return redirect()->route('show');
    }

    public function destroy($id)
    {
        Participants::findOrFail($id)->delete();

        return redirect()->route('show');
    }

     public function edit($id)
     {
         $participant = Participants::findOrFail($id);
 
         return view('edit', compact('participant'));
     }
 
     public function update(Request $request, $id)
     {
         $data = $request->validate([
             'participant_name' => 'required',
             'email' => 'required|email',
             'phone' => 'required',
         ]);
 
         Participants::findOrFail($id)->update($data);
 
         return redirect()->route('show');
     }

     public function shows($id)
{
    $participant = Participants::findOrFail($id);

    return view('show', compact('participant'));
}
}
