<label for="title" class="required">Título </label>
<input name="title" id="title" required value="{{ old('title', $posts->title) }}" type="text" class="form-control">
<div class="row">
    <div class="col-lg-6 col-md-12 form-group" id="send-select">
        <label for="category_id" class="required">Categoria</label>
        <select name="category_id" id="category_id" class="form-control select2"
            value="{{ old('category_id', $posts->category_id) }}">
            <option value=""></option>
            @foreach ($categories as $category)
                <option @if ($posts->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="message" class="required">Mensagem </label>
    <textarea class="form-control" name="message" id="message" required
        value="{{ old('message', $posts->message) }}" rows="12"></textarea>
</div>
