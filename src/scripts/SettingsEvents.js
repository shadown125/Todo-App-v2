import $ from 'jquery'

export default class SettingsEvents {
    constructor() {
        this.settingsContainer = $('[data-settings]');
        this.overviewContainer = $('[data-overview-settings]');
        this.nameContainer = $('[data-name-container]');
        this.passwordContainer = $('[data-password-container]');
        this.imageContainer = $('[data-image-container]');
        this.deleteContainer = $('[data-delete-container]');

        this.nameButton = $('[data-name]');
        this.imageButton = $('[data-image]');
        this.passwordButton = $('[data-password]');
        this.deleteButton = $('[data-delete]');
        this.settingsButtonBack = $('[data-settings-button-back]');
        this.optionBackButton = $('[data-button-back-in-option]');


        this.settingsButtonBack.on('click', this.resetSettings.bind(this));
        this.optionBackButton.on('click', this.goToSettingsOverview.bind(this));
        this.nameButton.on('click', this.showNameOption.bind(this));
        this.imageButton.on('click', this.showImageOption.bind(this));
        this.passwordButton.on('click', this.showPasswordOption.bind(this));
        this.deleteButton.on('click', this.showDeletePopup.bind(this));
    }

    resetSettings() {
        this.settingsContainer.removeClass('is-active');
        setTimeout(()=> {
            this.overviewContainer.removeClass('is-hide');
            this.nameContainer.removeClass('is-active');
            this.passwordContainer.removeClass('is-active');
            this.imageContainer.removeClass('is-active');
            this.deleteContainer.removeClass('is-active');
        }, 250);
    }

    goToSettingsOverview() {
        this.settingsContainer.addClass('is-active');
        this.overviewContainer.removeClass('is-hide');
        this.nameContainer.removeClass('is-active');
        this.passwordContainer.removeClass('is-active');
        this.imageContainer.removeClass('is-active');
        this.deleteContainer.removeClass('is-active');
    }

    showNameOption() {
        this.overviewContainer.addClass('is-hide');
        this.nameContainer.addClass('is-active');
    }

    showPasswordOption() {
        this.overviewContainer.addClass('is-hide');
        this.passwordContainer.addClass('is-active');
    }

    showImageOption() {
        this.overviewContainer.addClass('is-hide');
        this.imageContainer.addClass('is-active');
    }

    showDeletePopup() {
        this.overviewContainer.addClass('is-hide');
        this.deleteContainer.addClass('is-active');
    }
}