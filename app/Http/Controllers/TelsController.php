<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tel;
use Illuminate\Http\Request;
use App\Crud;

class TelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = Tel::all()->getFillable();
        $crud = Crud::where('name', '=', strtolower('Tel') . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $models = $tels = Tel::latest()->paginate($perPage);
        } else {
            $models = $tels = Tel::latest()->paginate($perPage);
        }

        return view('index', compact('tels', 'models', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tels.create');
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
        
        Tel::create($requestData);

        return redirect('tels')->with('flash_message', 'Tel added!');
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
        $tel = Tel::findOrFail($id);

        return view('tels.show', compact('tel'));
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
        $tel = Tel::findOrFail($id);

        return view('tels.edit', compact('tel'));
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
        
        $tel = Tel::findOrFail($id);
        $tel->update($requestData);

        return redirect('tels')->with('flash_message', 'Tel updated!');
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
        Tel::destroy($id);

        return redirect('tels')->with('flash_message', 'Tel deleted!');
    }
}
