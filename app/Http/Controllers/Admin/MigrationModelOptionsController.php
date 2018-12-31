<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MigrationModelOption;
use Illuminate\Http\Request;

class MigrationModelOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $migrationmodeloptions = MigrationModelOption::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $migrationmodeloptions = MigrationModelOption::latest()->paginate($perPage);
        }

        return view('admin.migration-model-options.index', compact('migrationmodeloptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.migration-model-options.create');
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
        
        MigrationModelOption::create($requestData);

        return redirect('admin/migration-model-options')->with('flash_message', 'MigrationModelOption added!');
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
        $migrationmodeloption = MigrationModelOption::findOrFail($id);

        return view('admin.migration-model-options.show', compact('migrationmodeloption'));
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
        $migrationmodeloption = MigrationModelOption::findOrFail($id);

        return view('admin.migration-model-options.edit', compact('migrationmodeloption'));
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
        
        $migrationmodeloption = MigrationModelOption::findOrFail($id);
        $migrationmodeloption->update($requestData);

        return redirect('admin/migration-model-options')->with('flash_message', 'MigrationModelOption updated!');
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
        MigrationModelOption::destroy($id);

        return redirect('admin/migration-model-options')->with('flash_message', 'MigrationModelOption deleted!');
    }
}
