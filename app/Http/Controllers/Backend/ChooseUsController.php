<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Headding;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headdings = Headding::find(2);
        return view('backend.pages.choose_us.index' , [
            'headding' => $headdings,
        ]);
    }

    public function getData(Request $request)
    {
        $services = Department::get();


        return DataTables::of($services)
            ->addIndexColumn()
            ->addColumn('image', function ($service) {
                return '<img src="'. asset($service->image) .'" alt="" style="width: 65px;">';
            })
            ->addColumn('action', function ($service) {
                return '
                <div class="">
                    <button type="button" class="btn_edit" id="editButton" data-id="' . $service->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bx bx-edit-alt"></i>
                    </button>
                </div>';
            })

            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function choose_headding(Request $request, string $id)
    {
        $doctor = Headding::find($id); // id : 2

        $doctor->title              = $request->title;
        $doctor->description        = $request->description;

         if( $request->file('image') ){
            $image = $request->file('image');

            if( !is_null($doctor->image) && file_exists($doctor->image) ){
                unlink($doctor->image);
             }

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/';
            $image->move($imagePath, $imageName);

            $doctor->image   = $imagePath . $imageName;
        }
        $doctor->update();

        return response()->json(['message'=> "success"], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $doctor = new Department();

        $doctor->title           = $request->title;
        $doctor->description     = $request->description;

        if( $request->file('image') ){
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/';
            $image->move($imagePath, $imageName);

            $doctor->image   = $imagePath . $imageName;
        }

        $doctor->created_at = Carbon::now();
        $doctor->save();

        return response()->json(['message' => 'Material Created Successfully', 'status' => true], 200);
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
        $doctor = Department::find($id);
        return response()->json(['success' => $doctor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctor = Department::find($id);

        $doctor->title              = $request->title;
        $doctor->description        = $request->description;

         if( $request->file('image') ){
            $image = $request->file('image');

            if( !is_null($doctor->image) && file_exists($doctor->image) ){
                unlink($doctor->image);
             }

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/';
            $image->move($imagePath, $imageName);

            $doctor->image   = $imagePath . $imageName;
        }
        $doctor->save();

        return response()->json(['message'=> "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
