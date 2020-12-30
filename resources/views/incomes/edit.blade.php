@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="alert alert-success" id="msgDisplay" style="display: none" >{{__('messages.inUpdated')}}</div>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <h6>{{__('messages.AddNewIncome')}}</h6>
                </div>
                {{--<form method="post" action="{{url('input\save')}}">--}}
                <form method="post" action="" id="incomesFormUpdate" enctype="multipart/form-data">
                    {{-- <input name="_token" value="{{csrf_token()}}"> --}}
                    @csrf
                    <input type="text" STYLE="display: none" name="id_Income" class="form-control" value="{{$id_Inc -> id}}" id="dateID" placeholder="date">

                    <div class="form-group">
                        <input type="Date" name="date" STYLE="display: none" class="form-control" value="{{$id_Inc -> date}}" id="dateID" placeholder="date">
                        @error('date')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="receipt_voucher_number" maxlength="4" class="form-control" value="{{$id_Inc -> receipt_voucher_number}}"
                                   placeholder="{{__('messages.VoucherNumber')}}">
                            @error('receipt_voucher_number')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <input type="text" style="display: none;" class="form-control" value="{{$id_Inc -> id}}" name="id">
                        <div class="col">
                            <input type="text" name="amount" class="form-control" value="{{$id_Inc -> amount}}"
                                   placeholder="{{__('messages.Amount')}}">
                            @error('amount')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="service_name_English" class="form-control" value="{{$id_Inc -> service_name_English}}"
                               aria-describedby="InputserviceName" placeholder="{{__('messages.serviceName')}}">
                        @error('service_name_English')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="sponsor_name_English" class="form-control" value="{{$id_Inc -> sponsor_name_English}}"
                               id="InputReceiptVoucherNumber" aria-describedby="InputReceiptVoucherNumber"
                               placeholder="{{__('messages.sponsorName')}}">
                        @error('sponsor_name_English')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="InputAmountr">{{__('messages.name')}}</label>--}}
                        <input type="TEXT" name="name_English" class="form-control" id="InputamountID" value="{{$id_Inc -> name_English}}"
                               aria-describedby="InputReceiptVoucherNumber" placeholder="{{__('messages.name')}}">
                        @error('name_English')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="service_name_Arabic" class="form-control" value="{{$id_Inc -> service_name_Arabic}}"
                               aria-describedby="InputserviceName" placeholder="{{__('messages.serviceNameAR')}}">
                        @error('service_name_Arabic')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="sponsor_name_Arabic" class="form-control" value="{{$id_Inc -> sponsor_name_Arabic}}"
                               id="InputReceiptVoucherNumber" aria-describedby="InputReceiptVoucherNumber"
                               placeholder="{{__('messages.sponsorNameAR')}}">
                        @error('sponsor_name_Arabic')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="InputAmountr">{{__('messages.name')}}</label>--}}
                        <input type="TEXT" name="name_Arabic" class="form-control" id="InputamountID" value="{{$id_Inc -> name_Arabic}}"
                               aria-describedby="InputReceiptVoucherNumber" placeholder="{{__('messages.nameAR')}}">
                        @error('name_Arabic')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="InputAmountr">{{__('messages.name')}}</label>--}}
                        <input type="file" name="photo" class="form-control" id="photoID" aria-describedby="InputPhoto""
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
                        <button id="UPDATE" class="btn btn-primary mt-2">{{__('messages.Edit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section("scripts")
    <script>
        $(document).on('click', '#UPDATE', function (e){
            e.preventDefault();
            var formData = new FormData($('#incomesFormUpdate')[0]);

            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url:"{{route('incomes.updating')}}",
                data:formData,
                processData: false,
                contentType: false,
                cache: false,
            {{-- data: {
                    '_token':"{{csrf_token()}}",
                    //'photo' => $file_name,
                    'amount':$("input[name='amount']").val(),
                    'receipt_voucher_number':$("input[name='receipt_voucher_number']").val(),
                    'date':$("input[name='date']").val(),
                    'sponsor_name_English':$("input[name='sponsor_name_English']").val(),
                    'sponsor_name_Arabic':$("input[name='sponsor_name_Arabic']").val(),
                    'name_English':$("input[name='name_English']").val(),
                    'name_Arabic':$("input[name='name_Arabic']").val(),
                    'service_name_English':$("input[name='service_name_English']").val(),
                    'service_name_Arabic':$("input[name='service_name_Arabic']").val(),
                                    },--}}
                success: function (data){
                {{-- if(data.status == true)
                        alert(data.msg)--}}
                if(data.status == true){
                    $('#msgDisplay').show();
                }
                }, error: function (reject){
                }
            });
        });
    </script>
    @stop
