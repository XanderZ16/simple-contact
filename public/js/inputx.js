let inputs = document.querySelectorAll('.input-box');
inputs.forEach(input => {
    let input_tag = input.querySelector('input');
    let label = input.querySelector('label');
    input_tag.addEventListener('input', function () {
        if (this.value.trim() === '') {
            label.classList.remove('label');
        } else {
            label.classList.add('label');
        }
    })
});