<div class="container">
    <div class="row">
        <div class="heading-section col-md-12 text-center">
            <h2>{{$data['generals']->team_title}}</h2>
            <p>{{$data['generals']->team_secondary_title}}</p>
        </div> <!-- /.heading-section -->
    </div> <!-- /.row -->
    <div class="row">
        <div id="dummy" style="top:0; display:none; left:0; position:fixed; width:100%; background-color: rgba(0, 0, 0, 0.93); margin-top:0%; z-index:100000; height:2000px;">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        @foreach($data['members'] as $member)
            <div id="dummy_close{{$member->id}}" style="display:none; top:0; position:fixed; width:50%; margin-left:20%; background-color: white; margin-top:12%; z-index:1000000">
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
        <div class="team-member col-md-3 col-sm-6">
            <div class="member-thumb">
                <img src="visitor/images/team/{{ $member->member_image }}" alt="">
                <div class="team-overlay">
                    <h3>{{ $member->name }}</h3>
                    <span>{{ $member->skill->name }}</span>
                    <ul class="social">
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
        @endforeach
    </div> <!-- /.row -->
</div> <!-- /.container -->

@section('scripts')
    <script>
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