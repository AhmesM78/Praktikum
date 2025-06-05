<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
$request->validate([
    'merk' => 'required',
    'model' => 'required',
    'year' => 'required|numeric',
    'image' => 'nullable|image|max:2048',
]);

$path = $request->file('image')?->store('images', 'public');

Car::create([
    'merk' => $request->merk,
    'model' => $request->model,
    'year' => $request->year,
    'color' => $request->color,
    'price' => $request->price,
    'image' => $path,
]);



        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'color' => 'required',
            'year' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $car->image = $path;
        }

        $car->update($request->except('image'));

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }
}
