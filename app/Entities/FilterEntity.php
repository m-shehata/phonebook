<?php

namespace App\Entities;

/**
 * Description of FilteEntity
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class FilterEntity
{
    /**
     *
     * @var string
     */
    private $field;

    /**
     *
     * @var string
     */
    private $operator;

    /**
     *
     * @var mixed
     */
    private $value;

    /**
     * Create filter instance
     *
     * @param string $field
     * @param mixed  $value
     * @param string $operator
     */
    public function __construct(string $field, mixed $value, string $operator = '=')
    {
        $this->field = $field;
        $this->operator = $operator;
        $this->value = $value;
    }

    /**
     * Get the field value
     *
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * Get the operator value
     *
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * Get the value
     *
     * @return string
     */
    public function getValue(): mixed
    {
        return $this->value;
    }
}
