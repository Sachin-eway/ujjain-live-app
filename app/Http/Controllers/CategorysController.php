<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorysController extends Controller
{
    public function index(){
        $category = Category::orderBy("id", "desc")->get();

        return view('categorys',['data'=>$category]);
    }
    public function store(Request $request)
    {
       $request->validate([
           'category'=> 'required',
            'icon' => 'required',
       ]);

        $image = $request->icon;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('img/icon');
        $image->move($imagePath, $imageName);

        $category =new Category();
        $category->category = $request->category;
        $category->icon = $imageName;
        $category->save();
        
        session()->flash('message', '');
        
        return redirect()->back();
    }
    public function edit($id)
    {  
        return Category::find($id);
    }
    public function delete($id)
    {
         Category::find($id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {

        if($request->icon == null){          
            Category::where('id',$request->id)->update([
                'category'=> $request->category,
            ]);
             session()->flash('message', 'Update Successfully');
        
             return redirect()->back();
        }else{   
           $image = $request->icon;
           $imageName = time() . '.' . $image->getClientOriginalExtension();
           $imagePath = public_path('img/icon');
           $image->move($imagePath, $imageName);
            Category::where('id', $request->id)->update([
                'category' => $request->category,
                'icon' => $imageName
            ]);
            session()->flash('message', 'Update Successfully');

            return redirect()->back();
        }
    }
    public function status($id)
    {
       $status = Category::find($id);
        if($status->status == 1){
            $status->update(['status'=>2]);
            return 2;
        }else{
            $status->update(['status' => 1]);
            return 1;
        }
       
    }
}
