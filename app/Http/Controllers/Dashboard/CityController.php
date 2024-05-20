<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::offset(10)->limit(5)->get();
        return view('cities.index',compact('cities'));
    }

    public function show($id)
    {
          $city = City::find($id);
          $customers = $city->customers;
          return view('cities.show', compact('city','customers'));
    }

      public function edit($id)
      {
          $city = City::find($id);
          return view('cities.edit', compact('city'));
      }

      public function update(Request $request, $id)
      {
          $validator = Validator::make($request->all(), [
              'name' => 'required|string|between:2,100',
          ]);

          if($validator->fails()) {
              return redirect()->back()->withErrors($validator)->withInput();
          }

          $city = City::find($id);
          $city->name = $request->name;
          $city->save();

          Session::flash('message','City is Updated Successfully!');
          return redirect(route('cities.index'));
      }

      public function destroy($id)
      {
          $city = City::findOrFail($id);
          $city->delete();
          Session::flash('message','City is Trashed Successfully');
          return redirect(route('cities.index'));
      }

    public function trashed()
    {
       $trashedCities = City::onlyTrashed()->get();
       return view('cities.trashed',compact('trashedCities'));
    }

  public function restore($id)
  {
    $city = City::withTrashed()->findOrFail($id);
    $city->restore();

    Session::flash('message','City is Restored Successfully');
    return redirect(route('cities.index'))->withInput();
  }
   public function delete($id)
  {
    $city = City::withTrashed()->findOrFail($id);
    $city->forceDelete();

    Session::flash('message','City is Permanently Deleted Successfully');
    return redirect(route('cities.index'))->withInput();
  }

}
