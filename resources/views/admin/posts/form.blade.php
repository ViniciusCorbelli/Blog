<link rel="stylesheet" type="text/css"
    href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/prettify.css">
<link rel="stylesheet" type="text/css"
    href="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.css">

<label for="title" class="required">Título </label>
<input name="title" id="title" required value="{{ old('title', $post->title) }}" type="text" class="form-control">
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
</div>
<div class="form-group">
    <label for="message" class="required">Mensagem </label>
    <textarea name="message" class="textarea" style="width: 730px; height: 200px"
        value="{{ old('message', $post->message) }}"> {{ $post->message }} </textarea>
</div>

@push('scripts')
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/wysihtml5-0.3.0.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/jquery-1.7.2.min.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/prettify.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/bootstrap.min.js"></script>
    <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.js"></script>
    <script>
        $(function() {
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5({
                locale: "pt-BR",
                toolbar: {
                    "font-styles": true, // Font styling, e.g. h1, h2, etc.
                    "emphasis": true, // Italics, bold, etc.
                    "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
                    "html": false, // Button which allows you to edit the generated HTML.
                    "link": false, // Button to insert a link.
                    "image": true, // Button to insert an image.
                    "color": true, // Button to change color of font
                    "blockquote": true, // Blockquote,
                    parser: function(html) {
                        return html.text();
                    }
                }
            });
        });

    </script>

@endpush
