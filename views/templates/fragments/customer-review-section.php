<?php
if (!defined('BASE_URL_VIEWS')) define('BASE_URL_VIEWS', 'http://localhost:80/Allo_Deneigement/views/');
if (!defined('DOSSIER_BASE_INCLUDE'))  define("DOSSIER_BASE_INCLUDE", "http://localhost:80/Allo_Deneigement/");
?>


<div class="container text-black p-3">
    <div class="container text-center my-3">
        <div class="row">
            <div id="recipeCarousel" class="carousel slide w-100">
                <div class="carousel-inner w-100 mt-5" role="listbox">
                    <?php
                    $firstItem = true;
                    $reviewList = $controleur->getReviews();
                    if ($reviewList != null) {
                        foreach ($reviewList as $review) :
                    ?>
                            <div class="carousel-item <?php echo $firstItem ? 'active' : ''; ?>">
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?php echo BASE_URL_VIEWS; ?>static/image/avatar.svg" style="width: 70px;height: 70px;" class="img-fluid img-thumbnail mx-auto rounded-circle mt-5 border border-2 border-dark" alt="avatar">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $controleur->getUserName($review->getIdUtilisateur()) ?></h5>
                                            <div class="d-flex justify-content-center mb-3">
                                                <div class="content text-center">
                                                    <div class="ratings">
                                                        <span class="product-rating"><?php echo $review->getScore() ?></span><span>/5</span>
                                                        <div class="stars d-flex flex-nowrap">
                                                            <?php
                                                            $rating = $review->getScore();
                                                            for ($i = 1; $i <= 5; $i++) {
                                                                if ($i <= $rating) {
                                                                    echo '<i class="fa fa-star"></i>';
                                                                } else {
                                                                    echo '<i class="fa fa-star-o"></i>'; // Assuming you have an "empty" star icon
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="card-text"><?php echo $review->getCommentaire() ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                            $firstItem = false;
                        endforeach;
                    } else {
                        echo  'Aucun avis trouvé';
                    }
                    ?>
                </div>
                <button class="carousel-control-prev w-auto" type="button" data-bs-target="#recipeCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next w-auto" type="button" data-bs-target="#recipeCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo BASE_URL_VIEWS; ?>static/scripts/review-carousel.js"></script>