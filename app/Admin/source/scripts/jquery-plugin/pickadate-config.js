$('.datepicker' ).pickadate({
    monthsFull: [ '一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月' ],
    monthsShort: [ '一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二' ],
    weekdaysFull: [ '星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六' ],
    weekdaysShort: [ '日', '一', '二', '三', '四', '五', '六' ],
    format: 'yyyy-mm-dd',
    formatSubmit: 'yyyy-mm-dd',
    monthSelector: true,
    yearSelector: true,
    today: '今日',
    clear: '清空',
});