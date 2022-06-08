@extends('master')

@section('content')
    @include('nav')
    <div class="row p-10">
        <div class="col-md-12">
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Expéditeur</th>
                        <th>Message</th>
                        <th>Envoyé le</th>
                        <th width="280px">Répondre</th>
                    </tr>
                    @foreach($products as $v)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->body}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>
                                <a class="btn btn-primary" href="http://127.0.0.1:8000/message/{{$v->user_id}}/form">Répondre</a>

                            </td>
                        </tr>
                    @endforeach
                </table>


                <div class="bottom-0">
                    {{ $products->links() }}
                </div>

            </div>
            @endsection










