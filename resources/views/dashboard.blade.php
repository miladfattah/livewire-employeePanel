<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            
                <div id="employees" dir="rtl"></div>

            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-4">
                            
                <div id="sucessEmployees" dir="rtl"></div>

            </div>
        </div>
    </div>
    
    <script
    src="https://www.gstatic.com/charts/loader.js">
    </script>
    <script>
        google.charts.load('current',{packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        // Set Data
        var data = google.visualization.arrayToDataTable([
        ['Price', 'Size'],
        [50,7],[60,8],[70,8],[80,9],[90,9],[100,9],
        [110,10],[120,11],[130,14],[140,14],[150,15]
        ]);
        // Set Options
        var options = {
        title: 'آمار ثبت شغل در هر ماه',
        hAxis: {title: 'Square Meters'},
        vAxis: {title: 'Price in Millions'},
        legend: 'none'
        };
        // Draw Chart
        var chart = new google.visualization.LineChart(document.getElementById('employees'));
        chart.draw(data, options);
        }
    </script>
     <script>
        google.charts.load('current',{packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        // Set Data
        var data = google.visualization.arrayToDataTable([
        ['Price', 'Size'],
        ['فرودین',5],['اردیبهشت',8],['خرداد',8],['تیر',9],['مرداد',9],['شهریور',9],
        ['مهر',15],['آبان',15],['آذر',14],['دی',13],['بهمن',8] , ['اسفند',8] 
        ]);
        // Set Options
        var options = {
        title: 'آمار ثبت شغل در هر ماه',
        hAxis: {title: 'Square Meters'},
        vAxis: {title: 'Price in Millions'},
        legend: 'none'
        };
        // Draw Chart
        var chart = new google.visualization.LineChart(document.getElementById('sucessEmployees'));
        chart.draw(data, options);
        }
    </script>
</x-app-layout>
