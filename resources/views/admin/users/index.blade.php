@extends('layouts.template')

@section('title', 'Users')
@section('script_after')

    <script>
        $(function () {

            // submit form when changing dropdown list 'genre_id'
            $('#sortby').change(function () {
                $('#searchForm').submit();
            });

            $(function () {
                $('.deleteForm button').click(function () {
                    let users = $(this).data('users');
                    let msg = "Delete this user" ;

                    if(confirm(msg)) {
                        $(this).closest('form').submit();
                    }


                })

            });


        })
    </script>
@endsection

@section('main')

    @include('shared.alert')

    <div>
        <h1>Users basis</h1>
        <form method="get" action="/admin/users" id="searchForm">
            <div class="row">

                <div class="col-sm-7 mb-2">
                    <p>Filter Name or Email</p>
                    <input type="text" class="form-control" name="user" id="user"
                           value="{{ request()->user }}" placeholder="Filter Name Or Email.">
                </div>
                <div class="col-sm-5 mb-2">
                    <p>Sort by</p>
                    <select class="form-control" name="sortby" id="sortby">
                        <option value="">select een optie</option>
                        <option value="1">Name (A -> Z)</option>
                        <option value="2">Name (Z -> A)</option>
                        <option value="3">Email (A -> Z)</option>7
                        <option value="4">Email (Z -> A)</option>
                        <option value="5">Active</option>v
                        <option value="6" >Admin</option>
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





            <?php
                    $teller =0;?>


                @foreach($users as $user)

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email}}</td>


                    <?php
                    $teller ++;
                    if (  $user->active==1   ){

                        echo' <td>&#10004</td>';

                    }
                    else{
                        echo' <td></td>'. $teller;

                    }


                    if (  $user->admin==1   ){

                        echo' <td>&#10004</td>';

                    }
                    else{
                        echo' <td></td>';

                    }


                    ?>

                    <td>
                        <form action="/admin/users/{{ $user->id }}" method="post"class="deleteForm">
                            @method('delete')
                            @csrf
                            <div class="btn-group btn-group-sm">
                                <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-outline-success"
                                   data-toggle="tooltip"
                                   title="Edit {{ $user->name }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger"
                                        data-toggle="tooltip"
                                        title="Delete {{ $user->name }}"
                                        @if($user->admin==1)


                                        disabled

                                        @endif

                                >

                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </form>

                    </td>
                </tr>




                @endforeach
            @if ($teller == 0)
                <tr> <div class="alert alert-danger alert-dismissible fade show">
                        Can't find username or email: {{ request()->user }}'</b>                         <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                </tr>
            @endif
            </tbody>

        </table>

    </div>
    <hr>
    <div class="row">
        {{ $users->links() }}
    </div>

    @include('admin.users.modal')


@endsection
