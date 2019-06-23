<?php ?>
    <script src="<?php echo $scripts_path;?>/jquery-3.4.1.min.js"></script>
    <script src="<?php echo $scripts_path;?>/bootstrap.min.js"></script>
    <script src="<?php echo $scripts_path;?>/plugins.js"></script>
<?php if (isset($scripts)) { ?>
    <?php foreach ($scripts as $script) { ?>
        <script src="<?php echo $scripts_path . "/" . $script;?>.js"></script>
    <?php } ?>
<?php } ?>
</body>
</html>