<!DOCTYPE html>
<html>
<head>
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Live Search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="">
    @include('nav')
    <div class="px-44">
        <div class="">
            <div class="flex flex-row">
                <div class="form-group">
                    <label for="search">Recherche</label><input  type="text" class="border ml-3" id="search" name="search">
                </div>
                <div class="pl-6">
                    <label> Catégorie
                        <select id="categorie">
                            <option value="">tout</option>
                            <option value="vehicule">Véhicule</option>
                            <option value="mode">Mode</option>
                            <option value="maison">Maison</option>
                            <option value="multimedia">Multimédia</option>
                            <option value="animaux">Animaux</option>
                        </select>
                    </label>
                </div>
                <div class="pl-6">
                    <label class="look1" for="age">Prix: </label><select name="prix" id="prix">
                        <option value="0/1000000">none</option>
                        <option value="0/50">entre 0€ et 50€</option>
                        <option value="50/100">entre 50€ et 100€</option>
                        <option value="100/1000000">100€ et plus</option>
                    </select>
                </div>

            </div>
        </div>
        <div id="conteneur" class="flex flex-wrap justify-center p-10">

        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){

             $('#search').on('keyup',function(){
                let cat = $('#categorie').children("option:selected").val();
                let prix = $('#prix').children("option:selected").val();
                $value=$(this).val();
                $.ajax({
                    type : 'get',
                    url : 'http://127.0.0.1:8000/search',
                    data:{'search':$value,'cat':cat,'prix':prix},
                    success:function(data){
                        let empty = ""
                        if(data !== ""){
                            $('#conteneur').html(data);
                        }if($value === ""){
                            $('#conteneur').html(empty)
                        }

                    }
                });
            })


    });



</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

</body>

</html>
