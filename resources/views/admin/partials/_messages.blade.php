<div class="row">
    <div class="col-lg-12">
@if(\Request::session()->has('success'))

    <div role="alert">
        <script type="text/javascript">
            toastr.success("{{ \Request::session()->get('success') }}");
        </script>
    </div>

@endif
@if(\Request::session()->has('fail'))

    <div role="alert">
        <script type="text/javascript">
            toastr.error("{{ \Request::session()->get('fail') }}");
        </script>
    </div>

@endif
@if (count($errors) > 0)
<div style="margin-left:20%; width:76%">
    <div class="alert alert-danger" role="alert">
        <strong>
            Errors:
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </strong>
    </div>
</div>

@endif
    </div>
</div>