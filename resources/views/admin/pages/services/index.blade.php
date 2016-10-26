@extends('admin.main')

@section('header', 'Team')

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
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Are you sure you want to DELETE this service?</h4>
                </div>
                <div class="modal-body">
                    You want be able to get it back.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="serviceId" data-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <h3><b>Upload</b></h3>
    <hr>
    <div class="col-md-3 col-sm-6" style="float:left;">
        <div class="service-item" id="service-1">
            <div class="service-icon">
                <i id="preview-service-icon" class="glyphicon glyphicon-star-empty"></i>
            </div> <!-- /.service-icon -->
            <div class="service-content">
                <div class="inner-service">
                    <h3 id="previewTitle"></h3>
                    <p id="previewBody"></p>
                </div>
            </div> <!-- /.service-content -->
        </div> <!-- /#service-1 -->
    </div> <!-- /.col-md-3 -->

    {!! Form::open(array('route' => 'services.store')) !!}

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
            <input id="pickColor" name="background_color" class="jscolor form-control" value="ab2567" required type="text">
        </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-4">
                {{ Form::label('icon', 'Icon') }}<br>
                <!-- Example 1 -->
                <div class="input-group">
                    <span class="input-group-btn">
                        <button id="myIconButton" class="btn btn-default" data-icon="glyphicon-map-marker" role="iconpicker"></button>
                    </span>
                    <input id="myIconInput" name="icon" type="text" class="form-control" required>
                </div>
            </div>
        </div>
    </div>

    <div class="row"><br><br></div>
    <div class="row " style="float:left">
        {{ Form::submit('Add Service', array('class' => 'btn btn-success')) }}
    </div>

    {!! Form::close() !!}
    <br><br>
    <hr style="color:cornflowerblue">


    <h3><b>Services</b></h3>
    <hr>
    <?php $count=1; ?>
    <div style="margin-left: -5%; overflow: hidden">
    @foreach($services as $service)
        <div id="serviceView{{ $service->id }}"  style="width:25%; margin-left:5%; float:left;">
            <div class="btn-group" style="margin-top:4%; margin-left:29%; text-align: center">
                <a href="{{ route('services.edit', $service->id) }}" id="edit{{$service->id}}" class="btn btn-success">Edit</a>
                <a href="#myModal" data-id="{{$service->id}}" data-toggle="modal" data-target="#myModal"  id="del{{$service->id}}" class="open-myModal btn btn-danger">Delete</a>
            </div>
            <div class="service-item" style='margin-top:3%; background-color: <?php echo "#$service->background_color" ?>'>
                <div class="service-icon">
                    <i id="preview-service-icon" class="{{ $service->icon }}"></i>
                </div> <!-- /.service-icon -->
                <div class="service-content">
                    <div class="inner-service">
                        <h3 id="previewTitle">{{ $service->title }}</h3>
                        <p id="previewBody">{{ $service->body }}</p>
                    </div>
                </div> <!-- /.service-content -->
            </div> <!-- /#service-1 -->
        </div>
    @endforeach
    </div>

@endsection





@section('scripts')
    <script src="/admin/js/jscolor.js"></script>
    <!-- Bootstrap-Iconpicker Iconset for Glyphicon -->
    <script type="text/javascript" src="/admin/icon-picker/bootstrap-iconpicker/js/iconset/iconset-glyphicon.min.js"></script>
    <!-- Bootstrap-Iconpicker -->
    <script type="text/javascript" src="/admin/icon-picker/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js"></script>
    <script src="/admin/js/services.js"></script>

@endsection