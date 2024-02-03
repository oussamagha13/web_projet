<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tableau de Bord d'Administration</h1>

        <div id="userChart" style="width: 80%;"></div>
    </div>

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var trace = {
                x: ['Dernières 24 heures', 'Dernière semaine', 'Dernier mois'],
                y: [{{ $newUsers24Hrs }}, {{ $newUsersWeek }}, {{ $newUsersMonth }}],
                type: 'bar',
                marker: {
                    color: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)'],
                    line: {
                        color: 'rgba(255, 99, 132, 1.0)',
                        width: 2
                    }
                }
            };

            var layout = {
                title: 'Nombre de nouveaux utilisateurs',
                showlegend: false,
                xaxis: {
                    title: 'Période'
                },
                yaxis: {
                    title: 'Nombre d\'utilisateurs'
                }
            };

            Plotly.newPlot('userChart', [trace], layout);
        });
    </script>
@endsection
