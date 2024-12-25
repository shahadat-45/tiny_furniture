<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    public function index()
    {
        return view('backend.pages.blog.index');
    }

    public function getData()
    {
        $blogs = Blog::all();


        return DataTables::of($blogs)
            ->addColumn('blogImage',function ($blog){
                $imgPath= asset($blog->blog_image);
                return '<img src="'.$imgPath.'" width="80" height="50" alt="">';
            })

            ->addColumn('status', function ($blog) {
                if ($blog->status == 1) {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$blog->id.'" data-status="'.$blog->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$blog->id.'" data-status="'.$blog->status.'"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('action', function ($blog) {
                return '<div class="d-flex gap-3"> <a class="editButton btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$blog->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>

                                                             <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$blog->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
                                                           </div>';

            })
            ->rawColumns(['action', 'status','blogImage'])
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


        $blog= new Blog();
        $blog->blog_title = $request->blog_title;
        $blog->blog_short_desc = $request->blog_short_desc;
        $blog->blog_long_desc = $request->blog_long_desc;
        $blog->blog_author = $request->blog_author;
        $blog->blog_date = today();
       


        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $filename = time() . $file->getClientOriginalName();
            $file->move(public_path('/backend/image/blog/'), $filename);
            $blog->blog_image = 'public/backend/image/blog/'.$filename;
        }


        $blog->save();

        return response()->json(['message' => 'success'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return response()->json(['message' => 'success', 'data' => $blog], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->blog_title = $request->blog_title;
        $blog->blog_short_desc = $request->blog_short_desc;
        $blog->blog_long_desc = $request->blog_long_desc;
        $blog->blog_author = $request->blog_author;
        $blog->blog_date = today();


        if ($request->hasFile('blog_image')) {
            
            if ($blog->blog_image &&   file_exists($blog->blog_image)) {
                unlink($blog->blog_image);
            }
            $file = $request->file('blog_image');
            $filename = time() . $file->getClientOriginalName();
            $file->move(public_path('/backend/image/blog/'), $filename);
            $blog->blog_image = 'public/backend/image/blog/'.$filename;
        }




        $blog->update();


        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {

        $blog->delete();

        return response()->json(['message' => 'success'], 200);

    }

    public function blogStatus(Request $request)
    {

        $id = $request->id;
        $status = $request->status;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }
        

        $page = Blog::findOrFail($id);
        $page->status = $stat;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }

    public function blogList()
    {
        
        $blogs=Blog::where('status',1)->latest()->simplePaginate(6);
        $recentBlogs=Blog::where('status',1)->latest()->limit(3)->get();

        return view('frontend.pages.blog.index',compact(['blogs','recentBlogs']));
    }

    public function blogDetail(Blog $blog)
    {
        $recentBlogs=Blog::where('status',1)->latest()->limit(3)->get();
        $comments= Comment::where('blog_id',$blog->id)->simplePaginate(8);
        return view('frontend.pages.blog.details', compact(['blog','recentBlogs','comments']));
    }

    public function blogSearch(Request $request)
    {
//        dd($request->all());
        $blog_title=$request->blog_title;
        $blogs=Blog::where('status',1)->where('blog_title','like','%'.$blog_title.'%')->latest()->simplePaginate(6);
        return view('frontend.pages.blog.search',compact('blogs'));
    }
}
