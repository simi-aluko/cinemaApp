var page = 1;
$(document).ready(()=> {
    $('#moreMovies').show();
    //fetch popular movies
    axios.get("https://api.themoviedb.org/3/movie/upcoming?api_key=f13549c92bee7e0f31569758e7396edb&language=en-US&page="+ page)
    .then(response => {
        let movies = response.data.results;
        let output = "";
        $.each(movies, (index,movie)=>{
           output += `
                <div class="col-md-3 movie">
                    <div class="text-center">
                    <img src="https://image.tmdb.org/t/p/w300/${movie.poster_path}" alt="${movie.original_title}"/>
                    <h5 id="movieTitle">${movie.original_title}</h5>
                        <button class="btn btn-primary" onclick="moviePrice('${movie.vote_average}','https://image.tmdb.org/t/p/w300/${movie.poster_path}','${movie.original_title}')" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modelId"  id="bookMovie">Book</button>
                        <button onclick="movieSelected('${movie.id}')" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal"  class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>
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
 * home button control
 */
$('#Home').click(() => {
    $('#movies').html("");
    $('#moreMovies').show();

    $('.popMovies').text("Showing In Cinemas");
    
    axios.get("https://api.themoviedb.org/3/movie/upcoming?api_key=f13549c92bee7e0f31569758e7396edb&language=en-US&page="+page)
    .then(response => {
        let movies = response.data.results;
        let output = "";
        $.each(movies, (index,movie)=>{
           output += `
                <div class="col-md-3 movie">
                    <div class="text-center">
                    <img src="https://image.tmdb.org/t/p/w300/${movie.poster_path}" alt="${movie.original_title}"/>
                    <h5 id="movieTitle">${movie.original_title}</h5>
                    <button class="btn btn-primary" onclick="moviePrice('${movie.vote_average}','https://image.tmdb.org/t/p/w300/${movie.poster_path}','${movie.original_title}')" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modelId" id="bookMovie">Book</button>
                    <button onclick="movieSelected('${movie.id}')" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal"  class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>
    
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
 Upcoming movies fetcher on click
 */

$('#popular').click(() =>{
    $('#moreMovies').show();
$('#movies').html("");

$('.popMovies').text("Popular Movies");
//fetch popular movies
axios.get("https://api.themoviedb.org/3/movie/popular?api_key=f13549c92bee7e0f31569758e7396edb&language=en-US&page="+page)
.then(response => {
    let movies = response.data.results;
    let output = "";
    $.each(movies, (index,movie)=>{
       output += `
            <div class="col-md-3 movie">
                <div class="text-center">
                <img src="https://image.tmdb.org/t/p/w300/${movie.poster_path}" alt="${movie.original_title}"/>
                <h5 id="movieTitle">${movie.original_title}</h5>
                <button class="btn btn-primary" onclick="moviePrice('${movie.vote_average}','https://image.tmdb.org/t/p/w300/${movie.poster_path}','${movie.original_title}')" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modelId"  id="bookMovie">Book</button>
                <button onclick="movieSelected('${movie.id}')" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal" class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>

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
    $('#moreMovies').show();
    
$('#movies').html("");

$('.popMovies').text("Top Rated Movies");
//fetch popular movies
axios.get("https://api.themoviedb.org/3/movie/top_rated?api_key=f13549c92bee7e0f31569758e7396edb&language=en-US&page="+page)
.then(response => {
    let movies = response.data.results;
    let output = "";
    $.each(movies, (index,movie)=>{
       output += `
            <div class="col-md-3 movie">
                <div class="text-center">
                <img src="https://image.tmdb.org/t/p/w300/${movie.poster_path}" alt="${movie.original_title}"/>
                <h5 id="movieTitle">${movie.original_title}</h5>
                <button class="btn btn-primary" onclick="moviePrice('${movie.vote_average}','https://image.tmdb.org/t/p/w300/${movie.poster_path}','${movie.original_title}')" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modelId" id="bookMovie">Book</button> 
                <button onclick="movieSelected('${movie.id}')" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal"  class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>

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


$('#nowplaying').click(() =>{
$('#moreMovies').show();
       
$('#movies').html("");

$('.popMovies').text("Now Playing");
//fetch popular movies
axios.get("https://api.themoviedb.org/3/movie/now_playing?api_key=f13549c92bee7e0f31569758e7396edb&language=en-US&page="+page)
.then(response => {
    let movies = response.data.results;
    let output = "";
    $.each(movies, (index,movie)=>{
       output += `
            <div class="col-md-3 movie">
                <div class="text-center">
                <img src="https://image.tmdb.org/t/p/w300/${movie.poster_path}" alt="${movie.original_title}"/>
                <h5 id="movieTitle">${movie.original_title}</h5>
                <button class="btn btn-primary" onclick="moviePrice('${movie.vote_average}','https://image.tmdb.org/t/p/w300/${movie.poster_path}','${movie.original_title}')" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modelId" id="bookMovie">Book</button>
                <button onclick="movieSelected('${movie.id}')" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal"  class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>

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
 * search control
 */
});
$('#search').click(() =>{
    $('#moreMovies').hide();    
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
                <button class="btn btn-primary" onclick="moviePrice('${film.vote_average}','https://image.tmdb.org/t/p/w300/${film.poster_path}','${film.original_title}')" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modelId" id="bookMovie">Book</button>
                <button onclick="movieSelected('${film.id}')" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal"  class="btn btn-primary" id="movieDetails" href="#">Movie Details</button>
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
                <a href="https://www.themoviedb.org/movie/${film.id}" target="_blank" id="preview" class="btn btn-primary btn-block">Preview in theMoviedb.org</a>
                </center>

    `;


        // $(".modal-title").text(`${film.original_title}`);
        $('#movieDetailsModal').html(output);
    })
    .catch(error=>{
        console.log(error);
    });
}

$(".closemodal").click(() => {
    $("#movieDetailsModal").html("");
});

$('#signIn').click(()=>{
    alert("You have just logged out.")
    window.location = "../cinemaApp/php/logout.php";
});

function moviePrice(rating,poster_path,movieTitle){
    var price;
    if(rating < 5){
        price = "Two Thousand Naira(N2,000)";
    }else if(rating < 7){
        price = "Two Thousand and Five Hundred Naira(N2,500)";
    }else{
        price = "Three thousand Naira(N3,000)";
    }

    var picture = `
    <img src="${poster_path}" />
    `;
    var bookingInfo = `
        <ul class="list-group">
            <li class="list-group-item"><strong>Movie: </strong>${movieTitle}</li>
            <li class="list-group-item" id=""><strong>Price: </strong>${price}</li>
            <li class="list-group-item">
                <label><strong>Number of Tickets</strong></label>
                <select class="form-control" id="ticketNumber">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>                    
                </select>
            </li>
        </ul><br>
        <a id="purchaseMovie" onclick="purchaseMovie('${movieTitle}','${price}')" class="btn btn-lg btn-success btn-block">Book Movie</a>
    `;
    $('#price').html(bookingInfo);
    $('#picture').html(picture);
}

function purchaseMovie(movieTitle,price){

    let ticketNumber = $('#ticketNumber').val();
    let seeingDay = $('#viewingDay').val();
    let timeOfDay = $('#timeOfDay').val();
    let cinemaLocation = $('#cinemaLocation').val();
    var TotalAmt = "";

    if(price == "Two Thousand Naira(N2,000)"){
        TotalAmt = (2000 * ticketNumber);
    }else if(price == "Two Thousand and Five Hundred Naira(N2,500)"){
        TotalAmt = (2500 * ticketNumber);
    }else if(price == "Three thousand Naira(N3,000)"){
        TotalAmt = (3000 * ticketNumber);
    }

    $.ajax({
        url:'../cinemaApp/php/api.php',
        data: {movieTitle:movieTitle,price:TotalAmt,purchaseMovie:"Book this Movie",
        ticketnumber:ticketNumber,seeingDay:seeingDay,timeOfDay:timeOfDay,cinemaLocation:cinemaLocation},
        type: 'post',
        success: (data)=>{
            alert(data);
            location.reload();
        }
    });
}


$('#moreMovies').click(()=>{
    page++;
    if($('#sectionTitle').text() == "Showing In Cinemas"){
        $('#showingInCinemas').click();
    }

    if($('.popMovies').text() == "Popular Movies"){
        $('#popular').click();
    }

    if($('.popMovies').text() == "Top Rated Movies"){
        $('#nowPlaying').click();
    }

    if($('.popMovies').text() == "Now Playing"){
        $('#topRated').click();
    }
});