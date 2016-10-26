@extends('admin.main')

@section('header', 'Service')

@section('stylesheets')
    <style>
        .service-item {
            font-family: "Open Sans", Arial, sans-serif;
            position: relative;
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        .service-item a {
            color: #ffff66;
        }

        .service-item a:hover {
            color: black;
        }

        .service-item .service-icon {
            font-size: 3em;
            padding: 110px 0;
        }
        .service-item .service-content {
            padding: 10px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all 200ms ease-in-out;
            -moz-transition: all 200ms ease-in-out;
            transition: all 200ms ease-in-out;
        }
        .service-item .service-content .inner-service {
            padding: 20px;
        }
        .service-item .service-content h3 {
            font-size: 18px;
            text-transform: uppercase;
            color: white;
            display: inline-block;
            padding-bottom: 10px;
            border-bottom: 1px solid white;
            margin-bottom: 15px;
        }
        .service-item:hover .service-icon {
            opacity: 0;
            visibility: hidden;
        }
        .service-item:hover .service-content {
            opacity: 1;
            visibility: visible;
        }

        #service-1 {
            background-color: #1abc9c;
        }

        #service-2 {
            background-color: #e67e22;
        }

        #service-3 {
            background-color: #3498db;
        }

        #service-4 {
            background-color: #2ecc71;
        }
    </style>
    {{ Html::style('admin/icon-picker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}
@endsection

@section('content')

    <h3><b>Edit</b></h3>
    <hr>
    <div class="col-md-3 col-sm-6" style="float:left;">
        <div class="service-item" id="service-1">
            <div class="service-icon">
                <i id="preview-service-icon" class="{{ $service->icon }}"></i>
            </div> <!-- /.service-icon -->
            <div class="service-content">
                <div class="inner-service">
                    <h3 id="previewTitle"></h3>
                    <p id="previewBody"></p>
                </div>
            </div> <!-- /.service-content -->
        </div> <!-- /#service-1 -->
    </div> <!-- /.col-md-3 -->

    {!! Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'PUT', 'files' => true]) !!}

    <div class="col-md-6 col-sm-6" style="float:left; margin-left:5%;">
        <div class="row">
            <div class="col-md-5 col-sm-4">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'id' => 'inputTitle')) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-sm-4">
                {{ Form::label('body', 'Body') }}
                {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '', 'id' => 'inputBody', 'rows' => 2)) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-sm-4">
                {{ Form::label('background_color', 'Background Color') }}
                <input id="pickColor" name="background_color" class="jscolor form-control" value="{{ $service->background_color }}"required type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-4">
                {{ Form::label('icon', 'Icon') }}<br>
                <!-- Example 1 -->
                <div class="input-group">
                    <span class="input-group-btn">
                        <button id="myIconButton" class="btn btn-default" data-icon="{{ $service->icon }}" role="iconpicker"></button>
                    </span>
                    <input id="myIconInput" name="icon" type="text" class="form-control" value="{{ $service->icon }}">
                </div>
            </div>
        </div>
    </div>

    <div class="row"><br><br></div>
    <div class="row " style="float:left">
        {{ Form::submit('Save Changes', array('class' => 'btn btn-success')) }}
    </div>

    {!! Form::close() !!}
    <a href="{{ route('services.index') }}" style="margin-left:3%;" class="btn btn-danger">Cancel</a>

    <br><br>
    <hr style="color:cornflowerblue">

@endsection





@section('scripts')
    <script src="/admin/js/jscolor.js"></script>
    <!-- Bootstrap-Iconpicker Iconset for Glyphicon -->
    <script type="text/javascript" src="/admin/icon-picker/bootstrap-iconpicker/js/iconset/iconset-glyphicon.min.js"></script>
    <!-- Bootstrap-Iconpicker -->
    <script type="text/javascript" src="/admin/icon-picker/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js"></script>
    <script src="/admin/js/services.js"></script>
    <script>
        $('#myIconButton i').addClass("{{ $service->icon }}").removeClass("glyphicon-");
    </script>

@endsection