<?php
    include_once('config/classes/retrieve.php');
    $id = $_GET['id'];

    $getPost = new  Article;
    $singlePost = $getPost->getSingleArticle($id);

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $singlePost['title']; ?> - Personal Blogging</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="icon/css/ionicons.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php include_once('./inc/search-modal.php'); ?>

    <header id="third-header" class="bg-white py-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="index.php">Blogger</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto align-items-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="submit.php">Send Article <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="search-popup" href="#">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</head>
<body>
    
    
    <main id="article-section">
        <div class="center-wrap">
           <div class="row">
                <div class="col-lg-12">
                    <div class="article-block">
                        <h4 class="text-center"><?php echo $singlePost['title']; ?></h4>
                        <p class="sub text-center">
                            <span class="name"><?php echo $singlePost['name']; ?></span>
                            <span class="divider px-2">/</span>
                            <span class="date">
                                <?php 
                                    $date = $singlePost['created_at'];
                                    echo date("d-m-Y", strtotime($date));
                                ?>
                            </span>
                        </p>
                        <article>
                            <?php echo html_entity_decode($singlePost['message']); ?>
                        </article>
                    </div>
                </div>
           </div>
        </div>
    </main>




    <?php include_once('inc/footer.php'); ?>

    <?php include_once('inc/script_src.php'); ?>
</body>
</html>