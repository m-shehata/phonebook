<?php

namespace App\Abstracts;

use App\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of AbstractSQLliteRepository.
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class AbstractSQLliteRepository implements RepositoryInterface
{
    protected const PER_PAGE = 10;
    protected const IN_OPERATOR = 'IN';
    protected const NOTIN_OPERATOR = 'NOTIN';
    protected const IN_OPERATOR_LIST = [self::IN_OPERATOR, self::NOTIN_OPERATOR];

    /**
     * @var Model The model which query will be run against.
     */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    /**
     * @inheritDoc
     */
    public function all(array $columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * @inheritDoc
     */
    public function filter(string $column, mixed $value, string $operator = '=')
    {
        if (in_array($operator, self::IN_OPERATOR_LIST)) {
            return $this->filterInValues($column, $value, self::IN_OPERATOR == $operator);
        }

        $this->model = $this->model->where($column, $operator, $value);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function paginate(?int $perPage = null, $columns = ['*'])
    {
        return $this->model->paginate($perPage ?? static::PER_PAGE, $columns);
    }

    /**
     * Apply filter for "in" or "not in" specific values.
     *
     * @param  string    $column
     * @param  mixed[]   $value
     * @param  bool      $withInValues
     * @return self
     */
    public function filterInValues(string $column, array $value, bool $withInValues = true)
    {
        $where = $withInValues ? 'whereIn' : 'whereNotIn';
        $this->model = $this->model->$where($column, $value);

        return $this;
    }
}
