<!DOCTYPE html>
<html>
<head>
    <title>Annonce</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @include('nav')
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            écrire une annonce
        </div>
        <div class="card-body">
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea maxlength="250" name="description" class="form-control" required="required"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" name="image" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <input type="text" name="price" class="form-control" required="required">
                </div>
                <div>
                    <label for="categorie"> Catégorie</label>
                    <select class="form-controller" id="categorie" name="categorie">
                        <option value="vehicule">Véhicule</option>
                        <option value="mode">Mode</option>
                        <option value="maison">Maison</option>
                        <option value="multimedia">Multimédia</option>
                        <option value="animaux">Animaux</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-12 py-3 bo rounded">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

