<?php

namespace App\Contracts;

/**
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
interface RepositoryInterface
{
    /**
     * List all of the models from the database.
     *
     * @param  string[]                                                                       $columns
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function all(array $columns = ['*']);

    /**
     * Append filter to the current query
     *
     * @param  string $column
     * @param  mixed  $value
     * @param  string $operator
     * @return self
     */
    public function filter(string $column, mixed $value, string $operator = '=');

    /**
     * Get list of the models from the database paginated
     *
     * @param  int                                                   $perPage
     * @param  array                                                 $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage, $columns = ['*']);
}
