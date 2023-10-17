@if (session()->has('success'))
<!-- ALERT MSG  -->
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully! </strong>{{session()->get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@elseif (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong>{{session()->get('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<!-- ALERT MSG END  -->
@endif