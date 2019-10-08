var imageExists = function($imageURL){
    return new Promise( (resolve) =>{
        $.get($imageURL)
        .done(function() { 
            resolve(true);
        }).fail(function() { 
            resolve(false)
        })
    })
}