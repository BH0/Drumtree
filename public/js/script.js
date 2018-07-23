/// Style Drum-items Depending on their Bookmark Status 
document.querySelectorAll("article").forEach((element, index) => { 
    if (element.querySelector("a").innerText != "bookmark") { 
        element.querySelector("a").innerText = 'bookmarked';  
        element.querySelector("a").parentNode.style.cssText = "border:2px solid green;"; // should probably "attatch" an "is-bookmarked" class 
    } else { 
        element.querySelector("a").innerText = 'bookmark';  
        element.querySelector("a").parentNode.style.cssText = "border:0;"; // remove "is-bookmark" class [assuming one exists] 
    }
}); 


let drumId; 
$('.bookmark').on('click', event => {
    event.preventDefault();
    drumId = event.target.parentNode.dataset['drumid'];
    $.ajax({
        method: 'POST',
        url: urlBookmark,
        data: {isBookmark: 'true', drumId: drumId, _token: token}
    }).done( () => {
        if (event.target.innerText == 'bookmarked') { 
            event.target.innerText = 'bookmark';  
            event.target.parentNode.style.cssText = "border:0;";                 
        } else { 
            event.target.innerText = 'bookmarked';  
            event.target.parentNode.style.cssText = "border:2px solid green;"; 
        } 
    }).fail(error => { 
        console.log(error); 
    });
}); 
