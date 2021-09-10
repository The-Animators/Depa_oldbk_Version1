<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<style type="text/css">#container,code{border:1px solid #D0D0D0}::selection{background-color:#E13300;color:#fff}::-moz-selection{background-color:#E13300;color:#fff}body{background-color:#fff;margin:40px;font:13px/20px normal Helvetica,Arial,sans-serif;color:#4F5155}a,h1{background-color:transparent;font-weight:400}a{color:#039}h1{color:#444;border-bottom:1px solid #D0D0D0;font-size:19px;margin:0 0 14px;padding:14px 15px 10px}code{font-family:Consolas,Monaco,Courier New,Courier,monospace;font-size:12px;background-color:#f9f9f9;color:#002166;display:block;margin:14px 0;padding:12px 10px}#body{margin:0 15px}p.footer{text-align:right;font-size:11px;border-top:1px solid #D0D0D0;line-height:32px;padding:0 10px;margin:20px 0 0}#container{margin:10px;box-shadow:0 0 8px #D0D0D0}</style>
</head>
<body>
<div id="container">
	<div id="body">
		Hello <?= $first_name; ?>,<br><br>

		You have requested to reset your password on <?= $this->config->item('web_url'); ?><br>
		Your One Time Password(OTP) is <b><?= $code; ?></b><br><br>

		If you have not requested for this access, inform us by email on <?= $this->config->item('support_email'); ?>.<br><br>

		System Administrator
	</div>
	<p class="footer">Team <?= $this->config->item('company_name'); ?></p>
</div>
</body>
</html>