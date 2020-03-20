<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api;
class ApiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Api::all();
        return view('admin/api', compact('data'));
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
        //
        $paramdesc = $request->get('paramdesc');
        $param = $request->get('param');
        $items = array();
        $paramdesc = $request->get('paramdesc');
        $count = 0;
        $counts = 1;
        foreach($param as $data) {
            $items['param'.$counts++] = array(
                'main' => $data,
                'desc' => $paramdesc[$count++]
            );
        }
        $re = json_encode($items);
        $validasi = $request->validate([
            'name' => 'required',
            'url'=> 'required',
            'method'=> 'required',
            'param'=> 'required',
            'paramdesc'=> 'required',
            'response'=> 'required',
        ]);
        
        

        $users = Api::create([
            'name' => $request->get('name'),
            'url' => $request->get('url'),
            'method' => $request->get('method'),
            'param' => $re,
            'response' => $request->get('response'),
        ]);
    
        return redirect('/admin/api')->with('success', 'Selamat data berhasil ditambah!');
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
    }
}
