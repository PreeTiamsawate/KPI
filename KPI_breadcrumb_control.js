if (!sessionStorage.getItem('track')) {
    var track = [{
        page: "Home",
        url: window.location.href
    }];
} else {
    var track = JSON.parse(sessionStorage.getItem('track'));
    for(let page of track){
        if(page.url ==  window.location.href ){
            console.log(page.url)
            console.log(window.location.href)
            var index = track.indexOf(page);
            track = track.slice(0,index+1)
        }
    }
}
const breadcrumb = document.querySelector('ol.breadcrumb');
for(let page of track){
    breadcrumb.innerHTML += `<li class="breadcrumb-item"><a href=${page.url}>${page.page}</a></li>`
    // breadcrumb.append(list);
}
console.log(index)
console.log(track)

var employeeLinks = document.querySelectorAll('.employee-link');
for (let empLink of employeeLinks) {
    empLink.addEventListener("click", (e) => {
        var linkText = empLink.innerText;
        var linkUrl = empLink.href;
        var nextPage = {
            page: linkText,
            url: linkUrl
        };
        if(linkUrl !=window.location.href)track.push(nextPage);

        sessionStorage.setItem('track', JSON.stringify(track));
        // console.log(JSON.parse(sessionStorage.getItem('track')))
    })
}


