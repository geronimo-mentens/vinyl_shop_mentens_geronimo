@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name"
           class="form-control @error('name') is-invalid @enderror"
           placeholder="Name"

           required
           value="{{ old('name', $user->name) }}">

    <label for="name">Email</label>
    <input type="text" name="email" id="email"
           class="form-control @error('email') is-invalid @enderror"
           placeholder="Email"

           required





           value="{{ old('email', $user->email) }}"><br>

    <input type="checkbox" name="active" id="active"


           minlength="3"
           required
           @if($user->active==1)


           checked

           @endif

           value="active">Active
    <input type="checkbox"name="admin" id="admin"

    minlength="3"
    required


    @if($user->admin==1)


           checked

@endif

    value="admin" >
    Admin<br>
        @error('name','email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror


</div>
<button type="submit" class="btn btn-success">Save user</button>