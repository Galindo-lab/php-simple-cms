<?php
$routes = [
    '/' => HomeView::class,
    '/database' => DataBaseTestView::class,
    '/about' => AboutView::class,
    '/contact' => ContactView::class,
    '/upload' => UploadFiles::class,


    '/posts' => PostList::class,
    '/posts/new' => CreatePost::class,
    '/posts/view' => ViewPost::Class
];
