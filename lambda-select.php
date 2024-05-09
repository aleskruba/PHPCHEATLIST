<?php
        $books = [
            [
                "title" => "To Kill a Mockingbird",
                "author" => "Harper Lee",
                "year" => 1960
            ],
            [
                "title" => "Some title",
                "author" => "George Orwell",
                "year" => 1949
            ],
            [
                "title" => "Pride and Prejudice",
                "author" => "Jane Austen",
                "year" => 1813
            ],
            [
                "title" => "The Great Gatsby",
                "author" => "Scott Fitzgerald",
                "year" => 1925
            ],
            [
                "title" => "To the Lighthouse",
                "author" => "Virginia Woolf",
                "year" => 1927
            ],
            [
                "title" => "Some Book",
                "author" => "Scott Fitzgerald",
                "year" => 1928
            ],
            [
                "title" => "To the Hell",
                "author" => "Virginia Woolf",
                "year" => 1929
            ],
    
        ]; 
?>

<?php

$years = range(1813, date('Y'));

/* 
function filter($items, $fn) {
    $filteredItems = [];
    foreach($items as $item) {
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
}

$filteredBooks = filter($books, function($book){
    return $_GET['author'] &&  $_GET['year'] ; 
});

var_dump($filteredBooks) ;
 */
 

 // FIRT METHOD

/*  $filterByAuthor = function($books,$author,$year){
    $filteredBooks = []; 

    foreach($books as $book){
        if($book['author'] ===  $_GET['author'] ) {
            $filteredBooks[] = $book;
        }
    }
    return $filteredBooks;
 };


 if (isset($_GET['author'])){

    $filteredBooks = $filterByAuthor($books,$_GET['author'],$_GET['year']);
    foreach ( $filteredBooks as $book) {
        if($book['year'] > $_GET['year']) {
        echo $book['author'] . " " . $book['title'] . " ". $book['year'];
    }
  }
 }
 */

// SECOND METHOD

/* function filter($items,$key,$value){

    $filteredItems = [];
    
    foreach($items as $item) {
        if ($item[$key] === $value) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
};

$filteredBooks = filter($books, 'author', $_GET['author'] ) ;

if (isset($_GET['author']) && isset($_GET['year'])){

    $filteredBooks = filter($books, 'author', $_GET['author'], $_GET['year'] ) ;
    foreach ( $filteredBooks as $book) {
        if($book['year'] > $_GET['year']) {
        echo $book['author'] . " " . $book['title'] . " ". $book['year'];
    }
  }
}
 */

// THIRD METHOD

function filter($items,$fn){

    $filteredItems = [];
    
    foreach($items as $item) {
        if ( $fn($item) ) {

            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
};

if (isset($_GET['author']) && isset($_GET['year'])){

    $filteredBooks = filter($books, function($book){
        return $book;
    }) ;

    foreach ( $filteredBooks as $book) {
        if( ($book['author'] === $_GET['author'] )  && ($book['year'] > $_GET['year'])  ) {
        echo $book['author'] . " " . $book['title'] . " ". $book['year'];
    }
  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>SELECT</h1>

    <form action="select.php" method="GET">

    <select name="author" id="">
    <?php foreach($books as $key => $value) :?>
        <option value="<?= $value['author'] ?>" <?php if(isset($_GET['author']) && $_GET['author'] == $value['author']) echo 'selected'; ?>>
            <?= $value['author'] ?>
        </option>
    <?php endforeach; ?>
</select>
<select name="year" id="">
    <?php foreach(array_reverse($years) as $y) : ?>
        <option value="<?= $y?>" <?php if(isset($_GET['year']) && $_GET['year'] == $y) echo 'selected'; ?>>
            <?= $y ?>
        </option>
    <?php endforeach; ?>
</select>


    <input type="submit"  value="search">       
    </form>

</body>
</html>
