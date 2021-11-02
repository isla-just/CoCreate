$(document).ready(function(){


        //onclick like function
        $(".up").on("click", function(){
            // console.log("up clicked")
            //get the current count set in the p tag of the div as a integer
            var currentCount = parseInt($(this).children("p").text()); 

            // console.log(currentCount);

            //get the id of the answer that was clicked on with the data attr
            var answerId = $(this).data("id");
            // console.log(answerId);

            //getting the id of the qurestion
            var questionId = $(".picture-input").data("id");
            // console.log(questionId);

            //perform AJAX
            $.ajax({
                url: "/question/"+questionId,
                type: "POST",
                data: { id: answerId, type:"up" },
                dataType: "text",
                async: true,
                
    
                success: function(data, status) {
                    console.log(data);
                    //TODO: - update the UI if successful
                    $(this).children("p").text(data);
                },
                error: function(xhr, textStatus, errorThrown) {
                    // alert('ajax request failed');
                }
            });
    
            //update the UI after ajax done - even though error happened
            $(this).children("p").text(currentCount + 1);
        });


        //downvotes

            //onclick like function
            $(".down").on("click", function(){
                // console.log("up clicked")
                //get the current count set in the p tag of the div as a integer
                var currentCount = parseInt($(this).children("p").text()); 
    
                //get the id of the answer that was clicked on with the data attr
                var answerId2 = $(this).data("id");
    
                //getting the id of the qurestion
                var questionId2 = $(".picture-input").data("id");
                // console.log(questionId);
    
                //perform AJAX
                $.ajax({
                    url: "/question/"+questionId2,
                    type: "POST",
                    data: { id: answerId2, type:"down" },
                    dataType: "text",
                    async: true,
        
                    success: function(data) {
                        console.log(data);
                        $(this).children("p").text(data);
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // alert('ajax request failed');
                    }
                });
        
                // //update the UI after ajax done - even though error happened
                $(this).children("p").text(currentCount + 1);
            });

});