<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    public function index()
    {
        return view('backend.pages.services.index');
    }

    public function getData()
    {
        $services = Service::all();


        return DataTables::of($services)
          
            ->addColumn('status', function ($service) {
                if ($service->status == 1) {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$service->id.'" data-status="'.$service->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$service->id.'" data-status="'.$service->status.'"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('action', function ($service) {
                return '<div class="d-flex gap-3"> <a class="editButton btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$service->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>

                                                             <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$service->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
                                                           </div>';

            })
            ->rawColumns(['action', 'status'])
            ->addIndexColumn()
            ->make(true);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'service_icon' => 'string',
                'service_title' => 'string',
                'service_desc' => 'required',
                
            ]
        );

       $service= new Service();
       $service->service_icon = $request->service_icon;
       $service->service_title = $request->service_title;
       $service->service_desc = $request->service_desc;
       $service->status = $request->status;
       
       
       $service->save();

        return response()->json(['message' => 'success'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(brand $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return response()->json(['message' => 'success', 'data' => $service], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
                'service_icon' => 'string',
                'service_title' => 'string',
                'service_desc' => 'required',

            ]
        );

        $service->service_icon = $request->service_icon;
        $service->service_title = $request->service_title;
        $service->service_desc = $request->service_desc;
        $service->status = $request->status;



        $service->update();


        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {

        $service->delete();

        return response()->json(['message' => 'success'], 200);

    }

    public function serviceStatus(Request $request)
    {

        $id = $request->id;
        $status = $request->status;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $page = Service::findOrFail($id);
        $page->status = $stat;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }
}
