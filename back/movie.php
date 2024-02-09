<input type="button" value="新增電影" class="btn">
<hr>
<script>
    $('.btn').on('click',function(){
        $.ajax({
            type:'get',
            url:'./back/add_movie.php',
            success:function(res){
                $('.tab').load('./back/add_movie.php');
            }
        })
    })
</script>