<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Validation\Rules\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;

class BrandController extends Controller
{
    public function index()
    {
        $data = Brand::latest()->paginate(5);

        return view('specs.brand', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($id)
    {
        $info = Brand::find($id);
        $response['id'] = $info->id;
        $response['name'] = $info->name;
        $response['logo'] = asset("images/" . $info->logo);
        return response()->json($response);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'brand_name.*.name' => 'required|max:255',
            'logo.*' => ['required', File::types(['jpeg', 'png', 'jpg', 'avif', 'svg'])]
        ]);
        $brandNames = ($request->brand_name);

        for ($i = 0; $i < count($brandNames); $i++) {
            $imageName = time() . '_' . uniqid() . '.' . $request->logo[$i]->extension();
            $request->logo[$i]->move(public_path('images'), $imageName);
            $brandNames[$i]['logo'] = $imageName;
            Brand::create($brandNames[$i]);
        }


        return redirect()->route('specs.brand')->with('success', 'Brand detail Added successfully.');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if (request()->hasFile('logo')) {
            //old image
            $filename = Brand::whereId($request->id)->value('logo');
            $old_image_path = public_path("/images" . '/' . $filename);
            FacadesFile::delete($old_image_path);
            //new image
            $imageName = time() . '_' . uniqid() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images'), $imageName);
            $data['logo'] = $imageName;
        }
        $data['name'] = $request->name;
        Brand::whereId($request->id)->update($data);
        return redirect()->route('specs.brand')
            ->with('success', 'Brand updated successfully');
    }

    public function delete(Request $request)
    {
        $filename = Brand::whereId(urldecode(base64_decode($request->id)))->value('logo');
        $image_path = public_path("/images" . '/' . $filename);
        FacadesFile::delete($image_path);

        Brand::whereId(urldecode(base64_decode($request->id)))->delete();

        return redirect()->back()->with('success', ' Brand deleted !');
    }
}
