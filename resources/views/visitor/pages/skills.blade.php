<div class="container">
    @foreach($data['skills'] as $skill)
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="skills-heading">
                <h3 class="skills-title">{{ $skill->title }}</h3>
                <p class="small-text">{{ $skill->secondary_title }}</p>
            </div>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    <div class="row">
        <div class="col-md-8 col-sm-6">
            <p>{{ $skill->body }}<!-- spacing for mobile viewing --><br><br>
            </p>
        </div> <!-- /.col-md-8 -->
        <div class="col-md-4 col-sm-6">

            <ul class="progess-bars">
                @foreach($skill->subSkills as $subSkill)
                <li>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: {{ $subSkill->complete }}%;">{{ $subSkill->name }} {{ $subSkill->complete }}%</div>
                    </div>
                </li>
                @endforeach
            </ul>

        </div> <!-- /.col-md-4 -->
    </div> <!-- /.row -->
    @endforeach
</div>