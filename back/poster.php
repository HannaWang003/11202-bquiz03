<div>
    <h3 class="ct">預告片清單</h3>
</div>
<hr>
<div>
    <h3 class="ct">新增預告片海報</h3>
    <form id="addPoster">

        <table class="ts">
            <tr>
                <td class="ct">預告片海報:</td>
                <td class="ct"><input type="file" name="img"></td>
                <td class="ct">預告片片名:</td>
                <td class="ct"><input type="text" name="name"></td>
            </tr>
        </table>
        <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
    </form>
</div>
<script>
  $('#addPoster').submit(function(event){
    event.preventDefault();
    let addData = new FormData(this);
    $.ajax({
        type:"post",
        data:addData,
        contentType:false,
        processData:false,
        url:"./api/add_poster.php",
        success:function(res){
console.log(res);
alert('新增'+res+'筆資料')
        }
    })
})
</script>