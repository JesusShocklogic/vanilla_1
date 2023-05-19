<?php
/*
 * Template name: Stand basic
 */
//$temp_person_id = $_GET['person_id'];
$temp_person_id = 5301197;
$exhibitor = get_exhibitors_by_person_id_sl($temp_person_id)[0];
$contact_info = [
    "Person_Id" => $exhibitor->Person_Id,
    "First_Name" => $exhibitor->First_Name,
    "Family_Name" => $exhibitor->Family_Name,
    "Image01" => $exhibitor->Image01,
    "Mobile" => $exhibitor->Mobile,
    "Email" => $exhibitor->Email,
    "Biography" => $exhibitor->Biography,
];

$company_info = [
    "companyLogo" => get_freefield_by_type_and_personId("Company_Logo", $contact_info["Person_Id"])[0]->Value,
    "website" => "https://" . get_freefield_by_fieldName_and_personId("Website", $contact_info["Person_Id"])[0]->Value,
    "companyVideo" => wp_http_validate_url(
        sanitize_url(get_freefield_by_fieldName_and_personId("Video A", $contact_info["Person_Id"])[0]->Value)
    ),
    "companyBio" => get_freefield_by_fieldName_and_personId("Company Information", $contact_info["Person_Id"])[0]->Value ?? null,
];

$company_gallery_array = get_freefields_images_by_person_id($contact_info["Person_Id"]);
$company_documents = get_freefields_documents_by_personId($contact_info["Person_Id"]);

