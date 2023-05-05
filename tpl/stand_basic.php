<?php
/*
 * Template name: Stand basic
 */
get_header(); ?>
<style>
    .standard_padding {
        padding: 4rem 1rem 4rem 1rem !important
    }

    .stand_basic_wrapper {
        display: grid;
        gap: 2rem;
    }

    .stand_basic_wrapper_left,
    .stand_basic_wrapper_right {
        box-shadow: 0px 4px 17px #00000010;
        border-radius: 16px;
        padding: 2rem;
    }

    .stand_basic_wrapper_left {
        display: grid;
        gap: 25px;
    }

    .stand_basic_wrapper_left_image img {
        object-fit: contain;
        object-position: center center;
        width: 100%;
        height: 100%;
    }

    .stand_basic_wrapper_gallery {
        display: grid;
        gap: 15px;
        grid-template-columns: repeat(auto-fill, minmax(10rem, 1fr));
    }

    .stand_basic_wrapper_gallery img {
        aspect-ratio: 1/1;
        object-fit: cover;
        height: 100%;
        width: 100%;
        object-position: center center;
    }

    .stand_basic_wrapper_gallery,
    .stand_basic_wrapper_downloads,
    .stand_basic_profile,
    .stand_basic_chat {
        padding-top: 25px;
    }

    .stand_basic_wrapper_downloads_wrapper_download {
        display: flex;
        width: 100%;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        flex-wrap: nowrap;

        padding-bottom: 10px;
    }

    .stand_basic_profile_wrapper {
        display: grid;
        gap: 10px;
    }

    .stand_basic_profile_wrapper_image {
        width: 40%;
        margin: 0 auto;
    }

    .stand_basic_profile_wrapper_image img {
        aspect-ratio: 1/1;
        object-fit: contain;
        object-position: center center;
        width: 100%;
        height: 100%;
    }

    .stand_basic_chat_wrapper {
        height: 80dvh;
    }

    .stand_basic_chat_wrapper iframe {
        width: 100%;
        height: 100%;
    }

    @media (min-width: 769px) {
        .standard_padding {
            padding: 4rem 3rem 4rem 3rem !important
        }

        .stand_basic_wrapper_left_image {
            height: 250px;
        }
    }

    @media (min-width: 1025px) {
        .stand_basic_profile_wrapper_image {
            width: 150px;
            margin: 0;
        }
    }

    @media (min-width: 1201px) {
        .standard_padding {
            padding: 4rem 5rem 4rem 5rem !important
        }

        .stand_basic_wrapper {
            grid-template-columns: 2fr 3fr;
        }

        .stand_basic_wrapper_left_image {
            height: 200px;
        }
    }

    @media (min-width: 1401px) {
        .standard_padding {
            padding: 4rem 200px 4rem 200px !important
        }
    }
</style>
<div>
    <?php the_content() ?>
</div>

