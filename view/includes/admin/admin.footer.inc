<!-- End page content -->
</div>
<script type="text/javascript" src="../js/admin/admin.js"></script>
<?php
if(isset($_GET['type']) || isset($_GET['q'])) {
?>
<script type="text/javascript" src="../js/admin/admin.show.js"></script>
<?php
}
else {
?>
<script type="text/javascript" src="../js/admin/admin.home.js"></script>
<?php
}
?>
</body>

</html>
