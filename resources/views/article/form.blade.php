<div>
    <label for="title">제목</label>
    <input type="text" id="title" name="title" value="{{ old('title', isset($article) ? $article->title : '') }}">
</div>
<div>
    @if($errors->has('title'))
        @foreach($errors->get('title') as $error)
            {{ $error }}
        @endforeach
    @endif
</div>
<div>
    <label for="content">내용</label>
    <textarea id="content" name="content">{{ old('content', isset($article) ? $article->content : '') }}</textarea>
</div>
<div>
    @if($errors->has('content'))
        @foreach($errors->get('content') as $error)
            {{ $error }}
        @endforeach
    @endif
</div>