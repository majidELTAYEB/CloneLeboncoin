<!DOCTYPE html>
<html>

    <head>
        <meta name="_token" content="{{ csrf_token() }}">
        <title>Live Search</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body>
    @include('nav')
    <div class="border mt-10 p-10 w-1/2 m-auto">
        <div class="">
             <h1 class="text-4xl text-center">
                 Envoyer un message à {{$name}}
             </h1>
        </div>
        <div class="text-center">
            <form method="post" action="http://127.0.0.1:8000/message/{{$id1}}/store">
                @csrf
                <div class="mb-10">
                    <textarea maxlength="250" class="w-96 mt-10 border h-52" id="contmessage" name="body">Bonjour {{$name}}, je suis intéressé par votre produit.</textarea>
                </div>
                <div>
                    <input type="submit" id="message" value="Send" class="bg-blue-500 text-white px-12 py-3 bo rounded">
                </div>
            </form>
        </div>
    </div>
    </body>
</html>
