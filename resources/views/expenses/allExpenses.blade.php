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
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">{{__('messages.Date')}}</th>
                            <th scope="col">{{__('messages.VoucherNumber')}}</th>
                            <th scope="col">{{__('messages.Amount')}}</th>
                            <th scope="col">Id</th>
                            <th scope="col">{{__('messages.sponsorName')}}</th>
                            <th scope="col">{{__('messages.name')}}</th>
                            <th scope="col">{{__('messages.serviceName')}}</th>
                            <th scope="col">{{__('messages.picture')}}</th>
                            <th scope="col">{{__('messages.operation')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($expenses as $expense)
                        <tr>
                            <th scope="row">{{$expense -> date}}</th>
                            <td>{{$expense -> receipt_voucher_number}}</td>
                            <td>{{$expense -> amount}}</td>
                            <td>{{$expense -> id}}</td>
                            <td>{{$expense -> sponsor_name}}</td>
                            <td>{{$expense -> name}}</td>
                            <td>{{$expense -> service_name}}</td>
                            <td><img  style="width: 90px; height: 90px;" src="{{asset('Images/Expenses/'.$expense->photo)}}"></td>
                            <td><a href="{{url('input/edit/'.$expense -> id)}}" type="button" class="btn btn-success">{{__('messages.Edit')}}</a></td>
                            <td><a href="{{route('expense.deleting', $expense -> id)}}" type="button" class="btn btn-danger">{{__('messages.Delete')}}</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
    </body>
</html>
