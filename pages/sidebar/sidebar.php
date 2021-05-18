<nav class="navbar navbar-expand-xl navbar-light sticky-top fonchukoho">
	<span class="navbar-toggler navbar-nav mx-auto" type="span" data-toggle="collapse" data-target="#navbarSupportedContent">
    	BỘ LỘC SẢN PHẨM
	</span>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<div class="list-group flex-xl-fill">
			<div class="card">
				<div class="card-header text-center">Sắp xếp</div>
				<div class="list-group-item">
					<div class="form-check">
						<label class="form-check-label" for="hotpro">
							<input type="radio" class="form-check-input" id="hotpro" name="optradio" value="hotpro" >Flash Sale
						</label>
					</div>
				</div>
				<div class="list-group-item">
					<div class="form-check">
						<label class="form-check-label" for="priceasc">
							<input type="radio" class="form-check-input" id="priceasc" name="optradio" value="priceasc" >Giá: Tăng dần
						</label>
					</div>
				</div>
				<div class="list-group-item">
					<div class="form-check">
						<label class="form-check-label" for="pricedesc">
							<input type="radio" class="form-check-input" id="pricedesc" name="optradio" value="pricedesc" >Giá: Giảm dần
						</label>
					</div>
				</div>
				<div class="list-group-item">
					<div class="form-check">
						<label class="form-check-label" for="az">
							<input type="radio" class="form-check-input" id="az" name="optradio" value="az" >Tên: A-Z
						</label>
					</div>
				</div>
				<div class="list-group-item">
					<div class="form-check">
						<label class="form-check-label" for="za">
							<input type="radio" class="form-check-input" id="za" name="optradio" value="za" >Tên: Z-A
						</label>
					</div>
				</div>
				<div class="list-group-item">
					<div class="form-check">
						<label class="form-check-label" for="oldpro">
							<input type="radio" class="form-check-input" id="oldpro" name="optradio" value="oldpro" >Cũ nhất
						</label>
					</div>
				</div>
				<div class="list-group-item">
					<div class="form-check">
						<label class="form-check-label" for="newpro">
							<input type="radio" class="form-check-input" id="newpro" name="optradio" value="newpro" >Mới nhất
					</div>
				</div>
				<div class="list-group">
				<h6 class="text-center">Giá sản phẩm </h6>
				<input type="hidden" id="getid" value="<?php echo  $_GET['id']  ?>">  
					<input type="range" class="custom-range "min="0" max="1000000" step="5000" value="0" id="min_price" name="min_price" />  
					<span id="price_range"></span>
				</div>
			</div>
		</div>
	</div>
</nav>