$(document).ready(function() {
    $("#doorIcon").mouseover(function() {
      $(".door-icon").removeClass("fa-door-closed").addClass("fa-door-open");
    });
    
    $("#doorIcon").mouseout(function() {
      $(".door-icon").removeClass("fa-door-open").addClass("fa-door-closed");
    });
  });