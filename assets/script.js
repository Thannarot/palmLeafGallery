$(document).ready(function(){
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none",
        beforeShow : function(){
   this.title =  $(this.element).data("caption");
  }
    });
    $('#imgTable').DataTable({
    responsive: true
    });
    $('#imgTable2').DataTable({
    responsive: true
    });

});
