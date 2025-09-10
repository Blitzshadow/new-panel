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
	<link rel="stylesheet" href="<?php echo function_exists('plugin_dir_url') ? plugin_dir_url(__FILE__).'../assets/tailwind.min.css' : '/wp-content/plugins/new-panel-master/assets/tailwind.min.css'; ?>">
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen">
	<?php include function_exists('plugin_dir_path') ? plugin_dir_path(__FILE__).'dashboard-modular.php' : __DIR__.'/dashboard-modular.php'; ?>
	<script src="<?php echo function_exists('plugin_dir_url') ? plugin_dir_url(__FILE__).'../assets/alpine.min.js' : '/wp-content/plugins/new-panel-master/assets/alpine.min.js'; ?>"></script>
	<script src="<?php echo function_exists('plugin_dir_url') ? plugin_dir_url(__FILE__).'../assets/dashboard.js' : '/wp-content/plugins/new-panel-master/assets/dashboard.js'; ?>"></script>
</body>
</html>
