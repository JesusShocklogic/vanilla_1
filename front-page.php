<?php
get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
        ?>

        <!-- Carousel -->
        <div style="padding-top: 3rem;padding-bottom: 3rem;">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12">
                        <h1>Ponentes</h1>
                    </div>
                    <div class="col-2">
                        <a data-bs-toggle="modal" data-bs-target="#speakerModal01" class="ratio ratio-1x1">
                            <img style="object-fit: cover;" class="d-block mx-auto img-fluid rounded-circle" src="http://localhost/vanilla_rcp/wp-content/uploads/2022/11/speaker01.png" alt="">
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="speakerModal01" tabindex="-1" aria-labelledby="speakerModal01Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="speakerModal01Label">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <a href="#">Conoce nuestros ponentes</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
    wp_reset_postdata(); // end while
} //end if
else {
    //No content Found
} // end else


get_footer();
