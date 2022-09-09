<?php declare(strict_types=1);

namespace Sofyco\Bundle\PaginationBundle\DependencyInjection;

use Sofyco\Pagination\Adapter\Factory;
use Sofyco\Pagination\Adapter\FactoryInterface;
use Sofyco\Pagination\Paginator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;

final class PaginationExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $factory = new Definition(Factory::class);

        $container->setDefinition(FactoryInterface::class, $factory);

        $paginator = new Definition(Paginator::class);
        $paginator->setAutowired(true);

        $container->setDefinition(Paginator::class, $paginator);
    }
}
