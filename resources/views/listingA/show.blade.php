@extends('master')

@section('content')
   @include('nav')
   <div class="flex flex-col px-40 pb-10">
       <div class="flex flex-wrap justify-center p-10">
           @foreach($annonce as $v)
               <article class="p-10 text-center border-2 m-2 flex flex-col justify-between">
                   <div class="border-b-gray-600 mb-3">
                       <h1 class="text-xl">{{ $v->titre }}</h1>
                   </div>
                   <div>
                       <img src="{{ asset('storage/'.$v->photographie) }}" alt="" style="width: 250px;height: 250px">
                   </div>
                   <div class="pt-2.5 border-b" style="width: 250px;">
                       <p>{{$v->description}}</p>
                   </div>
                   <div class="border-b">
                       <p>{{$v->prix}} euros</p>
                   </div>
                   <div class="border-b">
                       <p>posté à {{$v->created_at}}</p>
                   </div>
                   <div>
                       <p>posté par {{$v->name}}</p>
                   </div>
                   <div>
                       <a href="http://127.0.0.1:8000/message/{{$v->id}}/form">envoyé un message</a>
                   </div>
               </article>
           @endforeach
       </div>
       <div>
           {{ $annonce->links() }}
       </div>
   </div>


@endsection
