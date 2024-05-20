<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Customer;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $cities = City::all();
        return view('customers.index',compact('customers','cities'));
    }

    public function filter()
    {
        $customers = Customer::with('city')->where('city_id',5)->paginate(10);
        return view('customers.filter',compact('customers'));

    }

    public function store(Request $request){
        if($request->ajax()){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|between:2,100',
            'phone' => 'required|string|max:200',
            'address' => 'required|string|between:2,150',
            'city_id' => 'required|numeric|gt:0',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city_id = $request->city_id;
        $customer->save();

        Session::flash('message','Customer is Created Successfully');
        return redirect(route('customers.index'))->withInput();
    }
}

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        $city = $customer->city;
        return view('customers.show',compact('customer','city'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $city = $customer->city;
        return view('customers.index', compact('customer','city'));
    }

    public function update(Request $request,$id)
    {
        if($request->ajax()){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|between:2,100',
            'phone' => 'required|string|max:300',
            'address' => 'required|string|max:500',
            'city_id' => 'required|numeric|gt:0',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city_id = $request->city_id;
        $customer->save();

        Session::flash('message','Customer is Updated successfully!');
        return redirect(route('customers.index'))->withInput();
      }
    }


    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        Session::flash('message','Customer is Deleted Successfully');
        return redirect(route('customers.index'));
    }

}
