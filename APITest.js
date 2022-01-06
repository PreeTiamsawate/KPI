fetch('https://wsgw.thaiairways.com/FlightService/600/2022-01-07/LT',{
            method: 'GET',
            mode: 'no-cors',
            headers:{
                // 'Accept': 'application/json',
                // 'Content-Type': 'application/json',
                // 'Access-Control-Allow-Origin': '*',
                Authorization: 'Basic VlhfQk9UX1RPQ0M6U0xLRmRqOzlrdzVhc2YtOGFqNGs1O2FzYXJAKmZhOXM1O2FzbGZrZGFqc2ZkOGFzZGY7'

            }
        }).then(res =>{
            console.log(res)
        })