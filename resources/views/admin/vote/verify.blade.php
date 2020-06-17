<h3>Online Block Voting</h3>

@if(session('fail'))
<h4>{{session('fail')}}</h4>
@endif


<form action="{{url('/votecheck')}}" method="post">
@csrf
<input type="text" name="cnic" autocomplete="off">
 @if($errors->has('cnic'))
    <small class="red">{{ $errors->first('cnic')}}</small>
 @endif
<br>
<br>
<button type="submit">Verify me</button>

</form>