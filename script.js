$(document).ready(function() {

    $("#fav").on("click", function() {
        
    const obraz = $(this);
    $.post("changeFav.php", { idDzbana: "'" + obraz.data("dzban") + "'"}, function(data) {
    if (data == "1") {
        obraz.attr('src','img/favourite/fav1.png');
    }
    if(data == "0"){
        obraz.attr('src','img/favourite/fav0.png');
    }
    });

    });

    });
