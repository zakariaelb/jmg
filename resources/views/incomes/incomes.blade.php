@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <h6>{{__('messages.AddNewExpense')}}</h6>
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                {{--<form method="post" action="{{url('input\save')}}">--}}
                <form method="post" action="{{route('expense.saving')}}" enctype="multipart/form-data">
                    {{-- <input name="_token" value="{{csrf_token()}}"> --}}
                    @csrf

                    <div class="form-group">
                        <label for="InputDate">{{__('messages.Date')}}</label>
                        <input type="Date" name="date" class="form-control" id="dateID" placeholder="date">
                        @error('date')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="receipt_voucher_number" maxlength="4" class="form-control"
                                   placeholder="{{__('messages.VoucherNumber')}}">
                            @error('receipt_voucher_number')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" name="amount" class="form-control"
                                   placeholder="{{__('messages.Amount')}}">
                            @error('amount')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="service_name_English" class="form-control"
                               aria-describedby="InputserviceName" placeholder="{{__('messages.serviceName')}}">
                        @error('service_name_English')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="sponsor_name_English" class="form-control"
                               id="InputReceiptVoucherNumber" aria-describedby="InputReceiptVoucherNumber"
                               placeholder="{{__('messages.sponsorName')}}">
                        @error('sponsor_name_English')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="InputAmountr">{{__('messages.name')}}</label>--}}
                        <input type="TEXT" name="name_English" class="form-control" id="InputamountID"
                               aria-describedby="InputReceiptVoucherNumber" placeholder="{{__('messages.name')}}">
                        @error('name_English')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="service_name_Arabic" class="form-control"
                               aria-describedby="InputserviceName" placeholder="{{__('messages.serviceNameAR')}}">
                        @error('service_name_Arabic')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="sponsor_name_Arabic" class="form-control"
                               id="InputReceiptVoucherNumber" aria-describedby="InputReceiptVoucherNumber"
                               placeholder="{{__('messages.sponsorNameAR')}}">
                        @error('sponsor_name_Arabic')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="InputAmountr">{{__('messages.name')}}</label>--}}
                        <input type="TEXT" name="name_Arabic" class="form-control" id="InputamountID"
                               aria-describedby="InputReceiptVoucherNumber" placeholder="{{__('messages.nameAR')}}">
                        @error('name_Arabic')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="InputAmountr">{{__('messages.name')}}</label>--}}
                        <input type="file" name="photo" class="form-control" id="photoID" aria-describedby="InputPhoto"
                               placeholder="{{__('messages.Photo')}}">
                        @error('photo')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-horizontal">
                        {{-- <label for="InputAmountr">{{__('messages.name')}}</label>--}}
                        <input type="file" name="images[]" class="form-control" id="photoIDTOW"
                               aria-describedby="InputPhoto" placeholder="{{__('messages.Photo')}}" multiple>
                        @error('images')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-check">
                        <button type="submit" class="btn btn-primary mt-2">{{__('messages.save')}}</button>
                    </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
@stop
@section("scripts")
    <script>
        $.ajax({
            type: 'post',
            url:'{{route('incomes.store')}}',
            data: {
                '': 2,
            },
            success: function (data){

            }, error: function (reject){
            }
        });

    </script>
    @stop
