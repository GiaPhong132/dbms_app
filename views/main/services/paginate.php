<ul class="pagination home-product-pagination">
    <?php
    $maxPage = ceil($_SESSION['num_rows'] / 20);
    if ($currPage == 1) {
        echo '
                <li class="pagination-item">
                <a href="#" class="pagination-item-link pagination-item-link--disable">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
            <li class="pagination-item pagination-item--active">
        ';
    } else {
        echo '
             <li class="pagination-item">
                <a href="index.php?page=main&controller=product&action=index&currPage=' . $currPage - 1 . '" class="pagination-item-link">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
            <li class="pagination-item pagination-item--active">
        ';
    }

    // if ($currPage  > 3) {
    //     echo '
    //             <li class="pagination-item">
    //             <a href="index.php?page=main&controller=product&action=index&currPage=1" class="pagination-item-link">1</a>
    //             </li>

    //             <li class="pagination-item">
    //             <a href="index.php?page=main&controller=product&action=index&currPage=2" class="pagination-item-link">2</a>
    //            <li class="pagination-item">

    //            <a class="pagination-item-link pagination-item-link--disable">. . .</a>
    //         </li>
    //     ';
    // }
    if ($currPage > 2) $idx = $currPage - 2;
    elseif ($currPage > 1) $idx = $currPage - 1;
    else $idx = 1;
    for (; $idx <= $maxPage and $idx <= $currPage + 3; $idx++) {
        if ($idx == $currPage) {
            echo '
                 <li class="pagination-item pagination-item--active">
                <a href="#" class="pagination-item-link">' . $idx . '</a>
                </li>
                ';
        } else {
            echo '
                 <li class="pagination-item">
                 <a href="index.php?page=main&controller=product&action=index&currPage=' . $idx . '"  class="pagination-item-link">' . $idx . '</a>
                </li>
                ';
        }
    }

    if ($currPage + 3 < $maxPage) {
        echo '
               <li class="pagination-item">
                <a class="pagination-item-link pagination-item-link--disable">. . .</a>
            </li>

              <li class="pagination-item">
                <a href="index.php?page=main&controller=product&action=index&currPage=' . $maxPage . '" class="pagination-item-link">' . $maxPage . '</a>
                </li>

        ';
    }



    if ($currPage == $maxPage) {
        echo '
                <li class="pagination-item">
                <a href="#" class="pagination-item-link pagination-item-link--disable">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
            <li class="pagination-item pagination-item--active">
        ';
    } else {
        echo '
             <li class="pagination-item">
                <a href="index.php?page=main&controller=product&action=index&currPage=' . $currPage + 1 . '"   class="pagination-item-link">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
            <li class="pagination-item pagination-item--active">
        ';
    }


    ?>




    <!-- <li class="pagination-item">
        <a href="#" class="pagination-item-link pagination-item-link--disable">
            <i class="fas fa-chevron-left"></i>
        </a>
    </li>
    <li class="pagination-item pagination-item--active">
        <a href="#" class="pagination-item-link">1</a>
    </li>
    <li class="pagination-item">
        <a href="#" class="pagination-item-link">2</a>
    </li>
    <li class="pagination-item">
        <a href="#" class="pagination-item-link">3</a>
    </li>
    <li class="pagination-item">
        <a class="pagination-item-link pagination-item-link--disable">. . .</a>
    </li>
    <li class="pagination-item">
        <a href="#" class="pagination-item-link">8</a>
    </li>
    <li class="pagination-item">
        <a href="#" class="pagination-item-link">
            <i class="fas fa-chevron-right"></i>
        </a>
    </li> -->

</ul>