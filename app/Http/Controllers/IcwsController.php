<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Icw;
use Illuminate\Http\Request;
use App\Crud;

class IcwsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = Icw::all()->getFillable();
        $crud = Crud::where('name', '=', strtolower('Icw') . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $models = $icws = Icw::latest()->paginate($perPage);
        } else {
            $models = $icws = Icw::latest()->paginate($perPage);
        }

        return view('index', compact('icws', 'models', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('icws.create');
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
        
        Icw::create($requestData);

        return redirect('icws')->with('flash_message', 'Icw added!');
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
        $icw = Icw::findOrFail($id);

        return view('icws.show', compact('icw'));
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
        $icw = Icw::findOrFail($id);

        return view('icws.edit', compact('icw'));
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
        
        $icw = Icw::findOrFail($id);
        $icw->update($requestData);

        return redirect('icws')->with('flash_message', 'Icw updated!');
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
        Icw::destroy($id);

        return redirect('icws')->with('flash_message', 'Icw deleted!');
    }
}
