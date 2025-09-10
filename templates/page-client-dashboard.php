<?php /*
Template Name: Panel Klienta WPaaS
*/
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel Klienta WPaaS</title>
	<link rel="stylesheet" href="/wp-content/plugins/new-panel-master/assets/tailwind.min.css">
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen">
	<?php include __DIR__.'/dashboard.php'; ?>
	<script src="/wp-content/plugins/new-panel-master/assets/alpine.min.js"></script>
	<script src="/wp-content/plugins/new-panel-master/assets/dashboard.js"></script>
</body>
</html>
