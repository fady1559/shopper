<div class="form-group mb-3">
    <label for="name" class="form-label">{{ __('dashboard/pages/sub_categories/form.Subcategory Name') }}:</label> <!-- Localized -->
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
    @error('name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="category_id" class="form-label">{{ __('dashboard/pages/sub_categories/form.Category') }}:</label> <!-- Localized -->
    <select id="category_id" name="category_id" class="form-select" required>
        <option value="">{{ __('dashboard/pages/sub_categories/form.Select Category') }}</option> <!-- Localized -->
        @foreach ($category::all() as $cat)
            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                {{ $cat->title }}
            </option>
        @endforeach
    </select>
    @error('category_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="description" class="form-label">{{ __('dashboard/pages/sub_categories/form.Description') }}:</label> <!-- Localized -->
    <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
</div>

<div class="form-group mb-3">
    <label for="status" class="form-label">{{ __('dashboard/pages/sub_categories/form.Status') }}:</label> <!-- Localized -->
    <select id="status" name="status" class="form-select">
        <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>{{ __('dashboard/pages/sub_categories/form.Active') }}</option> <!-- Localized -->
        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>{{ __('dashboard/pages/sub_categories/form.Inactive') }}</option> <!-- Localized -->
    </select>
    @error('status')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
