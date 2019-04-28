// $(function()
// {
//     $.ajax("api/favoritesAPI.php", {
//         method: "GET",
//         data: {action: "favorites"},
//         dataType: "json",
//         success: function(result)
//         {
//             for (let data of result)
//             {
//                 $("#images").append(`<div class='img' style='width:100vw;height:200px;background-size: 
//                 cover;background-image: url("${data.imageURL}");'></div>`);
//             }
//         }
//     });
    
    
//      $.ajax("api/favoritesAPI.php", {
//         method: "GET",
//         data: {action: "keyword"},
//         dataType: "json",
//         success: function(result)
//         {
//             for (let data of result)
//             {
//                 $("#keywrd").append(result.keyword);
//             }
//         }
//     });
// });