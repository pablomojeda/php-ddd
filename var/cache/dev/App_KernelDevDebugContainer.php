<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerM4nlNDJ\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerM4nlNDJ/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerM4nlNDJ.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerM4nlNDJ\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerM4nlNDJ\App_KernelDevDebugContainer([
    'container.build_hash' => 'M4nlNDJ',
    'container.build_id' => 'e6e5f5ae',
    'container.build_time' => 1723137915,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerM4nlNDJ');
