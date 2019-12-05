@extends('layouts.template')

@section('title', 'Users')

@section('main')
    <h1>Users</h1>
    @include('shared.alert')

    <div class="table-responsive">

        <form method="get" action="/admin/users" id="searchForm">
            <div class="row">
                <div class="col-sm-7 mb-2">
                    <input type="text" class="form-control" name="user" id="user"
                           value="{{ request()->user }}" placeholder="Filter Name Or Email">
                </div>
                <div class="col-sm-5 mb-2">
                    <select class="form-control" name="id" id="id">
                        <option value="1">Name (A -> Z)</option>
                        <option value="2">Name (Z -> A)</option>
                        <option value="3">Email (A -> Z)</option>7
                        <option value="4">Email (Z -> A)</option>
                        <option value="5">Active</option>v
                        <option value="6">Admin</option>
                    </select>
                </div>



            </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Active</th>
                <th>Admin</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email}}</td>


                    <?php

                    if (  $user->active==1   ){

                        echo' <td>&#10004</td>';

                    }
                    else{
                        echo' <td></td>';

                    }


                    if (  $user->admin==1   ){

                        echo' <td>&#10004</td>';

                    }
                    else{
                        echo' <td></td>';

                    }


                    ?>

                    <td>
                        <form action="/admin/users/{{ $user->id }}" method="post">
                            @method('delete')
                            @csrf
                            <div class="btn-group btn-group-sm">
                                <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-outline-success"
                                   data-toggle="tooltip"
                                   title="Edit {{ $user->name }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="submit" class="btn btn-outline-danger"
                                        data-toggle="tooltip"
                                        title="Delete {{ $user->name }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
    {{ $users->links() }}
    @include('admin.users.modal')


@endsection
@section('script_after')
    <script>
        $(function () {
            $('.deleteForm button').click(function () {
                let records = $(this).data('records');
                let msg = `Delete this genre?`;
                if (records > 0) {
                    msg += `\nThe ${records} records of this genre will also be deleted!`
                }
                if(confirm(msg)) {
                    $(this).closest('form').submit();
                }
            })
        });
    </script>
@endsection
