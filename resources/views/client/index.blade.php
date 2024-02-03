@extends('client.layout')

@section('content')
    <title>Client</title>

    <section class="home" id="home">
        <div class="slides-container">

            <div class="slide active">
                <div class="content">
                    <span>Contient Different Produit</span>
                    <h3>Sucré</h3>
                    <a href="#" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img src="{{ asset('image/home-img-1.png') }}" alt="" style="width: 600px; height: 350px;">

                </div>
            </div>

            <div class="slide">
                <div class="content">
                    <span>Contient Different Produit</span>
                    <h3> Salé</h3>
                    <a href="#" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img src="{{ asset('image/Pizza-Slice-PNG-Transparent-Image1.png') }}" alt="" style="width: 600px; height: 350px;">

                </div>
            </div>

            <div class="slide">
                <div class="content">
                    <span>La Disponibilité</span>
                    <h3>Du Livraison !</h3>
                    <a href="#" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img src="{{ asset('image/clipart676506.png') }}" alt="" style="width: 600px; height: 350px;">


                </div>
            </div>

        </div>
        <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
        <div id="prev-slide" class="fas fa-angle-left" onclick="next()"></div>

    </section>

    <style>
        .home{
        padding-top: 14rem;
        background: url('/image/home-bg1.jpg') no-repeat;

        background-size: cover;
        background-position: center;
        position: relative;
    }
    </style>
    <script>
         function simulerClic() {
        document.getElementById("prev-slide").click();
    }

    // Appel de la fonction toutes les 3 secondes
    setInterval(simulerClic, 20000);

        let navbar = document.querySelector('.navbar');

    document.querySelector('#menu-btn').onclick = () => {
        navbar.classList.toggle('active');
    }

    window.onscroll = () => {
        navbar.classList.remove('active');
    }

    let slides = document.querySelectorAll('.home .slides-container .slide');
    let index = 0;

    function next(){
        slides[index].classList.remove('active');
        index = (index + 1) % slides.length;
        slides[index].classList.add('active');
    }

    function prev(){
        slides[index].classList.remove('active');
        index = (index - 1 + slides.length) % slides.length;
        slides[index].classList.add('active');
    }
    </script>


    <div class="box-container">

        <div class="box">


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
                                <a href="#" class="fas fa-shopping-cart" onclick="showCartForm('{{ $item->name }}', '{{ $item->prix }}', '{{ $item->id }}', '{{ $item->id_art }}')"></a>

                                <a href="{{ route('client.viewprod', ['id' => $item->id]) }}" class="fas fa-eye"></a>

                                <a href="#" class="fas fa-star" onclick="showEvaluationForm('{{ $item->name }}', '{{ $item->prix }}', '{{ $item->id }}', '{{ $item->id_art }}')"></a>

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

    <!-- Ajoutez ces lignes dans la section scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
    <script>
        function showCartForm(name, price, id_produit, id_art) {
            // Utilisation de SweetAlert pour créer un formulaire moderne
            Swal.fire({
                title: '<h2>Ajouter au panier</h2>',
                html: `
                    <!-- Votre formulaire moderne ici -->
                    <form id="cartForm" action="{{ route('panier.store') }}" method="POST">
                        @csrf
                        <!-- Champ caché pour le nom du produit -->
                        <input type="hidden" name="nomproduit" value="${name}">
                        <!-- Champ caché pour le prix du produit -->
                        <input type="hidden" name="id_produit" value="${id_produit}">
                        <input type="hidden" name="prix" value="${price}">
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                        <input type="hidden" name="id_art" value="${id_art}">

                        <div>
                            <h2>Nom du produit: ${name} </h2>
                        </div>
                        <div>
                            <h2>Prix du produit: ${price}</h2>
                        </div>
                        <div>
                            <h2 style="text-align:center">Quantité: <input type="text" name="quantite" value="1" size="4"></h2>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                    </form>
                `,
                showCancelButton: true,
                cancelButtonText: 'Annuler',
                focusConfirm: false,
                preConfirm: () => {
                    // Logique à exécuter avant de soumettre le formulaire
                    // Vous pouvez ajouter du code ici si nécessaire
                }
            });
        }

        function showEvaluationForm(name, price, id_produit, id_art) {
            // Utilisation de SweetAlert pour créer un formulaire moderne
            Swal.fire({
                title: '<h3>Évaluez ce produit</h3>',
                html: `
                <form action="{{ route('evaluations.store') }}" method="POST">
    @csrf

    <div>
        <input type="hidden" name="id_produit" value="${id_produit}">

        <div class="rating-container">
            <span class="star" onclick="handleStarClick(1)">&#9733;</span>
            <span class="star" onclick="handleStarClick(2)">&#9733;</span>
            <span class="star" onclick="handleStarClick(3)">&#9733;</span>
            <span class="star" onclick="handleStarClick(4)">&#9733;</span>
            <span class="star" onclick="handleStarClick(5)">&#9733;</span>
        </div>
        <input type="hidden" id="ratingInput" name="rating" value="0">
        <label for="comment" class="form-label">Commentaire</label>
        <textarea name="comment" id="comment" rows="4" class="form-textarea"></textarea>

        <button type="submit" class="submit-btn">Soumettre l'évaluation</button>
    </div>
</form>


                `,
                showCancelButton: true,
                cancelButtonText: 'Annuler',
                focusConfirm: false,
                preConfirm: () => {
                    // Logique à exécuter avant de soumettre le formulaire
                    // Vous pouvez ajouter du code ici si nécessaire
                }
            });
        }
    </script>

<script>
    function handleStarClick(rating) {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('ratingInput');

        resetStars();

        for (let i = 0; i < rating; i++) {
            stars[i].classList.add('active');
        }

        ratingInput.value = rating;
    }

    function resetStars() {
        const stars = document.querySelectorAll('.star');

        stars.forEach((star) => {
            star.classList.remove('active');
        });
    }
</script>



<style>
     .form-label {
            margin-top: 10px;
            font-size: 16px;
            color: #555;
        }

        .form-textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #2186c4;
        }
 .rating-container {
            display: flex;
            flex-direction: row;
            font-size: 24px;
        }

        .star {
            cursor: pointer;
            color: #ccc;
            transition: color 0.2s;
        }

        .star.active {
            color: gold;
        }

        .submit-btn {
            margin-top: 10px;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
        }
</style>

@endsection
