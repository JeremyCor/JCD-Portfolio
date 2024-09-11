<?php
get_header(); ?>

<div class="container-fullwidth" id="single-projet">
    <!-- Afficher le titre du projet -->
    <h1><?php the_title(); ?></h1>

    <!-- Afficher le sous-titre -->
    <h2 class="soustitre"><?php the_field('sous_titre'); ?></h2>

    <!-- Afficher le bouton de détails -->
    <div class="button-container">
    <a href="#textes" class="details-button">
        Voir les détails <i class="fas fa-arrow-down"></i>
    </a>
</div>

    <!-- Afficher l'image -->
    <div class="affichage_image">
        <?php 
        $image_id = get_field('image');
        if( $image_id ): 
            $image_url = wp_get_attachment_image_url( $image_id, 'full' ); ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="Image du projet" />
        <?php endif; ?>
    </div>

    <!-- Texte avec les sections problème et solution -->
    <div id="textes" class="textes-container">
        <div class="texte-box">
            <h3 class="soustitre">La consigne :</h3>
            <?php the_field('texte_probleme'); ?>
        </div>
        <div class="texte-box">
            <h3 class="soustitre">Ma contribution :</h3>
            <?php the_field('texte_solution'); ?>
        </div>
    </div>

    <?php
            // Récupérer les projets précédent et suivant
            $prev_post = get_previous_post();
            $next_post = get_next_post();
        ?>

        <div class="navigation-container">
            <!-- Projet précédent -->
            <?php if ( !empty($prev_post) ): ?>
            <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-button prev-projet">
                <i class="fas fa-arrow-left"></i> <?php echo get_the_title($prev_post->ID); ?>
            </a>
            <?php endif; ?>

            <!-- Projet suivant -->
            <?php if ( !empty($next_post) ): ?>
            <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-button next-projet">
                <?php echo get_the_title($next_post->ID); ?> <i class="fas fa-arrow-right"></i>
            </a>
            <?php endif; ?>
        </div>

<?php get_footer(); ?>
