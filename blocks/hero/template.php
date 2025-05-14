<?php
$id                 = 'hero-' . $block['id'];
$align_class        = $block['align'] ? 'align' . $block['align'] : '';
$clases             = isset($block['className']) ? $block['className'] : '';
$bg_desktop         = get_field('field_background_desktop');
$bg_mobile          = get_field('field_background_mobile');
$bg                 = wp_is_mobile() ? get_field('background-mobile') : get_field('background-desktop');
?>
<section id="<?php echo esc_attr($id); ?>" class="block-hero <?php echo esc_attr($align_class); ?> <?php echo esc_attr($clases); ?>" style="background-image: url('<?php echo esc_url(wp_get_attachment_url( $bg )); ?>')">
    <div class="inner-hero">
        <InnerBlocks />
    </div>
</section>