@extends('layouts.admin')

@section('content')
<div class="full-height col-md-12 withMarginVertical">

    <div class="col-md-12 header">
        <div class="container" style="flex-direction:column">
            <h1 class="title"> <span class="underline">Users Management System</span></h1>
            <p class="caption">Last updated at 2012-12-2 16:6:02</p>
        </div>
    </div>

    <!-- Approved Users table-->
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Approved Users</h2>
                <span class="totalItem">Total approved users : <span class="num">0</span></span>
            </div>
            <div class="panel-body container">
                <!-- <table class="table table-striped task-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Access</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($verified as $user) 
                        <tr>
                            <td class="table-text">
                                <div>{{$loop->index + 1}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$user->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$user->email}}</div>
                            </td>
                            <td class="table-text">
                                <button class="btnCancel">Revoke</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> -->

            </div>
        </div>
    </div>

    <!-- Without Approved Users-->
    <div class="col-md-12 row flex-center">
        <img src="/asset/img/emptyusers.svg" alt="Empty Users" class="img-EmptyList" />
        <div class="withMarginVertical" style="text-align: center;">
            <h3>Empty Approved Users. </h3>
            <p>It seems there arent any approved users.</p>
        </div>
    </div>

    <!-- Pending Users table-->
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Pending Users</h2>
                <span class="totalItem">Total pending users : <span class="num">0</span></span>
            </div>
            <div class="panel-body container">
                <!-- <table class="table table-striped task-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($notVerified as $user)
                        <tr>
                            <td class="table-text">
                                <div>{{$loop->index + 1}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$user->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$user->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    <button class="btnAccept">Accept</button> | <button class="btnCancel">Reject</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> -->
            </div>
        </div>

    </div>

    <!-- Without Approved Users-->
    <div class="col-md-12 row flex-center">
        <img src="/asset/img/emptyusers.svg" alt="Empty Users" class="img-EmptyList" />
        <div class="withMarginVertical" style="text-align: center;">
            <h3>Empty Pending Users. </h3>
            <p>It seems there arent any pending users.</p>
        </div>
    </div>

</div>
@endsection
