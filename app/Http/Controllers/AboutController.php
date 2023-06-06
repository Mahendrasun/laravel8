<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;
use App\Models\Multipic;

class AboutController extends Controller
{
    //

public function HomeAbout(){
    $homeabout=HomeAbout::latest()->get();
    return view('admin.home.index',compact('homeabout'));
}

public function AboutAdd(){

    return view('admin.home.create');
}

public function StoreAbout(Request $request){

      $validated = $request->validate([
        'title' => 'required|min:10',
        'short_dis' => 'required|min:50',
        'long_dis' => 'required|min:60|max:500',
    ]);

    HomeAbout::insert([
        'title' => $request->title,
        'short_dis' => $request->short_dis,
        'long_dis' => $request->long_dis,
        'created_at' => Carbon::now()
    ]);

    return Redirect()->route('home.about')->with('success', 'About Inserted Successfully');

}

public function EditAbout($id){

    $homeabout=HomeAbout::find($id);
    return view('admin.home.edit',compact('homeabout'));

}
public function UpdateAbout(Request $request,$id){


    $validated = $request->validate([
        'title' => 'required|min:10',
        'short_dis' => 'required|min:50',
        'long_dis' => 'required|min:60|max:500',
    ]);

$update = HomeAbout::find($id)->update([
    'title' => $request->title,
    'short_dis' => $request->short_dis,
    'long_dis' => $request->long_dis,
    'updated_at' => Carbon::now()
]);

return Redirect()->route('home.about')->with('success', 'About updated Successfully');
}


public function DeleteAbout($id){

    $delete = HomeAbout::find($id)->delete();

    return Redirect()->back()->with('success', 'About Deleted Successfully');
}


public function Portfolio(){

    $portfolio = Multipic::all();
    return view('pages.portfolio',compact('portfolio'));
}

}
