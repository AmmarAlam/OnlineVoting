@if(session('success'))
<div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Alert! </strong> &nbsp;{{session('success')}}
</div>
@elseif(session()->has('update'))
<div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">x</span>
    </button>
        <strong>Alert! </strong> &nbsp;{{session('update')}}
    </div>
@elseif(session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">x</span>
    </button>
        <strong>Alert! </strong> &nbsp;{{session('delete')}}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger alert-dismissible fade in mb-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x</span>
    </button>
        <strong>Alert! </strong> &nbsp;{{session('error')}}
    </div>
@endif
