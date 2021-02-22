<?php
get_header();
?>

<?php
    while(have_posts()) : the_post(); ?>

    <section class="slider">
        <div class="slider__container">
            <?php the_field('slider') ?>
            <div class="wrapper">
                <a href="<?php the_field('cta_link') ?>">
                    <?php the_field('cta_text') ?>
                </a>
            </div>
        </div>
    </section>


    <section class="informations">
        <div class="informations__container">
            <?php
                if( have_rows('informacje_o_firmie') ):
                    while ( have_rows('informacje_o_firmie') ) : the_row(); ?>
                        <div class="informations__box">
                            <div class="informations__title"><div><?php the_sub_field('tytul'); ?></div></div>
                            <img class="informations__image" src="<?php the_sub_field('ikona'); ?>" alt=""/>
                            <div class="informations__desc"><?php the_sub_field('opis'); ?></div>
                        </div>
                    <?php
                    endwhile;

                else :
                    echo '<p>Brak zdefiniowanych bloków. Dodaj je, a następnie odśwież stronę.</p>';
                endif;
            ?>
        </div>
    </section>


    <section class="sekcja-1">
        <div class="sekcja-1__container">
            <?php
            if( have_rows('sekcja_1') ):
                while ( have_rows('sekcja_1') ) : the_row(); ?>
                    <div class="sekcja-1__box">
                        <div class="sekcja-1__image">
                            <?php
                            $image = get_sub_field('obraz');
                            if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                        </div>

                        <div class="sekcja-1__desc">
                            <?php the_sub_field('opis'); ?>
                        </div>
                    </div>
                <?php
                endwhile;

            else :
                echo '<p>Brak zdefiniowanych bloków. Dodaj je, a następnie odśwież stronę.</p>';
            endif;
            ?>
        </div>
    </section>


    <section class="numbers">
        <div class="numbers__container">
            <?php if( have_rows('liczby') ):
                while ( have_rows('liczby') ) : the_row(); ?>
                    <div class="numbers__box">
                        <div class="numbers__number">
                            <?php the_sub_field('liczba'); ?>
                        </div>
                        <div class="numbers__desc">
                            <?php the_sub_field('opis'); ?>
                        </div>
                    </div>
                <?php
                endwhile;

            else :
                echo '<p>Brak zdefiniowanych bloków. Dodaj je, a następnie odśwież stronę.</p>';
            endif; ?>
        </div>
    </section>


    <section class="operate">
        <div class="operate__container">
            <div class="operate__desc">
                <?php the_field('opis_jak_dzialamy') ?>

            </div>
            <div class="operate__image">
                <?php
                $image = get_field('obraz_jak_dzialamy');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="offers">
        <div class="offers__title">
            <?php the_field('tytul') ?>
        </div>

        <div class="offers__tablature">
            <?php
            $count = 0;
            if( have_rows('usluga') ):
                while ( have_rows('usluga') ) : the_row(); ?>

                    <div class="offer <?php if($count == 0) : ?>active<?php endif; ?>">
                        <div class="wrapper">
                            <div class="offer__icon">
                                <?php
                                $image = get_sub_field('ikona');
                                if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['url']); ?>" />
                                <?php
                                endif;
                                ?>
                            </div>
                            <div class="offer__title">
                                <?php the_sub_field('tytul'); ?>
                            </div>
                        </div>

                        <div class="offers__content">
                            <div class="offers__desc">
                                <?php the_sub_field('opis'); ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    $count++;
                endwhile;

            else :
                echo '<p>Brak zdefiniowanych bloków. Dodaj je, a następnie odśwież stronę.</p>';
            endif; ?>
        </div>
        <div class="content__tablature">

        </div>
    </section>


    <section class="kontakt">
        <div class="kontakt__container">
            <div class="kontakt__title">
                <?php the_field('tytul_kontakt') ?>
            </div>
            <div class="kontakt__button">
                <a href="tel:<?php the_field('numer_telefonu') ?>"><?php the_field('numer_telefonu') ?></a>
            </div>
        </div>
    </section>


    <section class="doctors">
        <div class="doctors__desc">
            <?php the_field('opis_lekarze') ?>
        </div>
        <div class="doctors__container">
            <?php if( have_rows('lekarze') ):
                while ( have_rows('lekarze') ) : the_row(); ?>
                    <div class="doctor">
                        <div class="doctor__image">
                            <?php
                            $image = get_sub_field('obraz');
                            if( !empty( $image ) ): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="doctor__grade">
                            <?php the_sub_field('stopien'); ?>
                        </div>
                    </div>
                <?php
                endwhile;

            else :
                echo '<p>Brak zdefiniowanych bloków. Dodaj je, a następnie odśwież stronę.</p>';
            endif; ?>
        </div>
    </section>


    <section class="form-contact">
        <div class="form-contact__container">
            <div class="form-contact__title">
                <?php the_field('naglowek') ?>
            </div>

            <div class="form">
                <?php $contact_form = get_field('formularz_kontaktowy') ?>
                <?php echo do_shortcode($contact_form);?>
            </div>
        </div>
    </section>

<?php
    endwhile; // End of the loop. ?>

<?php
get_footer(); ?>
