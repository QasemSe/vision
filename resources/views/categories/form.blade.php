<div class="mb-3">
    <label for="">Category Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Category Name" value="{{ old('title', $category->name) }}">
    @error('name')
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror

</div>
