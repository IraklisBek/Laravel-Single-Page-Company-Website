
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
            toastr.success("{{ \Request::session()->get('fail') }}");
        </script>
    </div>

@endif
@if (count($errors) > 0)

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

@endif