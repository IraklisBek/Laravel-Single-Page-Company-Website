@extends('admin.main')

@section('header', 'Slider')

@section('stylesheets')
    <style>
        #frame > h2 {
            color:white;
        }
        .slider-btn {
            color: white;
            background-color: #ec523f;
            padding: 12px 20px;
            border-radius: 4px;
            font-weight: 700;
        }
    </style>
@endsection
@section('previews')


    <div id="dummy-nav" style="z-index: 100000 !important; position:fixed; display:none; opacity:0; margin-top:10%;">
        <img src="/visitor/images/slider/dammy-nav.jpg" style="width:80%; margin-left: 10%;">
    </div>
    <div id="slideText" style="z-index: 100000 !important; text-align: center; position:fixed; display:none; opacity:0; margin-top:30%; ">
        <h2 style="text-decoration: underline; color:white; text-align: center; margin-top:0%; " id="showMainTitle"></h2>
        <p style="color:white; text-align: center;font-size: x-large" id="showSecondaryTitle"></p>
        <a href="#" id="showButton" style="color:white; text-align:center;display:block;font-size: x-large" class="slider-btn"></a>

    </div>
    <div style="background-color:rgba(0, 0, 0, 0.93); margin-top:0%; position:fixed; width:100%; z-index:10000 !important; display:none; opacity:0" id="frame">
        <span onclick="closeViewPostFrame('#frame')" class="glyphicon glyphicon-remove" style="color:white; font-size: 40px; cursor:pointer"></span>
        <a href="{{ constant('myurl') }}" target="_blank" >Go to website</a>
        <img id="showPreview" src="" style="width:100%; filter: brightness(30%);">
    </div>


@endsection

@section('content')
    <h3><b>Edit</b></h3>
    <hr>
    {!! Form::model($slide, ['route' => ['slider.update', $slide->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="row" style="float:left;">
        <div class="form-group">
            {{ Form::label('image', 'Slider Image') }}<br>
            <img src="/visitor/images/slider/{{ $slide->image }}" id="blah" alt="" style="margin-top:10px; border-radius:5px; image-orientation: from-image; width:25%"/><br><br>
            <div style="position:relative;">
                <a class='btn btn-primary' href='javascript:;' style="cursor:pointer">
                    Choose File...
                    <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="image" id="image" size="40"  accept="image/gif, image/jpeg, image/png", onchange="readURL(this.files);">
                </a>
                &nbsp;
                <span class='label label-info' id="upload-file-info"></span>
            </div>
        </div>
    </div>
    <div class="row" style="float:left; margin-left:5%; margin-top:3%;">
        <div class="col-md-9 col-sm-6">
            {{ Form::label('main_title', 'Main Title') }}
            {{ Form::text('main_title', null, array('class' => 'form-control', 'id' => 'mainTitle', 'required' => '')) }}
        </div>
        <div class="col-md-9 col-sm-6">
            {{ Form::label('secondary_title', 'Secondary Title') }}
            {{ Form::text('secondary_title', null, array('class' => 'form-control', 'id' => 'secondaryTitle', 'required' => '')) }}
        </div>
        <div class="col-md-9 col-sm-6">
            {{ Form::label('button', 'Button') }}
            {{ Form::text('button', null, array('class' => 'form-control', 'id' => 'button', 'required' => '')) }}
        </div>
    </div>
    <div class="row"><br><br></div>
    <div class="row " style="float:left">

        {{ Form::submit('Edit Slide', array('class' => 'btn btn-success')) }}
    </div>

    {!! Form::close() !!}
    <a href="{{ route('slider.index') }}" style="margin-left:3%;" class="btn btn-danger" id="preview">Cancel</a>
    <button style="margin-left:1.5%;" onclick="showIFramePostView('#blah');" class="btn btn-primary" id="preview">Preview</button>
    <hr style="color:cornflowerblue">
    <br><br>

@endsection





@section('scripts')
    <script src="/admin/js/slider.js"></script>
@endsection