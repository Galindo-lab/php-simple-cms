<?php
$routes = [
    '/' => HomeView::class,
    '/database' => DataBaseTestView::class,
    '/about' => AboutView::class,
    '/contact' => ContactView::class,
    '/upload' => UploadFiles::class,


    '/entries/new' => CreatePost::class,
    '/entries' => PostList::class
];
