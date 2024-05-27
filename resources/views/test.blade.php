<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<?php
    $books = [
        [
            'name' => 'saheh al bokhare',
            'author' => 'al bokhare',
            'url' => 'https://example.com',
        ],
        [
            'name' => 'al adab al mofrad',
            'author' => 'al bokhare',
            'url' => 'https://example.com',
        ],
    ];
    function filterByAuthor(array $books, string $author): array {
        $authors_books = [];
        foreach ($books as $book) {
            if ($book['author'] === $author) array_push($authors_books, $book);
        }
        return $authors_books;
    }
?>
<body>
    <ul>
            
        <?php foreach(filterByAuthor($books, 'al bokhare') as $al_bokhare_book): ?>
        <li>
            <a href=<?= $al_bokhare_book['url'] ?> target=>
                name: <?= $al_bokhare_book['name'] ?>
            </a>
        </li>
        <?php endforeach; ?>

    </ul>
</body>
</html>