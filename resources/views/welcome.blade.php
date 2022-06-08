@extends('master')

@section('content')
    <div class="row p-10">
        <div class="col-md-6">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('user.create') }}"> Create User</a>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($data as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('user.show',$user->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
                                <form action="{{ route('user.delete',$user->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-warning">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

                {!! $data->links() !!}

                </dov>
            </div>
@endsection
