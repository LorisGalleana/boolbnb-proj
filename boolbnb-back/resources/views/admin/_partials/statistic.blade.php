<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js in Laravel</title>
</head>
<body>
     {{-- Grafico per visite appartamenti  --}}

     <div class="mt-4 text-center">
        <h3>Le visite al tuo appartamento</h3>

        {{-- visite annuali dell'appartamento  --}}

        <div class="mx-auto" style="width: 70%">
            <canvas id="yearlyVisit"></canvas>
        </div>
    </div>

    <script>

        // Logica grafico visite annuali 

        var ctx = document.getElementById('yearlyVisit').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // tipo di grafico
            data: {
                labels: ['Gennaio' ,' Febbraio' , 'Marzo' , 'Aprile' , 'Maggio' , 'Giugno' , 'Luglio', 'Agosto' , 'Settembre' , 'Ottobre' , 'Novembre', 'Dicembre' ], // Etichette asse X (Mesi)
                datasets: [{
                    label: '# Visite registrate',
                    data: [12, 19, 3, 5, 2, 3 ,4 , 15 , 19 , 22 , 14 , 9], // Dati per asse Y (Numero delle visite)
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
</body>
</html>
