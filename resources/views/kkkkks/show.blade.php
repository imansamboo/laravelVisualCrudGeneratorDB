@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">kkkkk {{ $kkkkk->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/kkkkks') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/kkkkks/' . $kkkkk->id . '/edit') }}" title="Edit kkkkk"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('kkkkks' . '/' . $kkkkk->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete kkkkk" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $kkkkk->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $kkkkk->name }} </td></tr><tr><th> Sex </th><td> {{ $kkkkk->sex }} </td></tr><tr><th> Age </th><td> {{ $kkkkk->age }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
