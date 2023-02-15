@if ($errors -> any())
<div class="red">
    @foreach ($errors -> all() as $error)
        {{$error}}
    @endforeach
</div>
    
@endif