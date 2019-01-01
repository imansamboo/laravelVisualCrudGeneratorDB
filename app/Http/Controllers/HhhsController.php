<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Hhh;
use Illuminate\Http\Request;
use App\Crud;

class HhhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = (new Hhh)->getFillable();
        $crud = Crud::where('name', '=', strtolower('Hhh') . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $models = $hhhs = Hhh::latest()->paginate($perPage);
        } else {
            $models = $hhhs = Hhh::latest()->paginate($perPage);
        }

        return view('index', compact('hhhs', 'models', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('hhhs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Hhh::create($requestData);

        return redirect('hhhs')->with('flash_message', 'Hhh added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $hhh = Hhh::findOrFail($id);

        return view('hhhs.show', compact('hhh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $hhh = Hhh::findOrFail($id);

        return view('hhhs.edit', compact('hhh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $hhh = Hhh::findOrFail($id);
        $hhh->update($requestData);

        return redirect('hhhs')->with('flash_message', 'Hhh updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Hhh::destroy($id);

        return redirect('hhhs')->with('flash_message', 'Hhh deleted!');
    }
}
