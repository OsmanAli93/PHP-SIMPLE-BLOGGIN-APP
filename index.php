
<?php
    
    include_once('config/classes/retrieve.php'); 

    $article = new Article;
    $article_array = $article->getAllArticle();
   

    if (!isset($_GET['page'])) {

        $page = 1;

    } else {

        $page = $_GET['page'];
    }
   

    for ($i = 0; $i < count($article_array); $i++) {

        $data[] = $article_array[$i];
    }

    $pagination = new Pagination;
    $pagination_array = $pagination->maximizeNumberPerPage(9, $page);
    $total = $pagination->numberOfPages(9);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Blogging - Share Your Experiences</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="icon/css/ionicons.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php include_once('./inc/search-modal.php'); ?>

    <header id="main-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container">
                <a class="navbar-brand text-white" href="index.php">Blogger</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto align-items-center">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="submit.php">Send Article <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="search-popup" href="#">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div id="hero">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="title">
                <h2 class="text-white">Blog</h2>
            </div>
        </div>
    </div>


    <main class="main-content">
        <div class="container">
            <div class="row">
                <?php foreach ($pagination_array as $post) : ?>

                    <div class="col-lg-4 mb-5">
                        <div class="post-block">
                            <a href="view-article.php?id=<?php echo $post['id']; ?>" class="d-block">
                                <div class="post-header">
                                    
                                    <?php
                                        $str = html_entity_decode($post['message']);
                                        echo substr($str, 0, 100);
                                    ?>
                                    
                                </div>
                            </a>
                            
                            <div class="post-body bg-white">

                                <div class="post-inner">
                                    <a href="view-article.php?id=<?php echo $post['id']; ?>">
                                        <h5 class="font-weight-bold"><?php echo $post['title']; ?></h5>
                                    </a>
                                    <p class="py-3">
                                        <span class="name"><?php echo $post['name']; ?></span>
                                        <span class="divider">/</span>
                                        <span class="date">
                                            <?php 
                                                $date = $post['created_at'];
                                                echo date("d-m-Y", strtotime($date));
                                            ?>
                                        </span>
                                    </p>
                                    <article>
                                        <?php 
                                            $str = html_entity_decode($post['message']);
                                            echo substr($str, 0, 250);
                                        ?>
                                    </article>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            
            <?php if ($page >= $total) : ?>
                <div class="pagination text-left">
                    <a href="index.php?page=<?php echo ($page - 1) ; ?>" class="button prev">Prev</a>
                </div>
            <?php elseif ($page <= $total) : ?>
                <div class="pagination d-flex justify-content-end">
                    <a href="index.php?page=<?php echo ($page + 1) ; ?>" class="button next">
                        Next
                        <i class="ion-chevron-right ml-1"></i>
                    </a>
                </div>
            <?php else : ?>
                <div class="pagination d-flex justify-content-between">
                    <a href="index.php?page=<?php echo ($page - 1) ; ?>" class="button prev">Prev</a>
                    <a href="index.php?page=<?php echo ($page + 1) ; ?>" class="button next">Next</a>
                </div>
            <?php endif; ?>
        </div>
    </main>
    





    <?php include_once('./inc/footer.php'); ?>


    <?php include_once('./inc/script_src.php'); ?>
    
</body>
</html>