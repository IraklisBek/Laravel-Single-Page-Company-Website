@extends('admin.main')

@section('header', 'General')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Tabs
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Home</a>
                        </li>
                        <li><a href="#team" data-toggle="tab">Team</a>
                        </li>
                        <li><a href="#services" data-toggle="tab">Services</a>
                        </li>
                        <li><a href="#portfolio" data-toggle="tab">Portfolio</a>
                        </li>
                        <li><a href="#contact" data-toggle="tab">Contact</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <div class="row">
                                <div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Home tab
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="original">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Logo Image</th>
                                                        <th>Company Name</th>
                                                        <th>Facebook</th>
                                                        <th>Twitter</th>
                                                        <th>Linked In</th>
                                                        <th>Something</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td id="logo-image"><img src="/visitor/images/{{ $data['generals']->logo_image }}" width="50px" height="50px"></td>
                                                            <td id="company-name">{{ $data['generals']->company_name }} </td>
                                                            <td id="company-facebook"><a href="//{{ $data['generals']->company_facebook }}">Facebook</a></td>
                                                            <td id="company-twitter"><a href="//{{ $data['generals']->company_twitter }}">Twitter</a></td>
                                                            <td id="company_linked_in"><a href="//{{ $data['generals']->company_linked_in }}">Linked In</a></td>
                                                            <td id="company-something"><a href="//{{ $data['generals']->company_something }}">Something</a></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                {!! Form::open(array('route' => ['general.update', 1, "home"], 'method' => 'PUT', 'files' => true)) !!}
                                                <table class="table table-striped table-bordered table-hover" id="edit" style="display:none;">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Logo Image</th>
                                                        <th>Company Name</th>
                                                        <th>Facebook</th>
                                                        <th>Twitter</th>
                                                        <th>Linked In</th>
                                                        <th>Something</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td id="logo-image">


                                                            <div class="form-group">
                                                                <img id="blah" src="/visitor/images/{{ $data['generals']->logo_image }}" width="50px" height="50px" style="float:left"><br>

                                                                {{ Form::label('logo_image', 'Logo') }}<br>
                                                                <div style="position:relative;">

                                                                    <a class='btn btn-primary' href='javascript:;' style="cursor:pointer">
                                                                        Choose File...
                                                                        <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="logo_image" id="logo_image" size="40"  accept="image/gif, image/jpeg, image/png", onchange="readURL(this.files);">
                                                                    </a>
                                                                    &nbsp;
                                                                    <span class='label label-info' id="upload-file-info"></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td id="company-name">{{ Form::text('company_name', $data['generals']->company_name, array('class' => 'form-control', 'required' => '')) }}</td>
                                                        <td id="company-facebook">{{ Form::text('company_facebook', $data['generals']->company_facebook, array('class' => 'form-control', 'required' => '')) }}</td>
                                                        <td id="company-twitter">{{ Form::text('company_twitter', $data['generals']->company_twitter, array('class' => 'form-control', 'required' => '')) }}</td>
                                                        <td id="company_linked_in">{{ Form::text('company_linked_in', $data['generals']->company_linked_in, array('class' => 'form-control', 'required' => '')) }}</td>
                                                        <td id="company-something">{{ Form::text('company_something', $data['generals']->company_something, array('class' => 'form-control', 'required' => '')) }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                {{ Form::submit('Save Changes', array('class' => 'btn btn-success', 'id' => 'save-btn', 'style' => 'display:none; float:right')) }}
                                                {!! Form::close() !!}
                                                <button id="edit-btn" class="btn btn-primary" style="float:right">Edit</button>
                                                <button id="cancel-btn" class="btn btn-danger" style="float:right; display:none">Cancel</button>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="team">
                            <h4>Team Tab</h4>
                            <div id="original-team">
                                <b>Title: </b> {{ $data['generals']->team_title }} <br>
                                <b>Secondary Title: </b> {{ $data['generals']->team_secondary_title }}<br>
                                <button id="edit-team-btn" class="btn btn-primary" style="float:right">Edit</button>

                            </div>
                            <div id="edit-team" style="display:none">
                                {!! Form::open(array('route' => ['general.update', 1, "team"], 'method' => 'PUT')) !!}

                                <b>{{ Form::label('team_title', 'Team Title') }} </b>{{ Form::text('team_title', $data['generals']->team_title, array('class' => 'form-control', 'required' => '', 'style' => 'width:50%')) }}<br>
                                <b>{{ Form::label('team_secondary_title', 'Team Secondary Title') }} </b> {{ Form::text('team_secondary_title', $data['generals']->team_secondary_title, array('class' => 'form-control', 'required' => '', 'style' => 'width:50%')) }}
                                {{ Form::submit('Save Changes', array('class' => 'btn btn-success', 'id' => 'save-team-btn', 'style' => 'display:none; float:right')) }}
                                {!! Form::close() !!}
                                <button id="cancel-team-btn" class="btn btn-danger" style="float:right; display:none">Cancel</button>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="services">
                            <h4>Services Tab</h4>
                            <div id="original-services">
                                <b>Title: </b> {{ $data['generals']->services_title }} <br>
                                <b>Secondary Title: </b> {{ $data['generals']->services_secondary_title }}<br>
                                <button id="edit-services-btn" class="btn btn-primary" style="float:right">Edit</button>

                            </div>
                            <div id="edit-services" style="display:none">
                                {!! Form::open(array('route' => ['general.update', 1, "services"], 'method' => 'PUT')) !!}

                                <b>{{ Form::label('services_title', 'Services Title') }} </b>{{ Form::text('services_title', $data['generals']->services_title, array('class' => 'form-control', 'required' => '', 'style' => 'width:50%')) }}<br>
                                <b>{{ Form::label('services_secondary_title', 'Services Secondary Title') }} </b> {{ Form::text('services_secondary_title', $data['generals']->services_secondary_title, array('class' => 'form-control', 'required' => '', 'style' => 'width:50%')) }}
                                {{ Form::submit('Save Changes', array('class' => 'btn btn-success', 'id' => 'save-services-btn', 'style' => 'display:none; float:right')) }}
                                {!! Form::close() !!}
                                <button id="cancel-services-btn" class="btn btn-danger" style="float:right; display:none">Cancel</button>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="portfolio">
                            <h4>Portfolio Tab</h4>
                            <div id="original-portfolio">
                                <b>Title: </b> {{ $data['generals']->portfolio_title }} <br>
                                <b>Secondary Title: </b> {{ $data['generals']->portfolio_secondary_title }}<br>
                                <button id="edit-portfolio-btn" class="btn btn-primary" style="float:right">Edit</button>

                            </div>
                            <div id="edit-portfolio" style="display:none">
                                {!! Form::open(array('route' => ['general.update', 1, "portfolio"], 'method' => 'PUT')) !!}

                                <b>{{ Form::label('portfolio_title', 'Portfolio Title') }} </b>{{ Form::text('portfolio_title', $data['generals']->portfolio_title, array('class' => 'form-control', 'required' => '', 'style' => 'width:50%')) }}<br>
                                <b>{{ Form::label('portfolio_secondary_title', 'Portfolio Secondary Title') }} </b> {{ Form::text('portfolio_secondary_title', $data['generals']->portfolio_secondary_title, array('class' => 'form-control', 'required' => '', 'style' => 'width:50%')) }}
                                {{ Form::submit('Save Changes', array('class' => 'btn btn-success', 'id' => 'save-portfolio-btn', 'style' => 'display:none; float:right')) }}
                                {!! Form::close() !!}
                                <button id="cancel-portfolio-btn" class="btn btn-danger" style="float:right; display:none">Cancel</button>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact">
                            <h4>Contact Tab</h4>
                            <div class="row">
                                <div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Home tab
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <div id="original-contact">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Lat</th>
                                                        <th>Lng</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Email</th>
                                                        <th>Title</th>
                                                        <th>Secondary Title</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td id="logo-image">{{ $data['generals']->company_lat }}</td>
                                                        <td id="company-name">{{ $data['generals']->company_lng }} </td>
                                                        <td id="company-facebook">{{ $data['generals']->company_phone }}</td>
                                                        <td id="company-twitter">{{ $data['generals']->company_address }}</td>
                                                        <td id="company_linked_in">{{ $data['generals']->company_email }}</td>
                                                        <td id="company-something">{{ $data['generals']->contact_title }}</td>
                                                        <td id="company-something">{{ $data['generals']->contact_secondary_title }}</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                                <b>Contact Body:</b><br>
                                                {{ $data['generals']->contact_body }}
                                                </div>
                                                <div id="edit-contact"  style="display:none;">
                                                {!! Form::open(array('route' => ['general.update', 1, "contact"], 'method' => 'PUT')) !!}
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Lat</th>
                                                        <th>Lng</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Email</th>
                                                        <th>Title</th>
                                                        <th>Secondary Title</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{ Form::text('company_lat', $data['generals']->company_lat, array('class' => 'form-control', 'required' => '')) }}</td>
                                                        <td>{{ Form::text('company_lng', $data['generals']->company_lng, array('class' => 'form-control', 'required' => '')) }}</td>
                                                        <td>{{ Form::text('company_phone', $data['generals']->company_phone, array('class' => 'form-control', 'required' => '')) }}</td>
                                                        <td>{{ Form::text('company_address', $data['generals']->company_address, array('class' => 'form-control', 'required' => '')) }}</td>
                                                        <td>{{ Form::text('company_email', $data['generals']->company_email, array('class' => 'form-control', 'required' => '')) }}</td>
                                                        <td>{{ Form::text('contact_title', $data['generals']->contact_title, array('class' => 'form-control', 'required' => '')) }}</td>
                                                        <td>{{ Form::text('contact_secondary_title', $data['generals']->contact_secondary_title, array('class' => 'form-control', 'required' => '')) }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                {{ Form::label('contact_body', 'Contact Body') }}
                                                {{Form::textarea('contact_body', $data['generals']->contact_body, array('class' => 'form-control', 'required' => '') )}}

                                                {{ Form::submit('Save Changes', array('class' => 'btn btn-success', 'id' => 'save-contact-btn', 'style' => 'display:none; float:right')) }}
                                                {!! Form::close() !!}
                                                </div>
                                                <button id="edit-contact-btn" class="btn btn-primary" style="float:right">Edit</button>
                                                <button id="cancel-contact-btn" class="btn btn-danger" style="float:right; display:none">Cancel</button>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>





                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->

    </div>
    <!-- /.row -->

@endsection

@section('scripts')
    <script>
        function showHide(edit, edit_btn, save_btn, cancel_btn, original){
            $(edit_btn).click(function(){
                $(original).css('display', 'none');
                $(edit).css('display', 'block');
                $(edit_btn).css('display', 'none');
                $(cancel_btn).css('display', 'block');
                $(save_btn).css('display', 'block');
            });
            $(/*save_btn +', '+*/cancel_btn).click(function(){
                $(original).css('display', 'inline-table');
                $(save_btn).css('display', 'none');
                $(cancel_btn).css('display', 'none');
                $(edit_btn).css('display', 'block');
                $(edit).css('display', 'none');
            });
        }

        showHide('#edit', '#edit-btn', '#save-btn', '#cancel-btn', '#original');
        showHide('#edit-team', '#edit-team-btn', '#save-team-btn', '#cancel-team-btn', '#original-team');
        showHide('#edit-services', '#edit-services-btn', '#save-services-btn', '#cancel-services-btn', '#original-services');
        showHide('#edit-portfolio', '#edit-portfolio-btn', '#save-portfolio-btn', '#cancel-portfolio-btn', '#original-portfolio');
        showHide('#edit-contact', '#edit-contact-btn', '#save-contact-btn', '#cancel-contact-btn', '#original-contact');

        /*$('#edit-team-btn').click(function(){
            $('#original-team').css('display', 'none');
            $('#edit-team').css('display', 'block');
            $('#edit-team-btn').css('display', 'none');
            $('#cancel-team-btn').css('display', 'block');
            $('#save-team-btn').css('display', 'block');
        });
        $('#save-team-btn, #cancel-team-btn').click(function(){
            $('#original-team').css('display', 'inline-table');
            $('#save-team-btn').css('display', 'none');
            $('#cancel-team-btn').css('display', 'none');
            $('#edit-team-btn').css('display', 'block');
            $('#edit-team').css('display', 'none');
        });
        $('#edit-services-btn').click(function(){
            $('#original-services').css('display', 'none');
            $('#edit-services').css('display', 'block');
            $('#edit-services-btn').css('display', 'none');
            $('#cancel-services-btn').css('display', 'block');
            $('#save-services-btn').css('display', 'block');
        });
        $('#save-services-btn, #cancel-services-btn').click(function(){
            $('#original-services').css('display', 'inline-table');
            $('#save-services-btn').css('display', 'none');
            $('#cancel-services-btn').css('display', 'none');
            $('#edit-services-btn').css('display', 'block');
            $('#edit-services').css('display', 'none');
        });
        $('#edit-portfolio-btn').click(function(){
            $('#original-portfolio').css('display', 'none');
            $('#edit-portfolio').css('display', 'block');
            $('#edit-portfolio-btn').css('display', 'none');
            $('#cancel-portfolio-btn').css('display', 'block');
            $('#save-portfolio-btn').css('display', 'block');
        });
        $('#save-portfolio-btn, #cancel-portfolio-btn').click(function(){
            $('#original-portfolio').css('display', 'inline-table');
            $('#save-portfolio-btn').css('display', 'none');
            $('#cancel-portfolio-btn').css('display', 'none');
            $('#edit-portfolio-btn').css('display', 'block');
            $('#edit-portfolio').css('display', 'none');
        });*/
        function readURL(files) {
            if (files && files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(50)
                };
                reader.readAsDataURL(files[0]);
            }
        }
    </script>
@endsection