<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use \App\Http\Resources\Item as ItemResource;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['name'] = $request->item['name'];
        $item = Item::create($inputs);
        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $inputs = $request->all();
        if ($item) {
            $item->completed = $request->item['completed'] ? true : false;
            $item->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $item->update($inputs);
            return new ItemResource($item);
        } else {
            return response([
                'data' => "item not found",
                'status' => 'error',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string
     */
    public function destroy(Item $item)
    {
//        if ($item) {
        //            $item->delete();
        //            return "Item successfully deleted";
        //        } else {
        //            return $this->respondNotFound("Item not found");
        //        }

        if ($item) {
            $item->delete();
            return "Item successfully deleted";
        } else {
            return response([
                'data' => "item not found",
                'status' => 'error',
            ]);
        }
    }
}
