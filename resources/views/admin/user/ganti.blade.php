@extends('layouts.master')

@section('title') Ganti Password @endsection

@section('css')

<link href="{{URL::asset('libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" rel="stylesheet" />

@endsection

@section('content')

 @component('common-components.breadcrumb')
        @slot('title') Admin   @endslot
        @slot('title_li') Ganti Password  @endslot
     @endcomponent

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach 
                <h4 class="card-title">Ganti Password</h4><br><br>
                <form action="{{route('change')}}" method="POST">
                @csrf
                <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" placeholder="********" autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" placeholder="********" autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" placeholder="********" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
                    <div class="form-group row">
                        <div class="col-lg-8"></div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Ubah Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end select2 -->
    </div>
</div>
<!-- end row -->

@endsection

@section('script')

<script src="{{URL::asset('/libs/select2/select2.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

<!-- form advanced init -->
<script src="{{URL::asset('/js/pages/form-advanced.init.js')}}"></script>
@endsection