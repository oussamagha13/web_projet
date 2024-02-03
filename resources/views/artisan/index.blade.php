@extends('artisan.layout')

@section('content')
<title>Artisan</title>
<div class="box-container">

    <div class="box">
        <div class="icons">


        <div class="img">
            <img decoding="async" src="img/product-1.jpg" alt="">
        </div>
        <div style="margin-top: 0px; margin-left: 30px;">
            <a role="button" class="btn" href="{{ route('artisan.create') }}">create</a>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif

        <section class="products">
            <h1 class="title"> Mes <span>Produits</span> <a href="#">view all >></a> </h1>
            <div class="box-container">
                @foreach ($produits as $item)
                <div class="box">
                    <div class="icons">

                        <a href="{{ route('artisan.viewprod', ['id' => $item->id]) }}" class="fas fa-eye"></a>

                        <a href="{{ route('artisan.edit', ['id' => $item->id]) }}" class="fas fa-pencil-alt"></a>

                        <a href="#" class="fas fa-trash" onclick="deleteProduct({{ $item->id }})"></a>

                        <div class="actions">
                            <form id="delete-form-{{ $item->id }}" action="{{ route('produit.destroy', ['produit' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="submitForm('delete-form-{{ $item->id }}')"></button>
                            </form>
                        </div>
                    </div>

                    <div class="img" style="text-align: center;">
                        <img decoding="async" src="{{ asset('images/' . $item->image) }}" alt="">
                    </div>
                    <div class="content">
                        <h3> nom : {{ $item->name }}</h3>
                        <div class="price"> Type :{{ $item->type }}</div>
                        <div class="price"> Prix :{{ $item->prix }}</div>
                        <div class="price">Quantite :{{ $item->quantite }}</div>
                        <div class="price">Quantite min:{{ $item->quantitemin }}</div>

                        <div class="stars">

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

<script>
    function submitForm(formId) {
        document.getElementById(formId).submit();
    }

    function deleteProduct(productId) {
        if (confirm('Are you sure you want to delete this product?')) {
            document.getElementById('delete-form-' + productId).submit();
        }
    }
</script>
@endsection
