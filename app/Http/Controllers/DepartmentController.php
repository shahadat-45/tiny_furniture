<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Furniture;
use App\Models\Headding;
use App\Models\InteriorDesign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    public function index()
    {
        $headdings = Headding::find(3);
        return view('backend.pages.department.index' , [
            'headding' => $headdings,
        ]);
    }

    public function furniture(){
        return view('backend.pages.department.furniture');
    }

    public function getFurniture(Request $request)
    {
        $projects = Furniture::all();    

        return DataTables::of($projects)
            ->addIndexColumn()
            ->addColumn('image', function ($project) {
                return '<img src="'. asset($project->image) .'" alt="" style="width: 65px;">';
            })
            ->addColumn('action', function ($project) {
                return '
                <div class="">
                    <button type="button" class="btn_edit" id="editButton" data-id="' . $project->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bx bx-edit-alt"></i>
                    </button>

                    <button type="button" id="deleteBtn" data-id="' . $project->id . '" class="btn_delete">
                        <i class="bx bx-trash"></i>
                    </button>
                </div>';
            })

            ->rawColumns(['image', 'action'])
            ->make(true);
    }
    public function furnitureStore(Request $request)
    {
        $project = new Furniture();

        $project->title              = $request->title;
        $project->description        = $request->description;
        $project->link               = $request->link;
       

        if( $request->file('image') ){
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/';
            $image->move($imagePath, $imageName);

            $project->image   = $imagePath . $imageName;
        }
        $project->created_at = Carbon::now();
        $project->save();

        return response()->json(['message' => 'successfully furniture Created', 'status' => true], 200);
    }
    public function furnitureEdit(string $id)
    {
        $project = Furniture::find($id);
        return response()->json(['success' => $project]);
    }
    public function getData()
    {
        $departments = InteriorDesign::all();

        return DataTables::of($departments)
            ->addColumn('action', function ($department) {
                return '<div class="">
                            <button type="button" class="btn_edit" id="editButton" data-id="' . $department->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                            <button type="button" id="deleteBtn" data-id="' . $department->id . '" class="btn_delete">
                                <i class="bx bx-trash"></i>
                            </button>
                        </div>';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function furnitureUpdate(Request $request, string $id)
    {
        $project = Furniture::find($id);

        $project->title              = $request->title;
        $project->link               = $request->link;
        $project->description        = $request->description;


         if( $request->file('image') ){
            $image = $request->file('image');

            if( !is_null($project->image) && file_exists($project->image) ){
                unlink($project->image);
             }

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/';
            $image->move($imagePath, $imageName);

            $project->image   = $imagePath . $imageName;
        }

        // dd($project);
        $project->save();

        return response()->json(['message'=> "success"], 200);
    }

    public function destroyFurniture(string $id)
    {
        $project = Furniture::find($id);

        if ( !is_null($project->image) ) {
            if (file_exists($project->image)) {
                unlink($project->image);
            }
        }
        $project->delete();

        return response()->json(['message' => 'Project has been deleted.'], 200);
    }

    public function choose_headding(Request $request, string $id)
    {
        $doctor = Headding::find($id); // id : 3

        $doctor->title              = $request->title;
        $doctor->description        = $request->description;

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $storedImages = []; // Array to hold the paths of the uploaded images
        
            // Delete existing images if any
            if (!is_null($doctor->images)) {
                $existingImages = json_decode($doctor->images, true);
                foreach ($existingImages as $existingImage) {
                    if (file_exists($existingImage)) {
                        unlink($existingImage);
                    }
                }
            }
        
            foreach ($images as $image) {
                $imageName = microtime(true) . '.' . $image->getClientOriginalExtension();
                $imagePath = 'public/backend/image/';
                $image->move($imagePath, $imageName);
                $storedImages[] = $imagePath . $imageName; // Store the full path of each image
            }
        
            // Save the array as a JSON string in the 'images' column
            $doctor->image = json_encode($storedImages);
        }
        
        $doctor->save();

        return response()->json(['message'=> "success"], 200);
    }

    public function deleteDesignTips($id)
    {
        InteriorDesign::find($id)->delete();
        return response()->json(['message'=> "Delete Successfull"], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $interiorDesign = new InteriorDesign();
        $interiorDesign->text = $request->text;

        $interiorDesign->save();

        return response()->json(['message' => 'success'], 201);
    }

   
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = InteriorDesign::find($id);
        return response()->json(['success' => $doctor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctor = InteriorDesign::find($id);

        $doctor->text              = $request->text;

        $doctor->save();

        return response()->json(['message'=> "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return response()->json(['message' => 'success'], 200);
    }

    public function departmentStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $page = Department::findOrFail($id);
        $page->status = $stat;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }

}
