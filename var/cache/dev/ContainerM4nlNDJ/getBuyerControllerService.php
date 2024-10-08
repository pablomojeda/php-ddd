<?php

namespace ContainerM4nlNDJ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getBuyerControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\BuyerController' shared autowired service.
     *
     * @return \App\Controller\BuyerController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Controller/BuyerController.php';
        include_once \dirname(__DIR__, 4).'/src/Domain/User/Service/BuyerService.php';
        include_once \dirname(__DIR__, 4).'/src/Domain/User/Repository/BuyerRepository.php';
        include_once \dirname(__DIR__, 4).'/src/Infrastructure/Persistence/InMemory/InMemoryBuyerRepository.php';

        return $container->services['App\\Controller\\BuyerController'] = new \App\Controller\BuyerController(new \App\Domain\User\Service\BuyerService(new \App\Infrastructure\Persistence\InMemory\InMemoryBuyerRepository()));
    }
}
