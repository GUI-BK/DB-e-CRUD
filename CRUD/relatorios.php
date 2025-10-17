<?php 
// include dos arquivox
include_once './action/relatorios.php';
include_once './include/header.php';
?>
  
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 30px;
        }
        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        canvas {
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Relatório de Produção</h2>
        <canvas id="graficoProducao"></canvas>
    </div>

    <script>
       const ctx = document.getElementById('graficoProducao').getContext('2d');

const graficoProducao = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($produtos); ?>,
        datasets: [{
            label: 'Porcentagem de Produção (%)',
            data: <?php echo json_encode($percentuais); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                max: 100,
                title: {
                    display: true,
                    text: 'Porcentagem (%)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Produtos'
                }
            }
        },
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.parsed.y + '%';
                    }
                }
            },
            legend: {
                display: false
            }
        }
    }
});
    </script>
</body>
</html>