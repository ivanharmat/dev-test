<div class="jumbotron"></div>
<div class="container-full">
    <h1>Starships</h1>
</div>

<div class="container" id="main_container">
	 <?php if($pagesAvailable > 0):?>
        <?php require('views/pagination.php');?>

        <div class="row">
            <div class="col-md-12">
                <?php foreach($ships as $key => $ship):?>
                    <div class="media">
                        <div class="media-body">
                            <h2 class="media-heading"><?php echo ucwords($ship['name']);?></h2>
                            <p><strong>Length :</strong> <?php echo number_format((int)$ship['length'], 0);?></p>
                            <p><strong>Crew :</strong> <?php echo number_format((int)$ship['crew'], 0);?></p>
                            <p><strong>Passengers :</strong> <?php echo number_format((int)$ship['passengers'], 0);?></p>
                            <a href="#" class="btn btn-lg btn-default more_info" rel="<?php echo $key;?>">More Info &raquo;</a>
                        </div>
                        <div class="media-right">
                            <a href="#">
                                <img alt="ship image" class="media-object lazy_load_image" data-src="/img/starships/<?php echo strtolower(str_replace(' ', '-', $ship['name']));?>.png" src="/img/placeholder_image_white.jpg">
                            </a>
                        </div>
                    </div>
                    <hr>
                <?php endforeach;?>
            </div>
        </div>
        <input type="hidden" name="shipsJson" value='<?php echo $shipsJson;?>' id="shipsJson">

		<div class="modal fade" id="default_modal" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="default_modal_title"></h4>
                    </div>
                    <div class="modal-body" id="default_modal_body">
                        <p><strong>Manufacturer : </strong><span id="manufacturer_span"></span></p>
                        <p><strong>Starship Class : </strong><span id="starship_class_span"></span></p>
                        <p><strong>Hyper Drive Rating : </strong><span id="hyperdrive_rating_span"></span></p>
                        <p><strong>Cargo Capacity : </strong><span id="cargo_capacity_span"></span></p>
                        <p><strong>Cost in Credits : </strong><span id="cost_in_credits_span"></span></p>
                        <p><strong>Max Atmosphering Speed : </strong><span id="max_atmosphering_speed_span"></span></p>
                        <p><strong>MGLT : </strong><span id="mglt_span"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success pull-right" data-dismiss="modal"><i class="fa fa-times"></i> OK</button>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <?php require('views/pagination.php');?>
    <?php else :?>
    	<div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">No data found. <a href="/" class="btn btn-success btn-small">Try again</a></p>
            </div>
        </div>
    <?php endif;?>
</div>