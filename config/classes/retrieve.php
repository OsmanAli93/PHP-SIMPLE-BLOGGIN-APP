<?php

    include_once('./config/db.php');

    class Article extends Database {

        public function getAllArticle () {

            $sql = "SELECT * FROM posts";
            $result = $this->connect('blog')->query($sql);
            $row = $result->num_rows;

            if ($row > 0) {

                while ($row = $result->fetch_assoc()) {

                    $data[] = $row;
                }
            }

            return $data;
        }

        public function getSingleArticle($id) {

            $sql = "SELECT * FROM `posts` WHERE id = " . $id;
            $result = $this->connect('blog')->query($sql);
            $row = $result->num_rows;

            if ($row > 0) {

                while ($row = $result->fetch_assoc()) {

                   $article = $row;
                }
            }

            return $article;
            
        }
    }

    class Pagination extends Database {

        public function numberOfPages ($limit) {

            $result_per_page = $limit;

            $sql = "SELECT * FROM posts";
            $result = $this->connect('blog')->query($sql);
            $number_of_result = $result->num_rows;

            return ceil($number_of_result / $result_per_page);
        }

        public function maximizeNumberPerPage ($limit, $currentPage) {

            $result_per_page = $limit;
            $page = $currentPage;
            $this_page_first_result = ($page - 1) * $result_per_page;

            $sql = "SELECT * FROM posts LIMIT " . $this_page_first_result . ',' . $result_per_page;
            $result = $this->connect('blog')->query($sql);

            while ($row = $result->fetch_assoc()) {

                $data[] = $row;
            }

            return $data;
        }
    }