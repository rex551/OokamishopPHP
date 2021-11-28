<?php
  $currentyear = date("Y");
  if(isset($_POST['edityear'])){
    $currentyear = $_POST['year'];
  }
  $pastyear = 0;
  $pastyear = $currentyear -1;

  for($i=1;$i<=12;$i++){
    //get total
    $sql_lietke_month = 
    "SELECT 
    SUM(CASE WHEN MONTH(ngaydathang)=$i AND MONTH(ngaydathang)= MONTH(ngaydathang) AND YEAR(ngaydathang)=$currentyear THEN total ELSE 0 END ) as tongtien,
    SUM(CASE WHEN YEAR(ngaydathang)=$pastyear THEN total ELSE 0 END ) as pastnum,
    SUM(CASE WHEN YEAR(ngaydathang)=$currentyear THEN total ELSE 0 END ) as currentnum
    FROM tbl_cart";
    $query_lietke_month = mysqli_query($mysqli,$sql_lietke_month);
    $row_total = mysqli_fetch_array($query_lietke_month);


    if($row_total['pastnum'] == 0 || $row_total['currentnum'] == 0){
      $increpercent = 0;
    }
    else
    {
      $increpercent = (($row_total['currentnum'] - $row_total['pastnum'])/($row_total['pastnum'] * 100))*10000;
    }
?>
  <input style="display:none" type="hidden" id="t<?php echo $i ?>" value="<?php echo $row_total['tongtien']; ?>">
<?php 
  }
?>


<div class="container-fluid">
    <form method="POST" class="form-inline">
      <div class="row">
      <div class="col">
      <input type="text" class="form-control" name="year" id="year" min=1969 max=2099 
      pattern="[0-9]{1,100000}"
			title="Chỉ được nhập chữ số."
      >
      <input type="submit" class="btn btn-info" name="edityear" value="Tìm">
      </div>
      <div class="col">
        <p class="text-right">
        Doanh thu năm <?php echo $currentyear ?> là: <b><?php echo number_format($row_total['currentnum'],0,',','.').'vnđ';?></b>
        <br>
          <?php if($increpercent > 0){ ?>
            Doanh thu của năm <?php echo $currentyear ?> đã tăng <b><?php echo abs(number_format($increpercent, 2, '.', ''))?>%</b> so với năm <?php echo $pastyear ?>
          <?php }elseif($increpercent < 0){ ?>
            Doanh thu của năm <?php echo $currentyear ?> đã giảm <b><?php echo abs(number_format($increpercent, 2, '.', ''))?>%</b> so với năm <?php echo $pastyear ?>
          <?php }elseif($increpercent == 0){ ?>
            Không có dữ liệu
          <?php } ?>
        </p>
    </div>
        <canvas id="myChart"></canvas>
        <script>
          let myChart = document.getElementById('myChart').getContext('2d');
          // Global Options
          Chart.defaults.global.defaultFontFamily = 'Lato';
          Chart.defaults.global.defaultFontSize = 16;
          Chart.defaults.global.defaultFontColor = '#777';
          let massPopChart = new Chart(myChart, {
            type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
              labels:['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
              datasets:[{
                label:'Doanh  Thu',
                data:[
                  <?php 
                    for($i=1;$i<=12;$i++){  ?>
                    $('#t<?php echo $i ?>').val(),
                  <?php }  ?>
                ],
                //backgroundColor:'green',
                backgroundColor:[
                  'rgba(255, 99, 132, 0.6)',
                  'rgba(54, 162, 235, 0.6)',
                  'rgba(255, 206, 86, 0.6)',
                  'rgba(75, 192, 192, 0.6)',
                  'rgba(153, 102, 255, 0.6)',
                  'rgba(255, 159, 64, 0.6)',
                  'rgba(255, 99, 132, 0.6)',
                  'rgba(153, 102, 255, 0.6)',
                  'rgba(54, 162, 235, 0.6)',
                  'rgba(255, 206, 86, 0.6)',
                  'rgba(75, 192, 192, 0.6)',
                  'rgba(153, 102, 255, 0.6)',
                ],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'
              }]
            },
            options:{
              title:{
                display:true,
                text:'Doanh thu của năm <?php echo $currentyear ?>',
                fontSize:25
              },
              legend:{
                display:true,
                position:'right',
                labels:{
                  fontColor:'#000'
                }
              },
              layout:{
                padding:{
                  left:50,
                  right:0,
                  bottom:0,
                  top:0
                }
              },
              tooltips:{
                enabled:true
              }
            }
          });
        </script>
  </div>

  </form>
</div>