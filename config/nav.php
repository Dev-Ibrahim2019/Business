<?php

return [
    [
        'title' => 'Dashboard',
        'icon' => 'fa fa-home',
        'main-title' => 'Home',
        // 'list' => ['Index'],
        'route' => ['dashboard.dashboard'],
    ],
    [
        'title' => 'Content Management',
        'icon' => 'fa fa-list-alt',
        'main-title' => 'Main Section',
        'list' => ['Home page'],
        'route' => ['dashboard.home.edit'],
    ],
    [
        'icon' => 'fa fa-info-circle',
        'main-title' => 'About Section',
        'list' => ['About us'],
        'route' => ['dashboard.about.edit'],
    ],
    [
        'icon' => 'fa fa-handshake',
        'main-title' => 'Services',
        'list' => ['Index', 'Create'],
        'route' => ['dashboard.services.index', 'dashboard.services.create'],
    ],
    [
        'icon' => 'fa fa-file',
        'main-title' => 'Blogs',
        'list' => ['Index', 'Create'],
        'route' => ['dashboard.blogs.index', 'dashboard.blogs.create'],
    ],
];


