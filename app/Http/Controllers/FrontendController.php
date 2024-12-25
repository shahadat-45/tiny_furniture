<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Furniture;
use App\Models\Headding;
use App\Models\InteriorDesign;
use App\Models\Project;
use App\Models\Schedule;

class FrontendController extends Controller
{
    public function home(){
        $material = Doctor::all();
        $headdings = Headding::all();
        $department = Department::all();
        $interiors = InteriorDesign::all();
        $furnitures = Furniture::all();
        $testimonials = Schedule::all();
        $blogs = Blog::where('status' , 1)->get();
        return view('frontend.pages.index' ,[
            'material' => $material,
            'headding' => $headdings,
            'departments' => $department,
            'interiors' => $interiors,
            'furnitures' => $furnitures,
            'testimonials' => $testimonials,
            'blogs' => $blogs,
        ]);
    }
    public function shop(){
        $material = Doctor::all();
        return view('frontend.pages.shop' , [
            'material' => $material,
        ]);
    }
    public function about_us(){        
        $testimonials = Schedule::all();        
        $headdings = Headding::all();
        $department = Department::all();
        $projects = Project::where('status' , 1)->get();
        return view('frontend.pages.about',[            
            'testimonials' => $testimonials,
            'headding' => $headdings,
            'departments' => $department,
            'projects' => $projects,
        ]);
    }
    public function blog(){
        $blogs = Blog::where('status' , 1)->get();
        $testimonials = Schedule::all(); 
        return view('frontend.pages.blog',[
            'testimonials' => $testimonials,
            'blogs' => $blogs,
        ]);
    }
    public function service(){
               
        $headdings = Headding::all();
        $material = Doctor::all();
        $testimonials = Schedule::all();  
        $department = Department::all();
        return view('frontend.pages.services',[
            'material' => $material,
            'headding' => $headdings,
            'testimonials' => $testimonials,
            'departments' => $department,
        ]);
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
}
