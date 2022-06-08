@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors as $error)
        <p><strong>{{ $error }}</strong></p>
    @endforeach
</div>

@endif
