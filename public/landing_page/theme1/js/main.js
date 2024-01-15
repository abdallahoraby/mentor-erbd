$(document).ready(function(){
    $(".menu-open").click(function(){
        $(".navbar").toggleClass("activeNav");
    });
    $(".navbar").click(function(){
        $(this).removeClass("activeNav");
    });
});
