<?php declare(strict_types=1);

namespace Sofyco\Bundle\PaginationBundle\Tests\App\Model;

use Sofyco\Bundle\PaginationBundle\DependencyInjection\PaginatorAwareTrait;
use Sofyco\Pagination\Adapter\FactoryInterface;
use Sofyco\Pagination\Adapter\InMemory\ArrayObjectAdapter;
use Sofyco\Pagination\Query;
use Sofyco\Pagination\Result;

final class Example
{
    use PaginatorAwareTrait;

    public function __construct(FactoryInterface $factory)
    {
        $factory->add(\ArrayObject::class, ArrayObjectAdapter::class);
    }

    public function getResult(Query $query, object $storage): Result
    {
        return $this->paginator->paginate($storage, $query);
    }
}
