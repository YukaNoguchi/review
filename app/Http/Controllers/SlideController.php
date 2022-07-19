<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use App\Http\Requests\UploadSlideRequest;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function adminCreate()
    {
        return view('slide.adminCreate');
    }
    public function adminPreview(UploadSlideRequest $request)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/slide', $file_name);

        return view('slide.adminPreview', compact('request', 'file_name'));
    }
    public function adminStore(Request $request)
    {
        $slide = new Slide();
        $slide->title = $request->title;
        $slide->image_path = $request->image_path;
        $slide->save();

        return redirect()->route('admin.slides.index');
    }

    public function adminIndex()
    {
        $slides = Slide::latest('updated_at')->paginate(10);
        return view('slide.adminIndex', compact('slides'));
    }

    public function adminEdit(Int $slide)
    {
        $slide = Slide::find($slide);
        return view('slide.adminEdit', compact('slide'));
    }

    public function adminEditPreview(UploadSlideRequest $request)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/slide', $file_name);

        $slide_id = $request->slide_id;
        return view('slide.adminEditPreview', compact('request', 'file_name', 'slide_id'));
    }

    public function adminUpdate(Request $request, Int $id)
    {
        $slide = Slide::find($id);
        Storage::delete('public/slide/' . $slide->image_path);

        $slide->title = $request->title;
        $slide->image_path = $request->image_path;
        $slide->save();

        return redirect()->route('admin.slides.index');
    }

    public function adminDelete(Int $slide)
    {
        $slide = Slide::find($slide);
        Storage::delete('public/slide/' . $slide->image_path);

        $slide->delete();
        return redirect()->route('admin.slides.index');
    }

}