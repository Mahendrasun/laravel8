<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }


public function HomeSlider(){

$sliders = Slide::latest()->paginate(5);
    return view('admin.slider.index',compact('sliders'));

}


public function AddSlider(Request $request){
return view('admin.slider.create');
}

public function StoreSlider(Request $request){

    // $validated = $request->validate([
    //     'brand_name' => 'required|unique:brands|min:4',
    //     'brand_image' => 'required|mimes:jpg,jpeg,png',
    // ],[
    //     'brand_name.required' => 'Please enter Brand Name',
    //     'brand_image.min' => 'brang Longer Then 4 Characher',
    // ]);
 $slider_image = $request->file('image');


$name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
$last_img = 'image/slider/'.$name_gen;

Slide::insert([
    'title' => $request->title,
    'description' => $request->description,
    'image' => $last_img,
    'created_at' => Carbon::now()
]);

return Redirect()->route('home.slider')->with('success', 'Slider Inserted Successfully');

}


}