<div class="stand_basic standard_padding">
    <div class="stand_basic_wrapper">
        <div class="stand_basic_wrapper_left">
            <div class="stand_basic_wrapper_left_image">
                <img src="http://localhost/vanila_1/wp-content/uploads/2023/04/SVO22-Logo-Color@2x.png" alt="">
            </div>
            <div class="stand_basic_wrapper_left_link">
                <a href="https://svo.org.ve/coming-soon/">https://svo.org.ve</a>
            </div>
            <div class="stand_basic_wrapper_left_video">
                <iframe style="border: none; aspect-ratio: 16 / 9;" src="https://www.youtube.com/embed/s6H7BHNIyxM"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <div class="stand_basic_wrapper_left_biography">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Hic ducimus optio voluptatum repellendus dolorem sed? Aperiam libero exercitationem facere distinctio ab
                magni vero ut! Pariatur labore quia officiis harum voluptas!</div>
        </div>
        <div class="stand_basic_wrapper_right">
            <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-gallery-list" data-bs-toggle="list"
                    href="#list-gallery" role="tab" aria-controls="list-gallery">Gallery</a>
                <a class="list-group-item list-group-item-action" id="list-downloads-list" data-bs-toggle="list"
                    href="#list-downloads" role="tab" aria-controls="list-downloads">Downloads</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list"
                    href="#list-profile" role="tab" aria-controls="list-profile">Contact info</a>
                <a class="list-group-item list-group-item-action" id="list-chat-list" data-bs-toggle="list"
                    href="#list-chat" role="tab" aria-controls="list-chat">Settings</a>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-gallery" role="tabpanel"
                    aria-labelledby="list-gallery-list">
                    <div class="stand_basic_wrapper_gallery">
                        <div class="stand_basic_wrapper_gallery_image">
                            <img src="http://localhost/vanila_1/wp-content/uploads/2023/04/banner_facebook-2017.jpg"
                                alt="">
                        </div>
                        <div class="stand_basic_wrapper_gallery_image">
                            <img src="http://localhost/vanila_1/wp-content/uploads/2023/04/banner_facebook-2017.jpg"
                                alt="">
                        </div>
                        <div class="stand_basic_wrapper_gallery_image">
                            <img src="http://localhost/vanila_1/wp-content/uploads/2023/04/banner_facebook-2017.jpg"
                                alt="">
                        </div>
                        <div class="stand_basic_wrapper_gallery_image">
                            <img src="http://localhost/vanila_1/wp-content/uploads/2023/04/banner_facebook-2017.jpg"
                                alt="">
                        </div>
                        <div class="stand_basic_wrapper_gallery_image">
                            <img src="http://localhost/vanila_1/wp-content/uploads/2023/04/banner_facebook-2017.jpg"
                                alt="">
                        </div>
                        <div class="stand_basic_wrapper_gallery_image">
                            <img src="http://localhost/vanila_1/wp-content/uploads/2023/04/banner_facebook-2017.jpg"
                                alt="">
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="list-downloads" role="tabpanel" aria-labelledby="list-downloads-list">
                    <div class="stand_basic_wrapper_downloads">
                        <div class="stand_basic_wrapper_downloads_wrapper">
                            <div class="stand_basic_wrapper_downloads_wrapper_download">
                                <div class="stand_basic_wrapper_downloads_wrapper_download_text">Lorem ipsum dolor sit
                                </div>
                                <div class="stand_basic_wrapper_downloads_wrapper_download_button"><a href="#"
                                        class="button btn btn-primary">Download</a></div>
                            </div>
                            <div class="stand_basic_wrapper_downloads_wrapper_download">
                                <div class="stand_basic_wrapper_downloads_wrapper_download_text">Lorem ipsum dolor sit
                                </div>
                                <div class="stand_basic_wrapper_downloads_wrapper_download_button"><a href="#"
                                        class="button btn btn-primary">Download</a></div>
                            </div>
                            <div class="stand_basic_wrapper_downloads_wrapper_download">
                                <div class="stand_basic_wrapper_downloads_wrapper_download_text">Lorem ipsum dolor sit
                                </div>
                                <div class="stand_basic_wrapper_downloads_wrapper_download_button"><a href="#"
                                        class="button btn btn-primary">Download</a></div>
                            </div>
                            <div class="stand_basic_wrapper_downloads_wrapper_download">
                                <div class="stand_basic_wrapper_downloads_wrapper_download_text">Lorem ipsum dolor sit
                                </div>
                                <div class="stand_basic_wrapper_downloads_wrapper_download_button"><a href="#"
                                        class="button btn btn-primary">Download</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="stand_basic_profile">
                        <div class="stand_basic_profile_wrapper">
                            <div class="stand_basic_profile_wrapper_image">
                                <img src="http://localhost/vanila_1/wp-content/uploads/2023/05/person-default.jpg"
                                    alt="" srcset="">
                            </div>
                            <div class="stand_basic_profile_wrapper_section">Jonathan Smith
                                <hr>
                            </div>
                            <div class="stand_basic_profile_wrapper_section">1800-898-2234
                                <hr>
                            </div>
                            <div class="stand_basic_profile_wrapper_section">jonathansmith@gmail.com
                                <hr>
                            </div>
                            <div class="stand_basic_profile_wrapper_section">Neque porro quisquam est, qui
                                dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam
                                eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
                    <div class="stand_basic_chat">
                        <div class="stand_basic_chat_wrapper">
                            <iframe src="https://www.youtube.com/embed/s6H7BHNIyxM" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();