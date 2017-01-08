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