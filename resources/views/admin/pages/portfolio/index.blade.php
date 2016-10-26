@extends('admin.main')

@section('header', 'Portfolio')

@section('stylesheets')
    <style>
        .portfolio-item {
            margin-bottom: 30px;
        }
        .portfolio-item .portfolio-thumb {
            position: relative;
            overflow: hidden;
        }
        .portfolio-item .portfolio-thumb img {
            width: 100%;
        }
        .portfolio-item .portfolio-thumb .portfolio-overlay {
            background-color: #ec523f;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            padding: 25px;
            text-align: center;
            color: white;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all 200ms ease-in-out;
            -moz-transition: all 200ms ease-in-out;
            transition: all 200ms ease-in-out;
        }
        .portfolio-item .portfolio-thumb .portfolio-overlay h3 {
            font-size: 18px;
            text-transform: uppercase;
            color: white;
            padding-bottom: 10px;
            margin-bottom: 10px;
            display: inline-block;
            border-bottom: 1px solid white;
        }
        .portfolio-item .portfolio-thumb .portfolio-overlay a.expand {
            margin-top: 15px;
            width: 36px;
            height: 36px;
            border-radius: 18px;
            -webkit-border-radius: 18px;
            -moz-border-radius: 18px;
            background-color: white;
            display: inline-block;
            text-align: center;
        }
        .portfolio-item .portfolio-thumb .portfolio-overlay a.expand i {
            line-height: 36px;
        }
        .portfolio-item .portfolio-thumb:hover .portfolio-overlay {
            opacity: 1;
            visibility: visible;
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
                    <h4 class="modal-title" id="myModalLabel">Are you sure you want to DELETE this portfolio?</h4>
                </div>
                <div class="modal-body">
                    You want be able to get it back.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="portId" data-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <h3><b>Upload</b></h3>
    <hr>
    <div class="portfolio-item col-md-3 col-sm-6">
        <div class="portfolio-thumb">
            <img id="blah" src="/visitor/images/gallery/p1.jpg" alt="">
            <div class="portfolio-overlay">
                <h3 id="previewTitle">New Walk</h3>
                <p id="previewBody">Asperiores commodi illo fuga perferendis dolore repellendus sapiente ipsum.</p>
                <a data-rel="lightbox" class="expand">
                    <i class="fa fa-search"></i>
                </a>
            </div> <!-- /.portfolio-overlay -->
        </div> <!-- /.portfolio-thumb -->
    </div> <!-- /.portfolio-item -->

    {!! Form::open(array('route' => 'portfolio.store', 'files' => true)) !!}

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
        <div class="row" style="margin-left:0.5%">
            <div class="form-group">
                {{ Form::label('background_image', 'Portfolio Image') }}<br>
                <div style="position:relative;">
                    <a class='btn btn-primary' href='javascript:;' style="cursor:pointer">
                        Choose File...
                        <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="background_image" id="background_image" size="40"  accept="image/gif, image/jpeg, image/png", required onchange="readURL(this.files);">
                    </a>
                    &nbsp;
                    <span class='label label-info' id="upload-file-info"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row"><br><br></div>
    <div class="row " style="float:left">
        {{ Form::submit('Add Portfolio', array('class' => 'btn btn-success')) }}
    </div>

    {!! Form::close() !!}
    <br><br>
    <hr style="color:cornflowerblue">


    <h3><b>Portfolio</b></h3>
    <hr>
    <?php $count=1; ?>
    <div style="margin-left: -5%; overflow: hidden">
    @foreach($data['portfolio'] as $port)
        <div id="portView{{ $port->id }}"  style="width:25%; margin-left:5%; float:left;">
            <div class="btn-group" style="margin-top:4%; margin-left:29%; text-align: center">
                <a href="{{ route('portfolio.edit', $port->id) }}" id="edit{{$port->id}}" class="btn btn-success">Edit</a>
                <a href="#myModal" data-id="{{$port->id}}" data-toggle="modal" data-target="#myModal"  id="del{{$port->id}}" class="open-myModal btn btn-danger">Delete</a>
            </div>
            <div class="portfolio-item" style="margin-top:3%;">
                <div class="portfolio-thumb">
                    <img id="blah" src="/visitor/images/gallery/{{$port->background_image}}" alt="">
                    <div class="portfolio-overlay">
                        <h3>{{$port->title}}</h3>
                        <p>{{$port->body}}</p>
                        <a data-rel="lightbox" class="expand">
                            <i class="fa fa-search"></i>
                        </a>
                    </div> <!-- /.portfolio-overlay -->
                </div> <!-- /.portfolio-thumb -->
            </div>
        </div>
    @endforeach
    </div>

@endsection





@section('scripts')
    <script src="/admin/js/portfolio.js"></script>

@endsection