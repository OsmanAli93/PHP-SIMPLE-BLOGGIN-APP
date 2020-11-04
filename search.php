

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
    <header class="bg-white py-4">
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


    <main class="main-content">
        <div class="container">
            <div class="row">
           <?php
                include_once('config/db.php');
        
                if (isset($_POST['s'])) {

                    $mysqli = new Database;
                    $conn = $mysqli->connect('blog');
                    $search = mysqli_real_escape_string($conn, $_POST['s']);

                    $sql = "SELECT * FROM posts WHERE title LIKE '%$search%'";
                    $result = $conn->query($sql);
                    $query_result = $result->num_rows;

                    if ($query_result > 0) {

                        while ($row = $result->fetch_assoc()) {
                            
                            $str = html_entity_decode($row['message']);
                            $substr = substr($str, 0, 100);
                            $date = date("d-m-Y", strtotime($row['created_at']));
                            $article = substr($str, 0 , 250);

                            echo
                                 "<div class='col-lg-4 mb-5'>
                                      <div class='post-block'>
                                         <a href='view-article.php?id=" . $row['id'] . "' class='d-block'>
                                            <div class='post-header'>" . $substr . "</div>
                                         </a>
                                         <div class='post-body bg-white'>
                                            <div class='post-inner'>
                                                <a href='view-article.php?id=" . $row['id'] . "'>
                                                    <h5 class='font-weight-bold'>" . $row['title'] . "</h5>
                                                </a>
                                                <p class='py-3'>
                                                    <span class='name'>" . $row['name'] . "</span>
                                                    <span class='divider'>/</span>
                                                    <span class='date'>" . $date . "</span>
                                                </p>
                                                <article>" . $article . "</article>
                                            </div>
                                         </div>
                                      </div>
                                  </div>";

                        }

                    } else {

                        echo "There Are No Results";
                    }
                }
            ?>
            </div>
            
        </div>
    </main>




    <?php include_once('./inc/footer.php'); ?>
    <?php include_once('./inc/script_src.php'); ?>
</body>
</html>