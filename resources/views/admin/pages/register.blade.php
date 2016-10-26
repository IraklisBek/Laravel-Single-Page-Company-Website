<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials._head')
    {{ Html::style('admin/dist/css/select2.css') }}
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
                        {!! Form::open(array('route' => 'admin.pages.registerUser')) !!}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Email', 'g-recaptcha-response' => 'required|captcha')) }}
                        </div>

                        <!--<div class="form-group">
                            {{ Form::label('role_id', 'Role') }}
                            <select class="form-control select2-multi" multiple="multiple" id="kind" name="roles[]">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach

                            </select>
                        </div>-->

                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            {{ Form::label('confirmPassword', 'Confirm Password') }}
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                        </div>
                        {{ Form::submit('Register', array('class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px')) }}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials._scripts')
</div>
<!-- /#wrapper -->
</body>

</html>


