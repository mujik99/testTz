$(document).ready(function () {
    setInterval(
        function(){
            $.ajax({
                type: "POST",
                url: "public/api/getNewPosts",
                data: "",
                success: function(data){
                    var posts = '';
                    for (var i = 0; i < data.posts.length; i++) {
                        var imgPath = '';
                        if (data.posts[i].img_path != '') {
                            imgPath = data.pathToAsset + '/' +data.posts[i].img_path;
                        } else {
                            imgPath = data.pathToAsset + '/no_photo.png';
                        }
                        var post = '<div class="post">' +
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
                }
            });
        }, 5000
    );
});
