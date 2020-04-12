<?php 


//Ternary operator

//$page = isset($_GET['page']) ? $_GET['page'] : 1;  //if inline statement

// only php 7 
$page = $_GET['page'] ?? 1;
echo $page;
echo '<br>';

if(isset($_GET["search"]))
{
    $searchTerm = $_GET['search'];
    echo "<h3> Searching for: ".$searchTerm."</h3>";
    $pages = 10;
    echo "<p> You are on page: ".$page."</p>";

    //var_dump($_GET);
    echo "<br>";
    for($i = 1; $i <= $pages; $i++)
    {
        echo '<a href= "?search='. $searchTerm .'&page='.$i.'"> '  .$i.  ' </a>';

    }
}




