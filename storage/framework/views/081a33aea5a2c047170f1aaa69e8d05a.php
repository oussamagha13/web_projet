<!-- resources/views/admin/dashboard.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Tableau de Bord d'Administration</h1>

        <div id="userChart" style="width: 80%;"></div>
    </div>

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var trace = {
                x: ['Dernières 24 heures', 'Dernière semaine', 'Dernier mois'],
                y: [<?php echo e($newUsers24Hrs); ?>, <?php echo e($newUsersWeek); ?>, <?php echo e($newUsersMonth); ?>],
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\TOSHIBA\OneDrive\Bureau\laravel\shop\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>