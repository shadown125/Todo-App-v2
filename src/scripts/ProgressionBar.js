import $ from 'jquery';

export default class ProgressionBar {
    constructor() {
        this.doneCounter = $('.doneCounter').text();
        this.todoCounter = $('.todoCounter').text();
        this.gainExp = $('[data-gained-exp]').text();
        this.expToLvlUp = $('[data-exp-to-lvl-up]').text();
        this.progressedLine = $('.progressed');
        this.progressedExpLine = $('[data-progression-to-lvl-up]');

        this.updateTheProgressionLine();
        this.updateTheProgressionInSettings();
    }

    updateTheProgressionLine() {
        const convertedDoneCounter = Number(this.doneCounter);
        const convertedTodoCounter = Number(this.todoCounter);

        const total = convertedDoneCounter + convertedTodoCounter;
        const percent = convertedDoneCounter * 100 / total;

        this.progressedLine.css('width', `${percent}%`);
    }

    updateTheProgressionInSettings() {
        const convertedExp = Number(this.gainExp);
        const convertedExpToLvlUp = Number(this.expToLvlUp);

        const percent = convertedExp * 100 / convertedExpToLvlUp;

        this.progressedExpLine.css('width', `${percent}%`);
    }
}