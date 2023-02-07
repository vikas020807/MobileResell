<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Colour;
use Illuminate\Validation\Rules\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;

class ColourController extends Controller
{
    public function index()
    {
        $data = Colour::latest()->paginate(5);

        return view('specs.colour', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($id)
    {
        $info = Colour::find($id);
        $response['id'] = $info->id;
        $response['name'] = $info->name;
        $response['logo'] = asset("images/" . $info->icon);
        return response()->json($response);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'colour_name.*.name' => 'required|max:255',
            'logo.*' => ['required', File::types(['jpeg', 'png', 'jpg', 'avif', 'svg'])]
        ]);
        $colourNames = ($request->colour_name);
            
        for ($i = 0; $i < count($colourNames); $i++) {
            $imageName = time() . '_' . uniqid() . '.' . $request->logo[$i]->extension();
            $request->logo[$i]->move(public_path('images'), $imageName);
            $colourNames[$i]['icon'] = $imageName;
            Colour::create($colourNames[$i]);
        }


        return redirect()->route('specs.colour')->with('success', 'Brand detail Added successfully.');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if (request()->hasFile('logo')) {
            //old image
            $filename = Colour::whereId($request->id)->value('icon');
            $old_image_path = public_path("/images" . '/' . $filename);
            FacadesFile::delete($old_image_path);
            //new image
            $imageName = time() . '_' . uniqid() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images'), $imageName);
            $data['icon'] = $imageName;
        }
        $data['name'] = $request->name;
        Colour::whereId($request->id)->update($data);
        return redirect()->route('specs.colour')
            ->with('success', 'Brand updated successfully');
    }

    public function delete(Request $request)
    {
        $filename = Colour::whereId(urldecode(base64_decode($request->id)))->value('icon');
        $image_path = public_path("/images" . '/' . $filename);
        FacadesFile::delete($image_path);

        Colour::whereId(urldecode(base64_decode($request->id)))->delete();

        return redirect()->back()->with('success', ' Brand deleted !');
    }
}
