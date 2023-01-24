<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MainSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MainSectionController extends Controller
{
    public function edit(Request $request)
    {
        return view('dashboard.main_section.edit', [
            'home' => MainSection::first(),
        ]);
    }

    public function update(Request $request)
    {
        $home = MainSection::find(1);
        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);

        if (! $home) {
            MainSection::create($data);
        }
        $home->fill($data)->save();

        return Redirect::route('dashboard.home.edit')->with([
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
