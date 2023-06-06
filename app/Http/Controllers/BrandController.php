<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Image;
use Auth;
class BrandController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }


public function AllBrand(){

$brands = Brand::latest()->paginate(5);


    return view('admin.brand.index',compact('brands'));
}



public function AddBrand(Request $request){

    $validated = $request->validate([
        'brand_name' => 'required|unique:brands|min:4',
        'brand_image' => 'required|mimes:jpg,jpeg,png',
    ],[
        'brand_name.required' => 'Please enter Brand Name',
        'brand_image.min' => 'brang Longer Then 4 Characher',
    ]);
 $brang_image = $request->file('brand_image');
// $name_gen = hexdec(uniqid());
// $img_ext = strtolower($brang_image->getClientOriginalExtension());
// $img_name = $name_gen.'.'.$img_ext;
// $up_location = 'image/brand/';

// $last_img = $up_location.$img_name;

// $brang_image->move($up_location,$img_name);


// Brand::insert([
//     'brand_name' => $request->brand_name,
//     'brand_image' => $last_img,
//     'created_at' => Carbon::now()
// ]);


$name_gen = hexdec(uniqid()).'.'.$brang_image->getClientOriginalExtension();
Image::make($brang_image)->resize(300,200)->save('image/brand/'.$name_gen);
$last_img = 'image/brand/'.$name_gen;

Brand::insert([
    'brand_name' => $request->brand_name,
    'brand_image' => $last_img,
    'created_at' => Carbon::now()
]);

$notification = array(
    'message'=>'Brand Inserted Successfully',
    'alert-type'=>'success'
);
return Redirect()->back()->with($notification);


}



public function EditBrand($id){

    $brands = Brand::find($id);
    return view('admin.brand.edit',compact('brands'));

}

public function UpdateBrand(Request $request , $id){

    $old_image = $request->old_image;
    
    $validated = $request->validate([
        'brand_name' => 'required|min:4',
        
    ],[
        'brand_name.required' => 'Please enter Brand Name',
        
    ]);
    
$brang_image = $request->file('brand_image');

if($brang_image){
    $name_gen = hexdec(uniqid());
$img_ext = strtolower($brang_image->getClientOriginalExtension());
$img_name = $name_gen.'.'.$img_ext;
$up_location = 'image/brand/';

$last_img = $up_location.$img_name;

$brang_image->move($up_location,$img_name);

if($old_image){
unlink($old_image);
}

Brand::find($id)->update([
    'brand_name' => $request->brand_name,
    'brand_image' => $last_img,
    'created_at' => Carbon::now()
]);

$notification = array(
    'message'=>'Brand Updated Successfully',
    'alert-type'=>'success'
);
return Redirect()->route('all.brand')->with($notification);

}else{
    Brand::find($id)->update([
        'brand_name' => $request->brand_name,
        'created_at' => Carbon::now()
    ]);

    $notification = array(
        'message'=>'Brand Updated Successfully',
        'alert-type'=>'warning'
    );

    return Redirect()->route('all.brand')->with($notification);

}




}
public function DeleteBrand($id){
    $image=Brand::find($id);
    $old_image = $image->brand_image;
    unlink($old_image);
    Brand::find($id)->delete();

    $notification = array(
        'message'=>'Brand Deleted Successfully',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification);

}



public function Multipic(){

    $images = MUltipic::all();
    return view('admin.multipic.index',compact('images'));
}

public function StoreImages(Request $request){
  

    $image = $request->file('image');

    foreach($image as $multi_img){
$name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
Image::make($multi_img)->resize(300,200)->save('image/multi/'.$name_gen);
$last_img = 'image/multi/'.$name_gen;

Multipic::insert([
    'image' => $last_img,
    'created_at' => Carbon::now()
]);
}
return Redirect()->route('multi.image')->with('success', 'Multiple Image Inserted Successfully');

}


public function Logout(){
    Auth::logout();
    return Redirect()->route('login')->with('success','User log out Succussfully');
}

}
