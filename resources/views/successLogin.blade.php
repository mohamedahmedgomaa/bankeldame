@if(isset(Auth::user()->email))
<div class="alert alert-danger success-block">
    <strong>{{Auth::user()->email}}</strong>
</div>
@endif