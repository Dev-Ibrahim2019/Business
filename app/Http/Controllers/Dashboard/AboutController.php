<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AboutController extends Controller
{
    public function edit(Request $request)
    {
        return view('dashboard.about.edit', [
            'about' => About::first(),
        ]);
    }

    public function update(Request $request)
    {
        $about = About::first();
        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);

        if (! $about) {
            About::create($data);
        }
        $about->fill($data)->save();

        return Redirect::route('dashboard.about.edit')->with([
            'message' => 'Updated Successfully',
            'type' => 'success',
        ]);

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
