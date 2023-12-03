<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\MediaContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaContentController extends Controller
{
    public function index()
    {
        return view('admin.media-contents.page-listing-index');
    }

    public function getPageContents(Request $request)
    {
        $page = $request->page;
        $mediaContents = MediaContent::where('page', $page)->get();

        return view('admin.media-contents.home', compact('page', 'mediaContents'));
    }

    public function create(Request $request)
    {
        $page = $request->page;
        $type = $request->type;

        return view('admin.media-contents.create', compact('page', 'type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|file|mimes:jpeg,jpg,png,mp4,webp', // Add allowed file types
        ]);

        // Handle file upload
        $file = $request->file('file');
        $filePath = $file->store('uploads', 'public'); // Save to public/uploads
        $file->move('uploads', $filePath);

        $mediaContent = new MediaContent([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'file_path' => $filePath, // Store the file path in the database
            'page' => $request->input('page'),

        ]);

        $mediaContent->save();

        return redirect()->route('admin.media-contents.pages', ['page' => $request->page])->with('status', 'Site content uploaded successfully.');
    }

    public function edit(Request $request, $id)
    {
        $content = MediaContent::find($id);

        return view('admin.media-contents.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'file|mimes:jpeg,jpg,png,mp4,webp',
        ]);

        $mediaContent = MediaContent::find($id);
        $mediaContent->title = $request->input('title');
        $mediaContent->description = $request->input('description');

        if ($request->hasFile('file')) {
            // Update the file if a new one is provided
            $file = $request->file('file');
            $filePath = $file->store('uploads', 'public');
            $file->move('uploads', $filePath);
            $mediaContent->file_path = $filePath;
        }

        // Save the changes to the database
        $mediaContent->save();

        // Redirect to the appropriate page
        return redirect()->route('admin.media-contents.pages', ['page' => $mediaContent->page])->with('status', 'Site content updated successfully.');
    }


    public function delete($id)
    {
        $mediaContent = MediaContent::find($id);

        // Delete the associated file from storage
        Storage::disk('public')->delete($mediaContent->file_path);

        // Delete the media content from the database
        $mediaContent->delete();

        return redirect()->back()->with('status', 'Site content deleted successfully.');
    }

}
