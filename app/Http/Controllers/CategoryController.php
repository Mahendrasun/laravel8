<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\carbon;

class CategoryController extends Controller
{
    //




public function __construct(){
    $this->middleware('auth');
}




    public function AllCat(){

        $categories = Category::latest()->paginate(10);
        $trashcat = Category::onlyTrashed()->latest()->paginate(3);


        return view('admin.category.index',compact('categories','trashcat'));
    }
    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],[
            'category_name.required' => 'Please enter Category Name',
        ]);

Category::insert([
    'category_name'=>$request->category_name,
    'user_id'=>Auth::user()->id,
    'created_at'=>Carbon::now()
]);

return Redirect()->back()->with('success', 'Category Inserted Successfully');
    }  

public function EditCat($id){
    $categories =  Category::find($id);
    return view('admin.category.edit',compact('categories'));

}

public function UpdateCat(Request $request,$id){

$update = Category::find($id)->update([
    'category_name' => $request->category_name,
    'user_id' =>Auth::user()->id
]);

 return Redirect()->route('all.category')->with('success', 'Category Updated Successfully');

}
 public function SoftDeleteCat($id){

    $delete = Category::find($id)->delete();

    return Redirect()->back()->with('success', 'Category Deleted Successfully');

 }
 public function Restore($id){
    $delete =  Category::withTrashed()->find($id)->restore();
    return Redirect()->back()->with('success', 'Category Restored Successfully');


}

public function Trash($id){

$delete = Category::onlyTrashed()->find($id)->forceDelete();
return Redirect()->back()->with('success', 'Category Permanently Deleted');

}


}
