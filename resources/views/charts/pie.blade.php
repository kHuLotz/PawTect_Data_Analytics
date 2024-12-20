
{{-- <div>
    <canvas id="pieChart"></canvas>
</div> --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   function updatePieChart(data) {
            if (pieChartInstance) pieChartInstance.destroy();
            const ctx = document.getElementById('pieChart').getContext('2d');
            pieChartInstance = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        data: data.values,
                        backgroundColor: [
                            'rgba(200, 50, 80, 1)',     
                            'rgba(30, 100, 180, 1)',    
                            'rgba(200, 150, 40, 1)',
                            'rgba(120, 70, 200, 1)',
                            'rgba(40, 120, 120, 1)',    
                            'rgba(200, 100, 30, 1)',
                            'rgba(75, 0, 130, 1)' 
                        ],
                        borderColor: [
                            'rgba(200, 50, 80, 1)',     
                            'rgba(30, 100, 180, 1)',    
                            'rgba(200, 150, 40, 1)',
                            'rgba(120, 70, 200, 1)', 
                            'rgba(40, 120, 120, 1)',    
                            'rgba(200, 100, 30, 1)',
                            'rgba(75, 0, 130, 1)'  
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        }
</script>

