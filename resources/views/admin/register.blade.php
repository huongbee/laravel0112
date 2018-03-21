<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <h2 class="text-center">Register Form</h2>

                {{--  @if($errors->any())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}
                        <br>
                    @endforeach
                    </div>
                @endif  --}}

                <form method="POST" action="{{route('register')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{--  {{csrf_field()}}
                    @csrf  --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" placeholder="Enter fullname" name="fullname"
                        value="{{old('fullname')}}">
                        @if($errors->has('fullname'))
                        <br>
                            <div class="alert alert-danger">
                            @foreach($errors->get('fullname') as $err)
                                {{$err}}
                                <br>
                            @endforeach
                            </div>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control" placeholder="Enter email" name="email" 
                        value="{{old('email')}}">
                        @if($errors->has('email'))
                        <br>
                            <div class="alert alert-danger">
                            @foreach($errors->get('email') as $err)
                                {{$err}}
                                <br>
                            @endforeach
                            </div>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="">Birthdate</label>
                        <input type="text" class="form-control" placeholder="Enter birthdate" name="birthdate"
                        value="{{old('birthdate')}}">
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" placeholder="Enter your age" name="age">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Enter address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Password Confirm" name="confirm_password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>