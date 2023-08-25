import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import intersect from '@alpinejs/intersect';
window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.plugin(intersect);

Alpine.store('darkMode', {
    on: false,
    toggle() {
        this.on = ! this.on;
    }
});

Alpine.store('overflow', {
    hidden: false,
    toggle() {
        this.hidden = ! this.hidden;
    }
})

Alpine.start();
