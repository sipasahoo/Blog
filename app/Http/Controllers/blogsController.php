<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use Illuminate\Http\Request;

class blogsController extends Controller
{
  
    public function index()
    {
        $blogs = Blogs::latest()->paginate(5);
        return view('blogs.index',compact('blogs'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function create()
    {
        return view('blogs.create');
    }
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
        ]);
        Blogs::create($request->all());
        return redirect()->route('blogs.index')->with('success','Blog created successfully.');

    }
    public function show($id){
        $post = Blogs::find($id);
        return view('blogs.show', ['blogs' => $post]);
    }
    public function edit($id)
    {
        $post = Blogs::find($id);
        return view('blogs.edit', ['blogs' => $post]);
    }
    public function update(Request $request, Blogs $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
        ]);
        $blog->update($request->all());
        return redirect()->route('blogs.index') ->with('success','Blogs updated successfully');

    }
    public function destroy($id)
    {
      
        $blog = Blogs::where('id', $id)->firstorfail()->delete(); 
        echo ("Blogs Record deleted successfully."); 
        return redirect()->route('blogs.index')->with('success','Blog deleted successfully');

    }
   
}

