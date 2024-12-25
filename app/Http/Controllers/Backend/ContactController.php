<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Yajra\DataTables\DataTables;

class  ContactController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.contact.index');
    }

    public function getData(Request $request)
    {
        $contacts = Contact::all();

        // dd($categories);

        return DataTables::of($contacts)
             ->addIndexColumn()
             ->addColumn('name', function ($contact) {
                return '<span class="badge bg-label-info">'. $contact->name .'</span> <br/>';
             })
            
            ->addColumn('action', function ($contact) {
                return '<a href="javascript:void(0)" class="btn btn-sm btn-danger" id="deleteContactBtn" data-id="'.$contact->id.'"><i class="fas fa-trash"></i></a>';
            })

            ->rawColumns(['name','action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store
    }


    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json(['message' => 'success']);
    }

}
