<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Clinic;

class InventoryController extends Controller
{
    public function index()
    {
        $clinics = Clinic::all();
        $inventoryItems = Inventory::all();
        return view('inventory.index', compact('clinics', 'inventoryItems'));
    }

    public function store(Request $request)
{
    // Validation rules for the form inputs
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'quantity' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category' => 'required',
        'price' => 'required|numeric',
        'created_at' => 'required|date',
        'expiration' => 'required|date',
        'clinic_id' => 'required|exists:clinics,id'
    ]);

    // Handle file upload
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imageName);

    // Generate UPC (Example: Concatenating current timestamp with a random number)
    $upc = time() . rand(1000, 9999);

    // Create new inventory item with UPC
    Inventory::create([
        'upc' => $upc,
        'name' => $request->name,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'image' => $imageName,
        'category' => $request->category,
        'price' => $request->price,
        'created_at' => $request->created_at,
        'expiration' => $request->expiration,
        'clinic_id' => $request->clinic_id
    ]);

    return redirect()->route('inventory.index')->with('success', 'Product added successfully.');
}

}
