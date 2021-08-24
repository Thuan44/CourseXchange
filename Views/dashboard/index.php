<section id="courses" class="w-100">

    <div class="courses-toolbar d-flex justify-content-between align-items-end mb-3">
        <h3>Tous les cours</h3>
        <button class="btn action-btn">Créer un cours</button>
    </div>

    <div class="courses-container p-4">
        <div class="row mx-auto">
            <?php foreach ($params['courses'] as $course) { ?>
                <div class="col-3" align="center">
                    <a href="#" class="course-title text-decoration-none">
                        <div class="card course-card" style="width: 18rem;">
                            <img src="<?= PUBLIC_DIRECTORY . 'src/300x200.webp' ?>" class="card-img-top w-100" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= $course->course_name ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

</section>

<?php
var_dump($params['courses']);
?>