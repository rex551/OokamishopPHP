$(document).ready(function(){
    $('#min_price').change(function(){
        $('.filter_data').html('<div class="col-md-12" style="display: flex; justify-content: center; align-items: start; height:100vh"><div class="spinner-border text-info" style="width:200px; height:200px;"></div></div>');
        var action = 'ajax_pricerangecon';
        var price = $(this).val(); 
        var id = $('#getid').val(); 
        $("#price_range").text("Giá sản phẩm dưới: " + price);  
        $.ajax({  
            url:"./pages/danhmuccon/ajax_pricerangecon.php", 
             method:"POST",  
             data:{
                 action:action,
                 price:price,
                 id:id
            },  
             success:function(data){  
                  $(".filter_data").fadeIn(500).html(data);  
             }  
        });  
   });
   
    function filter_data(){
        $('.filter_data').html('<div class="col-md-12" style="display: flex; justify-content: center; align-items: start; height:100vh"><div class="spinner-border text-info" style="width:200px; height:200px;"></div></div>');
        var action = 'sortpro';
        var value = $('input[name="optradio"]:checked').val();
        var id = $('#getid').val(); 
        $.ajax({
            url:"./pages/danhmuccon/sortproductcon.php", 
            method:"POST",
            data:{
                id:id,
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
            var id = $('#getid').val(); 
            $.ajax({  
                url:"./pages/danhmuccon/paginationcon.php",  
                method:"POST",  
                data:{page:page,
                        id:id
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
});
