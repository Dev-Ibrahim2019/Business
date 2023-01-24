<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate();
        return view('dashboard.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = new Blog();
        return view('dashboard.blogs.create', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'auther' => ['required','string']
        ]);

        $data = $request->except('image', 'auther_image');
        $data['image'] = $this->uploadImage($request);
        $data['auther_image'] = $this->uploadImage($request);

        Blog::create($data);

        return Redirect::route('dashboard.blogs.index')
            ->with([
                'message' => 'Blog Created',
                'type' => 'success'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'auther' => ['required','string']
        ]);

        $blog = Blog::findOrFail($id);
        $old_image = $blog->image;
        $old_auther_image = $blog->auther_image;

        $data = $request->except('image', 'auther_image');

        $new_image = $this->uploadImage($request);
        if ($new_image) {
            $data['image'] = $new_image;
            $data['auther_image'] = $new_image;
        }

        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        } else if ($old_auther_image && $new_image) {
            Storage::disk('public')->delete($old_auther_image);
        }

        $blog->update($data);

        return Redirect::route('dashboard.blogs.index')
            ->with([
                'message' => 'Updated Successfully',
                'type' => 'success'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $isDeleted = $blog->delete();
        Storage::disk('public')->delete($blog->image);
        
        if ($isDeleted) {
            return response()->json([
                'title'=>'Success',
                'text'=>'Service Deleted successfully',
                'icon'=>'success'
            ], Response::HTTP_OK);
        }else {
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete',
                'icon'=>'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    protected function uploadImage(Request $request) {
        if (!$request->hasFile('image')) return;
        $file = $request->file('image');
        $path = $file->storeAs('uploads', rand().'_'.time().'_'.$file->getClientOriginalName(), [
            'disk' => 'public'
        ]);
        return $path;
    }
}
