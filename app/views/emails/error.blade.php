<h1>Lỗi hệ thống thư viện</h1>
<h2>Ngày lỗi: <?php echo Carbon\Carbon::now()->format('\n\g\à\y d, \t\h\á\n\g m, \n\ă\m Y, H:i:s') ?></h2>
<h3>Mã lỗi: <?php echo $code ?></h3>
<h4>Route: <?php echo $route; ?></h4>
<h4>Nội dung lỗi</h4>
<pre>
    <?php echo $exception ?>
</pre>
