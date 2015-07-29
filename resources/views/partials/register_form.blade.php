    <!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="text-center">Registration form</h1>
      </div>
      <div class="modal-body">
    

    <!-- resources/views/auth/register.blade.php -->

<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div class="form-group">
        Name
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
    </div>

    <div class="form-group">
        Email
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        Password
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        Confirm Password
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>

    @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>