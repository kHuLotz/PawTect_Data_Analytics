
{{-- <div>
    <canvas id="lineChart"></canvas>
</div> --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function updateLineChart(data) {
    if (lineChartInstance) lineChartInstance.destroy();
    const ctx = document.getElementById('lineChart').getContext('2d');
    lineChartInstance = new Chart(ctx, {
        type: 'line',
        data: {
            labels: data.labels, // Ensure labels are set to years here
            datasets: data.datasets.map(dataset => ({
                label: dataset.species_name,
                data: dataset.values,
                backgroundColor: dataset.color,
                borderColor: dataset.color,
                borderWidth: 2,
            }))
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Months',
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Animal Bites',
                    }
                }
            }
        }
    });
}


</script>

