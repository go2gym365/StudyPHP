<?php

$conn = mysqli_connect('localhost', 'kihun0422', 'wnsldjdlqslek', 'kihun0422');
$filtered = [
'name' => mysqli_real_escape_string($conn, $_POST['name']),
'profile' => mysqli_real_escape_string($conn, $_POST['profile']),
];

$sql = "
INSERT INTO author
(name, profile)
VALUES(
'{$filtered['name']}',
'{$filtered['profile']}'
)
";

$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo '저장하는 과정에서 문제가 생겼습니다.';
    error_log(mysqli_error($conn));
} else {
    header('Location: author.php');
}
