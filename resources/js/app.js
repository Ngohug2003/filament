import Pickr from '@simonwep/pickr'

window.initPickr = function (selector, initialColor, onChangeCallback) {
    const colorStr = typeof initialColor === 'string' ? initialColor : '#000000';

    const pickr = Pickr.create({
        el: selector,
        theme: 'classic',
        default: colorStr,
        components: {
            preview: true,
            opacity: true,
            hue: true,
            interaction: {
                hex: true,
                rgba: true,
                input: true,
                clear: true,
                save: true,
            },
        },
    });

    pickr.on('save', (color) => {
        const hex = color.toHEXA().toString();
        onChangeCallback(hex);
        pickr.hide();
    });
}
