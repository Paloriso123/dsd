function showhide(){
    $( document ).ready(function(){
        $("#singlePost").hide();
        $("#showHideButton").on("click",function(){
            $("#singlePost").show();
            $("#allPosts").hide();
            console.log("funkcia 1");
        });
        $("#link2").on("click",function(){
            $("#allPosts").show();
            $("#singlePost").hide();
            console.log("funkcia 2");
        });
    console.log("WORKING");
    });
}