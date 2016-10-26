@extends('admin.main')

@section('header', 'Skill')

@section('content')
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
    <h3><b>Edit</b></h3>
    <hr>
    {!! Form::model($skill, array('route' => ['skills.update', $skill->id], 'id' => 'storeSkill')) !!}
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
        <h2 style="margin-left:3%;">Associate with Skills</h2>
        @foreach($subSkills as $subSkill)
            <h3 style="margin-left:3%; width:20%; float:left;"><span >{{ $subSkill->name }} </span></h3>
            @if(!$skillSubSkills->contains($subSkill))
                <h2><a onclick="associate(this)" id="sub_skill{{ $subSkill->id }}" rel="{{ $subSkill->id }}" class="btn btn-success">Associate</a></h2><br>
            @else
                <h2><a onclick="associate(this)" id="sub_skill{{ $subSkill->id }}" rel="{{ $subSkill->id }}" class="btn btn-primary glyphicon glyphicon-ok">Associated</a></h2><br>
            @endif
        @endforeach
    </div>
    <div class="row"><br><br></div>
    <div class="row " style="float:left">
        {{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-top-spacing', 'style' => 'float:left;')) }}
    </div>
    {!! Form::close() !!}
    <a href="{{ route('skills.index') }}" class="btn btn-danger btn-top-spacing" style="margin-left:2%">Go back</a>
    <hr style="color:cornflowerblue">
    <br><br>


@endsection





@section('scripts')
    <script>
        $('#storeSkill').submit(function(event){
            var subs = [];
            @foreach($subSkills as $subSkill)
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
                type: "PUT",
                url: '/admin/skills/' + "{{ $skill->id }}",
                data: {subSkills: subs, name: name, title: title, secondary_title: secondary_title, body: body},
                success: function (response) {
                    console.log(response);
                    if(response == "correct"){
                        $('#someDivToDisplayErrors').removeClass('alert alert-danger');
                        $('#someDivToDisplayErrors strong').html('');
                        toastr.success('Skill: '+name+'  has successfully updated');
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });
    </script>
@endsection