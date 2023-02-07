<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ram;
use Illuminate\Http\Request;

class RamController extends Controller
{
    public function index()
    {
        $data = Ram::latest()->paginate(5);

        return view('specs.ram', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($id)   
    {
        $info = Ram::find($id);
        $response['id'] = $info->id;
        $response['name'] = $info->name;
        return response()->json($response);
    }

    public function store(Request $request)
    {
        $request->validate([
               'ram_name.*.name'=>'required|max:255'
       ]);
        $names = $request->ram_name;
        for ($i = 0; $i < count($names); $i++) {
            Ram::create($names[$i]);
        }

        return redirect()->route('specs.ram')->with('success', 'Ram detail Added successfully.');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        // dd($request->all());
        $data['name'] = $request->name;
        Ram::whereId($request->id)->update($data);
      
        return redirect()->route('specs.ram')
                        ->with('success','Ram Name updated successfully');
    }

    public function delete(Request $request)
    {
        Ram::whereId(urldecode(base64_decode($request->id)))->delete();

        return redirect()->back()->with('success',' Ram model deleted !');
    }
}
