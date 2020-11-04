
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
</head>
<body>
    <?php include_once('./inc/search-modal.php'); ?>

    <header id="second-header" class="bg-white py-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="index.php">Blogger</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto align-items-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Send Article <span class="sr-only">(current)</span></a>
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

    <main id="main-content" class="py-5">
        <div class="container">
            
            <div class="wrapper">

                <div class="row mb-5">
                    <div class="col-lg-12">
                        <h2 class="font-weight-normal">Submit Your Article</h2>
                    </div>
                </div>

                <div class="form-wrapper">
                    <form action="config/classes/process.php" method="POST">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="name">Name (Will be published)</label>
                                    <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- END -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- END -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="cke_message">Message</label>
                                    <textarea name="message" id="message"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- END -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="email">Email Address (Will not be published)</label>
                                    <input type="email" name="email" id="email" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- END -->

                        <input type="submit" name="submit" value="Send" class="btn btn-primary px-4 py-2 mt-3">
                    </form>
                    
                </div>
            </div>


        </div>
    </main>


    <?php include_once('./inc/footer.php'); ?>


    <?php include_once('./inc/script_src.php'); ?>
    <!-- Blog Editor -->
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('message');
    </script>
</body>
</html>