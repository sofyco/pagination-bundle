<?php declare(strict_types=1);

namespace Sofyco\Bundle\PaginationBundle\DependencyInjection;

use Sofyco\Pagination\Paginator;
use Symfony\Contracts\Service\Attribute\Required;

trait PaginatorAwareTrait
{
    private Paginator $paginator;

    #[Required]
    public function setPaginator(Paginator $paginator): void
    {
        $this->paginator = $paginator;
    }
}
