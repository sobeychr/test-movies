const getDateStr = (timestamp=-1) => {
    if(timestamp === -1) {
        timestamp = new Date().getTime();
    }
    var date = new Date(timestamp);

    return [
        date.getFullYear(),
        date.getMonths(),
        date.getDate(),
    ].join('-') + ' ' + [
        date.getHours(),
        date.getMinutes(),
        date.getSeconds(),
    ].join(':')
}
