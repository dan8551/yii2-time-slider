/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function TimeSlider(range, min, max, step, values, timeId, sliderId, callback) {
    this.range = range
    this.min = min;
    this.max = max;
    this.step = step;
    this.values = values;
    this.timeId = timeId;
    this.sliderId = sliderId;
    this.callback = callback;
    return this;
}

TimeSlider.prototype.slider = function() {
    var parent = this;
    $(this.sliderId).slider({
        range: this.range,
        min: this.min,
        max: this.max,
        step: this.step,
        values: [this.values],
        slide: async function (e, ui) {
            var hours1 = Math.floor(ui.values[0] / 60);
            var minutes1 = ui.values[0] - (hours1 * 60);

            if (hours1.length == 1) hours1 = '0' + hours1;
            if (minutes1.length == 1) minutes1 = '0' + minutes1;
            if (minutes1 == 0) minutes1 = '00';
            if (hours1 >= 12) {
                if (hours1 == 12) {
                    hours1 = hours1;
                    minutes1 = minutes1 + " PM";
                } else {
                    hours1 = hours1 - 12;
                    minutes1 = minutes1 + " PM";
                }
            } else {
                hours1 = hours1;
                minutes1 = minutes1 + " AM";
            }
            if (hours1 == 0) {
                hours1 = 12;
                minutes1 = minutes1;
            }
            
            $(parent.timeId).html(hours1 + ':' + minutes1);
            parent.callback(hours1, minutes1);
        }
    });
}


