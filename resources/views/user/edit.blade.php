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
            <a href="{{ route('home')}}"  class="btn btn-primary">Volver</a>
            <div class="row">
                <div class="card col-sm-8 offset-sm-2">
                   <h1 class="display-3">Crear nuevo usuario</h1>
                    <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div><br />
                    @endif
                    <form method="post" class="p-2" action="{{ route('users.update', $user->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">    
                            <label for="name">First Name:</label>
                            <input type="text" class="form-control" name="name" value={{$user->name}} />
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" value={{ $user->last_name }} />
                        </div>
                        <div class="form-group">
                            <label for="dni">Dni:</label>
                            <input type="number" class="form-control" name="dni" value={{ $user->dni }} />
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" name="address" value={{ $user->address }} />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" name="phone" value={{ $user->phone }} />
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" value={{ $user->email }} />
                        </div>                     
                        <button type="submit" class="btn btn-primary">Update user</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
