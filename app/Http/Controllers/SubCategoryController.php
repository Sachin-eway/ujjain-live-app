<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategory = SubCategory::join('categorys','categorys.id','=','sub_categorys.category_id')->select('sub_categorys.*', 'categorys.category')->get();

        $category = Category::where('status',1)->get();


        return view('sub_categorys', ['data' => $subcategory ,'cat_data'=>$category]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'description' => 'required',           
            'icon' => 'required',
            'slider_img_1' => 'required',
            'slider_img_2' => 'required',
            'slider_img_3' => 'required',
        ]);

        $icon = $request->icon;
        $iconName = time() . '.' . $icon->getClientOriginalExtension();
        $iconPath = public_path('img/icon');
        $icon->move($iconPath, $iconName);

        $img1 = $request->slider_img_1;
        $img1Name = $img1->getClientOriginalName() . '.' . $img1->getClientOriginalExtension();
        $img1Path = public_path('img/slider');
        $img1->move($img1Path, $img1Name);

        $img2 = $request->slider_img_2;
        $img2Name = $img2->getClientOriginalName() . '.' . $img2->getClientOriginalExtension();
        $img2Path = public_path('img/slider');
        $img2->move($img2Path, $img2Name);

        $img3 = $request->slider_img_3;
        $img3Name = $img3->getClientOriginalName() . '.' . $img3->getClientOriginalExtension();
        $img3Path = public_path('img/slider');
        $img3->move($img3Path, $img3Name);

        $category = new SubCategory();
        $category->sub_category = $request->sub_category;
        $category->category_id = $request->category;
        $category->icon = $iconName;
        $category->title = $request->title;
        $category->Description = $request->description;
        $category->slider_img_1 = $img1Name;
        $category->slider_img_2 = $img2Name;
        $category->slider_img_3 = $img3Name;
        $category->save();

        session()->flash('message', 'Save Successfully');

        return redirect()->back();
    }
    public function edit($id)
    {
        return SubCategory::find($id);
    }
    public function delete($id)
    {
        SubCategory::find($id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $icon = $request->icon_old;
        $img1 = $request->img1_old;
        $img2 = $request->img2_old;
        $img3 = $request->img3_old;
        if ($request->icon !== null) {
            File::delete('img/icon/'.$request->icon_old);
            $image = $request->icon;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('img/icon');
            $image->move($imagePath, $imageName);
            $icon = $imageName;
        }
        if($request->slider_img_1 !== null) {
            File::delete('img/slider/' . $request->img1_old);
            $image1 = $request->slider_img_1;
            $image1Name = $image1->getClientOriginalName() . '.' . $image1->getClientOriginalExtension();
            $image1Path = public_path('img/slider');
            $image1->move($image1Path, $image1Name);
            $img1=$image1Name;
        }
        if($request->slider_img_2 !== null){
            File::delete('img/slider/' . $request->img2_old);
            $image2 = $request->slider_img_2;
            $image2Name = $image2->getClientOriginalName() . '.' . $image2->getClientOriginalExtension();
            $image2Path = public_path('img/slider');
            $image2->move($image2Path, $image2Name);
            $img2 = $image2Name;
        }
        if($request->slider_img_3 !== null){
            File::delete('img/slider/' . $request->img3_old);
            $image3 = $request->slider_img_3;
            $image3Name = $image3->getClientOriginalName() . '.' . $image3->getClientOriginalExtension();
            $image3Path = public_path('img/slider');
            $image3->move($image3Path, $image3Name);
            $img3 = $image3Name;
        }
        SubCategory::where('id',$request->id)->update([
            'sub_category' => $request->sub_category,
            'category_id' => $request->category,
            'icon' => $icon,
            'title' => $request->title,
            'Description' => $request->description,
            'slider_img_1' => $img1,
            'slider_img_2' => $img2,
            'slider_img_3' => $img3

        ]);
        session()->flash('message', 'Update Successfully');

        return redirect()->back();
        
    }
    public function status($id)
    {
        $status = SubCategory::find($id);
        if ($status->status == 1) {
            $status->update(['status' => 2]);
            return 2;
        } else {
            $status->update(['status' => 1]);
            return 1;
        }
    }
}
