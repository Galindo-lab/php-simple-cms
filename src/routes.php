<?php
$routes = [
    '/' => HomeView::class,
    '/database' => DataBaseTestView::class,
    '/about' => AboutView::class,
    '/contact' => ContactView::class,
    '/upload' => UploadFiles::class,

    // errores
    '/NotFound' => NotFound404::Class,

    // usuarios
    '/login' => UserLogin::Class,
    '/logout' => UserLogout::Class,

    // métodos para actualizar posts
    '/posts' => PostList::class,
    '/posts/new' => CreatePost::class,
    '/posts/view' => ViewPost::Class
];
