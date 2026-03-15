<?php
function getProdukById($id, $produkList) {
    foreach ($produkList as $p) {
        if ($p['id'] == $id) return $p;
    }
    return null;
}