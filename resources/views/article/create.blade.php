{!! Form::open([
    'route' => 'article.store'
]) !!}
    @include('article.form')
    <button type="submit">저장</button>
{!! Form::close() !!}