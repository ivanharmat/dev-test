<div class="row">
    <ul class="pagination">
        <li>
          <a href="/?page=<?php echo $previousPageNum;?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php for($i = 1; $i <= $pagesAvailable; $i++):?>
            <li class="<?php echo ($i == $page) ? 'active' : '';?>"><a href="/?page=<?php echo $i;?>"><?php echo $i;?></a></li>
        <?php endfor;?>
        <li>
          <a href="/?page=<?php echo $nextPageNum;?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
    </ul>
</div>