import $ from 'jquery';

export default class ToggleAsideNavigation {
    constructor() {
        this.asideNavigation = $('.aside-navigation');
        this.asideNavigationAnchors = $('.main-navigation li a');
        this.buttonMenu = $('.button-menu');
        this.divBlur = $('.blur');

        this.buttonMenu.on('click', this.toggleAside.bind(this));
        this.divBlur.on('click', this.hideAsideWhileClickingOutside.bind(this));
        this.asideNavigationAnchors.on('click', this.hideAsideNavigationAndBlurWhileClickAnchor.bind(this));
    }
    toggleAside() {
        if(!this.asideNavigation.hasClass('is-active')) {
            this.asideNavigation.addClass('flex').outerWidth();
            this.asideNavigation.addClass('is-active');
            this.divBlur.addClass('background-blur');
        }
    }

    hideAsideWhileClickingOutside() {
        this.asideNavigation.removeClass('is-active').removeClass('flex');
        this.divBlur.removeClass('background-blur');
    }

    hideAsideNavigationAndBlurWhileClickAnchor() {
        this.hideAsideWhileClickingOutside();
    }
}