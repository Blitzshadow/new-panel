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
	<link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__).'../assets/tailwind.min.css'; ?>">
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen">
	<?php include __DIR__.'/dashboard.php'; ?>
	<script src="<?php echo plugin_dir_url(__FILE__).'../assets/alpine.min.js'; ?>"></script>
	<script src="<?php echo plugin_dir_url(__FILE__).'../assets/dashboard.js'; ?>"></script>
</body>
</html>
