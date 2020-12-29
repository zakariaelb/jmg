@extends('layouts.app')
@section('content')
    <div class="alert alert-success" id="msgDisplay" style="display: none" >{{__('messages.Saved')}}</div>
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
        @foreach($incomes as $income)
            <tr class="incomeRow{{$income -> id}}">
                <th scope="row">{{$income -> date}}</th>
                <td>{{$income -> receipt_voucher_number}}</td>
                <td>{{$income -> amount}}</td>
                <td>{{$income -> id}}</td>
                <td>{{$income -> sponsor_name}}</td>
                <td>{{$income -> name}}</td>
                <td>{{$income -> service_name}}</td>
                <td><img  style="width: 90px; height: 90px;" src="{{asset('Images/Incomes/'.$income->photo)}}"></td>
                <td><a href="{{route('incomes.editing',$income -> id)}}" class="btn btn-success">{{__('messages.Edit')}}</a></td>
                <td><a href="" dataId="{{$income -> id}}" class="btnDelete btn btn-danger"" type="button">{{__('messages.Delete')}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
@section('scripts')
    <script>
        $(document).on('click', '.btnDelete', function (e){
            e.preventDefault();
            var incomseId = $(this).attr('dataId');

            $.ajax({
                type: 'post',
                url:"{{route('incomes.delete')}}",
                data:{
                    '_token': "{{csrf_token()}}",
                    'id' :incomseId
                },
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
                    $('.incomeRow'+data.id).remove();
                }, error: function (reject){
                }
            });
        });
    </script>
@stop

