$(document).ready(()=> {

    //fetch popular movies
    axios.get("https://api.themoviedb.org/3/movie/popular?api_key=f13549c92bee7e0f31569758e7396edb&language=en-US&page=1")
    .then(response => {
        let movies = response.data.results;
        let output = "";
        $.each(movies, (index,movie)=>{
           output += `
                <div class="col-md-3 movie">
                    <div class="text-center">
                    <img src="https://image.tmdb.org/t/p/w300/${movie.poster_path}" alt="${movie.original_title}"/>
                    <h5 id="movieTitle">${movie.original_title}</h5>
                        <button class="btn btn-primary" onclick= "alert('Please Sign In to Book Movie!')" id="bookMovie">Book</button>
                        <button onclick="movieSelected('${movie.id}')" data-toggle="modal" data-target="#myModal"  class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>
                    </div>
                </div>
                       

            `;
        });
        //insert in html
        $("#movies").html(output);
    })
    .catch(error =>{
        console.log(error);
    });
});

/**
 * home button control, this reloads the browser to retrieve popular movies
 */
$('#Home').click(() => {
    location.reload();
});




/**
 Upcoming movies fetcher on click
 */

$('#upcoming').click(() =>{

$('#movies').html("");

$('.popMovies').text("Upcoming Movies");
//fetch popular movies
axios.get("https://api.themoviedb.org/3/movie/upcoming?api_key=f13549c92bee7e0f31569758e7396edb&language=en-US&page=1")
.then(response => {
    let movies = response.data.results;
    let output = "";
    $.each(movies, (index,movie)=>{
       output += `
            <div class="col-md-3 movie">
                <div class="text-center">
                <img src="https://image.tmdb.org/t/p/w300/${movie.poster_path}" alt="${movie.original_title}"/>
                <h5 id="movieTitle">${movie.original_title}</h5>
                <button class="btn btn-primary" onclick= "alert('Please Sign In to Book Movie!')" id="bookMovie">Book</button>
                <button onclick="movieSelected('${movie.id}')" data-toggle="modal" data-target="#myModal"  class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>

                </div>
            </div>
        `;
    });
    //insert in html
    $("#movies").html(output);
})
.catch(error =>{
    console.log(error);
});

});


/**
 * fetch top rated movies on click;
 */

$('#toprated').click(() =>{
    
$('#movies').html("");

$('.popMovies').text("Top Rated Movies");
//fetch popular movies
axios.get("https://api.themoviedb.org/3/movie/top_rated?api_key=f13549c92bee7e0f31569758e7396edb&language=en-US&page=1")
.then(response => {
    let movies = response.data.results;
    let output = "";
    $.each(movies, (index,movie)=>{
       output += `
            <div class="col-md-3 movie">
                <div class="text-center">
                <img src="https://image.tmdb.org/t/p/w300/${movie.poster_path}" alt="${movie.original_title}"/>
                <h5 id="movieTitle">${movie.original_title}</h5>
                <button class="btn btn-primary" onclick= "alert('Please Sign In to Book Movie!')" id="bookMovie">Book</button>
                <button onclick="movieSelected('${movie.id}')" data-toggle="modal" data-target="#myModal"  class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>

                </div>
            </div>
        `;
    });
    //insert in html
    $("#movies").html(output);
})
.catch(error =>{
    console.log(error);
});
});


/**
 * for signed In users
 */

// $('#getreviews').click(() =>{
    
// });
// $('#ratemovie').click(() =>{
    
// });
// $('#getrecommendations').click(() =>{
    
// });
$('#nowplaying').click(() =>{
       
$('#movies').html("");

$('.popMovies').text("Now Playing");
//fetch popular movies
axios.get("https://api.themoviedb.org/3/movie/now_playing?api_key=f13549c92bee7e0f31569758e7396edb&language=en-US&page=1")
.then(response => {
    let movies = response.data.results;
    let output = "";
    $.each(movies, (index,movie)=>{
       output += `
            <div class="col-md-3 movie">
                <div class="text-center">
                <img src="https://image.tmdb.org/t/p/w300/${movie.poster_path}" alt="${movie.original_title}"/>
                <h5 id="movieTitle">${movie.original_title}</h5>
                <button class="btn btn-primary" onclick= "alert('Please Sign In to Book Movie!')" id="bookMovie">Book</button>
                <button onclick="movieSelected('${movie.id}')" data-toggle="modal" data-target="#myModal"  class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>

                </div>
            </div>
        `;
    });
    //insert in html
    $("#movies").html(output);
})
.catch(error =>{
    console.log(error);
});



/**
 * latest movies fetcher
 */
$('#latest').click(() =>{
    $('#movies').html("");

$('.popMovies').text("Latest Movies");
//fetch popular movies
axios.get("https://api.themoviedb.org/3/movie/latest?api_key=f13549c92bee7e0f31569758e7396edb&language=en-US&page=1")
.then(response => {
    let movies = response.data.results;
    let output = "";
    $.each(movies, (index,movie)=>{
       output += `
            <div class="col-md-3 movie">
                <div class="text-center">
                <img src="https://image.tmdb.org/t/p/w300/${movie.poster_path}" alt="${movie.original_title}"/>
                <h5 id="movieTitle">${movie.original_title}</h5>
                <button class="btn btn-primary" onclick= "alert('Please Sign In to Book Movie!')" id="bookMovie">Book</button>
                <button onclick="movieSelected('${movie.id}')" data-toggle="modal" data-target="#myModal"  class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>

                </div>
            </div>
        `;
    });
    //insert in html
    $("#movies").html(output);
})
.catch(error =>{
    console.log(error);
});
});

/**
 * search control
 */
});
$('#search').click(() =>{
    $('#movies').html("");
    $(".popMovies").text("Search For any Movie");
    let output=`
        <div id="searchForm">
        <input type="text" class="form-control" placeholder="Search Movie Title" id="searchText">
        <button onclick="searchmovie();" class="btn btn-info btn-block" id="searchButton">Search</button>
        </div>
    `;
    $("#movies").html(output);
});

