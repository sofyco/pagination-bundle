<?php declare(strict_types=1);

namespace Sofyco\Bundle\PaginationBundle\Tests\Model;

use Sofyco\Bundle\PaginationBundle\Tests\App\Model\Example;
use Sofyco\Pagination\Query;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class ExampleTest extends KernelTestCase
{
    public function testPagination(): void
    {
        self::bootKernel();

        /** @var Example $model */
        $model = self::getContainer()->get(Example::class);

        $query = new Query(skip: 2, limit: 2);
        $storage = new \ArrayObject([1, 2, 3, 4, 5]);
        $result = $model->getResult($query, $storage);

        self::assertSame(5, $result->count);
        self::assertSame([3, 4], $result->items);
    }
}
