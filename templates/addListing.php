<?php
/*
 * Template Name: Add listing BCH
 * Description: A Page Template for adding a listing to the map
 */?>

<div id="bch_form_wrap">
    <div id="bchGenerate" class="form-row">
        <div class="col">
        <input id="bchNumber" min=1 max=10 type="number" class="form-control" placeholder="Number of wallets you wish to hide">
        </div>
        <div class="col">
        <button id="bchGo" type="button" class="btn btn-primary">GO</button>
        </div>
    </div>
    <div id="bchWalletListWrap">
        <button type="button" id="printWallets" class="btn btn-success">PRINT WALLETS</button>
        <div id="bchWalletList">
        </div>
    </div>
</div>