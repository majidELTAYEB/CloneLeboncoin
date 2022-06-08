@extends('master')

@section('content')
    @include('nav')
 @foreach($ano as $v)
    <form action="http://127.0.0.1:8000/annonce/{{$v->id}}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row p-10 px-40">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titre:</strong>
                    <input type="text" name="titre" class="form-control" value="{{ $v->titre }}" required="required">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea maxlength="250" name="description" class="form-control" required="required">{{ $v->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Photographie:</strong>
                    <input type="file" name="photographie" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prix:</strong>
                    <input type="text" name="prix" class="form-control" value="{{ $v->prix }}" required="required">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="bg-blue-500 text-white px-12 py-3 bo rounded">Submit</button>
        </div>
    </form>
 @endforeach
@endsection
