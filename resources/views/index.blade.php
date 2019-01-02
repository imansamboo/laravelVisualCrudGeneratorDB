@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{$crud->name}}</div>
                    <div class="card-body">
                        <a href="{{ url('/' . $crud->name .'/create') }}" class="btn btn-success btn-sm" title="Add New {{$crud->name}}">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/' . $crud->name) }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    @foreach($fillables as $fillable)
                                    <th>{{$fillable}}</th>
                                    @endforeach
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($models as $item)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        @foreach($fillables as $fillable)
                                        <td>{{ $item->$fillable }}</td>
                                        @endforeach
                                        <td>
                                            <a href="{{ url('/' . $crud->name. '/' . $item->id) }}" title="View {{$crud->name}}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/' . $crud->name . '/' . $item->id . '/edit') }}" title="Edit {{$crud->name}}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/' . $crud->name . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete {{$crud->name}}" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $models->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
