    {{-- </div>
        <canvas id="radarChart"></canvas>
        @include('charts.radar')
    </div> --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    
function updateRadarChart(data) {
    if (radarChartInstance) {
        radarChartInstance.destroy(); // Destroy previous instance if it exists
    }

    const ctx = document.getElementById('radarChart').getContext('2d');
    radarChartInstance = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: data.labels,  // Ensure labels are present
            datasets: data.datasets.map(dataset => ({
                label: dataset.label,
                data: dataset.data,
                fill: dataset.fill,
                backgroundColor: dataset.backgroundColor,
                borderColor: dataset.borderColor,
                pointBackgroundColor: dataset.pointBackgroundColor,
                pointBorderColor: dataset.pointBorderColor,
                pointHoverBackgroundColor: dataset.pointHoverBackgroundColor,
                pointHoverBorderColor: dataset.pointHoverBorderColor,
            })),
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Victim and Species Data',
                },
            },
        },
    });
}


</script>
