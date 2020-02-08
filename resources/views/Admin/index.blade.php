@extends('layouts.admin')

@section('content')

<div class="container">
    <h1>Users Management System <i class="fas fa-users-cog" style="padding-left: 10px;"></i></i></h1>
</div>

<!-- Approved Users table-->
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Approved Users</h2>
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
                        <tr>
                            <td class="table-text">
                                <div>1</div>
                            </td>
                            <td class="table-text">
                                <div>Chin Kai Xiang</div>
                            </td>
                            <td class="table-text">
                                <div>chinkaixiang123@gmail.com</div>
                            </td>
                            <td class="table-text">
                                <button class="btnCancel">Revoke</button>
                            </td>
                        </tr>
                    </tbody>
                </table> -->

        </div>
    </div>
</div>

<!-- Without Approved Users-->
<div class="col-md-12 row flex-center container">
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
                        <tr>
                            <td class="table-text">
                                <div>1</div>
                            </td>
                            <td class="table-text">
                                <div>Chin Kai Xiang</div>
                            </td>
                            <td class="table-text">
                                <div>chinkaixiang123@gmail.com</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    <button class="btnAccept">Accept</button> | <button class="btnCancel">Reject</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table> -->
        </div>
    </div>

</div>

<!-- Without Approved Users-->
<div class="col-md-12 row flex-center container">
    <img src="/asset/img/emptyusers.svg" alt="Empty Users" class="img-EmptyList" />
    <div class="withMarginVertical" style="text-align: center;">
        <h3>Empty Pending Users. </h3>
        <p>It seems there arent any pending users.</p>
    </div>
</div>


@endsection
