<?php
if (isset($_GET['loaisanpham_id']) || $_GET['loaisanpham_id'] != NULL) {
    $loaisanpham_id = $_GET['loaisanpham_id'];
}

?>
<style>
    /* Style for   <div class="cartegory-top row"> */
    .container {
        max-width: 1200px;
        /* Adjust the max-width according to your design */
        margin: 0 auto;
        /* Center the container */
        padding: 20px;
        /* Add some padding inside the container */
    }

    .cartegory-top {
        background-color: #f0f0f0;
        /* Set a background color */
        padding: 10px;
        /* Add padding to the cartegory-top */
        border-radius: 5px;
        /* Add border-radius for rounded corners */
    }

    .cartegory-top a {
        text-decoration: none;
        /* Remove underlines from links */
        color: #000000;
        /* Set the text color */
    }

    .cartegory-top p {
        display: inline;
        /* Make paragraphs display inline */
        margin: 0;
        /* Remove default margins */
    }

    .cartegory-top span {
        margin: -3px 5px;
        /* Add some space around the arrow */
    }

    /* Hover effect on links */
    .cartegory-top a:hover {
        text-decoration: underline;
        /* Add underline on hover */
        color: #333;
        /* Darken the text color on hover */
    }
</style>
<!-- -----------------------CARTEGPRY---------------------------------------------- -->
<section class="cartegory">
    <div class="container">
        <div class="cartegory-top row">
            <?php
            $get_loaisanphamA = $index->get_loaisanphamA($loaisanpham_id);
            if ($get_loaisanphamA) {
                $result = $get_loaisanphamA->fetch_assoc();
            }
            ?>
            <p><a style="color:#000000;" href="">Trang chủ</a></p>
            <span>&#8594;</span>
            <p><?php if (isset($result['danhmuc_ten'])) {
                    echo $result['danhmuc_ten'];
                } else {
                    echo "Vui lòng thêm danh mục";
                } ?>
            </p>
            <span>&#8594;</span>
            <p><?php if (isset($result['loaisanpham_ten'])) {
                    echo $result['loaisanpham_ten'];
                } else {
                    echo "Vui lòng thêm loại sản phẩm";
                } ?></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="cartegory-left">
                <ul>
                    <?php
                    $show_danhmuc = $index->show_danhmuc();
                    if ($show_danhmuc) {
                        while ($result = $show_danhmuc->fetch_assoc()) {


                    ?>
                            <li class="cartegory-left-li"><a href="#"><?php echo $result['danhmuc_ten'] ?></a>
                                <ul>
                                    <?php
                                    $danhmuc_id = $result['danhmuc_id'];
                                    $show_loaisanpham = $index->show_loaisanpham($danhmuc_id);
                                    if ($show_loaisanpham) {
                                        while ($result = $show_loaisanpham->fetch_assoc()) {
                                    ?>
                                            <li><a href="cartegory.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>"><?php echo $result['loaisanpham_ten'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>

                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>