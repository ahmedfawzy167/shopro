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
    public function index(){
     $customers = Customer::all();
     $cities = City::all();
     return view('customers.index',compact('customers','cities'));
    }

    public function store(Request $request){
        if($request->ajax()){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|between:2,100',
            'pdf'=> 'required|file|mimes:pdf|max:2048',
            'phone' => 'required|string|max:200',
            'address' => 'required|string|between:2,150',
            'city_id' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pdf = $request->file('pdf');
        $ext = $pdf->getClientOriginalExtension();
        $location = "public/";
        $fileName = Date("Y-m-d-h-i-s") . '.' .$ext;
        $pdf->storeAs($location,$fileName);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->image = $fileName;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city_id = $request->city_id;
        $customer->save();

        Session::flash('message', 'Customer is Created Successfully');
        return redirect(route('customers.index'))->withInput();
    }
}

    public function show($id)
    {
        $customer = Customer::find($id);
        $city = $customer->city;
        return view('customers.show', compact('customer','city'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $city = $customer->city;
        return view('customers.index', compact('customer','city'));
    }

    public function update(Request $request,$id)
    {
        if($request->ajax()){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|between:2,100',
            'image'=> 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'phone' => 'required|string|max:300',
            'address' => 'required|string|max:500',
            'city_id' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city_id = $request->city_id;
        if($request->hasFile('pdf')){
            $pdf = $request->file('pdf');
            $ext = $pdf->getClientOriginalExtension();
            $location = "public/";
            $fileName = Date("Y-m-d-h-i-s") . '.' .$ext;
            $pdf->storeAs($location,$fileName);
            $customer->image = $fileName;
        }
          $customer->save();

        Session::flash('message', 'Customer is Updated successfully!');
        return redirect(route('customers.index'))->withInput();
    }
}


    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        Session::flash('message', 'Customer is Deleted!');
        return redirect(route('customers.all'))->withInput();
    }

}
