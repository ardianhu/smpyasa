<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PhotoController extends Controller
{
    //
    public function index()
    {
        $photos = Photo::all(); // Retrieve all photos
        return view('dashboard.galeri.index', compact('photos'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'images' => 'required|array',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:10000',
            ]);

            // Array to store image paths
            $imagePaths = [];

            // Check if the request contains image files and store them
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    // Store each image in the 'images' directory within the 'public' disk
                    $imagePaths[] = $image->store('images', 'public');
                }
            }

            $model = new Photo();
            $model->title = $request->title;
            $model->image_path = json_encode($imagePaths);
            $model->save();

            return response()->json([
                'success' => true,
                'data' => $model,
            ]);
        } catch (\Exception $e) {
            Log::error('Error storing photos: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to store photos.',
            ], 500);
        }
    }
}
