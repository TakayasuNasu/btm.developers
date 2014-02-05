<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>developers.io</title>
</head>
<body>
<?php

try {
	$pdo = new PDO('mysql:dbname=developers_io;host=localhost', 'root', 'root');
} catch (PDOException $e) {
	exit('データベースに接続できませんでした。' . $e->getMessage());
}


$stmt = $pdo->query('SELECT * FROM comments');
if (!$stmt) {
	$info = $pdo->errorInfo();

	exit($info[2]);
}

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo '<p>' . $data['title'] . ':' . $data['comment'] . "</p>\n";
}

$pdo = null;

?>
</body>
</html>
