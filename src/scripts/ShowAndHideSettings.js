import $ from 'jquery';

export default class ShowAndHideSettings {
    constructor() {
        this.settingsButton = $('[data-settings-button]');
        this.settingsContainer = $('[data-settings]');
        // this.settingsButtonBack = $('[data-settings-button-back]');

        // this.settingsButtonBack.on('click', this.hide.bind(this));
        this.settingsButton.on('click', this.show.bind(this));
    }

    show() {
        this.settingsContainer.addClass('is-active');
    }
    // hide() {
    //     this.settingsContainer.removeClass('is-active');
    // }
}