@extends('acceuil.layout')

@section('content')

<title>Produit sale</title>
<div class="box-container">

    <div class="box">


        <div class="img">
            <img decoding="async" src="img/product-1.jpg" alt="">
        </div>
        <div style="margin-top: 50px; margin-left: 30px;">
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <section class="products">
            <h1 class="title"> our <span>products</span> <a href="#">view all >></a> </h1>
            <div class="box-container">
                @foreach ($produits as $item)
                    <div class="box">
                        <div class="icons">
                            <!-- Lien pour afficher le formulaire moderne -->
                            <a href="{{ route('login') }}" class="fas fa-shopping-cart" onclick="showCartForm('{{ $item->name }}', '{{ $item->prix }}')"></a>

                            <a href="#" class="fas fa-eye"></a>

                            <a href="{{ route('login') }}" class="fas fa-star"></a>

                            <div class="actions">

                            </div>
                        </div>

                        <div class="img" style="text-align: center;">
                            <img decoding="async" src="{{ asset('images/' . $item->image) }}" alt="">
                        </div>
                        <div class="content">
                            <h3> nom : {{ $item->name }}</h3>
                            <div class="price"> Prix :{{ $item->prix }}</div>
                            <div class="price">Quantite :{{ $item->quantite }}</div>
                            <div class="stars">

                                @if ($item->evaluations->count() > 0)
                                <h3>Évaluations :</h3>


                                <!-- Afficher la moyenne des évaluations sous forme d'étoiles -->
                                @php
                                    $averageRating = $item->evaluations->avg('rating');
                                @endphp

                                <div>

                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= round($averageRating))
                                            <span class="fas fa-star"></span>
                                        @else
                                            <span class="far fa-star"></span>
                                        @endif
                                    @endfor
                                </div>

                            @else
                            <h3>Évaluations :</h3>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                            @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Section pour afficher le formulaire moderne -->
        <div id="cartFormContainer" class="cart-form-container">

        </div>
    </div>
</div>


@endsection
