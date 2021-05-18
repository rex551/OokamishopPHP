<?php 
include('../../admincp/config/config.php');
if(isset($_POST['action'])){
    $sql = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tinhtrang=1 AND tbl_sanpham.id_danhmuc='".$_POST["id"]."'" ;
    
    if(($_POST['value']) == 'hotpro'){
        $sql = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tinhtrang=1 AND tbl_sanpham.id_danhmuc='".$_POST["id"]."' AND giamgia >0 ORDER BY giasp desc";
    }
    if(($_POST['value']) == 'priceasc'){
        $sql = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tinhtrang=1 AND tbl_sanpham.id_danhmuc='".$_POST["id"]."' ORDER BY giasp asc";
    }
    if(($_POST['value']) == 'pricedesc'){
        $sql = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tinhtrang=1 AND tbl_sanpham.id_danhmuc='".$_POST["id"]."' ORDER BY giasp desc";
    }
    if(($_POST['value']) == 'az'){
        $sql = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tinhtrang=1 AND tbl_sanpham.id_danhmuc='".$_POST["id"]."' ORDER BY tensanpham asc";
    }
    if(($_POST['value']) == 'za'){
        $sql = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tinhtrang=1 AND tbl_sanpham.id_danhmuc='".$_POST["id"]."' ORDER BY tensanpham desc";
    }
    if(($_POST['value']) == 'oldpro'){
        $sql = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tinhtrang=1 AND tbl_sanpham.id_danhmuc='".$_POST["id"]."' ORDER BY id_sanpham asc";
    }
    if(($_POST['value']) == 'newpro'){
        $sql = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tinhtrang=1 AND tbl_sanpham.id_danhmuc='".$_POST["id"]."' ORDER BY id_sanpham desc";
    }
    $output = '';
    $result = mysqli_query($mysqli,$sql);
        while ($row_pro = mysqli_fetch_array($result)){
            $output .='
            <div class="col-sm-3 mb-5 hover02 column">
            <span>
                <div class="card-deck">
                    <a style="text-decoration:none;" href="products/'.$row_pro['id_sanpham'].'">
                        <div class="card border-secondary shadow">
                            <nav class="productshow">
                                <img src="admincp/modules/quanlysp/uploads/'. $row_pro['hinhanh'] .'" alt="" class="card-img-top">';
                                if($row_pro['giamgia'] > 0){
                                $output.='
                                <span class="salesonimages"><b>'. $row_pro['giamgia'] .'%</b></span>';
                                }if($row_pro['soluong'] <=0){
                                $output.='
                                <span class="outproducts"><b>HẾT HÀNG</b></span>';
                                }
                                $output .=' 
                            </nav>
                            <div class="card-body">
                                <h6 style="font-size:12.9pt" class="text-center namepro">'. $row_pro['tensanpham'] .'</h6>';
                                if($row_pro['giamgia'] > 0){
                                $output.='
                                <h6 class="card-title  text-center" style="text-decoration-line:line-through; color:grey; font-size:13.7pt">
                                    '. number_format($row_pro['giasp'],0,',','.').'<small class="priceunit">đ</small>' .'
                                </h6>';   
                                $row_pro['giasp']-=$row_pro['giasp']*($row_pro['giamgia']/100);
                                $output.='
                                <h6 style="font-size:12.9pt" class="text-center"> 
                                    <span class="card-title text-danger">
                                        '. number_format($row_pro['giasp'],0,',','.').'<small class="priceunit"><b>đ</b></small>' .'
                                    </span>
                                    <span class="text-danger">|</span>
                                    <span class="text-danger">Sale: '. $row_pro['giamgia'] .'%</span> 
                                </h6>';
                                }else{
                                    $output.='
                                <h6 style="font-size:13.7pt" class="card-title text-center pricepro">
                                    '. number_format($row_pro['giasp'],0,',','.').'<small class="priceunit">đ</small>' .'
                                </h6>
                                <h6  class="text-center"  style="color:grey; font-size:12.9pt"> Danh Mục: '. $row_pro['tendanhmuc'] .'</h6>';
                                }
                                $output.='
                                <div class="mt-3">
                                    <a href="products/'.$row_pro['id_sanpham'].'" class="btn btn-block btnchitiet">Xem Chi Tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </span>
        </div>';
        }    
}
else{
    $output = '<h3>No</h3>';
}
echo $output;
?>