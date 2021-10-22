@extends('admin.admin-template.main')
@section('title', 'Dashboard')

@section('body')
<style>
    .dashboard-card {
        box-shadow: 0 0 5px 5px rgba(0, 0, 0, 0.058);
        background-color: white;
    }

    .dashboard-icon {
        height: 50px;
        font-size: 50px;
    }

    .dashboard-card .card-header {
        background-color: white;
    }

    .count-info {
        text-align: right;
    }

</style>

<caption>
    <h2 class="pt-3 ps-3" style="font-weight: 900;">Dashboard Overview</h2>
</caption>
<p class="dashed"></p>
<main class="p-3">
    <div class="row">
    </div>
    <div class="row mb-3">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card dashboard-card">
                <div class="card-body d-flex">
                    <i class="fas fa-receipt dashboard-icon"></i>
                    <div class="count-info w-100 text-end">
                        <h4>Invoice Total</h4>
                        <h1>0</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card dashboard-card">
                <div class="card-body d-flex">
                    <i class="fas fa-hands-helping dashboard-icon"></i>
                    <div class="count-info w-100 text-end">
                        <h4>Paid Rent</h4>
                        <h1>0</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card dashboard-card">
                <div class="card-body d-flex">
                    <i class="fas fa-ban dashboard-icon"></i>
                    <div class="count-info w-100 text-end">
                        <h4>Unpaid Total</h4>
                        <h1>0</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card dashboard-card">
                <div class="card-body d-flex">
                    <i class="fas fa-clock dashboard-icon"></i>
                    <div class="count-info w-100 text-end">
                        <h4>Pending Rents</h4>
                        <h1>0</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row flex-grow">
        <div class="col mb-3 flex-grow">
            <div class="card h-100 dashboard-card">
                <div class="card-header">
                    Monthly Earnings
                </div>
                <div class="card-body">
                    <canvas id="monthlyEarnings" class="rounded m-0"
                        style="border: solid 1px #707070;"></canvas>
                </div>
            </div>
        </div>
        <div class="col mb-3 flex-grow">
            <div class="card h-100 dashboard-card">
                <div class="card-header">
                    Popular Products
                </div>
                <div class="card-body px-0 pt-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Store</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sample</td>
                                <td>Sample</td>
                                <td>Sample</td>
                            </tr>
                            <!-- If no data -->
                            <!-- <tr>
                              <td colspan="3" class="text-center">No data in table</td>
                          </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3 flex-grow">
            <div class="card h-100 dashboard-card">
                <div class="card-header">
                    Quick Details
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(() => {
        let target = $('#monthlyEarnings');
        let labels = [
            'Jan', 'Feb', 'Mar', 'Apr'
        ];
        let dataset = [{
            data: [
                123, 567, 890
            ],
            borderColor: '#707070',
            backgroundColor: '#707070',
        }];

        new Chart(target, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: dataset
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        window.addEventListener('beforeprint', () => {
            myChart.resize(600, 600);
        });

        window.addEventListener('afterprint', () => {
            myChart.resize();
        });
    });
</script>

@endsection

 