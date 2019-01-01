<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kk;
use Illuminate\Http\Request;
use App\Crud;

class KksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = Kk::all()->getFillable();
        $crud = Crud::where('name', '=', strtolower('Kk') . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $models = $kks = Kk::latest()->paginate($perPage);
        } else {
            $models = $kks = Kk::latest()->paginate($perPage);
        }

        return view('index', compact('kks', 'models', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('kks.create');
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
        
        Kk::create($requestData);

        return redirect('kks')->with('flash_message', 'Kk added!');
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
        $kk = Kk::findOrFail($id);

        return view('kks.show', compact('kk'));
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
        $kk = Kk::findOrFail($id);

        return view('kks.edit', compact('kk'));
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
        
        $kk = Kk::findOrFail($id);
        $kk->update($requestData);

        return redirect('kks')->with('flash_message', 'Kk updated!');
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
        Kk::destroy($id);

        return redirect('kks')->with('flash_message', 'Kk deleted!');
    }
}
