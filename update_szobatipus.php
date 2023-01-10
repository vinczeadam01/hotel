

<div class="modal fade" role="dialog" tabindex="-1" id="update_szobatipus_modal<?php echo $current_row['id']?>">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content" style="background: white;">
            <div class="modal-header">
                <h4 class="modal-title">Szobatípus szerkesztése</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
				<form method="POST" action="manipulation.php?method=update&table=szobatipus">
					<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 110px;text-align: left;padding-left: 50px;">ID</span><input readonly name="id" class="form-control" type="text" value=<?php echo $current_row['id']?>></div>
        			<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 110px;padding-left: 40px;">Név</span><input class="form-control" type="text" required="" name="nev" value="<?php echo $current_row['nev'];?>"></div>
        			<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 110px;padding-left: 25px;">Férőhely</span><input class="form-control" type="number" required="" name="ferohely" value=<?php echo $current_row['ferohely']?>></div>
        			<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 110px;padding-left: 45px;">Ár</span><input class="form-control" type="number" min="10000" step="5000" required="" name="ar" value=<?php echo $current_row['ar']?>></div>
        		
        			<div class="modal-footer" style="margin-top: 11px;margin-right: -12px;padding-bottom: 0px;margin-left: -12px;">
						<button class="btn btn-light" type="button" data-bs-dismiss="modal">Bezár</button>
						<button name="update" class="btn btn-primary" type="submit">Mentés</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>