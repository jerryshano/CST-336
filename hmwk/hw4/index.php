<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title> </title>
          
        <script>
        
        $(document).ready(function(){
        
        let placeholderArray = [];
        
        // $.ajax({
        //     type: "GET",
        //     url: "https://api.themoviedb.org/3/search/movie",
        //     dataType: "json",
        //     data: { "query": 'robin',
        //             "api_key": "22cfd89bd53a16898cdcf7cc2e563bc8"
        //     },
        //     success: function(data,status) {
        //     data.results.forEach(function(movieSearch){
        //         let temp = {};
        //         temp["title"] = movieSearch.title;
        //         temp["poster_path"] = "https://image.tmdb.org/t/p/w500" + movieSearch.poster_path;
        //         temp["vote_average"] = movieSearch.vote_average;
        //         temp["release_date"] = movieSearch.release_date;
        //         placeholderArray.push(temp);
                
        //       // console.log(placeholderArray);
                         
        //     });//function
            
        //  $.ajax({
        //     type: "POST",
        //     url: "api/insertAPI.php",
        //     dataType: "json",
        //     data: { "list": placeholderArray},
            
        //     success: function(data,status) {
            
        //     }
        // });
        // },
        //     complete: function(data,status) { //optional, used for debugging purposes
        //     //alert(status);
        //     }
        // });//ajax
        
         $("#searchButton").on("click", function(){
                $.ajax({
                    type: "GET",
                    url: "api/dbSearch.php",
                    dataType: "json",
                    data: {                        

                        "text": $("#text").val()              
                        },
                    success: function(data,status) {
                        // alert(data);
                    $("#results").html("<h3> Movies Found </h3>");
                    data.forEach(function(key){
                        $("#results").append("<a href='#' class='historyLink' id='" +
                                                key['movieId'] + "'>History</a> ");
                        
                        $("#results").append("Title: " + key['title'] + " Average Vote: " + key['averageVote'] + " " +
                            " Release Date: " + key['releaseDate'] + " movie id " +  key['movieId'] + "<br>" );
                                      
                        });//forEach(function(key)
                    
                    },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
                });//ajax      
            });//End #searchForm  
        
         $(document).on('click', '.historyLink', function(){ 
             
                $('#purchaseHistoryModal').modal("show"); 
                $.ajax({
                    type: "GET",
                    url: "api/getMovie.php",
                    dataType: "json",
                    data: { "movieId": $(this).attr("id")},
                    success: function(data,status){  
                        
                    if (data.length != 0){
                        $("#history").html("");
                        $("#history").append(data[0]['title'] + "<br />");
                        $("#history").append("<img src='" + data[0]['poster'] + "' width='200' /> <br");
                        
                            $("#history").append("Release Date: " + data[0]['releaseDate'] + "<br />");
                            $("#history").append("Vote Average: " + data[0]['averageVote'] + "<br />");
                      
                     }else{
                         $("#history").html("No movie history for this title.");
                    }//else                  
                    },                  
                });//ajax                
            });//historyLink                         
    });     
        </script>
         </head>
    <body> 
         
        <div class="container-fluid">
          <h1> SuperHero Internet Movie DataBase </h1>
        
        <input type="text" name="text" id = "text"/>
        <br>
        <button id = "searchButton">Search</button>
        </div>
        
        <div id = "results"></div>
        
        
   <!-- Modal -->
        <div class="modal fade" id="purchaseHistoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Movie Results</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
              <div class="modal-body">
                  <div id="history"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

    </body>
</html>