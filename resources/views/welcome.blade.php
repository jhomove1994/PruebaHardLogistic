<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('users.create')}}"  class="btn btn-primary">Crear usuario</a>
                </div>
                <div>
                    <form class="form-inline" method="GET">
                        <div class="form-group mb-2">
                          <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                          <input type="text" class="form-control" id="filter" name="filter" value="{{$filter}}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Filter</button>
                    </form>
                </div>
            </div>
            <table class="table table-bordered mb-5 mt-2">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->last_name }}</td>
                        <td>{{ $data->dni }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->email }}</td>
                        <td class="d-flex">
                            <a href="{{ route('users.edit',$data->id)}}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('users.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Sure Want Delete?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $users->links() !!}
            </div>
        </div>
    </body>
</html>
