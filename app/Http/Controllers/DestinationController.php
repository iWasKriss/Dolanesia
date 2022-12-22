<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('show');
    }

    public function index()
    {
        $destination = Destination::all();
        return view('destination.index', [
            'destination' => $destination
        ]);
    }

    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('destination.show', [
            'destination' => $destination
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('destination.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'name' => 'required|string|min:4',
            'category' => 'required|integer',
            'address' => 'required|string|min:4',
            'phone' => 'required|integer',
            'about' => 'required|string|min:5',
            'ticket' => 'required|integer|min:10',
            'price' => 'required|integer',
        ]);

        $file = $request->file('image');
        $fileName = pathinfo($file->getClientOriginalName())['filename'];
        $image = $fileName . date('Yds') . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/destinations/', $image);

        Destination::create([
            'image' => $image,
            'name' => $request->name,
            'category_id' => $request->category,
            'address' => $request->address,
            'phone' => $request->phone,
            'about' => $request->about,
            'ticket' => $request->ticket,
            'price' => $request->price,
        ]);

        return redirect('/destination')->with('message', 'destination successfully added');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $destination = Destination::findOrFail($id);
        return view('destination.edit', [
            'categories' => $categories,
            'destination' => $destination
        ]);
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        if ($request->file('image') == null) {
            $request->validate([
                'name' => 'required|string|min:4',
                'category' => 'required|integer',
                'address' => 'required|string|min:4',
                'phone' => 'required|integer',
                'about' => 'required|string|min:5',
                'ticket' => 'required|integer|min:10',
                'price' => 'required|integer',
            ]);

            $destination->update([
                'name' => $request->name,
                'category_id' => $request->category,
                'address' => $request->address,
                'phone' => $request->phone,
                'about' => $request->about,
                'ticket' => $request->ticket,
                'price' => $request->price,
            ]);
        } else {
            $request->validate([
                'image' => 'required',
                'name' => 'required|string|min:4',
                'category' => 'required|integer',
                'address' => 'required|string|min:4',
                'phone' => 'required|integer',
                'about' => 'required|string|min:5',
                'ticket' => 'required|integer|min:10',
                'price' => 'required|integer',
            ]);

            $file = $request->file('image');
            $fileName = pathinfo($file->getClientOriginalName())['filename'];
            $image = $fileName . date('Yds') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/destinations/', $image);

            if (Storage::exists('public/destinations/' . $destination->image)) {
                Storage::delete('public/destinations/' . $destination->image);
            }

            $destination->update([
                'image' => $image,
                'name' => $request->name,
                'category_id' => $request->category,
                'address' => $request->address,
                'phone' => $request->phone,
                'about' => $request->about,
                'ticket' => $request->ticket,
                'price' => $request->price,
            ]);
        }

        return redirect('/destination')->with('message', 'destination successfully edited');
    }

    public function destroy($id)
    {
        $des = Destination::findOrFail($id);
        if (Storage::exists('public/destinations/' . $des->image)) {
            Storage::delete('public/destinations/' . $des->image);
        }

        $des->delete();

        return redirect('/destination')->with('message', 'destination successfully deleted');
    }
}
