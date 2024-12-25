<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('backend.pages.about.index', compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $about = new About();

        $about->main_title = $request->main_title;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->color = $request->color;
        $about->video = $request->video;

        if ($request->file('image')) {
            $image = $request->file('image');

            $imageName = microtime('.').'.'.$image->getClientOriginalExtension();
            $imagePath = 'public/backend/image/about/';
            $image->move($imagePath, $imageName);

            $about->image = $imagePath.$imageName;
        }

        $about->save();

        $notification = array(
            'message' => "About section content uploaded successfully.",
            'alert-type' => "success"
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about = About::find($id);

        $about->main_title = $request->main_title;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->video = $request->video;

        if ($request->file('image')) {
            $image = $request->file('image');

            if (!is_null($about->image) && file_exists($about->image)) {
                unlink($about->image);
            }

            $imageName = microtime('.').'.'.$image->getClientOriginalExtension();
            $imagePath = 'public/backend/image/about/';
            $image->move($imagePath, $imageName);

            $about->image = $imagePath.$imageName;
        }

        $about->save();

        $notification = array(
            'message' => "About section content Updated successfully.",
            'alert-type' => "success"
        );

        return redirect()->back()->with($notification);
    }
}
