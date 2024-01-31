<?php

Route::get('Bknws', function () {
    $bknws = new Idbara\Bknws\Bknws();
    return $bknws->hello();
});
