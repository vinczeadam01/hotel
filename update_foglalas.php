
<div class="modal fade" role="dialog" tabindex="-1" id="update_modal<?php echo $current_row['id']?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background: white;">
                <div class="modal-header">
                    <h4 class="modal-title">Foglalás szerkesztése</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="manipulation.php?method=update&table=foglalas">
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;padding: 5px 12px;padding-left: 35px;">ID</span><input name="id" class="form-control" type="text" readonly value=<?php echo $current_row['id']?>></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;text-align: left;padding-left: 17px;">Vendég</span><select class="form-select" required="" name="vendegid">
                                <optgroup label="Vendégek listája">
                                    <?php vendegek_listazas($current_row['vendegid']); ?>
                                </optgroup>
                            </select></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;text-align: left;padding-left: 20px;">Szoba</span><select name="szobaid" class="form-select" required="">
                                <optgroup label="Szobák listája">
									<?php szobak_listazas($current_row['szobaszam']); ?>
                                </optgroup>
                            </select>
                        </div>
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;padding-left: 18px;">Érkezés</span><input name="erkezes" value=<?php echo $current_row['erkezes']?> class="form-control" type="date" required=""></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;">Távozás</span><input name="tavozas" value=<?php echo $current_row['tavozas']?> class="form-control" type="date" required=""></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;padding-left: 16px;">Reggeli</span>
                            <div class="form-control" style="margin-left: -1px;background: rgb(255,255,255);"><input name="ellatas" checked=<?php echo ($current_row['erkezes'] ? true : false)?> type="checkbox" style="width: 12.6667px;"></div>
                        </div>
                        
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;">Fizet</span><input name="fizet" value=<?php echo $current_row['fizet']?> class="form-control" type="number" required=""></div>
                        <div class="modal-footer" style="padding-bottom: 0px;margin-right: -12px;margin-left: -12px;margin-top: 11px;"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Bezár</button><button class="btn btn-primary" type="submit">Mentés</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>