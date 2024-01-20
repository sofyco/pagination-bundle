<?php declare(strict_types=1);

namespace Sofyco\Bundle\PaginationBundle\Tests\App;

use Sofyco\Bundle\PaginationBundle\PaginationBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

final class Kernel extends \Symfony\Component\HttpKernel\Kernel
{
    use MicroKernelTrait;

    public function registerBundles(): iterable
    {
        yield new FrameworkBundle();
        yield new PaginationBundle();
    }

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->extension('framework', ['test' => true]);

        $container->services()->set(Model\Example::class, Model\Example::class)->autowire()->public();
    }
}
