$("#preferName").keypress(function(){
    console.log("ley")
})
$.post('/auth/php/teamName.php',{ teamName: $('#preferName').val()}, function(data){
    if(data=='teamNameOK'){
        $("#teamTaken").innerHTML = "This name is taken!"
    }else if(data=='1'){
    }
})