setTimeout(function () { // this works like charm
  
    // Closing the alert 
    // $('#alert').popover('show')
    // $('#alert').fadeOut("slow"); // removes one in fade but second remains (if two msgs appaer - create post page)
    $('#alert').alert('close'); //removes 2 errors-alerts
}, 3000); 
//Kraj Auto alert poruka

// on top button
var top = document.getElementById('onTop');

function goToTop(){

    top.scrollTo({ // auto scroll on top of page
        top: 0,
        behavior: "smooth"
    });
}
