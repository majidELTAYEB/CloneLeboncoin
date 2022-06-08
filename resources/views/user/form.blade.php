@extends('master')

@section('content')
    @include('nav')

    @foreach($user as $v)
         <form method="post" action="http://127.0.0.1:8000/user/{{$v->id}}/update" class="px-40">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" value="{{ $v->name }}" required="required">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <input type="email" name="email" class="form-control" value="{{ $v->email }}" required="required">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" class="form-control" required="required">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    @endforeach
@endsection
