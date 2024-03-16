@extends('template.main')
@section('content')




    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#create_user"
                data-bs-whatever="@getbootstrap">Add New User
                </button>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Name </th>
                            <th> Email</th>
                            <th> level </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    @php
                        $row = 1;
                    @endphp
                    <tbody>
                        @foreach ($users as $user)

                        <tr>
                            <td class="py-1">{{$row++}}</td>
                            <td class="py-1">{{$user->name}}</td>
                            <td> {{$user->email}}</td>
                            <td> {{$user->level}}</td>
                            <td>
                                <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal"  data-bs-target="#edit_user{{$user->id}}"
                                data-bs-whatever="@getbootstrap">Edit</button>
                                @include('update.update_user')
                            </td>
                            <td>
                                <form action="{{route('user.destroy',$user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-4" data-bs-toggle="modal" data-bs-target="#delete_user"
                                    data-bs-whatever="@getbootstrap">Delete</button>

                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>

{{-- create user--}}
<div class="modal fade" id="create_user" tabindex="-1" aria-labelledby="create_user" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_user">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Level</label>
                        <select class="form-control" name="level" id="">
                            <option value="cs">Costumer Service</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"> Input </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- create user--}}



@endsection
