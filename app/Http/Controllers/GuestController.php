<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::orderByDesc('visited_at')->get();
        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'purpose' => 'required',
        ]);

        Guest::create([
            'name' => $request->name,
            'institution' => $request->institution,
            'purpose' => $request->purpose,
            'contact' => $request->contact,
            'visited_at' => now(),
        ]);

        return redirect()->route('guests.index');
    }

    public function edit(Guest $guest)
    {
        return view('guests.create', compact('guest'));
    }

    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'name' => 'required',
            'purpose' => 'required',
        ]);

        $guest->update($request->only('name', 'institution', 'purpose', 'contact'));

        return redirect()->route('guests.index');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();
        return back();
    }
}
