@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')
    @component('common-components.breadcrumb')
         @slot('title') Admin   @endslot
         @slot('title_li') Dashboard   @endslot
     @endcomponent

<div class="row">
    <div class="col-xl-12">

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12 col-sm-6 mb-12">

     @component('common-components.dashboard2-widget')
         @slot('title') Pemasukkan Hari Ini  @endslot
         @slot('total') Rp. {{ number_format($hari_ini,0,',','.')}},- @endslot
         @slot('tanggal') {{$hari}} @endslot
     @endcomponent
            </div>
            <div class="col-xl-3 col-lg-6 col-12 col-sm-6 mb-12">

     @component('common-components.dashboard2-widget')
         @slot('title') Pemasukkan Bulan Ini  @endslot
         @slot('total') Rp. {{ number_format($bulan_ini,0,',','.')}},- @endslot
         @slot('tanggal') {{$bulan}} @endslot
     @endcomponent

            </div>
            <div class="col-xl-3 col-lg-6 col-12 col-sm-6 mb-12">

    @component('common-components.dashboard2-widget')
        @slot('title') Pemasukkan Tahun Ini  @endslot
        @slot('total') Rp. {{ number_format($tahun_ini,0,',','.')}},- @endslot
        @slot('tanggal') {{$tahun}} @endslot
    @endcomponent

            </div>
            <div class="col-xl-3 col-lg-6 col-12 col-sm-6 mb-12">

    @component('common-components.dashboard2-widget')
        @slot('title') Total Pemasukkan  @endslot
        @slot('total') Rp. {{ number_format($semua_transaksi,0,',','.')}},- @endslot
        @slot('tanggal') Semua @endslot
    @endcomponent
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12 col-sm-6 mb-12">

     @component('common-components.dashboard2-widget')
         @slot('title') Total Transaksi  @endslot
         @slot('total') {{$total_transaksi}} @endslot
         @slot('tanggal') @endslot
     @endcomponent
            </div>
            <div class="col-xl-3 col-lg-6 col-12 col-sm-6 mb-12">

     @component('common-components.dashboard2-widget')
         @slot('title') Total Reseller  @endslot
         @slot('total') {{$total_reseller}} @endslot
         @slot('tanggal') @endslot
     @endcomponent

            </div>
            <div class="col-xl-3 col-lg-6 col-12 col-sm-6 mb-12">

    @component('common-components.dashboard2-widget')
        @slot('title') Total Barang  @endslot
        @slot('total') {{$total_barang}} @endslot
        @slot('tanggal')  @endslot
    @endcomponent

            </div>
            <div class="col-xl-3 col-lg-6 col-12 col-sm-6 mb-12">

    @component('common-components.dashboard2-widget')
        @slot('title') Total Agen @endslot
        @slot('total') {{$total_agen}} @endslot
        @slot('tanggal')  @endslot
    @endcomponent
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Grafik Per Bulan</h4>
                <div id="columnn_chart" class="apex-charts" dir="ltr"></div>
            </div>
        </div>
        <!--end card-->
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Grafik Per Tahun</h4>
                <div id="column_chart_tahunan" class="apex-charts" dir="ltr"></div>
            </div>
        </div>
        <!--end card-->
    </div>
</div>



<!-- end row -->

@endsection

@section('script')
<!-- apexcharts -->
<script src="{{URL::asset('/libs/apexcharts/apexcharts.min.js')}}"></script>
<!-- apexcharts init -->
<script>
    var options = {
    chart: {
        height: 350,
        type: 'bar',
        toolbar: {
        show: false
        }
    },
    plotOptions: {
        bar: {
        horizontal: false,
        columnWidth: '45%',
        endingShape: 'rounded'
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Total Transaksi',
        data: [
            @foreach ($chart_transaksi as $result => $hasil)
                {{$hasil}},
            @endforeach
        ]
    }],
    colors: ['#3b5de7', '#eeb902'],
    xaxis: {
        categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov','Dec',]
    },
    yaxis: {
        title: {
        text: 'Rp. (Nominal)'
        }
    },
    grid: {
        borderColor: '#f1f1f1'
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
        formatter: function formatter(val) {
            return "Rp.  " + val;
        }
        }
    }
    };
    var chart = new ApexCharts(document.querySelector("#columnn_chart"), options);
    chart.render(); // column chart with datalabels
</script>

<script>
    var options = {
    chart: {
        height: 350,
        type: 'bar',
        toolbar: {
        show: false
        }
    },
    plotOptions: {
        bar: {
        horizontal: false,
        columnWidth: '45%',
        endingShape: 'rounded'
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    series: [{
        name: 'Total Transaksi',
        data: [
            @foreach ($data_transaksi_tahunan as $result => $hasil)
                {{$hasil}},
            @endforeach
        ]
    }],
    colors: ['#3b5de7', '#eeb902'],
    xaxis: {
        categories: [
            @foreach ($tahunan as $result => $hasil)
                {{ $hasil->year }},
            @endforeach
            ]
    },
    yaxis: {
        title: {
        text: 'Rp. (Nominal)'
        }
    },
    grid: {
        borderColor: '#f1f1f1'
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
        formatter: function formatter(val) {
            return "Rp.  " + val;
        }
        }
    }
    };
    var chart = new ApexCharts(document.querySelector("#column_chart_tahunan"), options);
    chart.render(); // column chart with datalabels
</script>

<script src="{{URL::asset('/js/pages/apexcharts.init.js')}}"></script>
@endsection