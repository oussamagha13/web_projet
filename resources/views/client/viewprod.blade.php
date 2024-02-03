@extends('client.layout')


@section('content')



<section class="products">
    <h1 class="title"> details du <span>produit</span> <a href="#"> >></a> </h1>
<div class="conteneur-commandes">
    @foreach ($produits as $pcommande)
    <div class="commande">

        <img src="{{ asset('images/' . $pcommande->image) }}" alt="Image du produit" class="img-fluid rounded" style="width: 400px; height: 350px;">


        <div class="info">
           <table>
           <tr><td> <h3> Nom du Produit : </h3></td><td><input type="text" name="nomproduit" value="{{ $pcommande->name }}" class="form-control" readonly></td></tr>
           <tr><td><p> Prix du Produit : </p></td><td><input type="text" name="prix" value="{{ $pcommande->prix }} DA" class="form-control" readonly></td></tr>
           <tr><td><p> Quantite : </p></td><td><input type="text" name="prix" value="{{ $pcommande->quantite }}" class="form-control" readonly></td></tr>
           <tr><td><p> type : </p></td><td><input type="text" name="prix" value="{{ $pcommande->type }}" class="form-control" readonly></td></tr>
           <tr><td><p> sous type : </p></td><td><input type="text" name="prix" value="{{ $pcommande->soustype }}" class="form-control" readonly></td></tr>

            <tr><td>  <p> Quantite Min : </p></td><td><input type="text" name="prix" value="{{ $pcommande->quantitemin }}" class="form-control" readonly></td></tr>
            <tr><td><p> Description : </p></td><td><input type="text" name="prix" value="{{ $pcommande->description }}" class="form-control" readonly></td></tr>


            </table>
            <br>
            <a href="#" class="btn btn-primary" onclick="showCartForm('{{ $pcommande->name }}', '{{ $pcommande->prix }}', '{{ $pcommande->id }}', '{{ $pcommande->id_art }}')">Ajouter au Panier</a>

            <br>



        </div>



    </div>
    @endforeach
</div>
</section>
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
    </script>

<style>
    .form-control2{
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
  padding: 10px 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #eaeaea; /* Arrière-plan clair */
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;

    }
    .action-btn {
        background-color: #3490dc;
        color: #fff;
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .action-btn:hover {
        background-color: #603506;
    }
    .supprimer-btn {
        background-color: #e3342f;
    }
    .supprimer-btn:focus {
  border-color: #e5e4e2c5;
  outline: none; /* Supprime l'outline par défaut */
}
    .form-control{
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
  padding: 10px 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  color: #ffffff; /* Couleur de texte sombre */
  background-color: #b24d00; /* Arrière-plan clair */
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;

    }
    .form-control2{
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
  padding: 10px 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #eaeaea; /* Arrière-plan clair */
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;

    }
    .conteneur-commandes {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 2cm;

    }

    .commande {
        background-color: rgba(237, 240, 242, 0.805);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease;
        display: flex;
        align-items: center;
    }

    .commande:hover {
        transform: scale(1.05);
    }

    img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .info {
        margin-left: 20px;
        text-align: left;
    }

    /* Style pour le nom du médecin */
    .commande h3 {
        margin: 0;
        font-size: 20px;
        font-weight: bold;
        color: #333333;
    }

    /* Style pour le prénom du médecin */
    .commande p {
        margin: 0;
        font-size: 18px;
        color: #666666;
    }
</style>

@endsection
