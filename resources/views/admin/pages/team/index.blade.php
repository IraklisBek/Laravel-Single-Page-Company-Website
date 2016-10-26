@extends('admin.main')

@section('header', 'Team')

@section('stylesheets')
    {!! Html::style('admin/dist/css/select2.min.css') !!}
    <style>
        .team-member {
            margin-bottom: 30px;
        }
        .team-member .member-thumb {
            position: relative;
            overflow: hidden;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
        }
        .team-member .member-thumb img {
            width: 100%;
        }
        .team-member .member-thumb .team-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            text-align: center;
            top: 0;
            left: 0;
            background-color: #ec523f;
            color: white;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all 200ms ease-in-out;
            -moz-transition: all 200ms ease-in-out;
            transition: all 200ms ease-in-out;
        }
        .team-member .member-thumb .team-overlay h3 {
            font-size: 18px;
            text-transform: uppercase;
            color: white;
            display: inline-block;
            padding-bottom: 10px;
            border-bottom: 1px solid white;
            margin-top: 64px;
        }
        .team-member .member-thumb .team-overlay span {
            text-transform: uppercase;
            font-weight: 300;
            margin-top: 10px;
            display: block;
        }
        .team-member .member-thumb .team-overlay ul.social {
            display: block;
            margin-top: 20px;
        }
        .team-member .member-thumb .team-overlay ul.social li {
            display: inline-block;
        }
        .team-member .member-thumb .team-overlay ul.social li a {
            width: 36px;
            height: 36px;
            background-color: white;
            line-height: 40px;
            color: #ec523f;
            border-radius: 18px;
            -webkit-border-radius: 18px;
            -moz-border-radius: 18px;
        }
        .team-member .member-thumb:hover .team-overlay {
            opacity: 1;
            visibility: visible;
        }
    </style>
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
    {!! Form::open(array('route' => 'team.store', 'files' => true)) !!}
    <div class="row" style="float:left;">
        <div class="form-group">
            {{ Form::label('image', 'Member Image') }}<br>
            <img src="/visitor/images/team/defaultProfile.png" id="blah" alt="" style="margin-top:10px; border-radius:50%; image-orientation: from-image;"/><br><br>
            <div style="position:relative;">
                <a class='btn btn-primary' href='javascript:;' style="cursor:pointer">
                    Choose File...
                    <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="member-image" id="member-image" size="40"  accept="image/gif, image/jpeg, image/png", required onchange="readURL(this.files);">
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
            {{ Form::select('skill_id', $data['arrSkills'], null, array('class' => 'form-control ', 'required' => '')) }}
        </div>
        <div class="col-md-5 col-sm-4">
            {{ Form::label('sub_skill_id', 'Sub Skills') }}
            {{ Form::select('subSkills[]', $data['arrSubSkills'], null, array('class' => 'form-control select2-multi', 'required' => '', 'multiple' => 'multiple')) }}
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
        {{ Form::submit('Add Member', array('class' => 'btn btn-success')) }}
    </div>

    {!! Form::close() !!}
    <br><br>
    <hr style="color:cornflowerblue">


    <h3><b>Members</b></h3>
    <hr>
    <?php $count=1; ?>
    <div style="margin-left: -5%; overflow: hidden">
        <div id="dummy" style="top:0; display:none; left:0; position:fixed; width:100%; background-color: rgba(0, 0, 0, 0.93); margin-top:0%; z-index:100000; height:2000px;">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
    @foreach($data['members'] as $member)
            <div id="dummy_close{{$member->id}}" style="display:none; top:0; position:fixed; width:50%; margin-left:5%; background-color: white; margin-top:12%; z-index:1000000">
                <img src="/visitor/images/team/{{ $member->member_image }}" width="40%" style="border-radius: 50%; padding:3%; float:left">
                <i class="fa fa-times fa-fw" style="font-size: x-large; float:right; cursor: pointer" id="close{{$member->id}}" onclick="closeMember(this.id);"></i>

                <div style="padding:4%">
                    <h2><b>{{ $member->name }}</b></h2>
                    <h2><b>About {{ $member->name }}</b></h2>
                    <p>{{ $member->description }}</p>
                    <h2><b>Skills</b></h2>
                    @foreach($member->subSkills as $subSkill)
                        {{ $subSkill->name }},
                    @endforeach
                </div>
            </div>
        <div id="teamView{{ $member->id }}"  style="width:25%; margin-left:5%; float:left;">
            <div class="btn-group" style="margin-top:4%; margin-left:26%; text-align: center">
                <a href="{{ route('team.edit', $member->id) }}" id="edit{{$member->id}}" class="btn btn-success">Edit</a>
                <a href="#myModal" data-id="{{$member->id}}" data-toggle="modal" data-target="#myModal"  id="del{{$member->id}}" class="open-myModal btn btn-danger">Delete</a>
            </div>
            <div class="team-member col-md-3 col-sm-6" style="width:100%">
                <div class="member-thumb" style="width:100%">
                    <img src="/visitor/images/team/{{ $member->member_image }}"  alt="">
                    <div class="team-overlay">
                        <h3>{{ $member->name }}</h3>
                        <span>{{ $member->skill->name }}</span>
                        <ul class="social" style="margin-left: -15%;">
                            @if($member->facebook_link != null)
                                <li><a target="_blank" href="//{!! $member->facebook_link !!}" class="fa fa-facebook"></a></li>
                            @endif
                            @if($member->twitter_link != null)
                                <li><a href="{{ $member->twitter_link }}" class="fa fa-twitter"></a></li>
                            @endif
                            @if($member->linked_in_link != null)
                                <li><a href="{{ $member->linked_in_link }}" class="fa fa-linkedin"></a></li>
                            @endif
                        </ul>
                        <a class="expand" onclick="openMember(this.id);" id="{{ $member->id }}">
                            <i class="fa fa-search" style="background-color: white; border-radius: 50%; cursor:pointer; padding:3%; font-size: x-large; margin-top:2%"></i>
                        </a>
                    </div> <!-- /.team-overlay -->
                </div> <!-- /.member-thumb -->
            </div> <!-- /.team-member -->
         </div>
    @endforeach
    </div>

@endsection





@section('scripts')
    <script src="/admin/js/team.js"></script>
    {!! Html::script('admin/dist/js/select2.min.js') !!}
    <script>
        $('.select2-multi').select2();
        function closeMember(id) {
            $('#dummy').css('display', 'none');
            $('#dummy_'+id).css('display', 'none');
        }
        function openMember(id) {
            $('#dummy').css('display', 'block');
            $('#dummy_close'+id).css('display', 'block');
        }
    </script>

@endsection