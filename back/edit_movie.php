<?php
include_once "../api/db.php";
// echo $_POST['id'];
$movie = $Movie->find($_POST['id']);
// $movie = $Movie->find($_POST['id']);
// dd($movie);
?>
<h3 class="ct">編輯院線片</h3>
<form id="editMovie">
    <div style="display:flex;align-items:start;width:80%;margin:auto">
        <div style="width:20%">影片資料</div>
        <div style="width:80%">
        <table style="width:100%;">
            <tr>
                <td>片名</td>
                <td><input style="width:80%" type="text" name="name" value='<?=$movie['name']?>'></td>
            </tr>
            <tr>
                <td>分級</td>
                <td>
                    <select name="level" id="">
                        <option value="1" <?=($movie['level']==1)?'selected':''?> >普遍級</option>
                        <option value="2" <?=($movie['level']==2)?'selected':''?> >輔導級</option>
                        <option value="3" <?=($movie['level']==3)?'selected':''?> >保護級</option>
                        <option value="4" <?=($movie['level']==4)?'selected':''?> >限制級</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>片長</td>
                <td><input style="width:80%" type="text" name="length"  value='<?=$movie['length']?>'></td>
            </tr>
            <tr>
                <td>上映日期</td>
                <?php
[$year,$month,$date]=explode('-',$movie['ondate']);
                ?>
                <td>
                    <select name="year" id="">
                        <option value="2024" <?=($year==2024)?'selected':''?> >2024</option>
                        <option value="2025"  <?=($year==2025)?'selected':''?>  >2025</option>
                    </select>年
                    <select name="month" id="">
                        <?php
for($i=1;$i<=12;$i++){
    echo "<option value='$i' ($month==$i)?'selected':''>$i</option>";
}
                        ?>
                    </select>月
                    <select name="date" id="">
                    <?php
for($i=1;$i<=31;$i++){
    echo "<option value='$i' ($date==$i)?'selected':''>$i</option>";
}
                        ?>
                    </select>日
                </td>
            </tr>
            <tr>
                <td>發行商</td>
                <td><input style="width:80%" type="text" name="publish"  value='<?=$movie['publish']?>'></td>
            </tr>
            <tr>
                <td>導演</td>
                <td><input style="width:80%" type="text" name="director"  value='<?=$movie['director']?>'></td>
            </tr>
            <tr>
                <td>預告影片</td>
                <td><input type="file" name="trailer"></td>
            </tr>
            <tr>
                <td>電影海報</td>
                <td><input type="file" name="poster"></td>
            </tr>
        </table>
        </div>
    </div>
    <div style="display:flex;align-items:start;width:80%;margin:auto">
        <div style="width:20%">劇情簡介</div>
        <div style="width:80%"><textarea name="intro" style="width:100%;height:100px"><?=$movie['intro']?></textarea></div>
    </div>
    <div class="ct">
        <input type="hidden" name="id" value='<?=$movie['id']?>'>
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>
<script>
   $('#editMovie').submit(function(event){
    event.preventDefault();
    let editform = new FormData(this);
    $.ajax({
        type:'post',
        data:editform,
        contentType:false,
        processData:false,
        url:'./api/edit_movie.php',
        success:function(res){
            $('.tab').load('./back/movie.php');
        },
        error: function(xhr, status, error) {
            console.error("AJAX请求失败: " + error);
        }

    })
   })
</script>
