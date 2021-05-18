$(document).ready(function(){
    $('#min_price').change(function(){
     $('.filter_data').html('<div class="col-md-12" style="display: flex; justify-content: center; align-items: start; height:100vh"><div class="spinner-border text-info" style="width:200px; height:200px;"></div></div>');
        var action = 'ajax_pricerange';
        var price = $(this).val();
        var key = $('#gettukhoa').val();
        $("#price_range").text("Giá sản phẩm dưới: " + price);  
        $.ajax({  
            url:"./pages/timkiem/ajax_pricesptimkiem.php", 
             method:"POST",  
             data:{
                 key:key,
                 action:action,
                 price:price,
            },  
             success:function(data){  
                  $(".filter_data").fadeIn(500).html(data);  
             }  
        });  
   });  
     function filter_data(){
          $('.filter_data').html('<div class="col-md-12" style="display: flex; justify-content: center; align-items: start; height:100vh"><div class="spinner-border text-info" style="width:200px; height:200px;"></div></div>');
          var key = $('#gettukhoa').val();
          var action = 'sortpro';
          var value = $('input[name="optradio"]:checked').val(); 
          $.ajax({
               url:"./pages/timkiem/sortsptimkiem.php", 
               method:"POST",
               data:{
                    key:key,
                    action:action,
                    value:value,
               },
               success:function(data){
                    $('.filter_data').html(data);
               }
          })
     }
$('.form-check-input').click(function(){
   filter_data();
})



load_data();  
    function load_data(page)  
    {  
     $('.filter_data').html('<div class="col-md-12" style="display: flex; justify-content: center; align-items: start; height:100vh"><div class="spinner-border text-info" style="width:200px; height:200px;"></div></div>');
     var key = $('#gettukhoa').val();

         $.ajax({  
              url:"./pages/timkiem/pagination.php",  
              method:"POST",  
              data:{page:page,
                    key:key,
            },  
              success:function(data){  
                   $('#phantrang').html(data);  
              }  
         })  
    }  
    $(document).on('click', '.page-link', function(){  
         var page = $(this).attr("id");  
         load_data(page);  
    });  
})



