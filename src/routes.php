<?php
$routes = [
    '/' => HomeView::class,
    '/database' => DataBaseTestView::class,
    '/about' => AboutView::class,
    '/contact' => ContactView::class,
    '/upload' => UploadFiles::class,

    // métodos para actualizar posts
    '/posts' => PostList::class,
    '/posts/new' => CreatePost::class,
    '/posts/view' => ViewPost::Class
];
