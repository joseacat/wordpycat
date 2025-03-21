wp.domReady(() => {
    wp.blocks.registerBlockStyle('core/spacer', {
        name: 'hidden-mobile',
        label: 'Ocultar móvil'
    });
    wp.blocks.registerBlockStyle('core/spacer', {
        name: 'hidden-desktop',
        label: 'Ocultar escritorio'
    });
});
