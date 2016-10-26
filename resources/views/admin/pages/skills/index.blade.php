@extends('admin.main')

@section('header', 'Skill')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Are you sure you want to DELETE this skill?</h4>
                </div>
                <div class="modal-body">
                    You want be able to get it back.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="skillId" data-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div style=" width:76%">
                    <div role="alert" id="someDivToDisplayErrors">
                        <strong>
                        </strong>
                    </div>
                </div>

            </div>
        </div>        </div>
    <h3><b><span>Upload</span></b></h3>
    <hr>
    {!! Form::open(array('route' => 'skills.store', 'id' => 'storeSkill')) !!}
    <div class="row" style="float:left;margin-top:3%; width:50%">
        <div class="col-md-9 col-sm-6">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'id' => 'name')) }}
        </div>
        <div class="col-md-9 col-sm-6">
            {{ Form::label('title', 'Main Title') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'id' => 'title', 'required' => '')) }}
        </div>
        <div class="col-md-9 col-sm-6">
            {{ Form::label('secondary_title', 'Secondary Title') }}
            {{ Form::text('secondary_title', null, array('class' => 'form-control', 'id' => 'secondary_title', 'required' => '')) }}
        </div>
        <div class="col-md-9 col-sm-6">
            {{ Form::label('body', 'Body') }}
            {{ Form::textarea('body', null, array('class' => 'form-control', 'id' => 'body', 'required' => '', 'rows' => 5)) }}
        </div>
    </div>
    <div>
        <h3 style="margin-left:3%;"><b>Associate with SubSkills</b></h3>
        @foreach($data['subSkills'] as $subSkill)
            <h3 style="margin-left:3%; width:20%; float:left;"><span >{{ $subSkill->name }} </span></h3><h2><a onclick="associate(this)" id="sub_skill{{ $subSkill->id }}" rel="{{ $subSkill->id }}" class="btn btn-success">Associate</a></h2><br>
        @endforeach
    </div>
    <div class="row"><br><br></div>
    <div class="row " style="float:left">
        {{ Form::submit('Upload Skill', array('class' => 'btn btn-success btn-top-spacing')) }}
    </div>
    {!! Form::close() !!}
    <hr style="color:cornflowerblue">
    <br><br>

    <h3><b>Skills</b></h3>
    <hr>
    <?php $count=1; ?>
    <div style="margin-left: -5%; overflow: hidden" id="theSkills">
        @foreach($data['skills'] as $skill)
            <div id="skillView{{ $skill->id }}"  style="width:25%; margin-left:5%; float:left;">
                <div class="btn-group" style="margin-top:4%; margin-left:17%; text-align: center">
                    <a href="{{ route('skills.edit', $skill->id) }}" id="edit{{$skill->id}}" class="btn btn-success">Edit</a>
                    <a href="#myModal" data-id="{{$skill->id}}" data-toggle="modal" data-target="#myModal"  id="del{{$skill->id}}" class="open-myModal btn btn-danger">Delete</a>
                </div>
                <div>
                    <b>Skill: </b> {{ $skill->name }}<br>
                    <b>Title: </b> {{ $skill->title }}<br>
                    <b>Secondary Title: </b> {{ $skill->secondary_title }}<br>
                    <b>Body: </b><br> {{ $skill->body }}<br>
                </div>
                <div>
                    <b>Associated: </b><br>
                    <ul>
                        @foreach($skill->subSkills as $subSkill)
                            <li>{{ $subSkill->name }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        @endforeach
    </div>

@endsection





@section('scripts')
    <script>
        $('#storeSkill').submit(function(event){
            var subs = [];
            @foreach($data['subSkills'] as $subSkill)
                var a = $("#sub_skill{{ $subSkill->id }}").text();
                if(a.indexOf('Associated') == 0) {
                    subs.push("{{$subSkill->id}}");
            }
            @endforeach
            var name = $('#name').val();
            var title = $('#title').val();
            var secondary_title = $('#secondary_title').val();
            var body = $('#body').val();
            console.log(subs);
            $.ajax({
                type: "POST",
                url: '/admin/skills',
                data: {subSkills: subs, name: name, title: title, secondary_title: secondary_title, body: body},
                success: function (response) {
                    console.log(response);
                    if(response == "correct"){
                        @foreach($data['subSkills'] as $subSkill)
                            var a = $("#sub_skill{{ $subSkill->id }}").text();
                            if(a.indexOf('Associated') == 0) {
                                $("#sub_skill{{ $subSkill->id }}").html('Associate').addClass('btn-success').removeClass('btn-primary glyphicon glyphicon-ok')
                            }
                        @endforeach
                        $('#someDivToDisplayErrors').removeClass('alert alert-danger');
                        $('#someDivToDisplayErrors strong').html('');
                        $('#name').val('');
                        $('#title').val('');
                        $('#secondary_title').val('');
                        $('#body').val('');
                        $('#theSkills').append(
                        '<div id="skillView{{ $skill->id }}"  style="width:25%; margin-left:5%; float:left;">'+
                        '<div class="btn-group" style="margin-top:4%; margin-left:17%; text-align: center">'+
                        '<a href="{{ route('skills.edit', $skill->id) }}" id="edit{{$skill->id}}" class="btn btn-success">Edit</a>'+
                        '<a href="#myModal" data-id="{{$skill->id}}" data-toggle="modal" data-target="#myModal"  id="del{{$skill->id}}" class="open-myModal btn btn-danger">Delete</a>'+
                        '</div>'+
                        '<div>'+
                        '<b>Skill: </b>'+name+'<br>'+
                        '<b>Title: </b> '+title+'<br>'+
                        '<b>Secondary Title: </b> '+secondary_title+'<br>'+
                        '<b>Body: </b> '+body+'<br>'+
                        '</div>'+
                        '<div>'+
                        '<ul>'
                        );
                        for(var i=0; i<subs.length; i++)
                        {
                            //$('#theSkills').append('<li>'+subs[i]+'</li>');
                        }
                        $('#theSkills').append(
                        '</ul>'+
                        '</div>'+
                        '</div>'
                        );
                        toastr.success('Skill: '+name+'  has successfully added');
                        return;
                    }
                    var parsedJson = jQuery.parseJSON(response);
                    var errorString = '';
                    $.each( parsedJson.errors, function( key, value) {
                        errorString += '<li>' + value + '</li>';
                    });
                    $('#someDivToDisplayErrors').addClass('alert alert-danger');
                    $('#someDivToDisplayErrors strong').html(errorString);
                },
                error: function (data) {

                    console.log(data);
                }
            });
            event.preventDefault(); //STOP default action
        });
        function associate(e){
            var sub_skill_id = $(e).attr('rel');
            var text = $('#sub_skill'+sub_skill_id).text();
            if(text.indexOf('Associated')==0){
                $('#sub_skill'+sub_skill_id).html('Associate').addClass('btn-success').removeClass('btn-primary glyphicon glyphicon-ok')
            }else{
                $('#sub_skill'+sub_skill_id).html('Associated').addClass('btn-primary glyphicon glyphicon-ok').removeClass('btn-success');
            }
        }
        $(document).on("click", ".open-myModal", function () {
            var skillId = $(this).data('id');
            $(".modal-footer #skillId").click(function(){
                del(skillId);
            });
        });
        function del(id){
            $.ajax({
                type: "DELETE",
                url: '/admin/skills/' + id,
                success: function(data){
                    $('#skillView' + id).css('display', 'none');
                    toastr.success('Skill has been deleted');
                    console.log("dsa");
                },
                error: function(data){
                    console.log('Error:');
                }
            });
        }
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });
    </script>
@endsection