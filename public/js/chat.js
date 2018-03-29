var $messages = $('.messages-content'),
    d, h, m,
    i = 0;

$(window).load(function() {
    $messages.mCustomScrollbar();
});


function updateScrollbar() {
    $(".messages-content").scrollTop($(".messages-content")[0].scrollHeight);
}

function insertMessage() {
    msg = $('.message-input').val();
    if ($.trim(msg) == '') {
        return false;
    }
    ajaxLoad(msg);

    $('<div class="message message-personal">' + msg + '</div>').appendTo($('.mCSB_container')).addClass('new');
    $('.message-input').val(null);
    updateScrollbar();
}

$('.message-submit').click(function() {
    insertMessage();
});

$(window).on('keydown', function(e) {
    if (e.which == 13) {
        insertMessage();
        return false;
    }
})

$('.button').click(function(){
    $('.menu .items span').toggleClass('active');
    $('.menu .button').toggleClass('active');
});

//console.log($('#chatbot-input').text());
$('#chatbot-input2').bind("enterKey",function(e){
    var newInput = $('#chatbot-input').val();
    $('#chatbot-input').val('');
    $('#chatbot-box').append(newInput);
    console.log(newInput);
    ajaxLoad(newInput);

});
$('#chatbot-input2').keyup(function(e){
    if(e.keyCode == 13)
    {
        $(this).trigger("enterKey");
    }
});

// On récupère en Ajax le contenu
function ajaxLoad(q){
    $.ajaxSetup({
        xhrFields: {
            withCredentials: true
        }
    });
    $.ajax({
        url : '/ajaxChat?q='+q,
        type : 'GET',
        dataType : 'html',
        xhrFields: {
            withCredentials: true
        },
        crossDomain: true,

        success: function(response, statut){
            // On le met dans album
            if(response == '') {
                response = 'Je n\'ai pas compris.';
            }
            $('<div class="message new"><figure class="avatar"><img src="/images/avatar-chat.png" /></figure>' + response + '</div>').appendTo($('.mCSB_container'));
            updateScrollbar();
            console.log("Success");
            console.log("response", response);
            console.log("statut", statut);
        },

        error: function(resultat, statut, erreur){
            // TODO: Gestion de l'erreur
            var strError = "<div class='error'>Une erreur est survenue pendant le chargement. Veuillez recharger la page.</div>"
            $('#chatbot-input').append(strError);
            console.log("Erreur Ajax.");
            console.log(resultat + " " + statut + " " + erreur);
        },

        complete: function(data) {
            $('#loading-image').hide();
        }
    })
}