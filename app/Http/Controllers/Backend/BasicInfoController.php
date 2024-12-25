<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BasicInfo;
use Illuminate\Support\Str;

class BasicInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $basicInfo = BasicInfo::first();
        return view('backend.pages.basic_setting.index', compact('basicInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $basicInfo = new BasicInfo();

        $basicInfo->whatsapp             = $request->whatsapp;
        $basicInfo->phone                = $request->phone;
        $basicInfo->phone_optional       = $request->phone_optional;
        $basicInfo->email                = $request->email;
        $basicInfo->email_optional       = $request->email_optional;
        $basicInfo->address              = Str::trim($request->address);
        $basicInfo->address_optional     = Str::trim($request->address_optional);
        $basicInfo->facebook_pixel       = Str::trim($request->facebook_pixel);
        $basicInfo->google_analytics     = Str::trim($request->google_analytics);

        $basicInfo->facebook             = $request->facebook;
        $basicInfo->twitter              = $request->twitter;
        $basicInfo->youtube              = $request->youtube;
        $basicInfo->linkedin             = $request->linkedin;
        $basicInfo->instagram            = $request->instagram;
        $basicInfo->pinterest            = $request->pinterest;

        $basicInfo->google_map           = $request->google_map;
        $basicInfo->room_title           = $request->room_title;
        $basicInfo->room_number          = $request->room_number;
        $basicInfo->room_icons           = $request->room_icons;
        $basicInfo->doctor_title         = $request->doctor_title;
        $basicInfo->doctor_number        = $request->doctor_number;
        $basicInfo->doctor_icons         = $request->doctor_icons;
        $basicInfo->patient_title        = $request->patient_title;
        $basicInfo->patient_number       = $request->patient_number;
        $basicInfo->patient_icons        = $request->patient_icons;
        $basicInfo->experience_title     = $request->experience_title;
        $basicInfo->experience_number    = $request->experience_number;
        $basicInfo->experience_icons     = $request->experience_icons;
        
        $basicInfo->emergency_title      = $request->emergency_title;
        $basicInfo->gallery_title      = $request->gallery_title;
        $basicInfo->service_title      = $request->service_title;
        $basicInfo->blog_title          = $request->blog_title;
        $basicInfo->appointment_title      = $request->appointment_title;

        if( $request->file('appointment_side_img') ){
            $logo = $request->file('appointment_side_img');
            

            $imageName          = microtime('.') . '.' . $logo->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/basicInfo/';
            $logo->move($imagePath, $imageName);

            $basicInfo->appointment_side_img   = $imagePath . $imageName;
        }


        if( $request->file('logo') ){
            $logo = $request->file('logo');

            $imageName          = microtime('.') . '.' . $logo->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/basicInfo/';
            $logo->move($imagePath, $imageName);

            $basicInfo->logo   = $imagePath . $imageName;
        }

        $basicInfo->save();

        $notification = array(
            'message'    => "Basic Information has been Inserted successfully.",
            'alert-type' => "success"
        );

        return redirect()->route('admin.basic-info.index')->with($notification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $basicInfo = BasicInfo::first();

        $basicInfo->whatsapp             = $request->whatsapp;
        $basicInfo->phone                = $request->phone;
        $basicInfo->phone_optional       = $request->phone_optional;
        $basicInfo->email                = $request->email;
        $basicInfo->email_optional       = $request->email_optional;
        $basicInfo->address              = Str::trim($request->address);
        $basicInfo->footer_text          = Str::trim($request->footer_text);
        $basicInfo->facebook_pixel       = Str::trim($request->facebook_pixel);
        $basicInfo->google_analytics     = Str::trim($request->google_analytics);

        $basicInfo->facebook             = $request->facebook;
        $basicInfo->twitter              = $request->twitter;
        $basicInfo->youtube              = $request->youtube;
        $basicInfo->linkedin             = $request->linkedin;
        $basicInfo->instagram            = $request->instagram;
        $basicInfo->pinterest            = $request->pinterest;
        $basicInfo->google_map           = $request->google_map;      


        if( $request->file('appointment_side_img') ){
            $logo = $request->file('appointment_side_img');

            if( !is_null($basicInfo->appointment_side_img) && file_exists($basicInfo->appointment_side_img) ){
                unlink($basicInfo->appointment_side_img);
            }

            $imageName          = microtime('.') . '.' . $logo->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/basicInfo/';
            $logo->move($imagePath, $imageName);

            $basicInfo->appointment_side_img   = $imagePath . $imageName;
        }
        
       
        
        if( $request->file('logo') ){
            $logo = $request->file('logo');

            if( !is_null($basicInfo->logo) && file_exists($basicInfo->logo) ){
                 unlink($basicInfo->logo);
            }

            $imageName          = microtime('.') . '.' . $logo->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/basicInfo/';
            $logo->move($imagePath, $imageName);

            $basicInfo->logo   = $imagePath . $imageName;
        }

        $basicInfo->save();

        $notification = array(
            'message'    => "Basic Information has been updated successfully.",
            'alert-type' => "success"
        );

        return redirect()->back()->with($notification);
    }


}
