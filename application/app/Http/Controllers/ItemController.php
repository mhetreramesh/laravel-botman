<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('categories')->paginate(5);
        return response()->json($items);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $items = Item::with('categories')->get();
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item([
          'name' => $request->get('name'),
          'price' => $request->get('price'),
          'sku' => $request->get('sku'),
          'ean' => $request->get('ean'),
          'quantity' => $request->get('quantity')
        ]);
        $item->save();
        $categoryIds = [];
        foreach($request->get('categories') as $category) {
            $categoryIds[] = $category['id'];
        }
        $item->categories()->sync($categoryIds);
        return response()->json('Successfully added');
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
        $item = Item::where('id', '=', $id)->with('categories')->get()->first();
        return response()->json($item);
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
        $item = Item::find($id);
        $item->name = $request->get('name');
        $item->price = $request->get('price');
        $item->sku = $request->get('sku');
        $item->ean = $request->get('ean');
        $item->quantity = $request->get('quantity');
        $item->save();
        $categoryIds = [];
        foreach($request->get('categories') as $category) {
            $categoryIds[] = $category['id'];
        }
        $item->categories()->sync($categoryIds);
        return response()->json('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $item = Item::find($id);
      $item->delete();

      return response()->json('Successfully Deleted');
    }
}
