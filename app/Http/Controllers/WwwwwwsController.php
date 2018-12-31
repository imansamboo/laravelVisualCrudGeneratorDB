<?php

namespace App\Http\Controllers;

use App\Crud;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Wwwwww;
use Illuminate\Http\Request;

class WwwwwwsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = Wwwwww::all()[0]->getFillable();
        $keyword = $request->get('search');
        $perPage = 25;
        $crud = Crud::where('name', '=', strtolower('Wwwwww') . 's')->get()[0];

        if (!empty($keyword)) {
            $wwwwwws = Wwwwww::latest()->paginate($perPage);
        } else {
            $wwwwwws = Wwwwww::latest()->paginate($perPage);
        }

        return view('index', compact('wwwwwws', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('wwwwwws.create');
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
        
        Wwwwww::create($requestData);

        return redirect('wwwwwws')->with('flash_message', 'Wwwwww added!');
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
        $wwwwww = Wwwwww::findOrFail($id);

        return view('wwwwwws.show', compact('wwwwww'));
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
        $wwwwww = Wwwwww::findOrFail($id);

        return view('wwwwwws.edit', compact('wwwwww'));
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
        
        $wwwwww = Wwwwww::findOrFail($id);
        $wwwwww->update($requestData);

        return redirect('wwwwwws')->with('flash_message', 'Wwwwww updated!');
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
        Wwwwww::destroy($id);

        return redirect('wwwwwws')->with('flash_message', 'Wwwwww deleted!');
    }
}
