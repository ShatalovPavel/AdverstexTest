<?php

class Collection implements Iterator
{
    private int $position = 0;
    public function __construct(private array $items)
    {
        $this->position = 0;
    }

    /**
     * @return mixed
     */
    public function current(): mixed
    {
        return $this->items[$this->position];
    }

    /**
     * @return int
     */
    public function key():int
    {
        return $this->position;
    }

    /**
     * @return void
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * @return void
     */
    public function prev(): void
    {
        --$this->position;
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->items[$this->position]);
    }

    /**
     * @return int
     */
    public function getSum(): int
    {
        $this->rewind();
        $sum = 0;
        while ($this->valid()) {
            $sum += $this->current();
            $this->next();
        }

        return $sum;
    }
}