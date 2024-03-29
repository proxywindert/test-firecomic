const period = [
    { 'key': 1, 'start': '00:00', 'end': '05:59' },
    { 'key': 2, 'start': '06:00', 'end': '11:59' },
    { 'key': 3, 'start': '12:00', 'end': '17:59' },
    { 'key': 4, 'start': '18:00', 'end': '23:59' },
];
const KEY_COOKIE_SHORT_LINK = 'KEY_COOKIE_SHORT_LINK'
const KEY_COOKIE_SHORT_LINK_2 = 'KEY_COOKIE_SHORT_LINK_2'

function isCurrentTimeInPeriods() {
    const currentTime = new Date();
    const currentHour = currentTime.getHours();
    const currentMinutes = currentTime.getMinutes();
    const currentFormattedTime = `${currentHour}:${currentMinutes > 9 ? currentMinutes : '0' + currentMinutes}`;

    for (const p of period) {
        if (currentFormattedTime >= p.start && currentFormattedTime <= p.end) {
            return p.key;
        }
    }

    return null;
}

setCookie(KEY_COOKIE_SHORT_LINK, 'KEY_COOKIE_SHORT_LINK', 10)
if (getCookie(KEY_COOKIE_SHORT_LINK)) {
    $("#short_link_1").attr("disabled", true);
}