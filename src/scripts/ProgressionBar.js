import $ from 'jquery';

export default class ProgressionBar {
    constructor() {
        this.doneCounter = $('.doneCounter').text();
        this.todoCounter = $('.todoCounter').text();
        this.progressedLine = $('.progressed');

        this.updateTheProgressionLine();
    }

    updateTheProgressionLine() {
        const convertedDoneCounter = Number(this.doneCounter);
        const convertedTodoCounter = Number(this.todoCounter);

        const total = convertedDoneCounter + convertedTodoCounter;
        const percent = convertedDoneCounter * 100 / total;

        this.progressedLine.css('width', `${percent}%`);
    }
}