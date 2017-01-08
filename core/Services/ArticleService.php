<?php


namespace Core\Services;


use Core\Repositories\ArticleRepository;
use Core\Validators\ArticleValidator;
use Prettus\Validator\LaravelValidator;

class ArticleService extends BaseService
{
    /**
     * @var ArticleRepository
     */
    private $repo;
    /**
     * @var ArticleValidator
     */
    private $validator;

    /**
     * ArticleService constructor.
     * @param ArticleRepository $repo
     * @param ArticleValidator $validator
     */
    public function __construct(
        ArticleRepository $repo,
        ArticleValidator $validator
    ) {
        $this->repo = $repo;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $this->validate($this->validator, LaravelValidator::RULE_CREATE, $data);

        return $this->repo->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $this->validate($this->validator, LaravelValidator::RULE_UPDATE, $data);

        return $this->repo->update($data, $id);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
    }
}