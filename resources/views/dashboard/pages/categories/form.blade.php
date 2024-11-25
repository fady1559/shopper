<div class="form-group mb-3">
    <label for="title">{{ __('dashboard/pages/categories/form.title') }} <span class="text-danger">*</span></label>
    <input type="text" name="title" id="title"
           value="{{ Request::old('title') ? Request::old('title') : $category->title }}"
           class="form-control @error('title') is-invalid @enderror">
    @error('title')
    <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="description">{{ __('dashboard/pages/categories/form.description') }}</label>
    <input type="text" name="description" id="description"
           value="{{ Request::old('description') ? Request::old('description') : $category->description }}"
           class="form-control @error('description') is-invalid @enderror">
    @error('description')
    <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="image">{{ __('dashboard/pages/categories/form.image') }}</label>
    <input type="file" name="image" id="image"
           class="form-control @error('image') is-invalid @enderror">
    @error('image')
    <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
