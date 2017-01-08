<table>
    <tr>
        <th>제목</th>
        <td>{{ $article->title }}</td>
    </tr>
    <tr>
        <th>내용</th>
        <td><pre>{{ $article->content }}</pre></td>
    </tr>
</table>
{!! Form::open([
    'route' => ['article.destroy', $article->id],
    'method' => 'DELETE'
]) !!}
    <a href="{{ route('article.index') }}">목록</a>
    <a href="{{ route('article.edit', $article->id) }}">수정</a>
    <button type="submit">삭제</button>
{!! Form::close() !!}