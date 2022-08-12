<div class="mb-3">
    <label for="">Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title', $post->title) }}">
    @error('title')
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror

</div>
<div class="mb-3">
    <label for="">Image</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Image">
    @error('image')
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror
    <img width="80px" src="{{ asset('uploads/' . $post->image) }}" alt="{{ $post->title }}">
</div>
<div class="mb-3">
    <label for="">Body</label>
    <textarea id="mytextarea" name="body" class="form-control @error('body') is-invalid @enderror">{{ old('body', $post->body) }}</textarea>
    @error('body')
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>
