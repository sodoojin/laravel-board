<?php

namespace App\Http\Controllers;

use Core\Criteria\Article\CreatedAtBetweenCriteria;
use Core\Criteria\Article\TitleCriteria;
use Core\Repositories\ArticleRepository;
use Core\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var ArticleService
     */
    private $articleService;
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * ArticleController constructor.
     * @param ArticleService $articleService
     * @param ArticleRepository $articleRepository
     */
    public function __construct(
        ArticleService $articleService,
        ArticleRepository $articleRepository
    ) {
        $this->articleService = $articleService;
        $this->articleRepository = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $title = $request->get('title');
        $createdAtFrom = $request->get('created_at_from');
        $createdAtTo = $request->get('created_at_to');

        if ($title) {
            $this->articleRepository->pushCriteria(new TitleCriteria($title));
        }
        if ($createdAtFrom && $createdAtTo) {
            $this->articleRepository->pushCriteria(new CreatedAtBetweenCriteria($createdAtFrom, $createdAtTo));
        }

        $articles = $this->articleRepository->paginate();

        return view('article.index')->with(compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $this->articleService->create($request->all());

        return redirect()->route('article.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $article = $this->articleRepository->find($id);

        return view('article.show')->with(compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $article = $this->articleRepository->find($id);

        return view('article.edit')->with(compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->articleService->update($request->all(), $id);

        return redirect()->route('article.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->articleService->destroy($id);

        return redirect()->route('article.index');
    }
}
