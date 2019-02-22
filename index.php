<?php

class Post 
{
    public $title;

    public $author;

    public $published;

    public function __construct($title, $author, $published)
    {
        $this->title = $title;
        $this->published = $published;
        $this->author = $author;
    }
}

$posts = [
    new Post('My First Post', 'ML', true),
    new Post('My Second Post', 'HC', true),
    new Post('My Third Post', 'LX', true),
    new Post('My Forth Post', 'LN', false),
];

# Lọc lấy những post chưa publish (cái nào mà trong closure return true là lấy)
// $unpublishedPosts = array_filter($posts, function ($post) {
//     return ! $post->published;
// });

# Lọc lấy những post đã publish (cái nào mà trong closure return true là lấy)
// $publishedPosts = array_filter($posts, function ($post) {
//     return $post->published;
// });

# Coi nó như là hàm số y = f(x) map từ x qua y (muốn cái mới là gì thì return về cái đó)
// $modifier = array_map(function ($post) {
//     $post->published = true;

//     return $post;
// }, $posts);

# Cách 2: Dùng foreach thay cho array_map ở trường hợp trên
// foreach ($posts as $post) {
//     $post->published = true;
// }

# Nhưng array_map linh hoạt hơn là foreach, ví dụ như muốn chuyển obj --> array
// $modifier = array_map(function ($post) {
//     return (array) $post;
// }, $posts);

# Cách 2: Dùng foreach để giải quyết cái trên (làm đc luôn, chỉ là ko thích hợp lắm)
foreach ($posts as $index => $post) {
    $posts[$index] = (array) $post;
}

# Hoặc chỉ muốn lấy 1 tập con thôi
// $modifier = array_map(function ($post) {
//     return ['title' => $post->title];
// }, $posts);

# Muốn lấy giá trị của 1 key nào đó của array (hoặc 1 PUBLIC property của object) [ở đây là property 'title' của object Post hoặc key 'title của mảng các mảng post cũng ok']
// $titles = array_column($posts, 'title');
$titles = array_column($posts, 'title', 'author'); // Dùng author làm key, value là title

# Cách 2: Dùng array_map (ko thích hợp lắm, code dài nữa, chỉ demo cho biết là làm đc)
// $titles = array_map(function ($post) {
//     return $post->title;
// }, $posts);

var_dump($titles);