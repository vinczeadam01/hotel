

<div class="modal fade" role="dialog" tabindex="-1" id="update_szoba_modal<?php echo $current_row['szobaszam']?>">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content" style="background: white;">
            <div class="modal-header">
                <h4 class="modal-title">Szoba szerkesztése</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
				<form method="POST" action="manipulation.php?method=update&table=szoba">
					<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 130px;text-align: left;padding-left: 27px;">Szobaszám</span><input readonly name="szobaszam" class="form-control" type="text" value=<?php echo $current_row['szobaszam']?>></div>
        			<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 130px;padding-left: 40px;">Emelet</span><input class="form-control" type="text" required="" name="emelet" value=<?php echo $current_row['emelet']?>></div>
        	
        			<div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 130px;text-align: left;padding-left: 25px;">Szobatípus</span><select name="szobatipus" class="form-select" required="">
                                <optgroup label="Szobák listája">
									<?php szobatipus_listazas($current_row['szobatipus']); ?>
                                </optgroup>
                            </select>
                        </div>
        			
        			<div class="modal-footer" style="margin-top: 11px;margin-right: -12px;padding-bottom: 0px;margin-left: -12px;">
						<button class="btn btn-light" type="button" data-bs-dismiss="modal">Bezár</button>
						<button name="update" class="btn btn-primary" type="submit">Mentés</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>