@extends('layout.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Penerbit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('publishers.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Penerbit</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($publishers as $publisher)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $publisher->penerbit }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('publishers.edit',$publisher->id) }}">Edit</a>
                <form class="d-inline" action="{{ url('publishers/'.$publisher->id) }}" method="post" onsubmit="return confirm('yakin ingin menghapus data ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $publishers->links() !!}
        
@endsection