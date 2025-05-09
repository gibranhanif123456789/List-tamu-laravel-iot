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
            'status' => 'required',
        ]);
    
        Guest::create($request->all());
    
        return redirect()->route('guests.index')->with('success', 'Tamu berhasil ditambahkan.');
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
            'status' => 'required',
        ]);
    
        $guest->update($request->all());
    
        return redirect()->route('guests.index')->with('success', 'Data tamu berhasil diperbarui.');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();
        return back();
    }
}
