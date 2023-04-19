<?php

namespace Meilisearch\Contracts;

class KeysResults extends Data
{

    /**
     * @var int|mixed
     */
    private $offset;
    /**
     * @var int|mixed
     */
    private $limit;
    /**
     * @var int|mixed
     */
    private $total;

    public function __construct(array $params)
    {
        parent::__construct($params['results'] ?? []);

        $this->offset = $params['offset'];
        $this->limit = $params['limit'];
        $this->total = $params['total'] ?? 0;
    }

    /**
     * @return array<int, array>
     */
    public function getResults(): array
    {
        return $this->data;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function toArray(): array
    {
        return [
            'results' => $this->data,
            'offset' => $this->offset,
            'limit' => $this->limit,
            'total' => $this->total,
        ];
    }

    public function count(): int
    {
        return \count($this->data);
    }
}
