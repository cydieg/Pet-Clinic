<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        $inventoryItems = Inventory::all();
        return view('inventory.index', compact('inventoryItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust size as needed
            'category' => 'required',
            'price' => 'required|numeric',
            'created_at' => 'required|date',
            'expiration' => 'required|date'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Generate UPC
        $upc = time() . mt_rand(100000, 999999);

        Inventory::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'image' => $imageName,
            'category' => $request->category,
            'price' => $request->price,
            'upc' => $upc,
            'created_at' => $request->created_at,
            'expiration' => $request->expiration
        ]);

        return redirect()->route('inventory.index')->with('success', 'Product added successfully.');
    }
}
