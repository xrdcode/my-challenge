var clndr = {};
var url = $("#jsonURL").html();
$( function() {
  var events = [];
  $.getJSON(url, function(json) {
    var events = json;
    console.log(events);
    clndr = $('#full-clndr').clndr({
      template: $('#full-clndr-template').html(),
      events: json,
      forceSixRows: true
    });
  });
});
