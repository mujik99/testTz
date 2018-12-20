import Echo from "laravel-echo"

window.io = require('socket.io-client');
if (typeof io !== 'undefined') {
    window.Echo = new Echo({
        broadcaster: 'socket.io',
        host: window.location.hostname + ':6001',
    });
}

window.Echo.channel('postUpdate')
    .listen('GetNewPostsEvent', (data) => {

    let posts = '';
    for (let i = 0; i < data.posts.length; i++) {
        let imgPath = '';
        if (data.posts[i].img_path != '') {
            imgPath =  '/public/img/' +data.posts[i].img_path;
        } else {
            imgPath = '/public/img/no_photo.png';
        }

        let post = '<div class="post">' +
            '<div class="post_title">' +  data.posts[i].post_title +'</div>' +
            '<div class="post_content">' +
                '<div class="post_img"><img src="'+imgPath+'" alt="photo"></div>' +
                '<div class="post_description">'+ data.posts[i].description +'</div>' +
                '<div class="clear"></div>' +
            '</div>' +
            '<div class="post_author">' + data.posts[i].author_name + '</div>' +
            '<div class="post_date">' + data.posts[i].created_at + '</div>' +
            '<div class="clear"></div>' +
            '</div>';
        posts += post;
    }
    $('.posts').html(posts);
});

$(document).ready(function () {
    $('.btn-create').on('click', function () {
        var data = $('.create-post-form').serialize();
        $.ajax({
            type: "POST",
            url: "public/api/createPost",
            data: data,
            success: function(){
                $('.create-post-form').find('input').val('');
            }
        });
    });
});