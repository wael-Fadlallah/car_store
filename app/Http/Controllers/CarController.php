<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function __construct(){
        $this->middleware('isSuperAdmin')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = Car::get();
        return view('dashboard.cars.index')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return asset('storage/car/'.Car::first()->image);
        $categories = Category::whereNotNull('parent_category')->get();
        $stories = Store::get();
        return view('dashboard.cars.create')->with([
            'categories' => $categories,
            'stories'    => $stories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'              => 'required|max:255',
            'store_id'          => 'required|exists:stores,id',
            'category_id'       => 'required|exists:categories,id',
            'description'       => 'required',
            'image'             => 'required|size:2056',
            'price'             => 'required',
            'brand'             => 'required',
            'model'             => 'required',
            'color'             => 'required',
            'type'              => 'required',
            'age'               => 'required',
            'kilometer'         => 'required',
            'status'            => 'required',
        ]);
        $car = $request->except('_token');
        if ($request->hasFile('image')) {
            $name = time() . rand(1, 100) .'.'. $request->image->extension();
            $request->file('image')->storeAs("public/car",$name);
            $car['image'] = $name;
        }

        Car::create($car);
        return redirect(Route('cars.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
        $categories = Category::whereNotNull('parent_category')->get();
        $stories = Store::get();

        return view('dashboard.cars.edit')->with([
            'car'           => $car,
            'categories'    => $categories,
            'stories'       => $stories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
        $data = $request->all();
        if ($request->hasFile('image')) {
            $name = time() . rand(1, 100) .'.'. $request->image->extension();
            $request->file('image')->storeAs("public/car",$name);
            $data['image'] = $name;
        }
        $car->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
        Car::destroy($car->id);
        return response("deleted",200);
    }
}
