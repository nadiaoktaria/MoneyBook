$(document).ready(function() {
    setInterval(function() {
        var momentNow = moment();
        $('#realtime').html('<i class="fas fa-clock mr-3"></i>' + momentNow.format('DD MMMM YYYY') + '<i class="ml-2 mr-2"></i>' + momentNow.format('hh:mm:ss A'));
    }, 100);
});