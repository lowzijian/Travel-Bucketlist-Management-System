@extends('layouts.app')

@section('content')
<header class="adminHeader">
    <div class="container">
        <img src="/asset/img/travel_bucketlist_admin_thumbnail.png" alt="Travel Bucketlist thumbnail">
        <h1 style="color:White;">The Travel Bucketlist (admin)</h1>
    </div>

    <nav class="container" style="padding-Bottom:0px">
        <a class="navigationItemAdmin" href="{{ url('/')}}"><i class="fa fa-sign-out-alt"></i></a>
    </nav>
</header>

<body>
    <div class="container">

        <!-- Approved Users-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Approved User <i class="fas fa-users" style="padding-Left:15px"></i></h2>
            </div>
            <div class="panel-body container">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
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
                </table>

            </div>
        </div>

    </div>

    <div class="container">
        <!-- Pending Users-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Pending User <i class="fas fa-user-clock" style="padding-Left:15px"></i></h2>
            </div>
            <div class="panel-body container">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
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
                </table>
            </div>
        </div>

    </div>
</body>

@endsection
