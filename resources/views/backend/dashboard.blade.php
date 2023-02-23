@extends('/frequently-used/sidebar')
@section('title','Dashboard')
@section('other-content')
 <!-- font awesome links -->
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- graph and pie -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <link rel="stylesheet" href="/css/super-admin-style.css">
 <div class="data-summary-section">
        <div class="box restaurant-count">
            <div class="for-icon restaurant-icon">
            <ion-icon name="home"></ion-icon>
            </div>
            <div class="for-text">
                <p class="count">12</p>
                <p class="text-name">Restaurant</p>
            </div>
        </div>
        <div class="box customer-count">
            <div class="for-icon customer-icon">
            <ion-icon name="people"></ion-icon>
            </div>
            <div class="for-text">
                <p class="count">12</p>
                <p class="text-name">Customer</p>
            </div>
        </div>
        <div class="box delivery-count">
            <div class="for-icon delivery-icon">
            <ion-icon name="bicycle"></ion-icon>
            </div>
            <div class="for-text">
                <p class="count">12</p>
                <p class="text-name">Delivery person</p>
            </div>
        </div>
        <div class="box location-count">
            <div class="for-icon location-icon">
            <ion-icon name="location"></ion-icon>
            </div>
            <div class="for-text">
                <p class="count">12</p>
                <p class="text-name">Location</p>
            </div>
        </div>
 </div>
 <div class="for-graph-pie">
    <div class="graph">
    <canvas id="myChart" class="myChart"></canvas>
    </div>
    <div class="pie">
    <canvas id="myPie" class="myPie"></canvas>
    </div>
 </div>
 <script>
      const ctx = document.getElementById("myChart").getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['jan', 'feb', 'mar','api','may','jun','july','aug','sep','oct','nov','dec'],
                datasets: [{
                    label: '',
                    data: [10,20,40,50,30,20,90,40,70,60,20,30],
                    backgroundColor: [
                        '#3B5BA5',
                        '#E87A5D',
                        '#F3B941',

                    ],

                }]
            },
            options: {
                Response: true,
            }
        });
        const ctx1 = document.getElementById('myPie').getContext('2d');
        const myPie = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['Movies', 'Games', 'Series'],
                datasets: [{
                    label: 'Product Sales',
                    data: [10,20,30 ],
                    backgroundColor: [
                        '#EC6B56',
                        '#FFC154',
                        '#47B39C',
                    ],

                }]
            },
            options: {
                Response: true,
            }
        });
 </script>
@endsection