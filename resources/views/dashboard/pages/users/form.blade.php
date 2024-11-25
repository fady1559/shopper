<div class="form-group mb-3">
    <label for="name">{{ __('dashboard/pages/users/form.name') }} <span class="text-danger">*</span></label>
    <input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name') ? Request::old('name') : $user->name }}">
</div>

<div class="form-group mb-3">
    <label for="email">{{ __('dashboard/pages/users/form.email') }} <span class="text-danger">*</span></label>
    <input class="form-control" type="email" name="email" id="email" value="{{ Request::old('email') ? Request::old('email') : $user->email }}">
</div>

<div class="form-group mb-3">
    <label for="password">{{ __('dashboard/pages/users/form.password') }} <span class="text-danger">*</span></label>
    <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') ? Request::old('password') : '' }}">
</div>

<div class="row align-items-center my-2">
    <div class="col-auto">
        <img src="{{ Storage::url($user->image) }}" alt="" class="img-thumbnail" style="width: 100px; height:100px">
    </div>
    <div class="col">
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
        @error('image')
        <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group my-3">
    <label for="User_Type">{{ __('dashboard/pages/users/form.user_type') }}</label>
    <select name="User_Type" class="form-control" id="User_Type">
        <option value="admin" {{ (Request::old('User_Type') == 'admin' || $user->User_Type == 'admin') ? 'selected' : '' }}>{{ __('dashboard/pages/users/form.admin') }}</option>
        <option value="moderator" {{ (Request::old('User_Type') == 'moderator' || $user->User_Type == 'moderator') ? 'selected' : '' }}>{{ __('dashboard/pages/users/form.moderator') }}</option>
        <option value="customer" {{ (Request::old('User_Type') == 'customer' || $user->User_Type == 'customer') ? 'selected' : '' }}>{{ __('dashboard/pages/users/form.customer') }}</option>
    </select>
</div>
