<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JMG - Expenses</title>
        <!-- CSS -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}
                            <span class="sr-only">(current)</span></a>
                    </li>
                @endforeach

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
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
                            <input type="text" name="receipt_voucher_number"  maxlength="4" class="form-control" placeholder="{{__('messages.VoucherNumber')}}">
                            @error('receipt_voucher_number')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="text" name="amount" class="form-control" placeholder="{{__('messages.Amount')}}">
                            @error('amount')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="service_name_English" class="form-control"  aria-describedby="InputserviceName" placeholder="{{__('messages.serviceName')}}">
                        @error('service_name_English')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="sponsor_name_English" class="form-control" id="InputReceiptVoucherNumber" aria-describedby="InputReceiptVoucherNumber" placeholder="{{__('messages.sponsorName')}}">
                        @error('sponsor_name_English')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="InputAmountr">{{__('messages.name')}}</label>--}}
                        <input type="TEXT" name="name_English" class="form-control" id="InputamountID" aria-describedby="InputReceiptVoucherNumber" placeholder="{{__('messages.name')}}">
                        @error('name_English')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="service_name_Arabic" class="form-control"  aria-describedby="InputserviceName" placeholder="{{__('messages.serviceNameAR')}}">
                        @error('service_name_Arabic')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{--  <label for="InputReceiptVoucherNumber">{{__('messages.sponsorName')}}</label>--}}
                        <input type="TEXT" name="sponsor_name_Arabic" class="form-control" id="InputReceiptVoucherNumber" aria-describedby="InputReceiptVoucherNumber" placeholder="{{__('messages.sponsorNameAR')}}">
                        @error('sponsor_name_Arabic')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="InputAmountr">{{__('messages.name')}}</label>--}}
                        <input type="TEXT" name="name_Arabic" class="form-control" id="InputamountID" aria-describedby="InputReceiptVoucherNumber" placeholder="{{__('messages.nameAR')}}">
                        @error('name_Arabic')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="InputAmountr">{{__('messages.name')}}</label>--}}
                        <input type="file" name="photo" class="form-control" id="photoID" aria-describedby="InputPhoto" placeholder="{{__('messages.Photo')}}">
                        @error('photo')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    {{-- <div class="form-horizontal">
                        {{-- <label for="InputAmountr">{{__('messages.name')}}</label>
                        <input type="file" name="images[]" class="form-control" id="photoIDTOW" aria-describedby="InputPhoto" placeholder="{{__('messages.Photo')}}" multiple>
                        @error('images')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>--}}
                    <div class="row no-print">
                        <div class="col-12">
                    <div class="form-check">
                    <button type="submit" class="btn btn-primary mt-2"  style="margin-right: 10px">{{__('messages.save')}}</button>
                        <a href="" @click.prevenr="printme" target="_blank" class="btn btn-secondary mt-2"><i class="fa fa-print"></i>Print</a>
                    </div>   </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </body>
</html>
