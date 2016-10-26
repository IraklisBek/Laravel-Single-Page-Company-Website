@extends('admin.main')

@section('header', 'Team')

@section('stylesheets')
    {!! Html::style('admin/dist/css/select2.min.css') !!}
@endsection

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Are you sure you want to DELETE this member?</h4>
                </div>
                <div class="modal-body">
                    You want be able to get it back.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="memberId" data-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <h3><b>Upload</b></h3>
    <hr>
    {!! Form::model($member, ['route' => ['team.update', $member->id], 'method' => 'PUT', 'files' => true]) !!}
    <div class="row" style="float:left;">
        <div class="form-group">
            {{ Form::label('image', 'Member Image') }}<br>

            <img src="/visitor/images/team/{{ $member->member_image }}" id="blah" alt="" style="margin-top:10px; border-radius:50%; image-orientation: from-image;"/><br><br>
            <div style="position:relative;">
                <a class='btn btn-primary' href='javascript:;' style="cursor:pointer">
                    Choose File...
                    <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="member-image" id="member-image" size="40"  accept="image/gif, image/jpeg, image/png", onchange="readURL(this.files);">
                </a>
                &nbsp;
                <span class='label label-info' id="upload-file-info"></span>
            </div>
        </div>
    </div>
    <div class="row" style="float:left; margin-left:5%; margin-top:3%;">
        <div class="col-md-5 col-sm-4">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'required' => '')) }}
        </div>
        <div class="col-md-5 col-sm-4">
            {{ Form::label('skill_id', 'Profession') }}
            {{ Form::select('skill_id', $arrSkills, null, array('class' => 'form-control ', 'required' => '')) }}
        </div>
        <div class="col-md-5 col-sm-4">
            {{ Form::label('sub_skill_id', 'Sub Skills') }}
            {{ Form::select('subSkills[]', $arrSubSkills, null, array('class' => 'form-control select2-multi', 'required' => '', 'multiple' => 'multiple')) }}
        </div>
        <div class="col-md-5 col-sm-4">
            {{ Form::label('facebook_link', 'Facebook') }}
            {{ Form::text('facebook_link', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-5 col-sm-4">
            {{ Form::label('twitter_link', 'Twitter') }}
            {{ Form::text('twitter_link', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-5 col-sm-4">
            {{ Form::label('linked_in_link', 'Linked In') }}
            {{ Form::text('linked_in_link', null, array('class' => 'form-control')) }}
        </div>
        <div class="col-md-10 col-sm-4">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', null, array('class' => 'form-control', 'required' => '', 'rows' => 3)) }}
        </div>
    </div>
    <div class="row"><br><br></div>
    <div class="row " style="float:left">
        {{ Form::submit('Save Changes', array('class' => 'btn btn-success')) }}
    </div>

    {!! Form::close() !!}
    <br><br>
    <hr style="color:cornflowerblue">

@endsection





@section('scripts')
    <script src="/admin/js/team.js"></script>
    {!! Html::script('admin/dist/js/select2.min.js') !!}
    <script>
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($member->subSkills()->getRelatedIds()) !!}).trigger('change');

    </script>
@endsection