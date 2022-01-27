<?php
function downloadFile ($URL, $PATH) {
    $ReadFile = fopen ($URL, "rb");
    if ($ReadFile) {
        $WriteFile = fopen ($PATH, "wb");
        if ($WriteFile){
            while(!feof($ReadFile)) {
                fwrite($WriteFile, fread($ReadFile, 4096 ));
            }
            fclose($WriteFile);
        }
        fclose($ReadFile);
    }
}

downloadFile($_GET['url'], 'images/image.png');
$md5file = md5_file('images/image.png');

$functions = [];
$functions['hash'] = $md5file;
$functions['url'] = $_GET['url'];
$json = json_encode($functions, JSON_UNESCAPED_UNICODE);
print_r ($json);

?>