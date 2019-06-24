
<div class="row" style="padding: 0 0 0 100px; margin-bottom: 20px;">
    <div style="display:flex;justify-content:space-between">
        <div class="thumbnail">
            <?php if ($img) { ?>
            <img src="<?php echo $img;?>" alt="...">
            <?php } else { ?>
            <span class="glyphicon glyphicon-expand" style="font-size: 200px;color: #bab8b8;"></span>
            <?php } ?>
        </div>
        <div class="caption" style="display:flex;flex:1;flex-direction:column;margin-left:20px">
            <h3><?php echo $title;?></h3>
            <p><?php echo $description;?></p>
            <?php if (isset($watch_link)) { ?>
            <div class="btn btn-primary">
                <a href="<?php echo $watch_link;?>">Watch</a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>