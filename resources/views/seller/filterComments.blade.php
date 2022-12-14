@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('inc.sellerSidebar')
            <div class="col-md-8 col- text-center mt-1.5">
                <h2>Welcome {{$user->restaurant->name}}</h2>
                <hr>
                <br>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <br>
                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Food Name</th>
                            <th>Comment</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        {{dd($foods)}}--}}
                        @foreach($foods as $food)
                            <tr>
                                <td>{{$food['customer name']}}</td>
                                <td>{{$food['name']}}</td>
                                <td>
                                    {{$food['comment']}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


