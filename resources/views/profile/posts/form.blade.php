<link rel="stylesheet" type="text/css"
    href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/prettify.css">
<link rel="stylesheet" type="text/css"
    href="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.css">

<label for="title" class="required">Título </label>
<input name="title" id="title" required value="{{ old('title', $post->title) }}" type="text" class="form-control">

<label for="subtitle" class="required">Sub Título </label>
<input name="subtitle" id="subtitle" required value="{{ old('subtitle', $post->subtitle) }}" type="text"
    class="form-control">
<div class="row">
    <div class="col-lg-6 col-md-12 form-group" id="send-select">
        <label for="category_id" class="required">Categoria</label>
        <select name="category_id" id="category_id" class="form-control select2"
            value="{{ old('category_id', $post->category_id) }}">
            <option value=""></option>
            @foreach ($categories as $category)
                <option @if ($post->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-sm-6">
        <label for="image">Imagem </label>
        <input type="file" accept="image/*" class="form-control-file" name="image">
    </div>
</div>
<div class="form-group">
    <label for="message" class="required">card-post </label>
    <textarea name="message" class="textarea" style="width: 730px; height: 200px; max-width: 100%"
        value="{{ old('message', $post->message) }}"> {{ $post->message }} </textarea>
</div>

<div class="form-group">
    <label for="abstract" class="required">Resumo da card-post </label>
    <textarea name="abstract" class="textarea" style="width: 730px; height: 200px; max-width: 100%"
        value="{{ old('abstract', $post->abstract) }}"> {{ $post->abstract }} </textarea>
</div>

@push('scripts')
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/wysihtml5-0.3.0.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/jquery-1.7.2.min.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/prettify.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/bootstrap.min.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.js"></script>
    <script>
        $('textarea').wysihtml5({
            "style": true,
            "font-styles": false,
            "emphasis": true,
            "lists": true,
            "html": false,
            "link": true,
            "image": true,
            "color": true,
            parser: function(html) {
                return html;
            }
        });

    </script>

@endpush
