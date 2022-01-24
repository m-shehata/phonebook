<?php

namespace App\Repositories;

use App\Abstracts\AbstractSQLliteRepository;
use App\Models\Customer;

/**
 * Description of CustomerRepository.
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class CustomerRepository extends AbstractSQLliteRepository
{
    protected const PER_PAGE = 10;

    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }
}
