<?php
reset ($_FILES);
$temp = current($_FILES);
move_uploaded_file($temp['tmp_name'], './images/products/test.jpg');
file_put_contents('test.txt', json_encode($_FILES) . "\n\n" . json_encode($_POST));

echo json_encode(['location' => 'https://lh3.googleusercontent.com/-Cf-a37IIcgs/AAAAAAAAAAI/AAAAAAAAAAA/AAnnY7ob8uze-y2APZv5Q6L6BmsCQ5-2SQ/s96-c-mo/photo.jpg']);