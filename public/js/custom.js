const deletionForms = document.querySelectorAll(".confirmation-form")
deletionForms.forEach(form => {
    form.addEventListener('submit', (event) => {
        response = confirm("Confirm to proceed with action.");
        if (!response) {
            event.preventDefault()
        }
    })
})

const dateInputElements = document.querySelectorAll(".js-update-date")
dateInputElements.forEach(element=>{
    const value = element.getAttribute('value')
    var year = parseInt(value.split(' ')[0].split('-')[0]);
    var month = parseInt(value.split(' ')[0].split('-')[1]);
    var day = parseInt(value.split(' ')[0].split('-')[2]);
    var hour = parseInt(value.split(' ')[1].split(':')[0]);
    var minute = parseInt(value.split(' ')[1].split(':')[1]);
    var second = value.split(' ')[1].split(':')[2];
    var localDatetime = year + "-" +
                      (month < 10 ? "0" + month.toString() : month) + "-" +
                      (day < 10 ? "0" + day.toString() : day) + "T" +
                      (hour < 10 ? "0" + hour.toString() : hour) + ":" +
                      (minute < 10 ? "0" + minute.toString() : minute) +
                      `:${second}`
    element.value = localDatetime;
})