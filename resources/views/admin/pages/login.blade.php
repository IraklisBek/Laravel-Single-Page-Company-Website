<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials._head')
</head>

<body>
<div id="wrapper">
    <div class="container">
        @include('admin.partials._messages')
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(array('route' => 'auth.logUser')) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{ Form::label('emailLogin', 'Email') }}
                            {{ Form::email('emailLogin', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Email')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('passwordLogin', 'Password') }}
                            <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" placeholder="Password">
                        </div>

                        <div class="form-group">
                            {{ Form::label('rememberLogin', 'Remember Me') }}<br>
                            {{ Form::checkbox('rememberLogin') }}
                        </div>

                        {{ Form::submit('Login', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px')) }}


                        {!! Form::close() !!}
                    </div>
                    <a href="{{ route('admin.pages.register') }}">Register Here</a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials._scripts')
</div>
<!-- /#wrapper -->
</body>

</html>