$avatar = default_speaker_avatar();
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
        display: flex;
        flex-direction: column;
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

        gap: 1rem;
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
        border-radius: 50%;
    }

    .stand_basic_chat_wrapper {
        height: 80dvh;
    }

    .stand_basic_chat_wrapper iframe {
        width: 100%;
        height: 100%;
    }

    .stand_basic_wrapper_right_group_item {
        margin-right: 1rem;
    }

    .stand_basic_wrapper_right_group_item.active {
        border-bottom: 3px solid black;
    }

    .stand_basic_wrapper_right_group_item_icon {
        margin-right: .25rem;
    }

    .stand_basic_wrapper_downloads_wrapper_download_button .btn {
        background-color: #FF6E0B;
        color: white;
        border-radius: 16px;
        word-break: keep-all;
    }

    .stand_basic_wrapper_downloads_wrapper_download_text {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        align-items: center;
    }

    .stand_basic_wrapper_downloads_wrapper_download_text_icon {
        margin-right: .5rem;
    }

    .stand_basic_profile_wrapper_section {
        display: flex;
        align-items: baseline;
        flex-direction: row;
        flex-wrap: nowrap;
        /* align-content: flex-start; */
        justify-content: flex-start;
    }

    .stand_basic_profile_wrapper_section_icon {
        margin: .5rem;
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
                <img src="<?= $company_info["companyLogo"] ?>" alt="">
            </div>
            <div class="stand_basic_wrapper_left_link">
                <a target="_blank" href="<?= $company_info["website"] ?>"><?= $company_info["website"] ?></a>
            </div>
            <?php if ($company_info['companyVideo']): ?>
                <div class="stand_basic_wrapper_left_video">
                    <iframe style="border: none; aspect-ratio: 16 / 9;" src="<?= $company_info['companyVideo'] ?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            <?php endif; ?>
            <div class="stand_basic_wrapper_left_biography">
                <?= $company_info['companyBio'] ?>
            </div>
        </div>
        <div class="stand_basic_wrapper_right">
            <div class="list-group list-group-horizontal list-group-flush" id="list-tab" role="tablist">
                <a class="stand_basic_wrapper_right_group_item active" id="list-gallery-list" data-bs-toggle="list"
                    href="#list-gallery" role="tab" aria-controls="list-gallery">
                    <img class="stand_basic_wrapper_right_group_item_icon"
                        src="http://localhost/vanila_1/wp-content/uploads/2023/05/image-gallery.png" alt="">
                    Gallery</a>
                <a class="stand_basic_wrapper_right_group_item" id="list-downloads-list" data-bs-toggle="list"
                    href="#list-downloads" role="tab" aria-controls="list-downloads">
                    <img class="stand_basic_wrapper_right_group_item_icon"
                        src="http://localhost/vanila_1/wp-content/uploads/2023/05/image-gallery.png" alt="">
                    Downloads</a>
                <a class="stand_basic_wrapper_right_group_item" id="list-profile-list" data-bs-toggle="list"
                    href="#list-profile" role="tab" aria-controls="list-profile">
                    <img class="stand_basic_wrapper_right_group_item_icon"
                        src="http://localhost/vanila_1/wp-content/uploads/2023/05/image-gallery.png" alt="">
                    Contact info</a>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-gallery" role="tabpanel"
                    aria-labelledby="list-gallery-list">
                    <div class="stand_basic_wrapper_gallery">
                        <?php
                        foreach ($company_gallery_array as $key => $item): ?>
                            <div class="stand_basic_wrapper_gallery_image">
                                <img src="<?= $item->Value ?>" alt="">
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-downloads" role="tabpanel" aria-labelledby="list-downloads-list">
                    <div class="stand_basic_wrapper_downloads">
                        <div class="stand_basic_wrapper_downloads_wrapper">

                            <?php
                            foreach ($company_documents as $key => $document): ?>
                                <div class="stand_basic_wrapper_downloads_wrapper_download">
                                    <div class="stand_basic_wrapper_downloads_wrapper_download_text">
                                        <img class="stand_basic_wrapper_downloads_wrapper_download_text_icon"
                                            src="http://localhost/vanila_1/wp-content/uploads/2023/05/document.png" alt="">
                                        <?= $document->Caption ?>
                                    </div>
                                    <div class="stand_basic_wrapper_downloads_wrapper_download_button">
                                        <a href="<?= $document->Value ?>" download target="_blank"
                                            class="button btn ">Download</a>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="stand_basic_profile">
                        <div class="stand_basic_profile_wrapper">
                            <div class="stand_basic_profile_wrapper_image">
                                <img src="<?= ($contact_info['Image01'] !== "") ? $contact_info['Image01'] : $avatar ?>"
                                    alt="" srcset="">
                            </div>
                            <?php
                            if ($contact_info['First_Name']):
                                ?>
                                <div class="stand_basic_profile_wrapper_section">
                                    <img class="stand_basic_profile_wrapper_section_icon"
                                        src="http://localhost/vanila_1/wp-content/uploads/2023/05/user.png" alt=""
                                        srcset="">
                                    <?= $contact_info['First_Name'] . " " . $contact_info['Family_Name'] ?>
                                    <hr>
                                </div>
                            <?php endif; ?>
                            <?php if ($contact_info['Mobile']): ?>
                                <div class="stand_basic_profile_wrapper_section">
                                    <img class="stand_basic_profile_wrapper_section_icon"
                                        src="http://localhost/vanila_1/wp-content/uploads/2023/05/user.png" alt=""
                                        srcset="">
                                    <?= $contact_info['Mobile'] ?>
                                    <hr>
                                </div>
                            <?php endif; ?>
                            <?php if ($contact_info['Email']): ?>
                                <div class="stand_basic_profile_wrapper_section">
                                    <img class="stand_basic_profile_wrapper_section_icon"
                                        src="http://localhost/vanila_1/wp-content/uploads/2023/05/user.png" alt=""
                                        srcset="">
                                    <?= $contact_info['Email'] ?>
                                    <hr>
                                </div>
                            <?php endif; ?>
                            <?php if ($contact_info['Biography']): ?>
                                <div class="stand_basic_profile_wrapper_section">
                                    <img class="stand_basic_profile_wrapper_section_icon"
                                        src="http://localhost/vanila_1/wp-content/uploads/2023/05/user.png" alt=""
                                        srcset="">
                                    <?= $contact_info['Biography'] ?>
                                    <hr>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();