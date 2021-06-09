const deletionForms = document.querySelectorAll(".confirmation-form")
deletionForms.forEach(form => {
    form.addEventListener('submit', (event) => {
        response = confirm("Confirm to proceed with action.");
        if (!response) {
            event.preventDefault()
        }
    })
})