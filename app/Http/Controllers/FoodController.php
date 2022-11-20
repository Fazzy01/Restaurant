<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foods = Food::latest()->paginate(10);
        return view("food.index", compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("food.create");
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
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|integer',
            'category'=>'required',
            'image'=>'required|mimes:png,jpeg,jpg'

        ]);
        
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$imagename);

        Food::create([

            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'price'=>$request->get('price'),
            'category_id'=>$request->get('category'),
            'image'=>$imagename
        ]);
        return redirect()->back()->with('message','Food created sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $food = Food::find($id);
        return view('food.edit', compact('food'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'image'=>'required|mimes:png,jpeg,jpg',
            'food_update_name'=>'required|min:3|max:15',
            'description'=>'required|min:3|max:150',
            'price'=>'required',
            'category'=>'required'
        ]);

        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$imagename);


        $food = Food::find($id);
        $food->name = $request->get('food_update_name');
        $food->description = $request->get('description');
        $food->price = $request->get('price');
        $food->category_id = $request->get('category');
        $food->image = $imagename;
        $food->save();
        return redirect()->route('food.index')->with('update_message','Food updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $food = Food::find($id);
        $food->delete();
        return redirect()->back()->with('delete_message','you succefully deleted a record') ;

    }

    public function listfood()
    {
        $categories = Category::with('food')->get() ;
        return view('food.list', compact('categories'));
    }




}
