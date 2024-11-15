<?php
$routes = [
    '/' => HomeView::class,
    '/database' => DataBaseTestView::class,
    '/about' => AboutView::class,
    '/contact' => ContactView::class,
    '/upload' => UploadFiles::class,

    // errores
    '/NotFound' => NotFound404::Class,

    // Vistas extras
    '/posts' => MainView::class,

    // usuarios
    '/login' => UserLogin::Class,
    '/logout' => UserLogout::Class,

    // métodos para actualizar posts
    '/posts/new' => CreatePost::class,
    '/posts/view' => ViewPost::Class,
    '/posts/delete' => DeletePost::Class,
    '/posts/edit' => EditPost::class
];
