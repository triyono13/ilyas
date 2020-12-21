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
        @slot('total') Rp. {{ number_format($semua_pemasukkan,0,',','.')}},- @endslot
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
         @slot('total') 0 @endslot
         @slot('tanggal') {{$hari}} @endslot
     @endcomponent
            </div>
            <div class="col-xl-3 col-lg-6 col-12 col-sm-6 mb-12">

     @component('common-components.dashboard2-widget')
         @slot('title') Total Reseller  @endslot
         @slot('total') 1 @endslot
         @slot('tanggal') {{$bulan}} @endslot
     @endcomponent

            </div>
            <div class="col-xl-3 col-lg-6 col-12 col-sm-6 mb-12">

    @component('common-components.dashboard2-widget')
        @slot('title') Total Barang  @endslot
        @slot('total') 11 @endslot
        @slot('tanggal') {{$tahun}} @endslot
    @endcomponent

            </div>
            <div class="col-xl-3 col-lg-6 col-12 col-sm-6 mb-12">

    @component('common-components.dashboard2-widget')
        @slot('title') Best Seller Barang  @endslot
        @slot('total') Skin Care XXX @endslot
        @slot('tanggal') Semua @endslot
    @endcomponent
            </div>
        </div>
    </div>
</div>



<!-- end row -->

@endsection

@section('script')
<!-- apexcharts -->


<script src="{{URL::asset('/js/pages/apexcharts.init.js')}}"></script>
@endsection