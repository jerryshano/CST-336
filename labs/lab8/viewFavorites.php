<!DOCTYPE html>
<html>
    <head>
        <title>Favorite Pictures</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--<script src="js/favorites.js"></script>-->
        
         <script>
         
       /* global $ */
       
            function displayFavorites(keywordLink){
            //  alert($(keywordLink).html());
               var keyword =   keywordLink.textContent;
            
                $.ajax("api/favoritesAPI.php", {
                    method: "GET",
                    data: {action: "favorites",
                            'keyword': keyword
                    },
                    dataType: "json",
                    success: function(data,status)
                    {
                        $('#images').html("");
                        data.forEach(function(i)
                        {
                        
                            $("#images").append(`<div class='img' style='width:100px;height:100px;background-size: 
                            cover;background-image: url("${i.imageURL}");'></div>`);
                        });//forech
                    }
                });
         }//keywordlink
         
    $(document).ready(function(){
      $.ajax({
        type: "GET",
        url: "api/favoritesAPI.php",
        dataType: "json",
        data: { 'action': "keyword"},
        success: function(data, status) {
            //  alert(data);
            data.forEach(function(l){
                $("#keywrd").append("<a onclick='displayFavorites(this)' href='#'>" + l.keyword + "</a>"); 
               
            });
            // console.log(l.keyword);
        },
       
        });//ajax

    });//docredy
    
  
    
    </script>
        
    </head>
    <body>
    <h1>Favorite Pictures</h1>
    
    <div id="images"></div>
    <div id="keywrd"></div>
    
   

    </body>
</html>