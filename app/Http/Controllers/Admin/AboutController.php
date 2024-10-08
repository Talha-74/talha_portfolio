<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use function App\Helper\demo;
use function App\Helper\uploadFile;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'       => ['required'],
            'description' => ['required'],
            'image'       => ['image'],
            'resume'      => ['mimes:pdf,docs,csv,txt'],
        ]);

        $about      = About::first();
        // If there's no file uploaded, retain the old image path
        $imagePath = $about->image;
        if ($request->hasFile('image')) {
            $imagePath = uploadFile('image', $about);
        }

        // If there's no file uploaded, retain the old resume path
        $resumePath = $about->resume;
        if ($request->hasFile('resume')) {
            $resumePath = uploadFile('resume', $about);
        }


        About::updateOrCreate(
            ['id' => $id],
            [
                'title'       => $request->title,
                'description' => $request->description,
                'image'       => $imagePath,
                'resume'      => $resumePath,
            ]
        );

        toastr()->success('About Section Updated');
        return redirect()->back();
    }

    public function resumeDownload(){
        $about = About::first();
        return response()->download(public_path($about->resume));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
