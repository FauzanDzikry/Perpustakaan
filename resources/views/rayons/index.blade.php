@extends('layout.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Rayon</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rayons.create') }}"> Create</a>
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
            <th>Nama Rayon</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($rayons as $rayon)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rayon->rayon }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('rayons.edit',$rayon->id) }}">Edit</a>
                <form class="d-inline" action="{{ url('rayons/'.$rayon->id) }}" method="post" onsubmit="return confirm('yakin ingin menghapus data ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $rayons->links() !!}
        
@endsection