/**
 * 
 * function that searches online for any movie and that displays them in html
 */
function searchmovie(){
    let searchText = $('#searchText').val();
    if(searchText != ""){
    axios.get('https://api.themoviedb.org/3/search/movie?api_key=f13549c92bee7e0f31569758e7396edb&query='+searchText)
    .then(response=>{
        $('#movies').html("");        
        let films = response.data.results;
        let output = "";
        $.each(films, (index,film)=>{
            output += `
            <div class="col-md-3 movie">
                <div class="text-center">
                <img src="https://image.tmdb.org/t/p/w300/${film.poster_path}" alt="${film.original_title}"/>
                <h5 id="movieTitle">${film.original_title}</h5>
                <button class="btn btn-primary" onclick= "alert('Please Sign In to Book Movie!')" id="bookMovie">Book</button>
                <button onclick="movieSelected('${film.id}')" data-toggle="modal" data-target="#myModal"  class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>
                </div>
                </div>
            `;
        });
        $(".popMovies").text("Movie Search Results");
        $("#movies").html(output);
    })
    .catch(error=>{
        console.log(error);
    });
    }
    
}

function movieSelected(movieId){
    axios.get('https://api.themoviedb.org/3/movie/'+movieId +'?api_key=f13549c92bee7e0f31569758e7396edb')
    .then(response=>{
        let film = response.data;

        /** get Genres */
        var genres = "";
        for(let genre of film.genres){
            genres += genre.name;
            genres += ". ";
        }

        /**get production companies */
        var productionCompanies = "";
        for(let company of film.production_companies){
            productionCompanies += company.name;
            productionCompanies += ". ";
        }

                /**get production countries */
                var productionCountries = "";
                for(let country of film.production_countries){
                    productionCountries += country.name;
                    productionCountries += ". ";
                }
/**get spoken languages */
var languages = "";
for(let language of film.spoken_languages){
languages += language.name;
languages += ". ";
}

        let output = `
        <div class="row">
            <div class="col-lg-4">
                <img src="https://image.tmdb.org/t/p/w300/${film.poster_path}" class="thumbnail" />
            </div>
            <div class="col-lg-8">
                <h2>${film.original_title} Movie Details</h2>
                <ul class="list-group">
                <li class="list-group-item"><strong>Adult:</strong> ${film.adult}</li>
                <li class="list-group-item"><strong>budget:</strong> ${film.budget} dollars</li>
                <li class="list-group-item"><strong>Genres:</strong> 
                ${
                    genres
                
                }</li>                 
                <li class="list-group-item"><strong>Homepage:</strong> ${film.homepage}</li> 
                <li class="list-group-item"><strong>Original Language:</strong> ${film.original_language}</li>
                <li class="list-group-item"><strong>Popularity:</strong> ${film.popularity}</li>
                <li class="list-group-item"><strong>Production Company:</strong> ${productionCompanies}</li>
                <li class="list-group-item"><strong>Production Countries:</strong> ${productionCountries}</li>
                <li class="list-group-item"><strong>Status:</strong> ${film.status}</li>
                <li class="list-group-item"><strong>Released:</strong> ${film.release_date}</li>
                <li class="list-group-item"><strong>Revenue:</strong> ${film.revenue} dollars</li>
                <li class="list-group-item"><strong>Runtime:</strong> ${film.runtime} minutes</li>
                <li class="list-group-item"><strong>Spoken Languages:</strong> ${languages}</li>
                <li class="list-group-item"><strong>Overview:</strong> ${film.overview}</li>
                <li class="list-group-item"><strong>Tagline:</strong> ${film.tagline}</li>
                <li class="list-group-item"><strong>Average Vote:</strong> ${film.vote_average}</li>
                
                
                </ul>
            </div>
        </div>
        <hr>    <center>
        <button class="btn btn-primary" onclick= "alert('Please Sign In to Book Movie!')" id="bookMovie">Book</button>
                <a href="https://www.themoviedb.org/movie/${film.id}" target="_blank" class="btn btn-primary">View in theMovieDB</a>
                </center>

    `;


        // $(".modal-title").text(`${film.original_title}`);
        $('.modal-body').html(output);
    })
    .catch(error=>{
        console.log(error);
    });
}

$(".closemodal").click(() => {
    $(".modal-body").html("");
    $("modal-title").text("");
});