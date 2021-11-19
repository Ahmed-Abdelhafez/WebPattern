$(document).ready(function () {
    $('#summernote').summernote({
        height: 200
    });
    const selectAllBoxes = document.querySelector('#selectAllBoxes');
selectAllBoxes.addEventListener('click', () => {
    const boxesArray = document.querySelectorAll('.checkBoxes');
    console.log('clicked')
    selectAllBoxes.toggleAttribute('checked');
    (selectAllBoxes.hasAttribute('checked')) ?
    boxesArray.forEach(box => box.setAttribute('checked', true)): boxesArray.forEach(box => box.removeAttribute('checked'));
});
});





function loadOnlineUsers() {
    $.get("functions.php?onlineUsers=result", function (data) {
        $(".onlineusers").text(data)
        console.log("dsfsdf")
    })
}


setInterval(function () {

    loadOnlineUsers()

},500)