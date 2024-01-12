<style>
    .lists {
        position: relative;



        * {
            box-sizing: border-box;
        }

        .item {
            width: 200px;
            height: 240px;
            margin: auto;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: none;


            div {
                img {
                    width: 100%;
                    height: 220px;
                }
            }
        }
    }

    .left,
    .right {
        border: 20px solid black;
        border-top-color: transparent;
        border-bottom-color: transparent;
        width: 0;
    }

    .left {
        border-left-width: 0;
    }

    .right {
        border-right-width: 0;

    }

    .btns {
        width: 380px;
        height: 100px;
        /* background: lightgray; */
        display: flex;
        overflow: hidden;

        .btn {
            font-size: 12px;
            width: 90px;
            flex-shrink: 0;
            text-align: center;

            img {
                width: 60px;
                height: 80px;
            }

        }
    }



    .controls {
        width: 420px;
        height: 100px;
        margin-top: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: absolute;
        bottom: 20px;
    }
</style>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;position:relative">
        <div class="lists">
            <?php
            $posters = $Poster->all(['sh' => 1], "order by rank");
            foreach ($posters as $poster) {
            ?>
                <div class="item">
                    <div><img src="./img/<?= $poster['img'] ?>" alt=""></div>
                    <div><?= $poster['name'] ?></div>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="controls">
            <div class="left"></div>
            <div class="btns">
                <?php
                foreach ($posters as $idx => $poster) {
                ?>
                    <div class="btn">
                        <div><img src="./img/<?= $poster['img'] ?>"></div>
                        <div><?= $poster['name'] ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="right"></div>
        </div>
    </div>
</div>
<script>
    $('.item').eq(0).show();
</script>
<style>
    .movies {
        display: flex;
        flex-wrap: wrap;
    }

    .movie {
        display: flex;
        flex-wrap: wrap;
        box-sizing: border-box;
        padding: 2px;
        margin: 0.25%;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 49%;
    }
</style>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="movies">
            <?php
            $today = date("Y-m-d");
            $ondate = date("Y-m-d", strtotime("-2 days"));
            $total = $Movie->count(" where `ondate`>='$ondate' && `ondate`<='$today' && `sh`=1");
            $div = 4;
            $pages = ceil($total / $div);
            $now = ($_GET['p']) ?? 1;
            $start = ($now - 1) * $div;
            $movies = $Movie->all(" where `ondate`>='$ondate' && `ondate`<='$today' && `sh`=1 order by rank limit $start,$div");
            foreach ($movies as $movie) {
            ?>
                <div class="movie">
                    <div style="width:35%;">
                        <a href="?do=intro&id=<?= $movie['id'] ?>">
                            <img src="./img/<?= $movie['poster'] ?>" style="width:60px;border:3px solid white;">
                        </a>
                    </div>
                    <div style="width:65%;">
                        <div><?= $movie['name'] ?></div>
                        <div style="font-size:12px">
                            分級:<img src="./icon/03C0<?= $movie['level'] ?>.png">
                        </div>
                        <divv style="font-size:12px">上映日期:<?= $movie['ondate'] ?>
                    </div>
                    <div style="width:100%;">
                        <button onclick="location.href='?do=intro&id=<?= $movie['id'] ?>'">劇情介紹</button>
                        <button onclick="location.href='?do=order&id=<?= $movie['id'] ?>'">線上訂票</button>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
    <div class="ct">
        <?php
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='?p=$prev'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            echo "<a href='?p=$i'> $i</a>";
        }
        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='?p=$next'> > </a>";
        }

        ?>
    </div>
</div>
</div>