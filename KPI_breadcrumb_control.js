window.onload  = ()=>{
    const breadcrumb = document.querySelector('ol.breadcrumb');

    if (!sessionStorage.getItem('track')) {
        var track = [{
            page: "Home",
            url: window.location.href
        }];
        const ran = Math.random();
        console.log("in if"+String(ran));
    } else {
        var track = JSON.parse(sessionStorage.getItem('track'));
        console.log("in else");
        for(let page of track){
            console.log(page.url)
            console.log(window.location.href)
            console.log("=================================")
            if(page.url ==  window.location.href ){
                var index = track.indexOf(page);
                track = track.slice(0,index+1)
            }
        }
    }
  
    for(let page of track){
        breadcrumb.innerHTML += `<li class="breadcrumb-item"><a href=${page.url}>${page.page}</a></li>`
        // breadcrumb.append(list);
    }
    
    console.log(sessionStorage.getItem('track'))
    console.log(track)
    
    var employeeLinks = document.querySelectorAll('.employee-link');
    for (let empLink of employeeLinks) {
        empLink.addEventListener("click", (e) => {
            var linkText = empLink.parentElement.parentElement.querySelector('.FUNCTION').innerText;
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
}
const currentHash = location.hash
window.addEventListener('hashchange', function() {
    if (location.hash.length < currentHash.length){
        track.slice(-1);
        sessionStorage.setItem('track', JSON.stringify(track));
    }
}, false);



