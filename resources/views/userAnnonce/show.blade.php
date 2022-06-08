@extends('master')

@section('content')
    @include('nav')
    <div class="row p-10">
        <div class="col-md-12">
            <div class="row">


                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Photographie</th>
                        <th>Prix</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($ano as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->titre }}</td>
                            <td>{{ $user->description }}</td>
                            <td><img src="{{ asset('storage/'.$user->photographie) }}" alt="" style="width: 250px;height: 250px"></td>
                            <td>{{ $user->prix }} €</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('annonce.update',$user->id) }}">Edit</a>
                                <form action="{{ route('annonce.delete',$user->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>



                </dov>
            </div>
@endsection
