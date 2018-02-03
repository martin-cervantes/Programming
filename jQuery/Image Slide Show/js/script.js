$(function(){
    var galleryImage = $(".gallery").find("img").first();

    var images =[
        "images/laptop-mobile_small.jpg",
        "images/laptop-on-table_small.jpg",
        "images/people-office-group-team_small.jpg",
    ];

    var i = 0;

    setInterval(function(){
        i = (i + 1) % images.length;
        galleryImage.fadeOut(function(){
            $(this).attr("src", images[i]);
            $(this).fadeIn(2000);
        });
        console.log(galleryImage.attr("src"));
    }, 3000);
});
