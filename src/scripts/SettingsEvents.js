import $ from 'jquery'

export default class SettingsEvents {
    constructor() {
        this.settingsContainer = $('[data-settings]');
        this.overviewContainer = $('[data-overview-settings]');
        this.firstNameContainer = $('[data-first-name-container]');
        this.lastNameContainer = $('[data-last-name-container]');
        this.imageContainer = $('[data-image-container]');

        this.firstNameButton = $('[data-first-name]');
        this.lastNameButton = $('[data-last-name]');
        this.imageButton = $('[data-image]')
        this.settingsButtonBack = $('[data-settings-button-back]');
        this.optionBackButton = $('[data-button-back-in-option]');


        this.settingsButtonBack.on('click', this.resetSettings.bind(this));
        this.optionBackButton.on('click', this.goToSettingsOverview.bind(this));
        this.firstNameButton.on('click', this.showFirstNameOption.bind(this));
        this.lastNameButton.on('click', this.showLastNameOption.bind(this));
        this.imageButton.on('click', this.showImageOption.bind(this));
    }

    resetSettings() {
        this.settingsContainer.removeClass('is-active');
        setTimeout(()=> {
            this.overviewContainer.removeClass('is-hide');
            this.firstNameContainer.removeClass('is-active');
            this.lastNameContainer.removeClass('is-active');
            this.imageContainer.removeClass('is-active');
        }, 250);
    }

    goToSettingsOverview() {
        this.settingsContainer.addClass('is-active');
        this.overviewContainer.removeClass('is-hide');
        this.firstNameContainer.removeClass('is-active');
        this.lastNameContainer.removeClass('is-active');
        this.imageContainer.removeClass('is-active');
    }

    showFirstNameOption() {
        this.overviewContainer.addClass('is-hide');
        this.firstNameContainer.addClass('is-active');
    }

    showLastNameOption() {
        this.overviewContainer.addClass('is-hide');
        this.lastNameContainer.addClass('is-active');
    }

    showImageOption() {
        this.overviewContainer.addClass('is-hide');
        this.imageContainer.addClass('is-active');
    }
}