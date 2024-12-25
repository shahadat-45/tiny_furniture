<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use DataTables;

class BannerController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.banner.index');
    }

    public function getData(Request $request)
    {
        $banners = Banner::all();

        // dd($categories);

        return DataTables::of($banners)
             ->addIndexColumn()
             ->addColumn('banner_img', function ($banner) {
                return '<img src="'. asset($banner->banner_img) .'" alt="" style="width: 65px;">';
             })
             ->addColumn('title', function ($banner) {
                if( !is_null($banner->title) ){
                    return '<span class="badge rounded-pill bg-label-primary">'. $banner->title .'</span>';
                }
                else{
                    return '<span class="badge rounded-pill bg-label-danger">N/A</span>';
                }
             })
            ->addColumn('action', function ($banner) {
                return '
                <div class="">
                    <button type="button" class="btn_edit" id="editButton" data-id="' . $banner->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bx bx-edit-alt"></i>
                    </button>

                    <button type="button" id="deleteBtn" data-id="' . $banner->id . '" class="btn_delete">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>';
            })

            ->rawColumns(['banner_img', 'title' ,'description', 'action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $banner = new Banner();

        $banner->title                       = $request->title;
        $banner->description                 = $request->description;
        $banner->page                        = $request->page;

        if( $request->file('banner_img') ){
            $banner_img = $request->file('banner_img');

            $imageName          = microtime('.') . '.' . $banner_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/banner/';
            $banner_img->move($imagePath, $imageName);

            $banner->banner_img   = $imagePath . $imageName;
        }

        $banner->save();

        return response()->json(['message' => 'successfully Banner Created', 'status' => true], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        return response()->json(['success' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $banner = Banner::find($id);

        $banner->title                       = $request->title;
        $banner->description                 = $request->description;

        if( $request->file('banner_img') ){
            $banner_img = $request->file('banner_img');

            if( !is_null($banner->banner_img) && file_exists($banner->banner_img) ){
                unlink($banner->banner_img);
             }

            $imageName          = microtime('.') . '.' . $banner_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/banner/';
            $banner_img->move($imagePath, $imageName);

            $banner->banner_img   = $imagePath . $imageName;
        }

        $banner->save();

        return response()->json(['message'=> "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);

        if ( !is_null($banner->banner_img) ) {
            if (file_exists($banner->banner_img)) {
                unlink($banner->banner_img);
            }
        }

        $banner->delete();

        return response()->json(['message' => 'Banner has been deleted.'], 200);
    }
}
