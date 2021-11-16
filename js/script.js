$(document).ready(function () {
    $('#summernote').summernote({
        height: 200
    });
});

const selectAllBoxes = document.querySelector('#selectAllBoxes');
const boxesArray = document.querySelectorAll('.checkBoxes');

selectAllBoxes.addEventListener('click', () => {
    console.log('clicked')
    selectAllBoxes.toggleAttribute('checked');
    (selectAllBoxes.hasAttribute('checked')) ?
    boxesArray.forEach(box => box.setAttribute('checked', true)): boxesArray.forEach(box => box.removeAttribute('checked'));
});