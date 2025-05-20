<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|in:lost,found',
            'location' => 'required|string',
            'contact_email' => 'required|email',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $item = Item::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'location' => $request->location,
            'contact_email' => $request->contact_email,
            'image_path' => $imagePath,  // important: image_path here
        ]);

        return response()->json([
            'success' => true,
            'item' => $item
        ], 201);
    }
public function index($type)
{
    $items = Item::where('type', $type)->orderBy('created_at', 'desc')->get();

    $items->transform(function ($item) {
        if ($item->image_path) {
            $item->image_path = asset('storage/' . $item->image_path);
        }
        return $item;
    });

    return response()->json($items);
}

public function show($id)
{
    $item = Item::find($id);
    if (!$item) {
        return response()->json(['message' => 'Item not found'], 404);
    }

    return response()->json($item);
}

public function destroy($id)
{
    $item = Item::find($id);
    if (!$item) {
        return response()->json(['message' => 'Item not found'], 404);
    }

    // Optional: delete image file from storage
    if ($item->image_path && \Storage::disk('public')->exists($item->image_path)) {
        \Storage::disk('public')->delete($item->image_path);
    }

    $item->delete();
    return response()->json(['message' => 'Item deleted successfully']);
}
}





