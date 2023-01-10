

<div class="modal fade" role="dialog" tabindex="-1" id="update_modal<?php echo $current_row['id']?>">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content" style="background: white;">
            <div class="modal-header">
                <h4 class="modal-title">Vendég szerkesztése</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
				<form method="POST" action="manipulation.php?method=update&table=vendeg">
					<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 142px;text-align: left;padding-left: 55px;">ID</span><input readonly name="id" class="form-control" type="text" value=<?php echo $current_row['id']?>></div>
        			<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 142px;padding-left: 27px;">Vezetéknév</span><input class="form-control" type="text" required="" name="vnev" value=<?php echo $current_row['vnev']?>></div>
        			<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 142px;padding-left: 31px;">Keresztnév</span><input class="form-control" type="text" required="" name="knev" value=<?php echo $current_row['knev']?>></div>
        			<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 142;">Születési dátum</span><input class="form-control" type="date" required="" name="szuldatum" value=<?php echo $current_row['szuldatum']?>></div>
        			<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 142px;padding-left: 27px;">E-mail cím</span><input class="form-control" type="email" required="" name="email" value=<?php echo $current_row['email']?>></div>
        			<div class="modal-footer" style="margin-top: 11px;margin-right: -12px;padding-bottom: 0px;margin-left: -12px;">
						<button class="btn btn-light" type="button" data-bs-dismiss="modal">Bezár</button>
						<button name="update" class="btn btn-primary" type="submit">Mentés</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>