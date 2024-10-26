<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }
    
    public function create()
    {
        return view('items.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);
    
        Item::create($request->all());
        return redirect()->route('items.index');
    }
    public function edit(Item $item)
{
    return view('items.edit', compact('item'));
}
public function update(Request $request, Item $item)
{
    $request->validate([
        'name' => 'required',
        'quantity' => 'required|integer',
        'price' => 'required|numeric',
    ]);

    $item->update($request->all());
    return redirect()->route('items.index')->with('success', 'Item berhasil diperbarui.');
}
    public function destroy(Item $item)
{
    $item->delete(); // Hapus item dari database
    return redirect()->route('items.index')->with('success', 'Item berhasil dihapus.');
}
    
}