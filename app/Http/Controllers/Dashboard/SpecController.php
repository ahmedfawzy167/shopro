<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Spec;
use App\Models\SpecCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class SpecController extends Controller
{
    public function index()
    {
        $specs = Spec::limit(4)->get();
        return view('specs.index',compact('specs'));
    }

    public function show($id)
    {
        $spec = Spec::with('specCategory')->find($id);
        return view('specs.show',compact('spec'));
    }

    public function edit($id)
    {
        $spec = Spec::find($id);
        $specCategories = SpecCategory::all();
        return view('specs.edit',compact('spec','specCategories'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,150',
            'spec_category_id' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $spec = Spec::find($id);
        $spec->name = $request->name;
        $spec->spec_category_id = $request->spec_category_id;
        $spec->save();

         Session::flash('message', 'Spec Updated Successfully');
         return redirect(route('spec.all'))->withInput();
    }

    public function destroy($id)
    {
        $spec = Spec::find($id);
        $spec->delete();
        Session::flash('message', 'Spec Deleted Successfully');
        return redirect(route('specs.all'))->withInput();
    }
}
