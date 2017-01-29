{!! Form::open([
    'route' => 'article.index',
    'method' => 'get'
]) !!}
<table>
    <tr>
        <th><label for="title">제목</label></th>
        <td>
            <input type="text" id="title" name="title">
        </td>
    </tr>
    <tr>
        <th><label for="created_at_from">생성일</label></th>
        <td>
            <input type="text" name="created_at_from" id="created_at_from">
            ~
            <input type="text" name="created_at_to" id="created_at_to">
        </td>
    </tr>
</table>
<button type="submit">검색</button>
{!! Form::close() !!}

<table>
    <tr>
        <th>제목</th>
        <th>생성일</th>
    </tr>
    @foreach($articles as $article)
        <tr>
            <td><a href="{{ route('article.show', $article->id)  }}">{{ $article->title }}</a></td>
            <td>{{ $article->created_at }}</td>
        </tr>
    @endforeach
</table>
{!! $articles->render() !!}
<a href="{{ route('article.create') }}">글쓰기</a>