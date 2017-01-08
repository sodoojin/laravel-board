{!! Form::open([
    'route' => ['article.update', $article->id],
    'method' => 'PUT'
]) !!}
    @include('article.form', ['article' => $article])
    <button type="submit">수정</button>
    <a href="{{ route('article.index') }}">목록</a>
{!! Form::close() !!}