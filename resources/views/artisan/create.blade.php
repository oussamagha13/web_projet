@extends('artisan.layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{$item}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <form action="{{ route('artisan.store') }}" method="POST" enctype="multipart/form-data" class="custom-form">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control inp" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="prix">Prix:</label>
            <input type="text" class="form-control inp" id="prix" name="prix">
        </div>

        <div class="form-group">
            <label for="quantite">Quantite:</label>
            <input type="text" class="form-control inp" id="quantite" name="quantite">
        </div>

        <div class="form-group">
            <label for="quantitemin">Quantite Min:</label>
            <input type="text" class="form-control inp" id="quantitemin" name="quantitemin">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control inp" id="description" name="description">
        </div>

        <div class="form-group">
            <label for="soustype">Soustype:</label>
            <input type="text" class="form-control inp" id="soustype" name="soustype">
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control inp" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="type">Type:</label>
            <select class="form-control inp" id="type" name="type">
                <option value="sucre">Sucre</option>
                <option value="sale">Sale</option>
                <option value="sucre_saler">Sucre/Sale</option>
            </select>
        </div>

        <input type="hidden" name="id_art" value="{{ auth()->user()->id }}">

        <div class="form-group">
            <button type="submit" class="btn btn-submit">Submit</button>
        </div>
    </form>
</div>


<style>
    body{
    background: url('/image/chocolat-creme-fouettee-baies-gourmandes-gogo-generees-par-ia.jpg');
     background-size: cover;
}

    .modern-body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    background-color: #3f3434;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: rgba(246, 242, 241, 0.863);
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 50%;
    justify-content: center;
    align-items: center;
    margin-left: 10cm;
}

.custom-form {
    max-width: 400px;
    margin: auto;
}

.inp {
    box-sizing: border-box;
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #d16f0d;
    border-radius: 4px;
    outline: none;
    transition: border-color 0.3s;
    font-size: 16px;
    color: #333;
}

.inp:hover,
.inp:focus {
    border-color: #dee0de;
}

.btn-submit {
    background-color: #d3790a;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}

/* Styles pour le sélecteur */
select.inp {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    transition: border-color 0.3s;
    font-size: 16px;
}

select.inp:hover,
select.inp:focus {
    border-color: #d0740b;
}

/* Styles pour le champ de fichier */
input[type="file"].inp {
    padding: 12px;
}

/* Styles pour les étiquettes */
label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}

/* Styles pour le type de bouton submit */
.btn-submit {
    background-color: #c24e06;
    color: rgb(241, 241, 241);
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.btn-submit:hover {
    background-color: #9c6d08;
}

</style>
@endsection
