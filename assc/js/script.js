$('#showsignup').click(() => {
    $('#login').css({
        display: "none"
    })
    $('#signup').css({
        display: "block"
    })
})
$('#showlogin').click(() => {
    $('#login').css({
        display: "block"
    })
    $('#signup').css({
        display: "none"
    })
})

fetch_books()

function fetch_books() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('book-area').innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "./php/fetch_books.php", true);
    xmlhttp.send();
}

function make_read_dialog_box(book_id, book_name, book_link) {

    var modal_content = '<div id="book_dialog_' + book_id + '" class="user_dialog" title="You are reading : ' + book_name + '">';

    modal_content += '<iframe style="height:450px; width:410px; border: 1px solid #ccc; overflow-y:scroll;margin-bottom:24px; padding:16px;" src = "' + book_link + '" ></iframe >';
    modal_content += '<button type="button" name="' + book_name + '" id="' + book_id + '" data-bookid="' + book_id + '" data-bookname="' + book_name + '" class="btn btn-info d-block book_close">Close</button></div>';

    $('#read-book').html(modal_content);

}


$(document).on('click', '.start_reading', function () {

    var book_id = $(this).data('bookid');
    console.log(book_id)
    var book_name = $(this).data('bookname');
    var book_link = $(this).data('booklink');
    var time_count = 0;

    make_read_dialog_box(book_id, book_name, book_link);
    var clear = setInterval(function () {
        time_count++;
        console.log(time_count)

    }, 1000)

    $('#book_dialog_' + book_id).on('click', '.book_close', function () {
        clearInterval(clear)
        $('#read-book').html('<div>book will be open here</div>');
        submit_read_history(book_id, book_name, time_count)
    })




})


function submit_read_history(book_id, book_name, time_count) {
    console.log(book_id)
    console.log(book_name)
    console.log(time_count)
    var rating = 4
    review = "good book for childrend"
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET', './php/submit_read_history.php?book_id=' + book_id + "&time_count=" + time_count + "&rating=" + rating + "&review=" + review, true)
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            console.log(this.responseText);
        }
    }
    xmlhttp.send();

}
