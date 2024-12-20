
{{-- <div class="container mx-auto mt-6">
    <canvas id="barChart"></canvas>
</div> --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
     function updateBarChart(data) {
    // Destroy the previous chart instance, if any
    if (barChartInstance) barChartInstance.destroy(); 
    
    // Get the canvas context
    const ctx = document.getElementById('barChart').getContext('2d');

    // Create a new bar chart instance
    barChartInstance = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.labels, 
            datasets: [{
                label: 'Population', 
                data: data.values,  
                backgroundColor: [
                    'rgba(200, 50, 80, 1)',
                    'rgba(30, 100, 180, 1)',
                    'rgba(200, 150, 40, 1)',
                    'rgba(40, 120, 120, 1)',
                    'rgba(120, 70, 200, 1)',
                    'rgba(200, 100, 30, 1)'
                ],
                borderColor: [
                    'rgba(200, 50, 80, 1)',
                    'rgba(30, 100, 180, 1)',
                    'rgba(200, 150, 40, 1)',
                    'rgba(40, 120, 120, 1)',
                    'rgba(120, 70, 200, 1)',
                    'rgba(200, 100, 30, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' } // Position of the legend
            },
            scales: {
                y: {
                    beginAtZero: true, // Start the y-axis at 0
                    title: {
                        display: true,
                        text: 'Population'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Clinic'
                    }
                }
            }
        }
    });
}

updateBarChart(clinicPopulationData);

</script>
