@extends('layouts.master')
{{-- @section('title', 'Admin Dashboard')
@endsection --}}
@section('page-css')
    <!--chartlist-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\bower_components\chartist\css\chartist.css') }}">
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}

@endsection

@section('content')
    <div class="col-md-6 col-xl-3">
        <div class="card user-widget-card bg-c-blue">
            <div class="card-block">
                <i class="feather icon-user bg-simple-c-blue card1-icon"></i>
                <h4>{{$data['totalusers']}}</h4>
                <p>Total Users</p>
                <a href="#!" class="more-info">Explore</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card user-widget-card bg-c-pink">
            <div class="card-block">
                <i class="feather icon-home bg-simple-c-pink card1-icon"></i>
                <h4>{{$data['totaljobs']}}</h4>
                <p>Total Job Posts</p>
                <a href="#!" class="more-info">Explore</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card user-widget-card bg-c-green">
            <div class="card-block">
                <i class="feather icon-alert-triangle bg-simple-c-green card1-icon"></i>
                <h4>{{$data['activejobs']}}</h4>
                <p>Active Jobs</p>
                <a href="#!" class="more-info">Explore</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card user-widget-card bg-c-yellow">
            <div class="card-block">
                <i class="feather icon-twitter bg-simple-c-yellow card1-icon"></i>
                <h4>{{$data['pendingjobs']}}</h4>
                <p>Pending Applications</p>
                <a href="#!" class="more-info">Explore</a>
            </div>
        </div>
    </div>
    <div class="col-md-10">

    </div>
    <div class="col-md-2">
        <a href="{{ route('ad-new-post') }}"
            class="btn btn-outline-primary btn-round btn-lg btn-grd btn-block p-1 mb-2">Post A Job</a>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">

                <h4>Job Posts Categories</h4>
                <span>View job posts by category below</span>

            </div>
            <div class="card-block">
                <canvas id="jobsChart" width="400" height="250"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-header-left ">
                    <h4>Monthly View</h4>
                    <span class="text-muted">Post Trends</span>
                </div>
            </div>
            <div class="card-block-big">
                <div id="monthJobs" width="400" height="250"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Job Predictions</h4>
                <div id="chartContainer" style="width: 100%; height: 500px;">
                    <canvas id="jobTrendsChart"></canvas>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>
                    document.addEventListener('DOMContentLoaded', async function() {
                        try {
                            const response = await fetch('/api/predict-job-trends', {
                                headers: {
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            });

                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }

                            const predictions = await response.json();

                            console.log('Predictions received:', predictions);

                            // Group predictions by job title
                            const grouped = {};
                            predictions.forEach(pred => {
                                if (!grouped[pred.title]) {
                                    grouped[pred.title] = [];
                                }
                                grouped[pred.title].push({ year: pred.year, predicted_jobs: pred.predicted_jobs });
                            });

                            const years = [...new Set(predictions.map(item => item.year))].sort();
                            const datasets = [];

                            for (const [title, data] of Object.entries(grouped)) {
                                datasets.push({
                                    label: title,
                                    data: years.map(year => {
                                        const found = data.find(d => d.year === year);
                                        return found ? found.predicted_jobs : null;
                                    }),
                                    borderWidth: 2,
                                    fill: false,
                                    tension: 0.4,
                                    pointRadius: 4,
                                    borderColor: randomColor(),
                                    backgroundColor: randomColor(), // Also set the point color
                                });
                            }

                            // Correct Random Color Generator
                            function randomColor() {
                                const r = Math.floor(Math.random() * 255);
                                const g = Math.floor(Math.random() * 255);
                                const b = Math.floor(Math.random() * 255);
                                return `rgb(${r},${g},${b})`; // <-- Corrected string format!
                            }

                            const ctx = document.getElementById('jobTrendsChart').getContext('2d');
                            const jobTrendsChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: years,
                                    datasets: datasets
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        title: {
                                            display: true,
                                            text: 'Job Market Predictions Per Title (Next 5 Years)',
                                            font: {
                                                size: 20
                                            }
                                        },
                                        tooltip: {
                                            mode: 'index',
                                            intersect: false
                                        },
                                        legend: {
                                            position: 'bottom',
                                            labels: {
                                                usePointStyle: true,
                                                pointStyle: 'circle',
                                            }
                                        }
                                    },
                                    interaction: {
                                        mode: 'nearest',
                                        axis: 'x',
                                        intersect: false
                                    },
                                    scales: {
                                        x: {
                                            title: {
                                                display: true,
                                                text: 'Year'
                                            }
                                        },
                                        y: {
                                            title: {
                                                display: true,
                                                text: 'Predicted Job Openings'
                                            },
                                            beginAtZero: true,
                                            ticks: {
                                                precision: 0 // No decimals for job counts
                                            }
                                        }
                                    }
                                }
                            });

                        } catch (error) {
                            console.error('Error fetching or plotting job trends:', error);
                        }
                    });
                    </script>


            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card z-dept-1">
            <div class="card-header bg-primary">
                <div class="card-title">
                    <h4>Recent Activities</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-6 f-left">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Posts</h5>
                            </div>
                        </div>
                        <div class="card-body">

                            <h1>Posted Jobs</h1>

                            <livewire:jobs.posted-job />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 f-right">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Applications</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h1>Recent Applications</h1>
                            <div class="row table-responsive">
                                <livewire:applications.all-application />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <script type="text/javascript" src="{{ asset('assets\bower_components\chart.js\js\Chart.js') }}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('assets\pages\chart\chartjs\chartjs-custom.js') }}"></script>
    <script src="{{ asset('assets\js\pcoded.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets\pages\dashboard\crm-dashboard.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets\js\script.js') }}"></script>
    <script>
        const ctx = document.getElementById('jobsChart').getContext('2d');
        const jobsChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Approved', 'Rejected', 'Active'],
                datasets: [{
                    label: 'Job Status',
                    data: [
                        {{ $data['pendingjobs'] }},
                        {{ $data['approvedjobs'] }},
                        {{ $data['rejectedjobs'] }},
                        {{ $data['activejobs'] }}
                    ],
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.8)',   // Pending - Yellow
                        'rgba(75, 192, 192, 0.8)',   // Approved - Teal
                        'rgba(255, 99, 132, 0.8)',   // Rejected - Red
                        'rgba(54, 162, 235, 0.8)'    // Active - Blue
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Log for debugging — outside the object
    console.log('Monthly counts', @json($monthlyCounts));

    document.addEventListener("DOMContentLoaded", function () {
        var options = {
            chart: {
                type: 'bar',
                height: 370
            },
            series: [{
                name: 'Job Posts',
                data: @json($monthlyCounts)
            }],
            xaxis: {
                categories: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ]
            },
            colors: ['#1E90FF'],
            dataLabels: {
                enabled: true
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " jobs";
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#monthJobs"), options);
        chart.render();
    });
</script>

@endsection



