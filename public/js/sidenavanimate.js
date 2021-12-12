console.log('hep')
console.log(document.readyState);
console.log('ready');
let toggleNav = $("#toggle-sidenav");
let arrowIcon = $('#arrow-icon');

//in collapsed

//in full view

// let openNav = $("#open-sidenav");
let sideNav = $("#sidenav");
toggleNav.click(this, function(btn){
    let visible = $(sideNav).attr("data-toggle-val");
    console.log(visible);
    if(visible == 1){
        $(sideNav).css({
            width : "70px",
        });
        $(arrowIcon).animate({
            transform: "rotate(180deg)"
        }, 500)
        $("#navbar-full").hide();
        $("#navbar-collapse").show();
        $("#fulllogo").hide();
        $("#smalllogo").show();
        $("#logoutfull").hide();
        $("#logoutcollapse").show();
        $(sideNav).attr("data-toggle-val", 0)
    }
    else{
        $(sideNav).css({
            width : "20%",
        });
        $(arrowIcon).animate({
            transform: "rotate(0deg)"
        }, 500)
        $("#navbar-collapse").hide();
        $("#navbar-full").show();        
        $("#fulllogo").show();
        $("#smalllogo").hide();
        $("#logoutfull").show();
        $("#logoutcollapse").hide();

        $(sideNav).attr("data-toggle-val", 1)
    }
    
    console.log($(btn).find("i"));
    // $(btn).hide();
    // $(openNav).show();
    // console.log('close');
});
// openNav.click(this,function(btn){
//     console.log(btn)
//     $(btn).hide();
//     $(closeNav).show();
//     $(sideNav).css({
//         width : "20%"
//     });
//     console.log('open');
// });
document.onreadystatechange = function(){
    console.log(document.readyState);
    if(document.readyState == 'complete'){
    }
}